<?php

namespace App\Http\Controllers;

use App\Models\bill_header;
use App\Models\Customer;
use Illuminate\Http\Request;

class BillHeaderController extends Controller
{

    public function index(Request $req)
    {
        $parameters = $req->all();

        $search = $parameters['search'] ;

        if (strlen($search)>0) {
            // do search


            $searching = bill_header::where('bill_id', $search)->first();


            if ($searching==null) {
                return response()->json( ['msg' => 'no data' ] );
            }

            $data = array();

            array_push($data,$searching );

            $bills['data'] = $data ;




        } else {
            $bills = bill_header::orderBy('id', 'DESC')->paginate(config('app.perPage'));

        }


        return response()->json( ['bills' => $bills  ] );
    }


    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\bill_header  $bill_header
     * @return \Illuminate\Http\Response
     */
    public function show(bill_header $bill_header)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\bill_header  $bill_header
     * @return \Illuminate\Http\Response
     */
    public function edit(bill_header $bill_header)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\bill_header  $bill_header
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, bill_header $bill_header)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\bill_header  $bill_header
     * @return \Illuminate\Http\Response
     */
    public function destroy(bill_header $bill_header)
    {
        //
    }
}
