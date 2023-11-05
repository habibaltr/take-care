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
                                            <h7>Setup - Subject List - {{$className->class}}</h7>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="flex-row text-right">
                                        <a class="btn btn-sm btn-secondary my-2" title="Add Requisition Receive" href="{{route('subject.add')}}" style="line-height: 1.5 !important;"><i class="fas fa-pus"></i> Add New Subject</a>
                                        </div>
                                    </div>
                                </div>
                           </div>
                           <div class="card-body">
                               <table class="table table-bordered table-striped" id="classList">
                               <thead>
                                        <th>Code</th>
                                        <th>Name</th>
                                        <th>Sub Type</th>
                                        <th>Full Mark</th>
                                        <th>Written</th>
                                        <th>MCQ</th>
                                        <th>Practical</th>
                                        <th>Combined Sub</th>
                                        <th>Type</th>
                                        <th>Action</th>
                                    </thead>
                                    <tbody>
                                        @if(isset($groupedSubjects))
                                     @foreach($groupedSubjects as $k=>$groupedSubjectsList)
                                            <tr>
                                                <td>{{$groupedSubjectsList->sub_code}}</td>
                                                <td>{{$groupedSubjectsList->sub_name}}</td>
                                                <td>
                                                    @if($groupedSubjectsList->sub_type == 1)
                                                    General Subject
                                                    @elseif($groupedSubjectsList->sub_type == 2)
                                                    Group Subject
                                                    @elseif($groupedSubjectsList->sub_type == 3)
                                                    Religion Subject
                                                    @endif
                                                </td>
                                                <td>{{$groupedSubjectsList->pass_mark}}</td>
                                                <td>{{$groupedSubjectsList->written}}</td>
                                                <td>{{$groupedSubjectsList->mcq}}</td>
                                                <td>{{$groupedSubjectsList->practical}}</td>
                                                <td>
                                                    @if($groupedSubjectsList->pass_type == 1)
                                                    Part Wise
                                                    @elseif($groupedSubjectsList->pass_type == 2)
                                                    Total
                                                    @endif
                                                </td>
                                                <td>{{$groupedSubjectsList->combined_sub}}</td>
                                                <td>
                                                    <a href="{{route('subject.edit',$groupedSubjectsList->id)}}" class="btn btn-sm btn-success my-2" title="Edit">
                                                        <i class="fas fa-edit" aria-hidden="true"></i>
                                                    </a>
                                                    <!-- <a class="btn btn-sm btn-danger my-2" title="Delete" onclick="deleteConfirm({{$groupedSubjectsList->id}})">
                                                        <i class="fas fa-trash" aria-hidden="true"></i>
                                                    </a> -->
                                                </td>
                                            </tr>
                                        @endforeach
                                        @endif
                                    </tbody>
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
                    url: 'subject/delete/' + id,
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

