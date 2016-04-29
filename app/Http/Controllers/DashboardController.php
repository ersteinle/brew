<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;

use App\User;
use \Auth as Auth;

class DashboardController extends Controller
{
    
    public function __construct() {
        
    }
    
    public function index(Request $request) {

        return view('dashboard', ['menuSelect' => -1, 'editable' => 0]);
    }
    
    function update(Request $request) {
        
        $user = User::find(Auth::user()->id);
        
        //Ensure that the email has not been taken
        if(User::where('email', $request->get('email'))->where('id', '!=', Auth::user()->id)->count() > 0) {
            return (redirect()->route('dashboard')->with('message', "That email is taken"));
        }
        
        $user->name = $request->get('name');
        $user->email = $request->get('email');

        if($user->save()) {
           return (redirect()->route('dashboard')->with('message', "Successfully updated info"));
        } else {
           return (redirect()->route('dashboard')->with('message', "Error. Unable to update info"));
        }
    }
}
