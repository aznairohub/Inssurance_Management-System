<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\subcategory;
use App\Models\policy;
use App\Models\about;
use App\Models\profile;
use App\Models\registrate;
use App\Models\contactu;
use App\Models\first;
use App\Models\ticket;

use Illuminate\Http\Request;

class admincontroller extends Controller
{
    public function login()
    {
        return view('admin.adminlogin');
    }
    public function index()
    {
        $data['policy']=policy::count();
        $data['first']=first::count();
        $data['registrate']=registrate::count();
        $data['ticket']=ticket::count();
        return view('admin.index',$data);
    }
    public function addcategory()
    {
        return view('admin.addcategory');
    }
    public function addcategoryaction(Request $req)
    {
        $category = $req->input('category');
        $data = [
            'category' => $category
        ];
        category::insert($data);
        return redirect('/viewcategory');
    }
    public function viewcategory()
    {
        $data['result'] = category::get();
        return view('admin.viewcategory', $data);
    }
    public function deletecategory($id)
    {
        category::where('id', $id)->delete();
        return redirect('/viewcategory');
    }
    public function editcategory($id)
    {
        $data['result'] = category::where('id', $id)->get();
        return view('admin.editcategory', $data);
    }
    public function editcategoryaction(Request $req, $id)
    {
        $category = $req->input('category');
        $data = [
            'category' => $category
        ];
        category::where('id', $id)->update($data);
        return redirect('/viewcategory');
    }
    public function addsubcategory()
    {
        $data['category'] = category::get();
        return view('admin.addsubcategory', $data);
    }
    public function addsubcategoryaction(Request $req)
    {
        $category = $req->input('category');
        $subcategoryname = $req->input('subcategoryname');
        $data = [
            'category' => $category,
            'subcategoryname' => $subcategoryname
        ];
        subcategory::insert($data);
        return redirect('/viewsubcategory');
    }
    public function viewsubcategory()
    {
        $data['subcategory'] = subcategory::join('categories', 'categories.id', '=', 'subcategories.category')
            ->select('subcategories.id', 'subcategories.subcategoryname', 'categories.category')
            ->get();
        return view('admin.viewsubcategory', $data);
    }
    public function editsubcategory($id)
    {
        $data['category'] = category::get();
        $data['subcategory'] = subcategory::join('categories', 'categories.id', '=', 'subcategories.category')
        ->where('subcategories.id', $id)
        ->select('subcategories.id', 'subcategories.subcategoryname', 'categories.category')
        ->get();
        return view('admin.editsubcategory', $data);
    }
    public function editsubcategoryaction(Request $req, $id)
    {
        $category = $req->input('category');
        $subcategoryname = $req->input('subcategoryname');
        $data = [
            'category' => $category,
            'subcategoryname' => $subcategoryname
        ];
        subcategory::where('id', $id)->update($data);
        return redirect('/viewsubcategory');
    }
    public function deletesubcategory($id)
    {
        subcategory::where('id', $id)->delete();
        return redirect('/viewsubcategory');
    }
    public function addpolicy()
    {
        $data['category'] = category::get();
        return view('admin.addpolicy', $data);
    }
    public function addpolicyaction(Request $req)
    {
      $category=$req->input('category');
      $subcategory=$req->input('subcategory');
      $policyname=$req->input('policyname');
      $sumassured=$req->input('sumassured');
      $premium=$req->input('premium');
      $tenure=$req->input('tenure');
      $data=[
        'category'=>$category,
        'subcategory'=>$subcategory,
        'policyname'=>$policyname,
        'sumassured'=>$sumassured,
        'premium'=>$premium,
        'tenure'=>$tenure
      ];
      policy::insert($data);
      return redirect('/viewpolicy');
    }
    public function viewpolicy()
    {
        $data['policy'] = policy::join('categories', 'categories.id', '=', 'policies.category')->get();
        return view('admin.viewpolicy',$data);
    }
    public function deletepolicy($id)
    {
        policy::where('id', $id)->delete();
        return redirect('/viewpolicy');
    }
    public function editpolicy($id)
    {
        $data['policy'] = policy::where('id',$id)->get();
        return view('admin.editpolicy', $data);
    }
    public function editpolicyaction(Request $req, $id)
    {
        $category = $req->input('category');
        $subcategory = $req->input('subcategory');
        $policyname = $req->input('policyname');
        $sumassured = $req->input('sumassured');
        $premium = $req->input('premium');
        $tenure = $req->input('tenure');
        $data = [
            'category' => $category,
            'subcategory' => $subcategory,
            'policyname' => $policyname,
            'sumassured' => $sumassured,
            'premium' => $premium,
            'tenure' => $tenure
        ];
        policy::where('id', $id)->update($data);
        return redirect('/viewpolicy');
    }
    public function addabout()
    {
        return view('admin.addabout');
    }
    public function addaboutaction(Request $req)
    {
        $title = $req->input('title');
        $description = $req->input('description');
        $data = [
            'title' => $title,
            'description' => $description
        ];
        about::insert($data);
        return redirect('/viewabout');
    }
    public function viewabout()
    {

        $data['about'] = about::get();
        return view('admin.viewabout', $data);
    }
    public function deleteabout($id)
    {
        about::where('id', $id)->delete();
        return redirect('/viewabout');
    }
    public function editabout($id)
    {
        $data['about'] = about::where('id', $id)->get();
        return view('admin.editabout', $data);
    }
    public function editaboutaction(Request $req, $id)
    {
        $title = $req->input('title');
        $description = $req->input('description');
        $data = [
            'title' => $title,
            'description' => $description
        ];
        about::where('id', $id)->update($data);
        return redirect('/viewabout');
    }
    public function viewprofile()
    {
        //$data['profile']=profile::where('id',$id)->get();
        return view('admin.viewprofile');
    }
    public function viewuser()
    {
        $data['registrate']=registrate::get();
        return view('admin.viewuser',$data);
    }
    public function viewpolicies()
    {
        $data['policy']=policy::join('categories', 'categories.id', '=', 'policies.category')->get();
        return view('admin.viewpolicy',$data);
    }
    public function viewpolicyholders()
    {
        $id=session('sess');
        $data['first']=first::where('userid',$id)->get();
        return view('admin.viewpolicyholders',$data);
    }
    public function userregistration()
    {
        $data['registrate']=registrate::get();
        return view('admin.viewuser',$data);
    }
    public function viewcomplaints()
    {
        $data['contactu']=contactu::get();
        return view('admin.viewcomplaints',$data);
    }
    public function viewtickets()
    {
        $data['ticket']=ticket::get();
        return view('admin.viewtickets',$data);
    }
    public function changeact($id)
    {
        $data['ticket']=ticket::where('id',$id)->get();
        return view('admin.changeact',$data);
    }
    public function changeaction(Request $req,$id)
    {
       $data=[
           'status'=>"ticket closed"
       ];
       ticket::where('id',$id)->update($data);
        return redirect('/viewtickets');
    }
    //public function profileaction(Request $req,$id)
    //{
       // $username=$req->input('username');
       // $password=$req->input('password');
       // $data=[

        //]
    //}
  //public function view_subcategory(Request $req)
    //{
      //  $category = $req->input('id');
      //  return $data['subcategory']=subcategory::where('category',$category)->get();
      //  return response()->json([
      //  'subcategory' => $data
     //   ]);
    //}
    public function approvedpolicyholders($id)
    {
        $data=['status'=>"approve"];
        first::where('id',$id)->update($data);
        return redirect('/viewpolicyholders');
    }
    public function declinedpolicyholders($id)
    {
        $data=['status'=>"decline"];
        first::where('id',$id)->update($data);
        return redirect('/viewpolicyholders');
    }
    public function viewsub($id)
    {
        $subcategories = subcategory::where('category', $id)->get();
        return response()->json($subcategories);
      
    }
}