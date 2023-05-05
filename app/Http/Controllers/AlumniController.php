<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alumni;


class AlumniController extends Controller
{
    
    public function index()
    {
        $alumni = Alumni::all();
        return view('layouts.add', ['alumni' => $alumni]);
    }

    public function showMainPage()
    {
       
        $alumni_data = Alumni::orderByDesc('year_graduated')->get();
    
        // Pass alumni data to the view
        return view('admin.main', ['alumni_data' => $alumni_data]);
    }    

    public function showDashboard()
    {
        $alumni_data = Alumni::all()->groupBy('graduation_year')->toArray();
        return view('admin.main', compact('alumni_data'));
    }    

    public function manageData()
    {
        $alumni = Alumni::all()->groupBy('year_graduated')->sortKeysDesc();
        return view('admin.manage', compact('alumni'));
    }   

    public function edit($id)
    {
        $alumni = Student::findOrFail($id);
        return view('admin.alumni.edit', compact('alumni'));
    }    
    

    public function update(Request $request, $id)
    {
        $alumni = Alumni::findOrFail($id);
        $alumni->first_name = $request->input('first_name');
        $alumni->middle_name = $request->input('middle_name');
        $alumni->last_name = $request->input('last_name');
        $alumni->gender = $request->input('gender');
        $alumni->year_graduated = $request->input('year_graduated');
        $alumni->address = $request->input('address');
        $alumni->fill($request->all());
        $alumni->save();
        return redirect()->route('admin.manage')->with('success', 'Alumni record updated successfully!');
    }
    

    public function destroy($id)
    {
        $alumni = Alumni::findOrFail($id);
        $alumni->delete();

        Alert::success('Success', 'Data has been deleted successfully.');
        return redirect('/admin/manage')->with('success', 'Alumni deleted successfully.');
    }

    public function store(Request $request)
    {
        $alumni = new Alumni;
        $alumni->first_name = $request->input('firstName');
        $alumni->middle_name = $request->input('middleName') ?? '';
        $alumni->last_name = $request->input('lastName');
        $alumni->gender = $request->input('gender');
        $alumni->year_graduated = $request->input('year');
        $alumni->address = $request->input('address');
        $alumni->save();
        
        Alert::success('Success', 'Data has been saved successfully.');
        return redirect('/layouts/add')->with('success', 'Alumni added successfully.');
        
    }       
}
