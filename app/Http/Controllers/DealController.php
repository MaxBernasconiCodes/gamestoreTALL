<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DealController extends Controller
{
    public function index(Request $request){
        //request handling
        $searchParameters = explode(",", $request->input('q'));

        //geting data from JSON file
        $data = Storage::get('data/deals.json');
        $deals = json_decode($data, true);

        //determining filters
        // -checking if filters are valid
        // -aplying filters to the data

        //returning filtered data
        return  $deals;
    }
}
