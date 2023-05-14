<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Alumni;

class DashWire extends Component
{
    public $first_name;
    public $middle_name;
    public $last_name;
    public $gender;
    public $year_graduated;
    public $address;
    public $searchTerm = '';

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

        session()->flash('success', 'Alumni added successfully.');

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

      
    public function deleteAlumni($id)
    {
        $alumnus = Alumni::find($id);
        $alumnus->delete();
    }

    public function editAlumni($id)
    {
        $this->alumniId = $id;
        $alumni = Alumni::find($id);
        $this->first_name = $alumni->first_name;
        $this->middle_name = $alumni->middle_name;
        $this->last_name = $alumni->last_name;
        $this->gender = $alumni->gender;
        $this->year_graduated = $alumni->year_graduated;
        $this->address = $alumni->address;
    
        $this->openEditModal = true;
    }

    public function getAlumniList()
    {
        $alumniList = Alumni::all();
        return $alumniList;
    }

    public function openEditModal($id)
{
    $alumni = Alumni::find($id);
    $this->selectedAlumni = $alumni;
    $this->first_name = $alumni->first_name;
    $this->middle_name = $alumni->middle_name;
    $this->last_name = $alumni->last_name;
    $this->gender = $alumni->gender;
    $this->year_graduated = $alumni->year_graduated;
    $this->address = $alumni->address;
    $this->editModalOpen = true;
}



    public function render()
    {
        $alumniList = $this->getAlumniList();
        return view('livewire.dash-wire', ['alumniList' => $alumniList]);
    }
    
}
