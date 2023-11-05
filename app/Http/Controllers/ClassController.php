<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ClassModels;
use RealRashid\SweetAlert\Facades\Alert;

class ClassController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['classLists'] = ClassModels:: where(['status'=> 1])->orderBy('id','desc')->get();
        return view('class.list',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
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
        $postData= $request->except('_token');
        /*data insert*/
        $postData['status']= 1;
        $postData['created_at'] = date('y-m-d h:i:s');
        $insertData= ClassModels::insert($postData);
    
        if ($insertData)
        {
            Alert::toast('Class created successfully.','success')->width('375px');
        }
        return redirect('class');
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
        $postData= $request->except('_token', 'class_id');
        /*data update*/
        $postData['updated_at']= date('y-m-d h:i:s');
        $updateData = ClassModels::where(['id'=>$request->get('class_id')])->update($postData);

        if ($updateData)
        {
            Alert::toast('Class updated successfully.','success')->width('375px');
        }
        return redirect('class');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $data = ClassModels::find($id);
        // $updateData = ClassModels::where('id',$id)->update(['status'=>0]);
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
