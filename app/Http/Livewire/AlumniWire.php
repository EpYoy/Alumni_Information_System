<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Alumni;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class AlumniWire extends Component
{
    use LivewireAlert;
    
    public $first_name;
    public $middle_name;
    public $last_name;
    public $gender;
    public $year_graduated;
    public $address;

    public function saveAlumni()
    {
        $validatedData = $this->validate([
            'first_name' => 'required|string',
            'middle_name' => 'nullable|string',
            'last_name' => 'required|string',
            'gender' => 'required|string',
            'year_graduated' => 'required|integer',
            'address' => 'required|string',
        ]);

        Alumni::create($validatedData);
        $this->alert('success', $this->first_name.' '.$this->last_name.' has been added', ['toast' => false, 'position' => 'center']);
        $this->resetFields();
    }

    private function resetFields()
    {
        $this->first_name = null;
        $this->middle_name = null;
        $this->last_name = null;
        $this->gender = null;
        $this->year_graduated = null;
        $this->address = null;
    }

    public function render()
    {
        return view('livewire.alumni-wire');
    }
}
