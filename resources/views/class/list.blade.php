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
                                            <h7>Class</h7>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="flex-row text-right">
                                        <a class="btn btn-sm btn-secondary my-2" title="Add New Class" data-toggle="modal" data-target="#addClassModal"
                                        style="line-height: 1.5 !important;"><i class="fas fa-plus"></i>Add Class</a>
                                        </div>
                                    </div>
                                </div>
                           </div>
                           <div class="card-body">
                               <table class="table table-bordered table-striped" id="classList">
                                   <thead>
                                   <tr>
                                       <th>SL</th>
                                       <th>Name</th>
                                       <th>Compsulsory Subject</th>
                                       <th>Optional Subject</th>
                                       <th>Action</th>
                                   </tr>
                                   </thead>
                                   <tbody>
                                   @php
                                       $i=1;
                                   @endphp
                                   @foreach($classLists as $k=>$classList)
                                       <tr>
                                           <td>{{$k + 1}}</td>
                                           <td>{{$classList->class}}</td>
                                           <td>{{$classList->complusory_sub}}</td>
                                           <td>{{$classList->optional_sub}}</td>
                                           <td>
                                               <a href="#" class="btn btn-sm btn-success my-2" title="Edit" data-toggle="modal" data-target="#editClassModal{{$classList->id}}"><i class="fas fa-edit" aria-hidden="true"></i></a>
                                               <a onclick="deleteConfirm({{$classList->id}})" class="btn btn-sm btn-danger my-2" title="Delete"><i class="fas fa-trash" aria-hidden="true"></i></a>
                                           </td>
                                       </tr>
                                       <!--Edit Class Modal-->
                                       <div class="modal fade" id="editClassModal{{$classList->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                           <div class="modal-dialog" role="document">
                                               <div class="modal-content">
                                                   <div class="modal-header">
                                                       <h5 class="modal-title" id="exampleModalLabel">Update class</h5>
                                                       <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                           <span aria-hidden="true">&times;</span>
                                                       </button>
                                                   </div>
                                                   <div class="modal-body">
                                                       <form method="post" action="{{url('class/update')}}">
                                                           @csrf
                                                           <input type="hidden" name="class_id" value="{{$classList->id}}">
                                                           <div class="form-group">
                                                               <div class="row">
                                                                   <div class="col-lg-12 col-md-12">
                                                                       <label for="class">Name<span class="text-danger">*</span></label>
                                                                       <input type="text" class="form-control" name="class" placeholder="Enter class" max="255" value="{{$classList->class}}" required>
                                                                       <span class="text-center text-danger"></span>
                                                                   </div>
                                                               </div>
                                                           </div>
                                                           <div class="form-group">
                                                               <div class="row">
                                                                   <div class="col-lg-12 col-md-12">
                                                                       <label for="lcomplusory_subink">Compulsory Subject</label>
                                                                       <input type="number" class="form-control" name="complusory_sub" placeholder="Enter Compulsory Subject" value="{{$classList->complusory_sub}}">
                                                                       <span class="text-center text-danger"></span>
                                                                   </div>
                                                               </div>
                                                           </div>
                                                           <div class="form-group">
                                                               <div class="row">
                                                                   <div class="col-lg-12 col-md-12">
                                                                       <label for="optional_sub">Optional Subject</label>
                                                                       <input type="number" class="form-control" name="optional_sub" placeholder="Enter Optional Subject" value="{{$classList->optional_sub}}">
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
   <!-- Add Class Modal -->
   <div class="modal fade" id="addClassModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
       <div class="modal-dialog" role="document">
           <div class="modal-content">
               <div class="modal-header">
                   <h5 class="modal-title" id="exampleModalLabel">Add Class</h5>
                   <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                       <span aria-hidden="true">&times;</span>
                   </button>
               </div>
               <div class="modal-body">
                   <form method="post" action="{{url('class/create')}}">
                       @csrf
                       <div class="form-group">
                           <div class="row">
                               <div class="col-lg-12 col-md-12">
                                   <label for="class">Class<span class="text-danger">*</span></label>
                                   <input type="text" class="form-control" name="class" placeholder="Enter Class" max="255" required>
                                   <span class="text-center text-danger"></span>
                               </div>
                           </div>
                       </div>
                       <div class="form-group">
                           <div class="row">
                               <div class="col-lg-12 col-md-12">
                                   <label for="complusory_sub">Compulsory Subject</label>
                                   <input class="form-control" name="complusory_sub" placeholder="Enter Compulsory Subject" type="number">
                                   <span class="text-center text-danger"></span>
                               </div>
                           </div>
                       </div>
                       <div class="form-group">
                           <div class="row">
                               <div class="col-lg-12 col-md-12">
                                   <label for="optional_sub">Optional Subject</label>
                                   <input class="form-control" name="optional_sub" placeholder="Enter Optional Subject" type="number">
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
            $("#classList").DataTable({
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
                    url: 'class/delete/' + id,
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
