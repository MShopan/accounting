<?php

namespace App\Http\Controllers;

use App\Models\Section;
use Illuminate\Http\Request;

class SectionController extends Controller
{

    private $rules = [
        'name' => 'required' ,
        'partition_id' => 'required' ,
    ];


    public function index(Request $req)
    {
        $parameters = $req->all();

        $search = $parameters['search'] ;


        $sections = Section::where('name', 'like', '%'.$search.'%')->paginate(5);


        return response()->json( ['sections' => $sections  ] );
    }


    public function create(Request $request)
    {
        $frontend_section = $request->validate($this->rules);
    }


    public function store(Request $request)
    {
        //
    }


    public function show(Section $section)
    {
        //
    }


    public function edit(Request $request)
    {
        $frontend_section = $request->validate($this->rules);

    }


    public function update(Request $request, Section $section)
    {
        //
    }


    public function destroy(Section $section)
    {
        //
    }
}
