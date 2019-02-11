<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Project;

class ProjectsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
//        dd(auth()->id());
        $projects = Project::all()->filter(function($proj) { return $proj->user_id == auth()->id(); });

        return view('projects.index', compact('projects'));

    }

    public function show(Project $project)
    {
        return view('projects.show', compact('project'));
    }

    public function edit(Project $project)
    {
        return view('projects.edit', compact('project'));
    }

    public function update(Project $project)
    {
        $project->update(request(['title', 'description']));

        return redirect(route('projects.index'));
    }

    public function destroy(Project $project)
    {
        $project->delete();

        return redirect(route('projects.index'));
    }

    public function create()
    {
        return view('projects.create');
    }

    public function store()
    {
        $attributes = request()->validate([
            'title' => ['required', 'min:3'],
            'description' => ['required', 'min:3']
        ]);

        $attributes['user_id'] = auth()->id();
        Project::create($attributes);

        return redirect(route('projects.index'));
    }
}
