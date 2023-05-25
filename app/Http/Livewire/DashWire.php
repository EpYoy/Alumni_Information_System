<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Alumni;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class DashWire extends Component
{
    use LivewireAlert;
    
    private $alumni;
    public $first_name;
    public $middle_name;
    public $last_name;
    public $gender;
    public $year_graduated;
    public $address;
    public $searchTerm = '';
    public $alumniId;
    public $alumniAll;
    public $updatedAlumniCount = 0;

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
        $this->alumniAll = Alumni::all();
        $this->emit('alumniSaved'); 
    }

    public function editAlumni($id)
    {
        $alumni = Alumni::findOrFail($id);
    
        $this->resetFields();
    
        $this->alumniId = $alumni->id;
        $this->first_name = $alumni->first_name;
        $this->middle_name = $alumni->middle_name;
        $this->last_name = $alumni->last_name;
        $this->gender = $alumni->gender;
        $this->year_graduated = $alumni->year_graduated;
        $this->address = $alumni->address;
    }

    public function updateAlumni()
    {
        $validatedData = $this->validate([
            'first_name' => 'required|string',
            'middle_name' => 'nullable|string',
            'last_name' => 'required|string',
            'gender' => 'required|string',
            'year_graduated' => 'required|integer',
            'address' => 'required|string',
        ]);

        $alumni = Alumni::findOrFail($this->alumniId);
        $alumni->update($validatedData);

        $this->alert('success', $alumni->first_name.' '.$alumni->last_name.' has been updated', ['toast' => false, 'position' => 'center']);

        $this->resetFields();
        $this->alumni = Alumni::paginate(10); // Refresh the alumni records after update
        $this->emit('alumniUpdated');
    }

    private function resetFields()
    {
        $this->alumniId = null;
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
    
        $this->alert('success', 'Successfully deleted!');
    
        $this->alumni = Alumni::paginate(10); // Refresh the alumni records after deletion
    }

    public function getAlumniList()
    {
        $alumniList = Alumni::where(function ($query) {
            $query->where('first_name', 'LIKE', '%' . $this->searchTerm . '%')
                ->orWhere('last_name', 'LIKE', '%' . $this->searchTerm . '%');
        })->get();
        return $alumniList;
    }

    public function render()
    {
        $alumniList = $this->getAlumniList();
        $removedAlumniCount = Alumni::onlyTrashed()->count();
        return view('livewire.dash-wire', ['alumniList' => $alumniList, 'removedAlumniCount' => $removedAlumniCount])
            ->extends('layouts.app')
            ->section('content');  
    }
    
    public function mount()
    {
        $this->dispatchBrowserEvent('alumniSaved');
        $this->alumniAll = Alumni::all();
        $this->alumni = Alumni::paginate(10);
    }

}


