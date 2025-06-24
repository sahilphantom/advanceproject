<?php
namespace App\Livewire;

use Livewire\Component;

class HelloWorld extends Component
{
    public $name = '';
    public $submitted = false;

    public function getIsValidNameProperty()
    {
        return strlen(trim($this->name)) >= 3;
    }

    public function updatedName()
    {
        $this->submitted = false;

        if ($this->isValidName) {
            $this->dispatch('NameSubmitted');
        }
    }

    public function submit()
    {
        $this->validate([
            'name' => 'required|min:3',
        ]);

        $this->submitted = true;
        $this->dispatch('NameSubmitted');
    }

    public function render()
    {
        return view('livewire.hello-world', [
            'isValidName' => $this->isValidName,
        ]);
    }
}
