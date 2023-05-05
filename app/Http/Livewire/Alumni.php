<?php

namespace App\Http\Livewire;

use Livewire\Component;
use DB;

class Alumni extends Component
{
    public $name;

    public function render()
    {
        return view('livewire.alumni');
    }

    public function submit()
    {
        // Save the user's name to a database
        DB::table('users')->insert([
            'name' => $this->name,
        ]);

        // Redirect the user to a confirmation page
        return redirect('/confirmation');
    }
}
