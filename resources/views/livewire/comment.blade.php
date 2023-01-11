<div class="my-5">
    <h3><i class="fa-light fa-comments me-3" ></i>Commentaires ({{count($comments)}})</h3>

    <div>
        @if (session()->has('success'))
            <div class="alert alert-success mb-3">
                {{ session('success') }}
            </div>
        @endif
    </div>

    <form action="" wire:submit.prevent="sendComment" method="POST">
        @csrf
        <textarea name="" id="" class="form-control mt-3 p-2" rows="3" wire:model="comment" placeholder="Envoyer Un Commentaire"></textarea>
        @error('comment')
            <div class="text-danger">{{$message}}</div>
        @enderror
        <button type="submit" class="btn  btn-outline-warning my-2">Envoyer</button>
    </form>

    @foreach($comments as $comment)
        <div class="card my-4 border-0 shadow-sm" id="{{$comment->id}}">
            <div class="card-body">
                <span class="d-flex align-items-center mb-3">
                    <img src="{{!\Illuminate\Support\Facades\File::exists(storage_path('public/' . $comment->user->avatar)) ? asset('storage/' .  $comment->user->avatar) : asset('imgs/logo.svg')}}" alt="" class="rounded-circle" style="width: 50px;height: 50px">
                        <h6 class="m-0 mx-3">{{$comment->user->name}}</h6>
                        <span class="text-muted">{{$comment->created_at}}</span>
                </span>

                <p class="text-muted">{{$comment->  comment}}</p>
                <span class="badge text-bg-primary d-inline-block  float-end">{{$comment -> user -> type}}</span>

                @if($comment->user_id == auth()->id())

                    <form action="" method="POST" wire:submit.prevent="deleteComment" onsubmit="confirm('tu es sure ?')">

                        <button type="submit" class="link-danger btn"><i class="fa-light fa-trash"></i></button>
                    </form>

                @endif
             </div>
        </div>
    @endforeach
</div>

