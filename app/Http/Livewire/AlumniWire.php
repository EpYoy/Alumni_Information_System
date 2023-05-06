<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Alumni;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class AlumniWire extends Component
{
    use LivewireAlert;
    
    public $firstName;
    public $middle_Name;
    public $last_name;
    public $gender;
    public $year;
    public $homeAddress;

    public function saveAlumni()
    {
        // Validate form fields
        $validatedData = $this->validate([
            'firstName' => 'required|string',
            'middle_Name' => 'string',
            'last_name' => 'required|string',
            'gender' => 'required',
            'year' => 'required|string',
            'homeAddress' => 'required|string',
        ]);

        $alumni = Alumni::create([
            'firstName' => $this->firstName,
            'middle_Name' => $this->middle_Name,
            'last_name' => $this->last_name,
            'gender' => $this->gender,
            'year' => $this->year,
            'homeAddress' => $this->homeAddress,
        ]);
    
        session()->flash('message', 'Alumni data saved successfully!');

       
        $this->firstName = '';
        $this->middle_Name = '';
        $this->last_name = '';
        $this->gender = '';
        $this->year = '';
        $this->homeAddress = '';
    }

    public function render()
    {
        return view('livewire.alumni-wire');
    }
}


