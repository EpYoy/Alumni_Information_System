<?php

namespace App\Http\Livewire;

use App\Models\Alumni;
use Livewire\Component;

class ShowAlumni extends Component
{
    
    public function deleteAlumni($id)
    {
        $alumnus = Alumni::find($id);
        $alumnus->delete();
    }

    public function editAlumni($id)
    {
        $alumni = Alumni::find($id);
        $this->first_name = $alumni->first_name;
        $this->middle_name = $alumni->middle_name;
        $this->last_name = $alumni->last_name;
        $this->gender = $alumni->gender;
        $this->year_graduated = $alumni->year_graduated;
        $this->address = $alumni->address;

        $this->openEditModal = true;
    }


    public function render()
    {
        $alumni = Alumni::all();

        return view('livewire.show-alumni', compact('alumni'));
    }
}
