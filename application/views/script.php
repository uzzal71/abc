<!-- REQUIRED JS SCRIPTS -->
<!-- jQuery 3 -->
<script src="<?php echo base_url()?>assets/jquery/jquery.min.js"></script>
<!-- jQuery 3 -->
<script src="<?php echo base_url()?>assets/jquery/jquery-3.1.0.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url()?>assets/bootstrap/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url()?>assets/js/adminlte.min.js"></script>
<!-- Date picker javascript -->
<script src="<?php echo base_url()?>assets/jquery/jquery-1.12.4.js"></script>
<script src="<?php echo base_url()?>assets/jquery/jquery-ui.js"></script>
<script>
$( function() {
$( "#from_date" ).datepicker({dateFormat:'yy-mm-dd'});
$( "#to_date" ).datepicker({dateFormat:'yy-mm-dd'});
$( "#date" ).datepicker({dateFormat:'yy-mm-dd'});
} );
</script>
<!-- iCheck -->
<script src="<?php echo base_url()?>assets/js/icheck.min.js"></script>
<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
    //Money Euro
    $('[data-mask]').inputmask()

    //Date range picker
    $('#reservation').daterangepicker()
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({ timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A' })
    //Date range as a button
    $('#daterange-btn').daterangepicker(
      {
        ranges   : {
          'Today'       : [moment(), moment()],
          'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month'  : [moment().startOf('month'), moment().endOf('month')],
          'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate  : moment()
      },
      function (start, end) {
        $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
      }
    )

    //Date picker
    $('#datepicker').datepicker({
      autoclose: true
    })

    //iCheck for checkbox and radio inputs
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass   : 'iradio_minimal-blue'
    })
    //Red color scheme for iCheck
    $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
      checkboxClass: 'icheckbox_minimal-red',
      radioClass   : 'iradio_minimal-red'
    })
    //Flat red color scheme for iCheck
    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass   : 'iradio_flat-green'
    })

    //Colorpicker
    $('.my-colorpicker1').colorpicker()
    //color picker with addon
    $('.my-colorpicker2').colorpicker()

    //Timepicker
    $('.timepicker').timepicker({
      showInputs: false
    })
  })
</script>
<!-- Jquery Shake Effact -->
<script type = "text/javascript" src ="<?php echo base_url('assets/js/shake.jquery.min.js')?>"></script>
<script type = "text/javascript" src ="<?php echo base_url('assets/js/shake.ui.jquery.min.js')?>"></script>
<!-- Fuel Chart -->
<script src="<?php echo base_url()?>assets/js/canvasjs.min.js"></script>

<!-- Datatable -->
<script src="<?php echo base_url()?>assets/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url()?>assets/js/dataTables.bootstrap.min.js"></script>
<script>
  $(function () {
    $('#example1').DataTable();
     
  })
</script>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<script type="text/javascript">

  function ConfirmDelete()

   {

    var x = confirm("Are you sure you want to delete?");
    if (x)
    return true;
    else
    return false;
  
   }
   
   function archive()
   {

    var x = confirm("Are you sure you want to archive?");
    if (x)
    return true;
    else
    return false;
  
   }

</script>

<script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>

<script type="text/javascript">
  $(document).ready(function() {
    $('#horizental').DataTable( {
        "scrollX": true
    } );
} );
</script>


