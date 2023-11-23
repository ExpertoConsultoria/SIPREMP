<?php

namespace App\Livewire\Shared\Components;

use Livewire\Component;
use LivewireUI\Modal\ModalComponent;


class InProgress extends ModalComponent
{
    public function render()
    {
        return view('livewire.shared.components.in-progress');
    }

}
