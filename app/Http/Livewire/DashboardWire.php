<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Alumni;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class DashboardWire extends Component
{
    public function render()
    {
        $alumnis = Alumni::all();
        return view('livewire.dashboard-wire', compact('alumnis'));
    }
    
}
