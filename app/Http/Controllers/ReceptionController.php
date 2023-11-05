<?php

namespace App\Http\Controllers;

use App\Models\ReceptionModels;
use App\Models\ClassModels;
use App\Models\SectionModels;
use App\Models\SubjectModels;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class ReceptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['patientLists'] = ReceptionModels::orderBy('id', 'asc')->get();

        return view('reception.list', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('reception.create');
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
        $insertData= ReceptionModels::insert($postData);

        if ($insertData)
        {
            Alert::toast('Patient created successfully.','success')->width('375px');
        }

        return redirect('reception');

    }

    public function edit($id)
    {
        $data['patientLists'] =  ReceptionModels::find($id);
        return view('reception.edit', $data);
    }

    public function update(Request $request)
    {


        DB::beginTransaction();
        try {
            $postData = $request->except('_token','id');
            //update data
            ReceptionModels::where('id',$request->get('id'))->update($postData);
            DB::commit();
            Alert::toast('Patient information successfully updated', 'success')->width('375px');
        }catch (\Exception $e) {
            DB::rollback();
            Alert::toast('Patient information not update successfully','error')->width('570px');
        }
        return redirect()->route('reception');
    }
}
