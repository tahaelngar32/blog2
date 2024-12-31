<?php

namespace App\Livewire;

use Livewire\Component;

class Counter extends Component
{
    public $num =10;
    public $name ='taha';
    public function render()
    {
        return view('livewire.counter');
    }
    public function add()
    {
        $this->num++;
    }
    public function sub()
    {
        $this->num--;
    }
    public function name2()
    {
        $this->name;
    }
}
