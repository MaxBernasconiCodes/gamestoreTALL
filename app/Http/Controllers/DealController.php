<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DealController extends Controller
{
    public function index(Request $request){
        $searchParameters = explode(",", $request->input('q'));
        dd($searchParameters);
        $data = Storage::get('data/deals.json');
        $deals = json_decode($data, true);
        return  $deals;
    }
}
