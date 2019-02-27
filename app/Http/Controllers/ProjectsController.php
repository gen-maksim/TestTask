<?php

namespace App\Http\Controllers;

use App\Events\ProjectCreated;
use App\User;
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
        $projects = auth()->user()->projects;

        return view('projects.index', compact('projects'));

    }

    //TODO: move refresh to it's own controller (e.x. api/projectsController)
    public function refresh()
    {
        $projects = auth()->user()->projects;

        return compact('projects');

    }

    public function show(Project $project)
    {
        $this->authorize('view',$project);

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

        $project = auth()->user()->createProject($attributes);

        event(new ProjectCreated($project));

        return redirect(route('projects.index'));
    }
}
