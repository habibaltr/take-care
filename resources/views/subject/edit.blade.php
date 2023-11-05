@extends('layouts.app')
@section('mainContent')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                <div class="row pt-2">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Edit Subject List</h3>
                                <a href="{{route('class.subject')}}" class="btn btn-sm btn-secondary float-right">All Class List</a>
                            </div>
                            <form action="{{ route('subject.update') }}" class="p-2" method="post" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="id" value="{{$subjectList->id}}">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-12 form-group">
                                            <label for="name" class="col-md-12 col-form-label">Subject Details</label>
                                            <div class="row">
                                                <div class="col-2 form-group">
                                                    <div class="col-md-12 ">
                                                        <select class="form-control" name="class_id" id="class_id" required>
                                                            <option value="">Select Class</option>
                                                            @if(isset($classn))
                                                            @foreach($classn as $className)
                                                                <option value="{{$className->id}}" {{($className->id == $subjectList->class_id)? 'selected':''}}>{{$className->class}}</option>
                                                            @endforeach
                                                            @endif
                                        
                                                        </select>
                                                    </div>
                                                    @error('class_id')
                                                    <span class="text-success ml-3 mt-1">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <div class="col-2 form-group">
                                                    <div class="col-md-12 ">
                                                        <input class="form-control custom-focus @error('sub_name') is-invalid @enderror" placeholder="Subject Name" id="sub_name" name="sub_name" type="text" value="{{old('sub_name')?old('sub_name'):$subjectList->sub_name}}">
                                                    </div>
                                                    @error('sub_name')
                                                    <span class="text-success ml-3 mt-1">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <div class="col-2 form-group">
                                                    <div class="col-md-12 ">
                                                        <input class="form-control custom-focus @error('sub_code') is-invalid @enderror" placeholder="Subject Code" id="sub_code" name="sub_code" type="number"  value="{{old('sub_code')?old('sub_code'):$subjectList->sub_code}}">
                                                    </div>
                                                    @error('sub_code')
                                                    <span class="text-success ml-3 mt-1">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <div class="col-2 form-group">
                                                    <div class="col-md-12 ">
                                                        <select class="form-control" id="sub_type" name="sub_type" required>
                                                            <option value="" {{($subjectList->sub_type == '')?'selected':''}}>Select Subject Type</option>
                                                            <option value="1" {{($subjectList->sub_type == '1')?'selected':''}}>General Subject</option>
                                                            <option value="2" {{($subjectList->sub_type == '2')?'selected':''}}>Group Subject</option>
                                                            <option value="3" {{($subjectList->sub_type == '3')?'selected':''}}>Religion Subject</option>
                                                        </select>
                                                    </div>
                                                    @error('sub_type')
                                                    <span class="text-success ml-3 mt-1">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <div class="col-2 form-group">
                                                    <div class="col-md-12 ">
                                                        <input class="form-control custom-focus @error('pass_mark') is-invalid @enderror" placeholder="Pass Mark" id="pass_mark" name="pass_mark" type="number"  value="{{old('pass_mark')?old('pass_mark'):$subjectList->pass_mark}}">
                                                    </div>
                                                    @error('pass_mark')
                                                    <span class="text-success ml-3 mt-1">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <div class="col-2 form-group">
                                                    <div class="col-md-12 ">
                                                        <input class="form-control custom-focus @error('written') is-invalid @enderror" placeholder="written" id="written" name="written" type="number"  value="{{old('written')?old('written'):$subjectList->written}}">
                                                    </div>
                                                    @error('written')
                                                    <span class="text-success ml-3 mt-1">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <div class="col-2 form-group">
                                                    <div class="col-md-12 ">
                                                        <input class="form-control custom-focus @error('mcq') is-invalid @enderror" placeholder="mcq" id="mcq" name="mcq" type="number"  value="{{old('mcq')?old('mcq'):$subjectList->mcq}}">
                                                    </div>
                                                    @error('mcq')
                                                    <span class="text-success ml-3 mt-1">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <div class="col-2 form-group">
                                                    <div class="col-md-12 ">
                                                        <input class="form-control custom-focus @error('practical') is-invalid @enderror" placeholder="practical" id="practical" name="practical" type="number"  value="{{old('practical')?old('practical'):$subjectList->practical}}">
                                                    </div>
                                                    @error('practical')
                                                    <span class="text-success ml-3 mt-1">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <div class="col-2 form-group">
                                                    <div class="col-md-12 ">
                                                        <select class="form-control" id="pass_type" name="pass_type" required>
                                                            <option value="" {{($subjectList->pass_type == '')?'selected':''}}>Select Pass Type</option>
                                                            <option value="1" {{($subjectList->pass_type == '1')?'selected':''}}>Part wise</option>
                                                            <option value="2" {{($subjectList->pass_type == '2')?'selected':''}}>Total</option>
                                                        </select>
                                                    </div>
                                                    @error('pass_type')
                                                    <span class="text-success ml-3 mt-1">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <div class="col-2 form-group">
                                                    <div class="col-md-12 ">
                                                        <input class="form-control custom-focus @error('combined_sub') is-invalid @enderror" placeholder="Combined Subject" id="combined_sub" name="combined_sub" type="number"  value="{{old('combined_sub')?old('combined_sub'):$subjectList->combined_sub}}">
                                                    </div>
                                                    @error('combined_sub')
                                                    <span class="text-success ml-3 mt-1">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <div class="col-1 form-group">
                                                    <div class="col-md-12 ">
                                                        <input type="button" name="add" value="add" class="form-control btn btn-secondary" id="addRangeButton">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-12 mt-3 mb-2 text-right">
                                            <button type="submit" class="btn btn-primary">Update</button>
                                    </div>
                                </div>

                            </form>
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
            $("#teamList").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#branch_wrapper .col-md-6:eq(0)');
        });
    </script>
@endpush

