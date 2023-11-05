@extends('layouts.app')
@section('mainContent')
   <meta name="csrf-token" content="{{ csrf_token() }}">
   <div class="content-wrapper">
       <section class="content">
           <div class="container-fluid">
               <div class="row">
               <div class="col-sm-6">
                        <div class="card-body d-flex flex-row justify-content-start">
                            <h5>Students - Add Student</h5>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="card-body flex-row text-right">
                            <a class="btn btn-sm btn-secondary my-2" title="Student" href="{{route('student.create')}}" style="line-height: 1.5 !important;"><i class="fas fa-pus"></i> Add Student</a>
                        </div>
                    </div>
                </div>
               <div class="row">
                   <div class="col-12">
                       <div class="card">
                           <div class="card-header">
                               <h3 class="card-title">Teacher Profile</h3>
                           </div>
                           <div class="card-body">
                               <table class="table table-bordered table-striped" id="classList">
                               <thead>
                                        <th>Photo</th>
                                        <th>HR ID</th>
                                        <th>Fullname</th>
                                        <th>Designation</th>
                                        <th>Gender</th>
                                        <th>Date of Birth</th>
                                        <th>Religion</th>
                                        <th>Mobile</th>
                                        <th>Joining</th>
                                        <th>Action</th>
                                    </thead>
                                   
                                    
                               </table>
                           </div>
                       </div>
                   </div>
               </div>
           </div>
       </section>
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
                    url: 'student/delete/' + id,
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

