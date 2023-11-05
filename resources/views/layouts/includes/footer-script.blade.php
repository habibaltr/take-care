<!-- jQuery -->
<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('plugins/jquery-ui/jquery-ui.min.js') }}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- ChartJS -->
<script src="{{ asset('plugins/chart.js/Chart.min.js') }}"></script>
<!-- Sparkline -->
<script src="{{ asset('plugins/sparklines/sparkline.js') }}"></script>
<!-- JQVMap -->
<script src="{{ asset('plugins/jqvmap/jquery.vmap.min.js') }}"></script>
<script src="{{ asset('plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
<!-- jQuery Knob Chart -->
<script src="{{ asset('plugins/jquery-knob/jquery.knob.min.js') }}"></script>
<!-- daterangepicker -->
<script src="{{ asset('plugins/moment/moment.min.js') }}"></script>
<script src="{{ asset('plugins/daterangepicker/daterangepicker.js') }}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
<!-- Summernote -->
<script src="{{ asset('plugins/summernote/summernote-bs4.min.js') }}"></script>
<!-- overlayScrollbars -->
<script src="{{ asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('dist/js/adminlte.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('dist/js/scroll.js') }}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ asset('dist/js/pages/dashboard.js') }}"></script>

<!-- DataTables  & Plugins -->
<script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('plugins/jszip/jszip.min.js') }}"></script>
<script src="{{ asset('plugins/pdfmake/pdfmake.min.js') }}"></script>
<script src="{{ asset('plugins/pdfmake/vfs_fonts.js') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
<!-- Select2 -->
<script src="{{ asset('plugins/select2/js/select2.full.min.js') }}"></script>
<script src="{{ asset('plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js') }}"></script>
<script type="text/javascript">
        $.ajaxSetup({
             headers: {
                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
             }
        });
</script>
@stack('custom_js')
<script type="text/javascript">


        $(function (){
          /*Change group*/
            $('#group_id').change(function (){
                var group_id = $(this).val();
                var url = '{{ url('/') }}';

                $.ajax({
                    type:'POST',
                    dataType:'json',
                    url: url + '/ajax/group',
                    data:{group_id:group_id},
                    success:function (data){
                        console.log(data.data);
                        $("#dep_id").empty();
                        $("#desi_id").empty();
                        $("#branch_id").empty();
                        if (data.data.department)
                        {

                            $("#dep_id").append('<option value="">Select Department</option>');
                                for (i = 0; i < data.data.department.length; i++){
                                $('#dep_id').append('<option value='+data.data.department[i].id+'>'+data.data.department[i].dep_name+'</option>');
                            }
                        }

                        if (data.data.branch)
                        {

                            $("#branch_id").append('<option value="">Select Branch</option>');
                                for (i = 0; i < data.data.branch.length; i++){
                                $('#branch_id').append('<option value='+data.data.branch[i].id+'>'+data.data.branch[i].branch_name+'</option>');
                            }
                        }

                    }
                });
            });
            /*change department*/
                $('#dep_id').change(function (){
                var dep_id = $(this).val();
                var url = '{{ url('/') }}';

                $.ajax({
                    type:'POST',
                    dataType:'json',
                    url: url + '/ajax/department',
                    data:{dep_id:dep_id},
                    success:function (data){
                        console.log(data.data);
                        $("#desi_id,#present_desi_id").empty();
                        $("#parent_id").empty();
                        if (data.data.designation)
                        {

                            $("#desi_id,#present_desi_id").append('<option value="">Select Designation</option>');
                                for (i = 0; i < data.data.designation.length; i++){
                                $('#desi_id,#present_desi_id').append('<option value='+data.data.designation[i].id+'>'+data.data.designation[i].desi_name+'</option>');

                            }
                        }

                        if (data.data.parent == 1)
                        {

                            $("#parent_id").append('<option value="0">root</option>');



                        }
                        else
                        {
                            $("#parent_id").append('<option value="">Select Parent</option>');
                                for (i = 0; i < data.data.parent.length; i++){
                                $('#parent_id').append('<option value='+data.data.parent[i].id+'>'+data.data.parent[i].desi_name+'</option>');

                            }

                        }



                    }
                });
            });

            /*change designation*/
                $('#desi_id').change(function (){
                var desi_id = $(this).val();
                var url = '{{ url('/') }}';

                $.ajax({
                    type:'POST',
                    dataType:'json',
                    url: url + '/ajax/designation',
                    data:{desi_id:desi_id},
                    success:function (data){
                        console.log(data.data);
                        $("#emp_id").empty();

                        if (data.data.employee)
                        {

                            $("#emp_id").append('<option value="">Select Employee</option>');

                            for (i = 0; i < data.data.employee.length; i++)
                            {
                                if(data.data.employee[i].middle_name  == null)
                                {
                                    data.data.employee[i].middle_name = '';
                                }

                                if(data.data.employee[i].last_name  == null)
                                {
                                    data.data.employee[i].last_name = '';
                                }
                                $('#emp_id').append('<option value='+data.data.employee[i].id+'>'+data.data.employee[i].emp_name+' '+data.data.employee[i].middle_name+' '+data.data.employee[i].last_name+'</option>');
                            }
                        }
                    }
                });
            });
          });
