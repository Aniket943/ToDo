<?php

namespace App\Http\Livewire\Todo;


use Illuminate\Http\Request;
use Livewire\Component;

class Form extends Component
{
    // public Post $post;

    protected $rules = [
        'description' => 'required'
    ];


    public function render()
    {
        return view('livewire.todo.form');
    }

    public function addItem(Request $request) {
        dd($request);
        // dd($post);die;


    }
}
