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
                                <h3 class="card-title">Add Subject Details</h3>
                                <a href="{{route('class.subject')}}" class="btn btn-sm btn-secondary float-right">Subject List</a>
                            </div>
                            <form action="{{ route('subject.store') }}" class="p-2" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-12 form-group">
                                            <label for="name" class="col-md-12 col-form-label">Subject Details</label>
                                            <div class="row">
                                                <div class="col-2 form-group">
                                                    <div class="col-md-12 ">
                                                        <select class="form-control" name="arr[0][class_id]" id="class_id" required>
                                                            <option value="">Select Class</option>
                                                            @if(isset($classData))
                                                            @foreach($classData as $className)
                                                                <option value="{{$className->id}}">{{$className->class}}</option>
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
                                                        <input class="form-control custom-focus @error('sub_name') is-invalid @enderror" placeholder="Subject Name" id="sub_name" name="arr[0][sub_name]" type="text" value="{{ old('sub_name') }}">
                                                    </div>
                                                    @error('sub_name')
                                                    <span class="text-success ml-3 mt-1">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <div class="col-2 form-group">
                                                    <div class="col-md-12 ">
                                                        <input class="form-control custom-focus @error('sub_code') is-invalid @enderror" placeholder="Subject Code" id="sub_code" name="arr[0][sub_code]" type="number"  value="{{ old('sub_code') }}">
                                                    </div>
                                                    @error('sub_code')
                                                    <span class="text-success ml-3 mt-1">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <div class="col-2 form-group">
                                                    <div class="col-md-12 ">
                                                        <select class="form-control" id="sub_type" name="arr[0][sub_type]" required>
                                                            <option value="">Select Subject Type</option>
                                                            <option value="1">General Subject</option>
                                                            <option value="2">Group Subject</option>
                                                            <option value="3">Religion Subject</option>
                                                        </select>
                                                    </div>
                                                    @error('sub_type')
                                                    <span class="text-success ml-3 mt-1">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <div class="col-2 form-group">
                                                    <div class="col-md-12 ">
                                                        <input class="form-control custom-focus @error('pass_mark') is-invalid @enderror" placeholder="Pass Mark" id="pass_mark" name="arr[0][pass_mark]" type="number"  value="{{ old('pass_mark') }}">
                                                    </div>
                                                    @error('pass_mark')
                                                    <span class="text-success ml-3 mt-1">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <div class="col-2 form-group">
                                                    <div class="col-md-12 ">
                                                        <input class="form-control custom-focus @error('written') is-invalid @enderror" placeholder="written" id="written" name="arr[0][written]" type="number"  value="{{ old('written') }}">
                                                    </div>
                                                    @error('written')
                                                    <span class="text-success ml-3 mt-1">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <div class="col-2 form-group">
                                                    <div class="col-md-12 ">
                                                        <input class="form-control custom-focus @error('mcq') is-invalid @enderror" placeholder="mcq" id="mcq" name="arr[0][mcq]" type="number"  value="{{ old('mcq') }}">
                                                    </div>
                                                    @error('mcq')
                                                    <span class="text-success ml-3 mt-1">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <div class="col-2 form-group">
                                                    <div class="col-md-12 ">
                                                        <input class="form-control custom-focus @error('practical') is-invalid @enderror" placeholder="practical" id="practical" name="arr[0][practical]" type="number"  value="{{ old('practical') }}">
                                                    </div>
                                                    @error('practical')
                                                    <span class="text-success ml-3 mt-1">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <div class="col-2 form-group">
                                                    <div class="col-md-12 ">
                                                        <select class="form-control" id="pass_type" name="arr[0][pass_type]" required>
                                                            <option value="">Select Pass Type</option>
                                                            <option value="1">Part wise</option>
                                                            <option value="2">Total</option>
                                                        </select>
                                                    </div>
                                                    @error('pass_type')
                                                    <span class="text-success ml-3 mt-1">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <div class="col-2 form-group">
                                                    <div class="col-md-12 ">
                                                        <input class="form-control custom-focus @error('combined_sub') is-invalid @enderror" placeholder="Combined Subject" id="combined_sub" name="arr[0][combined_sub]" type="number"  value="{{ old('combined_sub') }}">
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
                                <div  id="bonus_range_area">
                                </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-12 mt-3 mb-2 text-right">
                                        <button type="submit" class="btn btn-primary">Save</button>
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
     var classData = {!! json_encode($classData) !!};
     $(document).ready(function(){
        var i = 0;
        
        $('#addRangeButton').click(function(){
            i++;
            
            var newRow = '<div class="row">' +
                '<div class="form-group col-2">' +
                '<div class="col-md-12">' +
                '<select class="form-control" name="arr[' + i + '][class_id]" required>' +
                '<option value="">Select Class</option>';

            $.each(classData, function(index, item) {
                newRow += '<option value="' + item.id + '">' + item.class + '</option>';
            });

            newRow += '</select>' +
                '</div>' +
                '</div>' +
                '<div class="form-group col-2">' +
                '<div class="col-md-12 "><input type="text" placeholder="subject Name" name="arr[' + i + '][sub_name]" class="form-control"></div>' +
                '</div>' +
                '<div class="form-group col-2">' +
                '<div class="col-md-12 "><input type="number" placeholder="subject Code" name="arr[' + i + '][sub_code]" class="form-control"></div>' +
                '</div>' +
                '<div class="form-group col-2">' +
                '<div class="col-md-12">' +
                '<select class="form-control" name="arr[' + i + '][sub_type]" required>' +
                '<option value="">Select Subject Type</option>' +
                '<option value="1">General Subject</option>' +
                '<option value="2">Group Subject</option>' +
                '<option value="3">Religion Subject</option>' +
                '</select>' +
                '</div>' +
                '</div>' +
                '<div class="form-group col-2">' +
                '<div class="col-md-12 "><input type="number" placeholder="pass mark" name="arr[' + i + '][pass_mark]" class="form-control"></div>' +
                '</div>' +
                '<div class="form-group col-2">' +
                '<div class="col-md-12 "><input type="number" placeholder="written" name="arr[' + i + '][written]" class="form-control"></div>' +
                '</div>' +
                '<div class="form-group col-2">' +
                '<div class="col-md-12 "><input type="number" placeholder="mcq" name="arr[' + i + '][mcq]" class="form-control"></div>' +
                '</div>' +
                '<div class="form-group col-2">' +
                '<div class="col-md-12 "><input type="number" placeholder="practical" name="arr[' + i + '][practical]" class="form-control"></div>' +
                '</div>' +
                '<div class="form-group col-2">' +
                '<div class="col-md-12">' +
                '<select class="form-control" name="arr[' + i + '][pass_type]" required>' +
                '<option value="">Select Pass Type</option>' +
                '<option value="1">Part Wise</option>' +
                '<option value="2">Total</option>' +
                '</select>' +
                '</div>' +
                '</div>' +
                '<div class="form-group col-2">' +
                '<div class="col-md-12 "><input type="number" placeholder="combined subject" name="arr[' + i + '][combined_sub]" class="form-control"></div>' +
                '</div>' +
                '<div class="form-group col-1">' +
                '<div class="col-md-12 "><input type="button" value="close" class="closeRangeButton form-control btn btn-warning" ></div>' +
                '</div>' +
                '</div>';

            $('#bonus_range_area').append(newRow);
        });
        
        $(document).on('click', '.closeRangeButton', function() {
            $(this).closest('.row').remove();
        });
    });
</script>

@endpush



   
