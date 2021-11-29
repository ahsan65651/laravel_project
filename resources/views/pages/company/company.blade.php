@extends('layout/app')
@section('content')


    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Add Company</h3>
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
Company Added successfully.
</div>
<?php
}
?>

                        <h2>Company <small>Add Company</small></h2>

                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <form  action="/add-company" method="post" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                            <!-- <span class="section">Course Info</span> -->
                            <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align">Logo<span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6">
                                    <input type="file" name="logo" required />
                                </div>
                            </div>
                            <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align">Company Name<span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6">
                                    <input required class="form-control"  name="name"  type="text" /></div>
                            </div>
                            <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align">Email<span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6">
                                    <input class="form-control" name="email"  required type="email" /></div>
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
Company Updated successfully.
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
Company Deleted successfully.
</div>
<?php
}
?>


        <h2>Company Records<small></small></h2>

        <div class="clearfix"></div>
      </div>
      <div class="x_content">
          <div class="row">
              <div class="col-sm-12">
                <div class="card-box table-responsive">

        <table  class="table table-striped table-bordered courseTable" style="width:100%">
          <thead>
            <tr>
                <th>Logo</th>
              <th>Company Name</th>
              <th>Email</th>

              <th></th>
             </tr>
          </thead>


          <tbody>

            @if(!empty($company) && $company->count())
            @foreach($company as $key => $cc)
                <tr>
                    <td>
                        <input type="hidden" value="{{$cc->id}}">
                        <img src="{{$cc->logo}}" style="width:100px;height:100px;" alt="">

                      </td>
                      <td>
                        {{$cc->name}}
                      </td>
                      <td>{{$cc->email}}</td>
                      <td><a href="#" type="button" class="btn btn-success updatecompanybtn" >EDIT</a><a type="button" class="btn btn-danger" href="delete-company/{{$cc->id}}">DELETE</a></td>
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="10">There are no data.</td>
            </tr>
        @endif


          </tbody>
        </table>
        {!! $company->links() !!}
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
