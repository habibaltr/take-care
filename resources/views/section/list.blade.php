@extends('layouts.app')
@section('mainContent')
   <meta name="csrf-token" content="{{ csrf_token() }}">
   <div class="content-wrapper">
       <section class="content">
           <div class="container-fluid">
               <div class="row">
                   <div class="col-12">
                       <div class="card">
                           <div class="card-header">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="d-flex flex-row justify-content-start text-bold">
                                            <h7>Class - Section Lists</h7>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="flex-row text-right">
                                        <a class="btn btn-sm btn-secondary my-2" title="Add New Section" data-toggle="modal" data-target="#addSectionModal"
                                        style="line-height: 1.5 !important;"><i class="fas fa-plus"></i>Add Section</a>
                                        </div>
                                    </div>
                                </div>
                           </div>
                           <div class="card-body">
                               <table class="table table-bordered table-striped" id="sectionList">
                                   <thead>
                                   <tr>
                                       <th>SL</th>
                                       <th>Class</th>
                                       <th>Section</th>
                                       <th>Class Teacher</th>
                                       <th>Action</th>
                                   </tr>
                                   </thead>
                                   <tbody>
                                   @php
                                       $i=1;
                                   @endphp
                                   @foreach($sectionLists as $k=>$sectionList)
                                       <tr>
                                           <td>{{$k + 1}}</td>
                                           <td>{{$sectionList->section}}</td>
                                           <td>{{$sectionList->class_name}}</td>
                                           <td>{{$sectionList->hr_name}}</td>
                                           <td>
                                               <a href="#" class="btn btn-sm btn-success my-2" title="Edit" data-toggle="modal" data-target="#editSectionModal{{$sectionList->id}}"><i class="fas fa-edit" aria-hidden="true"></i></a>
                                               <a onclick="deleteConfirm({{$sectionList->id}})" class="btn btn-sm btn-danger my-2" title="Delete"><i class="fas fa-trash" aria-hidden="true"></i></a>
                                           </td>
                                       </tr>
                                       <!--Edit Class Modal-->
                                       <div class="modal fade" id="editSectionModal{{$sectionList->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                           <div class="modal-dialog" role="document">
                                               <div class="modal-content">
                                                   <div class="modal-header">
                                                       <h5 class="modal-title" id="exampleModalLabel">Update Section</h5>
                                                       <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                           <span aria-hidden="true">&times;</span>
                                                       </button>
                                                   </div>
                                                   <div class="modal-body">
                                                       <form method="post" action="{{url('section/update')}}">
                                                           @csrf
                                                           <input type="hidden" name="section_id" value="{{$sectionList->id}}">
                                                           <div class="form-group">
                                                                <div class="row">
                                                                    <div class="col-lg-12 col-md-12">
                                                                        <label for="">Class Name <span class="text-danger">*</span></label>
                                                                        <select class="form-control" name="class_id" required>
                                                                            <option value="">Select Class</option>
                                                                            @if(isset($class))
                                                                            @foreach($class as $className)
                                                                                <option value="{{$className->id}}" {{($className->id == $sectionList->class_id)? 'selected':''}}>{{$className->class}}</option>
                                                                            @endforeach
                                                                            @endif
                                                                        </select>
                                                                        <span class="text-center text-danger"></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                           <div class="form-group">
                                                               <div class="row">
                                                                   <div class="col-lg-12 col-md-12">
                                                                       <label for="section">Section<span class="text-danger">*</span></label>
                                                                       <input type="text" class="form-control" name="section" placeholder="Enter Section" value="{{$sectionList->section}}" required>
                                                                       <span class="text-center text-danger"></span>
                                                                   </div>
                                                               </div>
                                                           </div>
                                                           <div class="form-group">
                                                                <div class="row">
                                                                    <div class="col-lg-12 col-md-12">
                                                                        <label for="teacher_id">Teacher Name </label>
                                                                        <select class="form-control" name="teacher_id" required>
                                                                            <option value="">Select Teacher</option>
                                                                            @if(isset($teacher))
                                                                            @foreach($teacher as $tName)
                                                                                <option value="{{$tName->id}}" {{($tName->id == $sectionList->teacher_id)? 'selected':''}}>{{$tName->hr_name}}</option>
                                                                            @endforeach
                                                                            @endif
                                                                        </select>
                                                                        <span class="text-center text-danger"></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                           <button type="submit" class="btn btn-info btn-custom">Update</button>
                                                           <button type="button" class="btn btn-secondary btn-custom" data-dismiss="modal">Close</button>
                                                       </form>
                                                   </div>
                                               </div>
                                           </div>
                                       </div>
                                       <!-- End edit class modal-->
                                   @endforeach
                                   </tbody>
                               </table>
                           </div>
                       </div>
                   </div>
               </div>
           </div>
       </section>
   </div>
   <!-- Add Section Modal -->
   <div class="modal fade" id="addSectionModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
       <div class="modal-dialog" role="document">
           <div class="modal-content">
               <div class="modal-header">
                   <h5 class="modal-title" id="exampleModalLabel">Add Section</h5>
                   <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                       <span aria-hidden="true">&times;</span>
                   </button>
               </div>
               <div class="modal-body">
                   <form method="post" action="{{url('section/create')}}">
                       @csrf
                       <div class="form-group">
                            <div class="row">
                                <div class="col-lg-12 col-md-12">
                                    <label for="class_id">Class Name <span class="text-danger">*</span></label>
                                    <select class="form-control" name="class_id" required>
                                        <option value="">Select Class</option>
                                        @if(isset($class))
                                        @foreach($class as $className)
                                            <option value="{{$className->id}}">{{$className->class}}</option>
                                        @endforeach
                                        @endif
                                    </select>
                                    <span class="text-center text-danger"></span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                           <div class="row">
                               <div class="col-lg-12 col-md-12">
                                   <label for="section">Section<span class="text-danger">*</span></label>
                                   <input type="text" class="form-control" name="section" placeholder="Enter Section" max="255" required>
                                   <span class="text-center text-danger"></span>
                               </div>
                           </div>
                       </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-lg-12 col-md-12">
                                    <label for="teacher_id">Teacher Name</label>
                                    <select class="form-control" name="teacher_id">
                                        <option value="">Select Teacher</option>
                                        @if(isset($teacher))
                                        @foreach($teacher as $tName)
                                            <option value="{{$tName->id}}">{{$tName->hr_name}}</option>
                                        @endforeach
                                        @endif
                                    </select>
                                    <span class="text-center text-danger"></span>
                                </div>
                            </div>
                        </div>
                       
                       <button type="submit" class="btn btn-info btn-custom">Save</button>
                       <button type="button" class="btn btn-secondary btn-custom" data-dismiss="modal">Close</button>
                   </form>
               </div>
           </div>
       </div>
   </div>
@endsection
@push('custom_js')
<script>
        $(function () {
            $("#sectionList").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#branch_wrapper .col-md-6:eq(0)');
        });
        function deleteConfirm(id)
        {
            var token = $("meta[name='csrf-token']").attr("content");
            if (confirm("Are you sure to delete this record!")) {
                $.ajax({
                    url: 'section/delete/' + id,
                    type: 'get',
                    success: function (status)
                    {
                        if(status.status==1){
                            window.location.reload();
                        }
                    }
                })
            }
        }
    </script>
@endpush
