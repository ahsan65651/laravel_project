  <!-- footer content -->
  <footer>
    <div class="pull-right">
     Project <a href="https://colorlib.com"></a>
    </div>
    <div class="clearfix"></div>
  </footer>
  <!-- /footer content -->
</div>
</div>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

<!-- jQuery -->
<script src="vendors/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<!-- FastClick -->
<script src="vendors/fastclick/lib/fastclick.js"></script>
<!-- NProgress -->
<script src="vendors/nprogress/nprogress.js"></script>
<!-- Chart.js -->
<script src="vendors/Chart.js/dist/Chart.min.js"></script>
<!-- gauge.js -->
<script src="vendors/gauge.js/dist/gauge.min.js"></script>
<!-- bootstrap-progressbar -->
<script src="vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
<!-- iCheck -->
<script src="vendors/iCheck/icheck.min.js"></script>
<!-- Skycons -->
<script src="vendors/skycons/skycons.js"></script>
<!-- Flot -->
<script src="vendors/Flot/jquery.flot.js"></script>
<script src="vendors/Flot/jquery.flot.pie.js"></script>
<script src="vendors/Flot/jquery.flot.time.js"></script>
<script src="vendors/Flot/jquery.flot.stack.js"></script>
<script src="vendors/Flot/jquery.flot.resize.js"></script>
<!-- Flot plugins -->
<script src="vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
<script src="vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
<script src="vendors/flot.curvedlines/curvedLines.js"></script>
<!-- DateJS -->
<script src="vendors/DateJS/build/date.js"></script>
<!-- JQVMap -->
<script src="vendors/jqvmap/dist/jquery.vmap.js"></script>
<script src="vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
<script src="vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
<!-- bootstrap-daterangepicker -->
<script src="vendors/moment/min/moment.min.js"></script>
<script src="vendors/bootstrap-daterangepicker/daterangepicker.js"></script>




<!-- Datatables -->
<script src="vendors/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script src="vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
<script src="vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
<script src="vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
<script src="vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
<script src="vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
<script src="vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
<script src="vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
<script src="vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
<script src="vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
<script src="vendors/jszip/dist/jszip.min.js"></script>
<script src="vendors/pdfmake/build/pdfmake.min.js"></script>
<script src="vendors/pdfmake/build/vfs_fonts.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>

<!-- Custom Theme Scripts -->
<script src="build/js/custom.min.js"></script>


<script>







$(document).ready(function(){

// code to read selected table row cell data (values).
$(".courseTable").on('click','.updatecompanybtn',function(){
// get the current row
var keyupdate="11";
var currentRow=$(this).closest("tr");
var id=currentRow.find("td:eq(0) input[type='hidden']"). val();
$('#upadte_company').modal('show');
$('#comapny_id_modal').val(id);

$.ajax({
url:'/update-company-ajax',
type:'get',
dataType:'json',
data:
{
    id:id
},
success:function(data)
{
//alert(data["name"]);
$("#comapny_name_modal").val(data[0][0]["name"]);
$("#comapny_email_modal").val(data[0][0]["email"]);
}
});

});
});














$(document).ready(function(){

// code to read selected table row cell data (values).
$(".courseTable").on('click','.updateemployeebtn',function(){
// get the current row
var keyupdate="11";
var currentRow=$(this).closest("tr");
var id=currentRow.find("td:eq(0) input[type='hidden']"). val();
$('#update_employee').modal('show');
$('#employee_id_modal').val(id);

$.ajax({
url:'/update-employee-ajax',
type:'get',
dataType:'json',
data:
{
    id:id
},
success:function(data)
{
//alert(data["name"]);
$("#employee_fname_modal").val(data[0][0]["first_name"]);
$("#employee_lname_modal").val(data[0][0]["last_name"]);
$("#employee_company_modal").val(data[0][0]["company_id"]);

$("#employee_phone_modal").val(data[0][0]["phone"]);
$("#employee_email_modal").val(data[0][0]["email"]);
}
});

});
});




</script>

</body>
</html>
