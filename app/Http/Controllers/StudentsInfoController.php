<?php

namespace App\Http\Controllers;

use App\Models\StudentsInfoModels;
use App\Models\ClassModels;
use App\Models\SectionModels;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class StudentsInfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['allLists'] = StudentsInfoModels::where([
            'status' => 1,
        ])->orderBy('id', 'asc')->get();

            return view('student.list', $data);
    }
   
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['class'] = ClassModels::where(['status' => 1])->get();
        $data['section'] = SectionModels::where(['status' => 1])->get();
        return view('student.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $postData = $request->except('_token','st_photo');
    	    	$postData['created_at'] = Carbon::now();
    	    	// move file 
    	    	if (isset($request->st_photo) && !empty($request->st_photo)) {
    	            $image_name = time() . Str::random(7) . '.' . $request->st_photo->extension();
    	            $request->st_photo->move(public_path('img/student'), $image_name);
    	            $postData['st_photo'] = $image_name;
    	        }
        $postData['status']= 1;
        $insertData= StudentsInfoModels::insert($postData);
    
        if ($insertData)
        {
            Alert::toast('Data created successfully.','success')->width('375px');
        }

        return redirect('students');
        
    }
}
