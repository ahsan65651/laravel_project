<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\MyTestMail;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        return view('pages/index');
    }
    public function company_view()
    {
        $company = DB::table('companies')
    ->Paginate(10);
        //storage/company/1.jpg
        //$company=DB::select("  ");



       // dd("Email is Sent.");

        return view("pages/company/company",compact("company"));
    }
    public function addcompany(Request $request)
{

    $details = [
        'title' => 'Mail from project.com',
        'body' => 'New Company added'
    ];

    Mail::to('ahsankhanjunjua@gmail.com')->send(new \App\Mail\MyTestMail($details));

    $name=$request->name;
    $email=$request->email;
    $filename=$_FILES["logo"]['name'];
    $tempname=$_FILES["logo"]["tmp_name"];
    $file_ext=pathinfo($filename,PATHINFO_EXTENSION);
    $filename=pathinfo($filename,PATHINFO_FILENAME);
    $six_digit_random_number = random_int(100000, 999999);
    $filename=$six_digit_random_number;
    $fi_name=$filename.".".$file_ext;


$folder="storage/company/".$fi_name;
move_uploaded_file($tempname, $folder);
DB::select(" INSERT INTO `companies`( `name`, `email`, `logo`) VALUES ('".$name."','".$email."','".$folder."') ");
return redirect()->action("HomeController@company_view")->with("str",$name);
}

public function delete_company($id)
{
    $rr=DB::select(" SELECT * FROM `companies` WHERE `id`='".$id."' ");
    foreach($rr as $r)
    {
        $dir=$r->logo;
    }
    unlink($dir);

    DB::select(" DELETE FROM `companies` WHERE `id`='".$id."' ");
    return redirect()->action("HomeController@company_view")->with("str2",$id);
}
public function update_company_ajax(Request $request)
{
    $id=$request->id;
    $company=DB::select(" SELECT * FROM `companies` WHERE `id`='".$id."' ");

    $arr=array($company);
    echo json_encode($arr);
}

public function update_company(Request $request)
{
  //  dd($request);
    $id=$request->id;
    $name=$request->name;
    $email=$request->email;
    $rr=DB::select(" SELECT * FROM `companies` WHERE `id`='".$id."' ");
    foreach($rr as $r)
    {
        $pe=$r->logo;
    }
    if(!empty($_FILES["logo"]['name']))
    {
    $filename=$_FILES["logo"]['name'];
    $tempname=$_FILES["logo"]["tmp_name"];
    $file_ext=pathinfo($filename,PATHINFO_EXTENSION);
    $filename=pathinfo($filename,PATHINFO_FILENAME);
    $six_digit_random_number = random_int(100000, 999999);
    $filename=$six_digit_random_number;
    $fi_name=$filename.".".$file_ext;

    unlink($pe);
$folder="storage/company/".$fi_name;
move_uploaded_file($tempname, $folder);
    }
    else
    {
        $folder=$pe;
    }

    DB::select(" UPDATE `companies` SET `logo`='".$folder."',`email`='".$email."',`name`='".$name."' WHERE `id`='".$id."' ");
    return redirect()->action("HomeController@company_view")->with("str3",$id);

}



























public function employee_view()
    {
        $employee = DB::table('employees')
    ->Paginate(10);
        return view("pages/employee/employee",compact("employee"));
    }
    public function addemployee(Request $request)
{

    $fname=$request->fname;
    $lname=$request->lname;
    $phone=$request->phone;
    $email=$request->email;
    $company_id=$request->company_id;
DB::select(" INSERT INTO `employees`( `first_name`,`last_name`,`company_id`, `email`, `phone`) VALUES ('".$fname."','".$lname."','".$company_id."','".$email."','".$phone."') ");
return redirect()->action("HomeController@employee_view")->with("str",$fname);
}

public function delete_employee($id)
{


    DB::select(" DELETE FROM `employees` WHERE `id`='".$id."' ");
    return redirect()->action("HomeController@employee_view")->with("str2",$id);
}
public function update_employee_ajax(Request $request)
{
    $id=$request->id;
    $employee=DB::select(" SELECT * FROM `employees` WHERE `id`='".$id."' ");

    $arr=array($employee);
    echo json_encode($arr);
}

public function update_employee(Request $request)
{
  //  dd($request);
    $id=$request->employee_id;
    $fname=$request->fname;
    $lname=$request->lname;
    $phone=$request->phone;
    $company_id=$request->company_id;
    $email=$request->email;


    DB::select(" UPDATE `employees` SET `phone`='".$phone."',`email`='".$email."',`first_name`='".$fname."',`last_name`='".$lname."',`company_id`='".$company_id."' WHERE `id`='".$id."' ");
    return redirect()->action("HomeController@employee_view")->with("str3",$id);

}

}

