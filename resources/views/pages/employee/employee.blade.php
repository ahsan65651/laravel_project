@extends('layout/app')
@section('content')


    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Add Employee</h3>
            </div>


        </div>
        <div class="clearfix"></div>


<div class="row">
  <!-- form input mask -->
  <div class="col-md-4 col-sm-12">
                <div class="x_panel">
                    <div class="x_title">

                    <?php
                    $str=Session::get("str");
if(isset($str))
{
?>

<div class="alert alert-success" role="alert">
Employee Added successfully.
</div>
<?php
}
?>

                        <h2>Employee <small>Add Employee</small></h2>

                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <form  action="/add-employee" method="post" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                            <!-- <span class="section">Course Info</span> -->

                            <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align">First Name<span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6">
                                    <input required class="form-control"  name="fname"  type="text" /></div>
                            </div>
                            <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align">Last Name<span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6">
                                    <input required class="form-control"  name="lname"  type="text" /></div>
                            </div>
                            <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align">Company<span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6">
                                <select name="company_id" required>
                                    <?php
                                    $company=DB::select(" SELECT * FROM `companies` ");
                                    foreach($company as $cc)
                                    {
                                    ?>
                                    <option value="{{$cc->id}}">{{$cc->name}}</option>
                                    <?php
                                    }
                                    ?>
                                </select>
                                </div>
                            </div>
                            <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align">Email<span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6">
                                    <input class="form-control" name="email"  required type="email" /></div>
                            </div>

                            <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align">Phone<span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6">
                                    <input class="form-control" name="phone"  required type="text" /></div>
                            </div>





                           <div class="ln_solid">
                                <div class="form-group">
                                    <div class="col-md-6 offset-md-3">
                                        <button type="submit"  class="btn btn-primary">Submit</button>

                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>             <!-- /form input mask -->

  <!-- form color picker -->
  <div class="col-md-8 col-sm-12 ">
    <div class="x_panel">
      <div class="x_title">


      <?php
$str3=Session::get("str3");
if(isset($str3))
{
?>

<div class="alert alert-success" role="alert">
Employee Updated successfully.
</div>
<?php
}
?>

<?php
       $str2=Session::get("str2");
if(isset($str2))
{
?>

<div class="alert alert-danger" role="alert">
Employee Deleted successfully.
</div>
<?php
}
?>


        <h2>Employee Records<small></small></h2>

        <div class="clearfix"></div>
      </div>
      <div class="x_content">
          <div class="row">
              <div class="col-sm-12">
                <div class="card-box table-responsive">

        <table  class="table table-striped table-bordered courseTable" style="width:100%">
          <thead>
            <tr>
                <th>First Name</th>
              <th>Last Name</th>
              <th>Company</th>
              <th>Email</th>
              <th>Phone</th>
            <th></th>
             </tr>
          </thead>


          <tbody>

            @if(!empty($employee) && $employee->count())
            @foreach($employee as $key => $e)
                <tr>
                    <td>
                        <input type="hidden" value="{{$e->id}}">
                        {{$e->first_name}}
                      </td>
                      <td>
                        {{$e->last_name}}
                      </td>
<?php
$com=DB::select(" SELECT * FROM `companies` WHERE `id`='".$e->company_id."' ");
foreach ($com as $c_n) {
    $com_name=$c_n->name;
}
?>
                      <td>
                        {{$com_name}}
                      </td>

                      <td>{{$e->email}}</td>
                      <td>{{$e->phone}}</td>
                      <td><a href="#" type="button" class="btn btn-success updateemployeebtn" >EDIT</a><a type="button" class="btn btn-danger" href="delete-employee/{{$e->id}}">DELETE</a></td>
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="10">There are no data.</td>
            </tr>
        @endif


          </tbody>
        </table>
        {!! $employee->links() !!}
      </div>
      </div>
  </div>
</div>
    </div>
  </div>
    </div>
  </div>
  <!-- /form color picker -->



</div>
</div>



@endsection
