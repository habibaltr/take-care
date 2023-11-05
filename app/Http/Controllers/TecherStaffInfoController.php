<?php

namespace App\Http\Controllers;
use App\Models\TecherStaffInfoModels;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class TecherStaffInfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['allTeacherLists'] = TecherStaffInfoModels::where([
            'status' => 1,
            'hr_type' => 'Teacher'
        ])->orderBy('id', 'asc')->get();

            return view('teacher.list', $data);
        
    
    }
    public function indexStaff(){
        $data['allStaffLists'] = TecherStaffInfoModels::where([
            'status' => 1,
            'hr_type' => 'Staff'
        ])->orderBy('id', 'asc')->get();
        
            return view('teacher.listStaff', $data);
    }
  
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('teacher.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $postData = $request->except('_token','hr_photo', 'hr_sign');
    	    	$postData['created_at'] = Carbon::now();
    	    	// move file 
    	    	if (isset($request->hr_photo) && !empty($request->hr_photo)) {
    	            $image_name = time() . Str::random(7) . '.' . $request->hr_photo->extension();
    	            $request->hr_photo->move(public_path('img/teacher'), $image_name);
    	            $postData['hr_photo'] = $image_name;
    	        }
                if (isset($request->hr_sign) && !empty($request->hr_sign)) {
    	            $image_name = time() . Str::random(7) . '.' . $request->hr_sign->extension();
    	            $request->hr_sign->move(public_path('img/teacher'), $image_name);
    	            $postData['hr_sign'] = $image_name;
    	        }
        $postData['status']= 1;
        $insertData= TecherStaffInfoModels::insert($postData);
    
        if ($insertData)
        {
            Alert::toast('Data created successfully.','success')->width('375px');
        }

        if ($postData['hr_type'] == 'Teacher') {
            return redirect('teacher');
        } else {
            return redirect('staff');
        }
       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['infoEdit'] =  TecherStaffInfoModels::find($id);
    	return view('teacher.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
    
        $postData = $request->except('_token', 'id', 'hr_photo', 'hr_sign');
        // move file 
        if (isset($request->hr_photo) && !empty($request->hr_photo)) {
            $image_name = time() . Str::random(7) . '.' . $request->hr_photo->extension();
            $request->hr_photo->move(public_path('img/teacher'), $image_name);
            $postData['hr_photo'] = $image_name;
        }
        if (isset($request->hr_sign) && !empty($request->hr_sign)) {
            $image_name = time() . Str::random(7) . '.' . $request->hr_sign->extension();
            $request->hr_sign->move(public_path('img/teacher'), $image_name);
            $postData['hr_sign'] = $image_name;
        }
        /*data update*/
        $postData['updated_at'] = Carbon::now();
        $updateData = TecherStaffInfoModels::where(['id'=> $request->get('id')])->update($postData);
        
        if($updateData)
        {
            Alert::toast('Data updated successfully.','success')->width('375px');
        }
        if ($postData['hr_type'] == 'Teacher') {
            return redirect('teacher');
        } else {
            return redirect('staff');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $data = TecherStaffInfoModels::find($id);
        if($data)
        {
            //Delete file
            $image_path_hr_photo = "img/teacher/".$data->hr_photo;
            $image_path_hr_sign = "img/teacher/".$data->hr_sign;
            if(File::exists($image_path_hr_photo)) {
                File::delete($image_path_hr_photo);
            }
            if(File::exists($image_path_hr_sign)) {
                File::delete($image_path_hr_sign);
            }
            $data->delete();
            Alert::toast('Data Deleted successfully.','success')->width('375px');
            return response()->json(['status' => 1]);
        }
        else{
            return response()->json(['status' => 0]);
        }
    }
}
