<?php

namespace App\Http\Livewire;

use App\Models\File;
use Livewire\Component;
use Livewire\WithFileUploads;

class MultipleUpload extends Component
{

    use WithFileUploads;

    public $files = [];

    public function save() {
        $this->validate([
            'files.*' => 'max:' . 1024 * 300
        ]);

        foreach($this->files as $key => $file) {
            $this->files[$key] = $file -> store('files');
            File::create([
                'file' => $this->files[$key]
            ]);
        }

        session()->flash('success', 'Files has been successfully Uploaded.');



    }

    public function render()
    {
        return view('livewire.multiple-upload');
    }
}
