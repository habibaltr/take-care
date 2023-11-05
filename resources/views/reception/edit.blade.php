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
                                <h3 class="card-title">Update Patient</h3>
                            </div>
                            <form action="{{ route('reception.update') }}" class="p-2" method="post" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="id" value="{{$patientLists->id}}">
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="tab-content shampan-heading">
                                                <div class="active tab-pane" id="general-information">
                                                    <!-- Post -->
                                                    <div class="col-md-12">
                                                        <div class="row">

                                                            <div class="col-2 form-group">
                                                                <p class="p-tag">Patient ID</p>
                                                                <!-- <div class="col-md-12 "> -->
                                                                <input class="form-control custom-focus @error('patient_id') is-invalid @enderror" placeholder="" id="patient_id" name="patient_id" type="text"  value="{{ old('patient_id')?old('patient_id'):$patientLists->patient_id }}" required disabled>
                                                                <!-- </div> -->
                                                                @error('patient_id')
                                                                <span class="text-success ml-3 mt-1">{{ $message }}</span>
                                                                @enderror
                                                            </div>

                                                            <div class="col-4 form-group">
                                                                <p class="p-tag">Name <span class="text-danger">*</span></p>
                                                                <!-- <div class="col-md-12 "> -->
                                                                <input class="form-control custom-focus @error('name') is-invalid @enderror" placeholder="" id="name" name="name" type="text"  value="{{ old('name')?old('name'):$patientLists->name }}" required>
                                                                <!-- </div> -->
                                                                @error('name')
                                                                <span class="text-success ml-3 mt-1">{{ $message }}</span>
                                                                @enderror
                                                            </div>

                                                            <div class="col-2 form-group">
                                                                <p class="p-tag">Gender <span class="text-danger">*</span></p>
                                                                <!-- <div class="col-md-12 "> -->
                                                                <select class="form-control" id="gender" name="gender" required>
                                                                    <option value="">----</option>
                                                                    <option value="Male" {{(old('gender')?old('gender'):$patientLists->gender == 'Male')? 'selected':''}}>Male</option>
                                                                    <option value="Female" {{(old('gender')?old('gender'):$patientLists->gender == 'Female')? 'selected':''}}>Female</option>
                                                                    <option value="Other" {{(old('gender')?old('gender'):$patientLists->gender == 'Other')? 'selected':''}}>Other</option>
                                                                </select>
                                                                <!-- </div> -->
                                                                @error('gender')
                                                                <span class="text-success ml-3 mt-1">{{ $message }}</span>
                                                                @enderror
                                                            </div>

                                                            <div class="col-2 form-group">
                                                                <p class="p-tag">Age <span class="text-danger">*</span></p>
                                                                <!-- <div class="col-md-12 "> -->
                                                                <input class="form-control custom-focus @error('age') is-invalid @enderror" placeholder="" id="age" name="age" type="number" value="{{ old('age') ? old('age') : $patientLists->age }}" required>
                                                                <!-- </div> -->
                                                            </div>


                                                            <div class="col-2 form-group">
                                                                <p class="p-tag">Blood Group</p>
                                                                <!-- <div class="col-md-12 "> -->
                                                                <select class="form-control" id="blood_group" name="blood_group">
                                                                    <option value="">----</option>
                                                                    <option value="A+" {{ (old('blood_group') ? old('blood_group') : $patientLists->blood_group == 'A+' ) ? 'selected' : '' }}>A+</option>
                                                                    <option value="A-" {{ (old('blood_group') ? old('blood_group') : $patientLists->blood_group == 'A-' ) ? 'selected' : '' }}>A-</option>
                                                                    <option value="B+" {{ (old('blood_group') ? old('blood_group') : $patientLists->blood_group == 'B+' ) ? 'selected' : '' }}>B+</option>
                                                                    <option value="B-" {{ (old('blood_group') ? old('blood_group') : $patientLists->blood_group == 'B-' ) ? 'selected' : '' }}>B-</option>
                                                                    <option value="AB+" {{ (old('blood_group') ? old('blood_group') : $patientLists->blood_group == 'AB+' ) ? 'selected' : '' }}>AB+</option>
                                                                    <option value="AB-" {{ (old('blood_group') ? old('blood_group') : $patientLists->blood_group == 'AB-' ) ? 'selected' : '' }}>AB-</option>
                                                                    <option value="O+" {{ (old('blood_group') ? old('blood_group') : $patientLists->blood_group == 'O+' ) ? 'selected' : '' }}>O+</option>
                                                                    <option value="O-" {{ (old('blood_group') ? old('blood_group') : $patientLists->blood_group == 'O-' ) ? 'selected' : '' }}>O-</option>
                                                                </select>
                                                                <!-- </div> -->
                                                                @error('blood_group')
                                                                <span class="text-success ml-3 mt-1">{{ $message }}</span>
                                                                @enderror
                                                            </div>


                                                            <div class="col-3 form-group">
                                                                <p class="p-tag">Mobile <span class="text-danger">*</span></p>
                                                                <!-- <div class="col-md-12 "> -->
                                                                <input class="form-control custom-focus @error('mobile') is-invalid @enderror" placeholder="" id="mobile" name="mobile" type="number" value="{{ old('mobile') ? old('mobile') : $patientLists->mobile }}" required>
                                                                <!-- </div> -->
                                                                @error('mobile')
                                                                <span class="text-success ml-3 mt-1">{{ $message }}</span>
                                                                @enderror
                                                            </div>


                                                            <div class="col-4 form-group">
                                                                <p class="p-tag">Address </p>
                                                                <!-- <div class="col-md-12 "> -->
                                                                <input class="form-control custom-focus @error('address') is-invalid @enderror" placeholder="" id="address" name="address" type="text" value="{{ old('address') ? old('address') : $patientLists->address }}" required>
                                                                <!-- </div> -->
                                                                @error('address')
                                                                <span class="text-success ml-3 mt-1">{{ $message }}</span>
                                                                @enderror
                                                            </div>


                                                            <div class="col-4 form-group">
                                                                <p class="p-tag">Disease <span class="text-danger">*</span></p>
                                                                <!-- <div class="col-md-12 "> -->
                                                                <input class="form-control custom-focus @error('disease') is-invalid @enderror" placeholder="" id="disease" name="disease" type="text" value="{{ old('disease') ? old('disease') : $patientLists->disease }}">
                                                                <!-- </div> -->
                                                                @error('disease')
                                                                <span class="text-success ml-3 mt-1">{{ $message }}</span>
                                                                @enderror
                                                            </div>

                                                            <div class="col-12 form-group">
                                                                <p class="p-tag">Patient Summary <span class="text-danger">*</span></p>
                                                                <!-- <div class="col-md-12 "> -->
                                                                <textarea class="form-control custom-focus @error('patient_summary') is-invalid @enderror" placeholder="" id="patient_summary" name="patient_summary" type="text">{{ old('patient_summary')?old('patient_summary'):$patientLists->patient_summary }}</textarea>
                                                                <!-- </div> -->
                                                                @error('patient_summary')
                                                                <span class="text-success ml-3 mt-1">{{ $message }}</span>
                                                                @enderror
                                                            </div>



                                                            <div class="col-2 form-group">
                                                                <p class="p-tag">Patient Type <span class="text-danger">*</span></p>
                                                                <!-- <div class="col-md-12 "> -->
                                                                <select class="form-control" id="patient_type" name="patient_type" required>
                                                                    <option value="">----</option>
                                                                    <option value="General" {{ (old('patient_type') ? old('patient_type') : $patientLists->patient_type == 'General') ? 'selected' : '' }}>General</option>
                                                                    <option value="CBD" {{ (old('patient_type') ? old('patient_type') : $patientLists->patient_type == 'CBD') ? 'selected' : '' }}>CBD</option>
                                                                </select>
                                                                <!-- </div> -->
                                                                @error('patient_type')
                                                                <span class="text-success ml-3 mt-1">{{ $message }}</span>
                                                                @enderror
                                                            </div>


                                                            <div class="col-3 form-group">
                                                                <p class="p-tag">Department <span class="text-danger">*</span></p>
                                                                <!-- <div class="col-md-12 "> -->
                                                                <select class="form-control" id="department" name="department" required>
                                                                    <option value="">----</option><option value="OT" {{ (old('department') ? old('department') : $patientLists->department == 'OT') ? 'selected' : '' }}>OT</option>
                                                                    <option value="Pathology" {{ (old('department') ? old('department') : $patientLists->department == 'Pathology') ? 'selected' : '' }}>Pathology</option>
                                                                </select>
                                                                <!-- </div> -->
                                                                @error('department')
                                                                <span class="text-success ml-3 mt-1">{{ $message }}</span>
                                                                @enderror
                                                            </div>


                                                            <div class="col-3 form-group">
                                                                <p class="p-tag">Assign Doctor <span class="text-danger">*</span></p>
                                                                <!-- <div class="col-md-12 "> -->
                                                                <select class="form-control" id="assign_doctor" name="assign_doctor" required>
                                                                    <option value="">----</option><option value="Dr Motin" {{ (old('assign_doctor') ? old('assign_doctor') : $patientLists->assign_doctor == 'Dr Motin') ? 'selected' : '' }}>Dr Motin</option>
                                                                    <option value="Dr Nasrin" {{ (old('assign_doctor') ? old('assign_doctor') : $patientLists->assign_doctor == 'Dr Nasrin') ? 'selected' : '' }}>Dr Nasrin</option>
                                                                </select>
                                                                <!-- </div> -->
                                                                @error('assign_doctor')
                                                                <span class="text-success ml-3 mt-1">{{ $message }}</span>
                                                                @enderror
                                                            </div>


                                                            <div class="col-2 form-group">
                                                                <p class="p-tag">Cavin/Ward </p>
                                                                <!-- <div class="col-md-12 "> -->
                                                                <select class="form-control" id="cavin_ward" name="cavin_ward" required>
                                                                    <option value="">----</option><option value="302" {{ (old('cavin_ward') ? old('cavin_ward') : $patientLists->cavin_ward == '302') ? 'selected' : '' }}>302</option>
                                                                    <option value="303" {{ (old('cavin_ward') ? old('cavin_ward') : $patientLists->cavin_ward == '303') ? 'selected' : '' }}>303</option>
                                                                </select>
                                                                <!-- </div> -->
                                                                @error('cavin_ward')
                                                                <span class="text-success ml-3 mt-1">{{ $message }}</span>
                                                                @enderror
                                                            </div>

                                                            <div class="col-4 form-group">
                                                                <p class="p-tag">Advance </p>
                                                                <!-- <div class="col-md-12 "> -->
                                                                <input class="form-control custom-focus @error('advance') is-invalid @enderror" placeholder="" id="advance" name="advance" type="number" value="{{ old('advance') ? old('advance') : $patientLists->advance }}">
                                                                <!-- </div> -->
                                                                @error('advance')
                                                                <span class="text-success ml-3 mt-1">{{ $message }}</span>
                                                                @enderror
                                                            </div>


                                                            <div class="col-4 form-group">
                                                                <p class="p-tag">Due </p>
                                                                <!-- <div class="col-md-12 "> -->
                                                                <input class="form-control custom-focus @error('due') is-invalid @enderror" placeholder="" id="due" name="due" type="number" value="{{ old('due') ? old('due') : $patientLists->due }}">
                                                                <!-- </div> -->
                                                                @error('due')
                                                                <span class="text-success ml-3 mt-1">{{ $message }}</span>
                                                                @enderror
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
    <script>
        $(document).ready(function () {
            $('#class_id').on('change', function () {
                var classId = $(this).val();

                // Send an AJAX request to fetch sections for the selected class
                $.ajax({
                    url: '/getSections/' + classId, // Replace with your route URL
                    type: 'GET',
                    success: function (data) {
                        // Update the section dropdown with the fetched sections
                        $('#sec_id').empty();
                        $('#sec_id').append('<option value="">----</option>');
                        $.each(data, function (key, value) {
                            $('#sec_id').append('<option value="' + key + '">' + value + '</option>');
                        });
                    }
                });
            });
        });
    </script>
@endpush
