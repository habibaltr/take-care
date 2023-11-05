<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SectionModels;
use App\Models\ClassModels;
use App\Models\TecherStaffInfoModels;
use RealRashid\SweetAlert\Facades\Alert;

class SectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
        $data['sectionLists'] = SectionModels::where('section.status', 1)
        ->orderBy('id', 'desc')
        ->join('class', 'section.class_id', '=', 'class.id')
        ->join('teacher_staff_info', 'section.teacher_id', '=', 'teacher_staff_info.id')
        ->select('section.*', 'class.class as class_name','teacher_staff_info.hr_name')
        ->get();

        $data['class'] = ClassModels::where(['status' => 1])->get();
        $data['teacher'] = TecherStaffInfoModels::where([
            'status' => 1,
            'hr_type' => 'Teacher'
        ])->get();
        return view('section.list',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $postData = $request->except('_token');
        /*Data Insert*/
        $postData['status'] = 1;
        $postData['created_at'] = date ("y-m-d h:i:s");
        $insertData = SectionModels::insert($postData);
        
        if($insertData)
        {
            Alert::toast('Section created successfully.','success')->width('375px');
        }
        return redirect('section');
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
        //
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
       
        $postData = $request->except('_token', 'section_id');
       
        /*data update*/
        $postData['updated_at'] = date("y-m-d h:i:s");
        $updateData = SectionModels::where(['id'=> $request->get('section_id')])->update($postData);
        
        if($updateData)
        {
            Alert::toast('Section updated successfully.','success')->width('375px');
        }
        return redirect('section');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $data = SectionModels::find($id);
        //$updateData = SectionModels::where('id',$id)->update(['status'=>0]);
        if($data)
        {
            $data->delete();
            Alert::toast('Data Deleted successfully.','success')->width('375px');
            return response()->json(['status' => 1]);
        }
        else{
            return response()->json(['status' => 0]);
        }
    }
}
