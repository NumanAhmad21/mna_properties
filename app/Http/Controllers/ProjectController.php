<?php

namespace App\Http\Controllers;
use App\Models\PropertyProject;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    //
    
    public function index()
    {
        $projects = PropertyProject::latest()->paginate(5);;
        return view('projects.index', compact('projects'))->with('i', (request()->input('page', 1) - 1) * 5);
    }
    
    public function create()
    {
        return view('projects.create');
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'name'          =>  'required',
            'description'         =>  'required',
            'location'         =>  'required'
        ]);
        $projects = new PropertyProject;
        $projects->name = $request->name;
        $projects->description = $request->description;
        $projects->location = $request->location;
        $projects->save();
        return redirect()->route('projects.index')->with('success', 'Project Added successfully.');
        
    }
    
    public function edit($id)
    {
        $projects = PropertyProject::findOrFail($id);
        return view('projects.edit', compact('projects'));
    }
    
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'          =>  'required',
            'description'         =>  'required',
            'location'         =>  'required'
        ]);
        $projects = PropertyProject::findOrFail($id);
        $projects->name = $request->name;
        $projects->description = $request->description;
        $projects->location = $request->location;
        $projects->save();
        return redirect()->route('projects.index')->with('success', 'Project Data has been updated successfully');
    }
    public function show($id)
    {   
        $projects = PropertyProject::where('id', $id)->first();
        return view('projects.show', compact('projects'));
    }
    public function destroy($id)
    {
        $projects = PropertyProject::findOrFail($id);
        $projects->delete();
        return redirect()->route('projects.index')->with('success', 'Project Data deleted successfully');
    }
}