</script>

<script type="text/javascript">

    $(function (){
        /*Change division */
        $('#division_id').change(function (){
            var division_id = $(this).val();
            var url = '{{ url('/') }}';
            $.ajax({
                type:'POST',
                dataType:'json',
                url: url + '/ajax/division',
                data:{division_id:division_id},
                success:function (data){
                    console.log(data.data);
                    $("#district_id").empty();
                    $("#ps_id").empty();
                   /* $("#branch_id").empty();*/
                    if (data.data.district)
                    {
                        $("#district_id").append('<option value="">Select district</option>');
                        for (i = 0; i < data.data.district.length; i++){
                            $('#district_id').append('<option value='+data.data.district[i].id+'>'+data.data.district[i].district_name+'</option>');
                        }
                    }
                }
            });
        });

    });

        $("#leave_start_date,#leave_end_date,#leave_start_time,#leave_end_time").change(function (){

        var leave_start_date = $('#leave_start_date').val();
        var leave_end_date = $('#leave_end_date').val();
        var leave_id = $('#leave_id').val();

        if(leave_start_date == '' || leave_end_date == '' || leave_id == '')
        {
            return false;
        }



        var leave_start_time = $('#leave_start_time').val();
        var leave_end_time = $('#leave_end_time').val();
        var emp_id = $('#emp_id').val();
        var desi_id = $('#desi_id').val();
        var dep_id = $('#dep_id').val();
        var group_id = $('#group_id').val();
        var url = '{{ url('/') }}';

            $.ajax({
                    type:'POST',
                    dataType:'json',
                    url: url + '/ajax/leave_remaining_check',
                    data:
                    {
                        leave_start_date:leave_start_date,
                        leave_end_date:leave_end_date,
                        leave_start_time:leave_start_time,
                        leave_end_time:leave_end_time,
                        leave_id:leave_id,
                        desi_id:desi_id,
                        dep_id:dep_id,
                        group_id:group_id,
                        emp_id:emp_id,
                    },
                    success:function (data)
                    {
                        console.log(data.data);
                        if(data.data != 1)
                        {
                            alert(`Leave is remain ${data.msg} . So it is not applicable!`);

                            $("#leave_start_date").val("");
                            $("#leave_end_date").val("");



                        }


                    }
                });

    });


