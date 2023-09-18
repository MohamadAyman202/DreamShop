<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;

class CreateCategory extends Component
{
    use WithFileUploads;
    public $title;
    public $slug;
    public $image;

    public function render()
    {
        return view('livewire.create-category');
    }

    public function generateSlug()
    {
        $this->slug = \Str::slug($this->title);
    }
}
