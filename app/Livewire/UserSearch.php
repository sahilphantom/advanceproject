<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\FormUser;

class UserSearch extends Component
{
    public $search = '';

    public function render()
    {
        $users = [];

        if (strlen($this->search) > 1) {
            $users = FormUser::where('name', 'like', '%' . $this->search . '%')
                         ->orWhere('email', 'like', '%' . $this->search . '%')
                         ->get();
        }

        return view('livewire.user-search', ['users' => $users]);
    }
}