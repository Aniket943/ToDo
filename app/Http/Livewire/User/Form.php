<?php

namespace App\Http\Livewire\User;
use App\Models\User;
use Illuminate\Http\Request;
use Livewire\Component;

class Form extends Component
{
  public $user;
  public $name;
  public $mail;
  public $profilephoto;

  public function render()
  {
      return view('livewire.user.form', [
        'user' => $this->user,
      ]);
  }

  public function saveuser($uid) {
    dd($uid);
    $messages = [
        'name.required' => 'Full Name is required.',
        'name.max' => 'Full Name can only be 245 characters long.',
        'mail.required' => 'Mail is required.',
        'mail.max' => 'Mail can only be 245 characters long.'
    ];

    $this->validate([
        'name' => 'required|max:245',
        'mail' => 'required|max:245'
    ], $messages);

    dump($this->name);
  }
}
