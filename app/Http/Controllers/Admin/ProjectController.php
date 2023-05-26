<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Technology;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
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

        $technologies = Technology::all();

        return view('admin.projects.create', compact('types', 'technologies'));
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

        if($request->hasFile('url_img')) {
   
            $path = Storage::put('project_images', $request->url_img);
         
            $form_data['url_img'] = $path;
         }

        $project->fill($form_data);
        
        $project->slug = Str::slug($project->title, '-');
        
        $project->save();

        if(array_key_exists('technologies', $form_data)) {

            $project->technologies()->attach($form_data['technologies']);

        }

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

        $technologies = Technology::all();

        return view('admin.projects.edit', compact('project', 'types', 'technologies'));
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

        if($request->hasFile('url_img')) {

            if($project->url_img) {
         
               Storage::delete($project->url_img);
            }
         
            $path = Storage::put('project_images', $request->url_img);
         
            $form_data['url_img'] = $path;
         
         }

        $form_data = $request->all();

        $project->slug = Str::slug($form_data['title'], '-');

        $project->update($form_data);

        $project->save();

        if(array_key_exists('technologies', $form_data)) {

            $project->technologies()->sync($form_data['technologies']);

        } else {

            $project->technlogies()->detach();

        }

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

        if($project->url_img) {
            Storage::delete($project->url_img);
         }

        $project->delete();

        return redirect()->route('admin.projects.index');
    }


    private function validation($request) {

        $form_data = $request->all();

        // VALIDATION ITAS
        $validator = Validator::make($form_data, [
            'title' => 'required|max:100',
            'description' => 'required|max:200',
            'repo' => 'required|max:200',
            'url_img' => 'nullable|image|max:4096',
            'type_id' => 'nullable|exists:types,id',
            'technologies' => 'exists:technologies,id',
        ], [
            'title.required' => 'Il campo è obbligatorio',
            'title.max' => 'Puoi inserire al massimo 100 Caratteri',
            'description.required' => 'Il campo è obbligatorio',
            'description.max' => 'Puoi inserire al massimo 200 Caratteri',
            'repo.required' => 'Il campo è obbligatorio',
            'repo.required' => 'Puoi inserire al massimo 200 caratteri',
            'url_img.image' => 'Il formato non è corretto',
            'url_img.max' => 'Dimensioni del file troppo grandi, max :max',
            'type_id.exists' => 'La categoria deve essere presente nel nostro sito',
            'technologies.exists' => 'La tecnologia deve essere presente nel nostro sito',
        ])->validate();

        return $validator;

    }
}
