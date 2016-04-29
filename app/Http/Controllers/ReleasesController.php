<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class ReleasesController extends Controller
{
    public function __construct() {
        
    }
    
    public function index(Request $request) {

        return view('releases',['menuSelect' => 4]);
    }
    
    
    
}
