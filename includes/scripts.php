<!-- jQuery 3 -->

<script src="../bower_components/jquery3.4.1/jquery-3.4.1.min.js"></script>
<script src="../bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="../bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- DataTables -->
<script src="../bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="../bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="../bower_components/raphael/raphael.min.js"></script>
<script src="../bower_components/morris.js/morris.min.js"></script>
<!-- ChartJS -->
<script src="../bower_components/chart/Chart.bundle.js"></script>
<script src="../bower_components/chart/Chart.bundle.min.js"></script>
<script src="../bower_components/chart/chart.js"></script>
<!-- Sparkline -->
<script src="../bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="../plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="../plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="../bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="../bower_components/moment/min/moment.min.js"></script>
<script src="../bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="../bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- bootstrap time picker -->
<script src="../plugins/timepicker/bootstrap-timepicker.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="../bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="../dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>
<script>
  $(function () {
    $('#example1').DataTable({
      responsive: true
    })
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>
<script>
$(function(){
  /** add active class and stay opened when selected */
  var url = window.location;

  // for sidebar menu entirely but not cover treeview
  $('ul.sidebar-menu a').filter(function() {
     return this.href == url;
  }).parent().addClass('active');

  // for treeview
  $('ul.treeview-menu a').filter(function() {
     return this.href == url;
  }).parentsUntil(".sidebar-menu > .treeview-menu").addClass('active');

});
</script>
<script>
$(function(){
	//Date picker
  $('#datepicker_add').datepicker({
    autoclose: true,
    format: 'yyyy-mm-dd'
  })
  $('#datepicker_edit').datepicker({
    autoclose: true,
    format: 'yyyy-mm-dd'
  })

  //Timepicker
  $('.timepicker').timepicker({
    showInputs: false
  })

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

});

</script>
<script>

function update(){
    var url = "https://fmtdata.com/API/api.php";
    showLoadingImage();
        $.ajax({
            type: 'POST',
            dataType: 'json',
            url: '../class/proses.php?method=getString',
            success: function(data){
                defaultReq = data['request'];
                apikey = data['apikey'];
                scretkey = data['secreetkey'];
                tampil();
                //alert("Test Synch "+ defaultReq + "," + apikey + "," + scretkey);
            }
        });
        function tampil(){

        try{
            req = JSON.parse(defaultReq);
        }catch(ex){
            alert("Error "+ ex);
        }
        req.parameters.clientReference = apikey;
        req.parameters.clientSecret = scretkey;
        $.ajax({
            type: 'POST',
            dataType: 'json',
            data: JSON.stringify(req),
            url: url,
            crossDomain: true
        })
        .done(function(data){
            result = JSON.stringify(data, null,4);
            var response = {"result":result};

            $.ajax({
                type: 'POST',
                dataType: 'json',
                url: '../class/proses.php?method=transactions',
                data: response,
                success: function(data){
                    alert(data);

                }
            });
            hideLoadingImage();
        });

    }
}

function update_tank(){
    var url = "https://fmtdata.com/API/api.php";
    showLoadingImage();
        $.ajax({
            type: 'POST',
            dataType: 'json',
            url: '../class/proses.php?method=tanklevel',
            success: function(data){
                defaultReq = data['request'];
                apikey = data['apikey'];
                scretkey = data['secreetkey'];
                //tampil();
                alert("Test Synch "+ defaultReq + "," + apikey + "," + scretkey);
            }
        });
        function tampil(){

        try{
            req = JSON.parse(defaultReq);
        }catch(ex){
            alert("Error "+ ex);
        }
        req.parameters.clientReference = apikey;
        req.parameters.clientSecret = scretkey;
        $.ajax({
            type: 'POST',
            dataType: 'json',
            data: JSON.stringify(req),
            url: url,
            crossDomain: true
        })
        .done(function(data){
            result = JSON.stringify(data, null,4);
            var response = {"result":result};

            $.ajax({
                type: 'POST',
                dataType: 'json',
                url: '../class/proses.php?method=gettank',
                data: response,
                success: function(data){
                    alert(data);

                }
            });
            hideLoadingImage();
        });

    }
}

function showLoadingImage() {
    $('#loading').append('<i id="loading-image"><img src="../images/Eclipse-1s-24px.gif" alt="Loading..." /></i>');
}

function hideLoadingImage() {
    $('#loading-image').remove();
    location.reload();
}

</script>
