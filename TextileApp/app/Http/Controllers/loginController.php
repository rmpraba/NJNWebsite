<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;
use DB;
use Session;
// use Illuminate\Support\Facades\DB;


class loginController extends BaseController
{
    public function login(Request $req)
    {
    	$username = $req->input('user');
    	$password = $req->input('pass');
        session()->put('username',$username);
        session()->put('password',$password);

   		$userrole = DB::select('SELECT * FROM user_roles WHERE user_id in(SELECT id FROM users WHERE username = ? AND password = ?)' , [$username,$password]);
    	if(count($userrole) > 0){
    		if($userrole[0]->role_id =='TD')  
    		return view('pages.tdhome');       
			if($userrole[0]->role_id =='TC')  
    		return view('pages.tchome');			    		
    	}
    	else{
    		return view('pages.loginfail');
    	}
    }
}
