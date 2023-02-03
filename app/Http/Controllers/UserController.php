<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules\File;

class UserController extends Controller
{

    public function  __construct() {
             $this->middleware(['role:super_admin'])->only(['create','store','edit','update','destroy']);
             $this->middleware(['role:super_admin|moderator|teacher'])->only('index');
    }


    public function index()
    {
            $users = User::where('id', '<>', Auth::id())->paginate(5);
            return view('admin.users.index',compact('users'));
    }


    public function create()
    {
            return view('admin.users.create');
    }


    public function store(Request $request)
    {

        $request -> validate([
            'name' => 'required|min:3|max:50',
            'email' => 'required|email|max:50|unique:users,email',
            'password' => 'required|min:8',
            'type' => 'required'
        ]);

            $user = User::create([
                'name' => $request -> name,
                'email' => $request -> email,
                'password' => Hash::make($request->password),
                'approved' => $request -> approved ? 1 : 0,
                'type' => $request->type
            ]);

            return  redirect()->to('admin/users')->with(
                ['success' => 'Utilisateur ajouté avec succès']
            );



    }




    public function edit($id)
    {
        $user = User::find($id);
        $roles = Role::all();
        return view('admin.users.edit',compact('user','roles'));
    }


    public function update(Request $request, $id)
    {
        $request -> validate([
            'name' => 'required|min:3|max:50',
            'email' => 'required|email|max:50',
            'type' => 'required'
        ]);



            $user = User::find($id);

            $user->update([
                'name' => $request->name,
                'email' => $request->email,
            ]);


            $user -> detachRole($user -> roles[0]);
            $user -> attachRole(Role::where('name' , $request->type)->first());

            return redirect()->to('admin/users')->with(
                ['success' => __('forms.edit-success')]
            );


    }


    public function destroy($id)
    {
        if(auth()->user()->type == 'super_admin') {
            $user = User::find($id);
            $user->notifications()->delete();
            $user -> delete();
            return redirect()->to('admin/users')->with(
                ['success' => __('forms.deleted-success')]
            );
        }
        return  abort(404);
    }


    public function updateProfile(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3',
            'email' => 'required|email|unique:users,email,' . auth()->id(),
        ]);

        Auth::user()->update($request->all());

        return redirect()->to('admin/profile')->with([
            'success' => __('forms.edited-successfully')
        ]);
    }

    public function updatePassword(Request $request)
    {

        $request->validate([
            'actual_password' => 'required',
            'new_password' => 'required|confirmed',
        ]);

        $user = Auth::user();


        if (!Hash::check($request->actual_password, $user->password)) {
            return redirect()->back()->with([
                'failed' => __('forms.current-pass-incorrect')
            ]);
        }

        $user->password = bcrypt($request->new_password);

        $user->save();

        return redirect()->back()->with([
            'success' => __('forms.pass-chan-success')
        ]);

    }

    public function updateImage(Request $request)
    {
        $request -> validate([
            'image'=> [
                File::types([
                    'jpg','gif','png','webp'
                ])->max(1024 * 4)
            ]
        ]);

        if(!empty($request->file('image'))) {
            $image = $request->file('image')->store('avatar','public');


            $user = Auth::user();

            $user -> avatar = $image;

            $user -> save();

            return redirect()->back()->with([
                'success' => __('forms.pic-chan-success')
            ]);

        }

        return  redirect()->back();

    }

    public function profile()
    {
        return view('admin.profile')->with('user', User::where('id', Auth::id())->first());
    }


}
