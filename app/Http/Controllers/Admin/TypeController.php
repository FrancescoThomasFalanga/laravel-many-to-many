<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Type;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $types = Type::all();

        return view('admin.types.index', compact('types'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $types = Type::all();

        return view('admin.types.create', compact('types'));
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

        $type = new Type();

        $type->fill($form_data);

        $type->slug = Str::slug($type->name, '-');

        $type->save();

        return redirect()->route('admin.types.show', $type->slug);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function show(Type $type)
    {
        return view('admin.types.show', compact('type'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function edit(Type $type)
    {
        
        return view('admin.types.edit', compact('type'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Type $type)
    {
        $this->validation($request);

        $form_data = $request->all();

        $type->slug = Str::slug($type->name, '-');

        $type->update($form_data);

        $type->save();

        return redirect()->route('admin.types.show', $type->slug);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function destroy(Type $type)
    {
        $type->delete();

        return redirect()->route('admin.types.index');
    }

    private function validation($request) {

        $form_data = $request->all();

        // VALIDATION ITAS
        $validator = Validator::make($form_data, [
            'name' => 'required|max:100',
            'description' => 'required|max:100',
        ], [
            'title.required' => 'Il campo è obbligatorio',
            'title.max' => 'Puoi inserire al massimo 100 Caratteri',
            'description.required' => 'Il campo è obbligatorio',
            'description.max' => 'Puoi inserire al massimo 100 Caratteri',
        ])->validate();

        return $validator;

    }
}
