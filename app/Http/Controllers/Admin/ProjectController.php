<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::all();
        

        return view('admin.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $types = Type::all();

        return view('admin.projects.create', compact('types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validation($request);

        $form_data = $request->all();

        $project = new Project();

        $project->fill($form_data);
        
        $project->slug = Str::slug($project->title, '-');
        
        $project->save();

        return redirect()->route('admin.projects.show', $project->slug);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {

        return view('admin.projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {

        $types = Type::all();

        return view('admin.projects.edit', compact('project', 'types'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        $this->validation($request);

        $form_data = $request->all();

        $project->slug = Str::slug($form_data['title'], '-');

        $project->update($form_data);

        $project->save();

        return redirect()->route('admin.projects.show', $project->slug);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        $project->delete();

        return redirect()->route('admin.projects.index');
    }


    private function validation($request) {

        $form_data = $request->all();

        // VALIDATION ITAS
        $validator = Validator::make($form_data, [
            'title' => 'required|max:100',
            'description' => 'required|max:300',
            'url_img' => 'required',
            'type_id' => 'nullable|exists:types,id',
        ], [
            'title.required' => 'Il campo è obbligatorio',
            'title.max' => 'Puoi inserire al massimo 100 Caratteri',
            'description.required' => 'Il campo è obbligatorio',
            'description.max' => 'Puoi inserire al massimo 300 Caratteri',
            'url_img.required' => 'Il campo è obbligatorio',
            'type_id.exists' => 'La categoria deve essere presente nel nostro sito',
        ])->validate();

        return $validator;

    }
}
