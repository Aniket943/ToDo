<?php

namespace App\Http\Livewire\User;
use App\Models\User;

use Livewire\Component;

class Show extends Component
{
    public function render()
    {
      $users = User::paginate(5);
        return view('livewire.user.show', ['users' => $users]);
    }
}
