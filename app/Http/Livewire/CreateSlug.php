<?php

namespace App\Http\Livewire;

use Livewire\Component;

class CreateSlug extends Component
{
    public $title;
    public $slug;

    public function render()
    {
        return view('livewire.create-slug');
    }

    public function generateSlug()
    {
        $this->slug = \Str::slug($this->title);
    }
}
