<!-- Modal -->
<div class="modal fade" id="upadte_company" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Update Company</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;
          </button>
        </div>
        <div class="modal-body">
            <form method="post"  action="/update-company" enctype="multipart/form-data">
                {{@csrf_field()}}

                <input type="hidden"  id="comapny_id_modal" name="id">

          <div class="form-group row">
            <label class="col-form-label col-md-3 col-sm-3  label-align">Update Logo<span class="required">*</span></label>
            <div class="col-md-6 col-sm-6">
                <input    id="modal"  name="logo"  type="file" />
            </div>
        </div>
        <div class="form-group row">
            <label class="col-form-label col-md-3 col-sm-3  label-align">Company Name<span class="required">*</span></label>
            <div class="col-md-6 col-sm-6">
                <input required class="form-control"  id="comapny_name_modal"  name="name"  type="text" /></div>
        </div>

        <div class="form-group row">
            <label class="col-form-label col-md-3 col-sm-3  label-align">Email<span class="required">*</span></label>
            <div class="col-md-6 col-sm-6">
                <input required class="form-control"  id="comapny_email_modal"  name="email"  type="text" /></div>
        </div>


        </div>
        <div class="modal-footer">

            <button type="submit" class="btn btn-success">Update</button>
        </form>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>

      </div>
    </div>
  </div>






<!-- Modal -->
<div class="modal fade" id="update_employee" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Update Employee</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;
          </button>
        </div>
        <div class="modal-body">
            <form method="post"   action="/update-employee" enctype="multipart/form-data">
                {{@csrf_field()}}

<input type="hidden"  id="employee_id_modal" name="employee_id">


<div class="form-group row">
    <label class="col-form-label col-md-3 col-sm-3  label-align">First Name<span class="required">*</span></label>
    <div class="col-md-6 col-sm-6">
        <input required class="form-control"  id="employee_fname_modal"  name="fname"  type="text" /></div>
</div>

<div class="form-group row">
    <label class="col-form-label col-md-3 col-sm-3  label-align">Last Name<span class="required">*</span></label>
    <div class="col-md-6 col-sm-6">
        <input required class="form-control"  id="employee_lname_modal"  name="lname"  type="text" /></div>
</div>

<div class="form-group row">
    <label class="col-form-label col-md-3 col-sm-3  label-align">Company<span class="required">*</span></label>
    <div class="col-md-6 col-sm-6">
     <select name="company_id" id="employee_company_modal">
         <?php
        $com=DB::select(" SELECT * FROM `companies` ");
        foreach ($com as $value) {


        ?>
    <option value="{{$value->id}}">{{$value->name}}</option>
    <?php
        }
    ?>
    </select>
    </div>
</div>

<div class="form-group row">
    <label class="col-form-label col-md-3 col-sm-3  label-align">Email<span class="required">*</span></label>
    <div class="col-md-6 col-sm-6">
        <input required class="form-control"  id="employee_email_modal"  name="email"  type="text" /></div>
</div>

<div class="form-group row">
    <label class="col-form-label col-md-3 col-sm-3  label-align">Phone<span class="required">*</span></label>
    <div class="col-md-6 col-sm-6">
        <input required class="form-control"  id="employee_phone_modal"  name="phone"  type="text" /></div>
</div>


        </div>
        <div class="modal-footer">

            <button type="submit" class="btn btn-success">Update</button>
        </form>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>

      </div>
    </div>
  </div>
