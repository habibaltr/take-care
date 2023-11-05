<?php

namespace App\Http\Controllers;

use App\Models\CrudModel;
use DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $emp = CrudModel::find('users',['id'=>auth()->user()->id, 'status'=>1]) ;
        if($emp->user_type == 'admin')
        {
            $data['emp'] = $emp;
            return view('dashboard',$data);
        }
        elseif($emp->user_type == 'user'){
            Auth::logout();
            Session::flush();
            return back()->withErrors([
                'email' => 'Unauthorized User',
            ]);
        }
    }
    public function userDashboard()
    {
        $emp = CrudModel::find('users',['id'=>auth()->user()->id]) ;
        $data['emp'] = $emp;
        //dd($data['emp']);
        return view('user-dashboard',$data);

    }

}
