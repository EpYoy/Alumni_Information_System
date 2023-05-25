<?php

namespace App\Http\Livewire;

use App\Models\Alumni;
use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class ShowAlumni extends Component
{
    use LivewireAlert;
    use WithFileUploads;

    protected $alumni;
    public $first_name;
    public $middle_name;
    public $last_name;
    public $gender;
    public $year_graduated;
    public $address;
    public $openEditModal = false;
    public $uploadProgress = 0; 
    public $file; 
    public $files = []; 

    public function deleteAlumni($id)
    {
        $alumnus = Alumni::find($id);
        $alumnus->delete();
    
        $this->alert('success', 'Successfully deleted!');
    
        $this->alumni = Alumni::paginate(5); // Refresh the alumni records after deletion
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
        $this->alumni = Alumni::paginate(5); // Refresh the alumni records after update
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

    public function uploadFile()
    {
        $this->validate([
            'file' => 'required|file',
        ]);
    
        $uploadedFile = $this->file->store('public/uploads');
        $this->alert('success', 'File Successfully Uploaded!');
        $this->reset('file');
        $this->emit('fileUploaded', $uploadedFile);
        $this->files = Storage::disk('public')->files('uploads'); 
    }
    
    public function updatedFile()
    {
        $this->validateOnly('file', [
            'file' => 'required|file|max:2048',
        ]);
    }

    public function removeFile($filePath)
    {
        Storage::delete($filePath);
        $this->files = array_diff($this->files, [$filePath]);
        $this->alert('success', 'File removed successfully.');
    }
    
    public function render()
    {
        $files = Storage::disk('public')->files('uploads');
        $alumni = Alumni::paginate(5);
    
        return view('livewire.show-alumni', [
            'alumni' => $alumni,
            'files' => $files,
        ])->with('paginator', $alumni->links('vendor.pagination.bootstrap-4'));
    }
    


    public function mount()
    {
        $this->alumni = Alumni::paginate(5);
    }

}
