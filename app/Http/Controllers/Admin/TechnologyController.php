<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Technology;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class TechnologyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $technologies = Technology::all();

        return view('admin.technologies.index', compact('technologies'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $technologies = Technology::all();

        return view('admin.technologies.create', compact('technologies'));
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

        $technology = new Technology();

        $technology->fill($form_data);

        $technology->slug = Str::slug($technology->name, '-');

        $technology->save();

        return redirect()->route('admin.technologies.show', $technology->slug);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Technology  $technology
     * @return \Illuminate\Http\Response
     */
    public function show(Technology $technology)
    {
        return view('admin.technologies.show', compact('technology'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Technology  $technology
     * @return \Illuminate\Http\Response
     */
    public function edit(Technology $technology)
    {
        return view('admin.technologies.edit', compact('technology'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Technology  $technology
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Technology $technology)
    {
        $this->validation($request);

        $form_data = $request->all();

        $technology->slug = Str::slug($technology->name, '-');

        $technology->update($form_data);

        $technology->save();

        return redirect()->route('admin.technologies.show', $technology->slug);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Technology  $technology
     * @return \Illuminate\Http\Response
     */
    public function destroy(Technology $technology)
    {
        $technology->delete();

        return redirect()->route('admin.technologies.index');
    }

    private function validation($request) {

        $form_data = $request->all();

        $validator = Validator::make($form_data, [
            'name' => 'required|max:100',
            'color' => 'required|max:7',
        ], [
            'name.required' => 'Il campo è obbligatorio',
            'name.max' => 'Puoi inserire al massimo 100 Caratteri',
            'color.required' => 'Il campo è obbligatorio',
        ])->validate();

        return $validator;

    }
}
