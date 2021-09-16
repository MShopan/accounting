<?php

namespace App\Http\Controllers;

use App\Models\Partition;
use Illuminate\Http\Request;

class PartitionController extends Controller
{
    private $rules = [
        'name' => 'required|max:20',
        'treat' => 'required',
        'coad' => 'required'
        //'coad' => 'nullable' use this for nullable fields

    ];



    public function index(Request $req)
    {
        // return searsh pagination
    }


    public function create(Request $request)
    {

        $partition = $request->validate($this->rules);

        $part = Partition::create($partition);

        return response()->json($partition);
    }


    public function store(Request $request)
    {
        //
    }


    public function show(Partition $partition)
    {
        //
    }


    public function edit(Request $request)
    {
        //
        $id = $request->input('id') ;

        $partition = $request->validate($this->rules);



        $part = Partition::find($id)->update($partition);

        return response()->json($partition);

    }


    public function update(Request $request, Partition $partition)
    {
        //
    }

    public function destroy(Partition $partition)
    {
        //
    }
}
