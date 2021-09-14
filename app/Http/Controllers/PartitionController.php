<?php

namespace App\Http\Controllers;

use App\Models\Partition;
use Illuminate\Http\Request;

class PartitionController extends Controller
{

    public function index(Request $req)
    {
        // return searsh pagination
    }


    public function create(Request $request)
    {

        $partition = $request->validate([
            'name' => 'required|max:20',
            'treat' => 'required',
            'coad' => 'required'
        ]);

        // $partition = [
        //     'name'=> $request->input('name'),
        //     'treat'=> $request->input('treat'),
        //     'coad'=> $request->input('coad'),
        // ];

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

        $partition = $request->validate([
            'name' => 'required|max:20',
            'treat' => 'required',
            'coad' => 'required'
        ]);



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