</script>
<script type="text/javascript">
        // Load District for present address
    $('#divisionPresent').change(function () {
        var divisionID = $(this).val();
        var httpHost = "<?php request()->getHost(); ?>";
        var url = '{{ url('/') }}';
        if(divisionID)
        {
            $.ajax({
                url: url + '/get-districts/' + divisionID,
                method: 'get',
                success: function (data) {
                    var districtsData = data;
                    if(districtsData){
                        $('#districtPresent').empty();
                        $('#districtPresent').append('<option value="">Select District</option>');
                        districtsData.forEach(function (districtsData) {
                            $('#districtPresent').append('<option value="'+districtsData.id+'">' +
                                districtsData.district_name+
                                '</option>');
                        })
                    }
                    else{
                        $('#districtPresent').empty();
                        $('#districtPresent').append('<option value="">Select District</option>');
                    }
                }
            });
        }
        else{
            $('#districtPresent').empty();
            $('#districtPresent').append('<option value="">Select District</option>');
            $('#thanaPresent').empty();
            $('#thanaPresent').append('<option value="">Select Thana</option>');
        }
    });
    // Load Thana for present address
    $('#districtPresent').change(function () {
        var districtID = $(this).val();
        var url = '{{ url('/') }}';
        if(districtID)
        {
            $.ajax({
                url: url + '/get-thanas/' + districtID,
                method: 'get',
                success: function (data) {
                    var thanasData = data;
                    if(thanasData){
                        $('#thanaPresent').empty();
                        $('#thanaPresent').append('<option value="">Select Thana</option>');
                        thanasData.forEach(function (thanasData) {
                            $('#thanaPresent').append('<option value="'+thanasData.id+'">' +
                                thanasData.ps_name+
                                '</option>');
                        })
                    }
                    else{
                        $('#thanaPresent').empty();
                        $('#thanaPresent').append('<option value="">Select Thana</option>');
                    }
                }
            });
        }
        else{
            $('#thanaPresent').empty();
            $('#thanaPresent').append('<option value="">Select Thana</option>');
        }
    });
    // Load District for permanent address
    $('#divisionPermanent').change(function () {
        var divisionID = $(this).val();
        var url = '{{ url('/') }}';
        if(divisionID)
        {
            $.ajax({
                url: url + '/get-districts/' + divisionID,
                method: 'get',
                success: function (data) {
                    var districtsData = data;
                    if(districtsData){
                        $('#districtPermanent').empty();
                        $('#districtPermanent').append('<option value="">Select District</option>');
                        districtsData.forEach(function (districtsData) {
                            $('#districtPermanent').append('<option value="'+districtsData.id+'">' +
                                districtsData.district_name+
                                '</option>');
                        })
                    }
                    else{
                        $('#districtPermanent').empty();
                        $('#districtPermanent').append('<option value="">Select District</option>');
                    }
                }
            });
        }
        else{
            $('#districtPermanent').empty();
            $('#districtPermanent').append('<option value="">Select District</option>');
            $('#thanaPermanent').empty();
            $('#thanaPermanent').append('<option value="">Select Thana</option>');
        }
    });
    // Load Thana for permanent address
    $('#districtPermanent').change(function () {
        var districtID = $(this).val();
        var url = '{{ url('/') }}';
        if(districtID)
        {
            $.ajax({
                url: url + '/get-thanas/' + districtID,
                method: 'get',
                success: function (data) {
                    var thanasData = data;
                    if(thanasData){
                        $('#thanaPermanent').empty();
                        $('#thanaPermanent').append('<option value="">Select Thana</option>');
                        thanasData.forEach(function (thanasData) {
                            $('#thanaPermanent').append('<option value="'+thanasData.id+'">' +
                                thanasData.ps_name+
                                '</option>');
                        })
                    }
                    else{
                        $('#thanaPermanent').empty();
                        $('#thanaPermanent').append('<option value="">Select Thana</option>');
                    }
                }
            });
        }
        else{
            $('#thanaPermanent').empty();
            $('#thanaPermanent').append('<option value="">Select Thana</option>');
        }
    });
</script>
</body>
</html>


