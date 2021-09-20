<?php

namespace App\Http\Controllers;

use App\Models\Cat;
use Illuminate\Http\Request;

class CatController extends Controller
{

    private $rules = [
        'name' => 'required' ,
        'coad' => 'required' ,
    ];

    public function index(Request $req)
    {
        $parameters = $req->all();

        $search = $parameters['search'] ;


        $cats = Cat::where('name', 'like', '%'.$search.'%')->paginate(5);


        return response()->json( ['cats' => $cats  ] );
    }



    public function create(Request $request)
    {
        $frontend_cat = $request->validate($this->rules);
        $cat = Cat::create($frontend_cat);

        return response()->json($cat);
    }


    public function store(Request $request)
    {
        //
    }


    public function show(Cat $cat)
    {
        //
    }


    public function edit(Request $request)
    {
        $frontend_cat = $request->validate($this->rules);
        $id = $request->input('id');

        $cat = Cat::find($id)->update($frontend_cat);

        return response()->json($cat);

    }


    public function update(Request $request, Cat $cat)
    {
        //
    }

    public function destroy(Cat $cat)
    {
        //
    }
}
