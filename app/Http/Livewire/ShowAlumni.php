<?php

namespace App\Http\Livewire;

use App\Models\Alumni;
use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class ShowAlumni extends Component
{
    use LivewireAlert;
    public $alumniId;
    public $first_name;
    public $middle_name;
    public $last_name;
    public $gender;
    public $year_graduated;
    public $address;
    public $openEditModal = false;

    public function deleteAlumni($id)
    {
        $alumnus = Alumni::find($id);
        $alumnus->delete();

        $this->alert('success','Successfully deleted!');
    }

    public function editAlumni($id)
    {
        $alumni = Alumni::findOrFail($id);

        $this->alumniId = $alumni->id;
        $this->first_name = $alumni->first_name;
        $this->middle_name = $alumni->middle_name;
        $this->last_name = $alumni->last_name;
        $this->gender = $alumni->gender;
        $this->year_graduated = $alumni->year_graduated;
        $this->address = $alumni->address;
    }

    // Method to update the alumni data
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
        $this->alumniAll = Alumni::all();
        $this->emit('alumniUpdated'); // Emit custom event
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
    public function render()
    {
        $alumni = Alumni::all();

        return view('livewire.show-alumni', compact('alumni'));
    }
}
