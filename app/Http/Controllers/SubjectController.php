<?php

namespace App\Http\Controllers;

use App\Models\SubjectModels;
use App\Models\ClassModels;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $data['allClassLists'] = ClassModels:: where(['status'=> 1])->orderBy('id','asc')->get();
        return view('subject.index',$data);
    }

    public function subjectClass($id){

        $data['className'] =  ClassModels::find($id);
        $data['groupedSubjects'] = SubjectModels::where('class_id', $id)->get();

    	return view('subject.list',$data);
    }

    public function addSubject()
    {
        $data['classData'] = ClassModels::where(['status' => 1])->get();
        return view('subject.add',$data);
    }
    public function saveSubject(Request $request)
{
   
    DB::beginTransaction();

    try {
        $subjectData = $request->input('arr');

        // Prepare an array to store subject data
        $subjectRecords = [];

        foreach ($subjectData as $subject) {
            if ($subject['class_id'] !== null) {
                $subjectRecords[] = [
                    'class_id' => $subject['class_id'],
                    'sub_name' => $subject['sub_name'],
                    'sub_code' => $subject['sub_code'],
                    'sub_type' => $subject['sub_type'],
                    'pass_mark' => $subject['pass_mark'],
                    'written' => $subject['written'],
                    'mcq' => $subject['mcq'],
                    'practical' => $subject['practical'],
                    'pass_type' => $subject['pass_type'],
                    'combined_sub' => $subject['combined_sub'],
                    'status' => 1,
                    'created_at' => now(),
                ];
            }
        }

        if (!empty($subjectRecords)) {
            SubjectModels::insert($subjectRecords);
        }

        DB::commit();

        Alert::toast('Data successfully inserted', 'success')->width('375px');
    } catch (\Exception $e) {
        DB::rollback();
        Alert::toast('Data did not insert successfully', 'error')->width('570px');
    }

    return redirect()->route('class.subject');
}

    public function editSubject($id)
    {
        $data['subjectList'] =  SubjectModels::find($id);
        $data['classn'] = ClassModels::where(['status' => 1])->get();
        //dd($data);
        return view('subject.edit', $data);
    }

    public function updateSubject(Request $request)
    {
            
       
        DB::beginTransaction();
            try {
                $postData = $request->except('_token','id');
                $postData['updated_at'] = Carbon::now();
                //update data
                SubjectModels::where('id',$request->get('id'))->update($postData);
                DB::commit();
                Alert::toast('Data successfully Updated', 'success')->width('375px');
            }catch (\Exception $e) {
                DB::rollback();
                Alert::toast('Data did not update successfully','error')->width('570px');
            }
        return redirect()->route('class.subject');
    }
     /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function delete($id)
    // {
    //     $data = SubjectModels::find($id);
    //      $updateData = SubjectModels::where('id',$id)->update(['status'=>0]);
    //     if($data){
    //         $data->delete();
    //         Alert::toast('Data Deleted successfully.','success')->width('375px');
    //         return response()->json(['status' => 1]);
    //     }
    //     else{
    //         return response()->json(['status' => 0]);
    //     }
    // }
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
        //
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
    public function update(Request $request, $id)
    {
        //
    }
}
