<?php

namespace App\Http\Controllers;
use App\Models\about;
use App\Models\policy;
use App\Models\category;
use App\Models\registrate;
use App\Models\first;
use App\Models\ticket;

use Illuminate\Http\Request;

class usercontroller extends Controller
{
    public function index()
    {
        $data['category']=category::get();
        return view('user.index',$data);
    }
    public function aboutus()
    {
        $data['about']=about::get();
        return view('user.aboutus',$data);
    }
    public function viewinsurancepolicies()
    {
        $data['policy']=policy::join('categories', 'categories.id', '=', 'policies.category')->get();
        return view('user.viewinsurancepolicies',$data);
    }
    public function myprofile()
    {
        $id=session('sess');
        $data['registrate']=registrate::where('id',$id)->get();
        return view('user.myprofile',$data); 
    }
    public function myprofileaction(Request $req,$id)
    {
        
       $name=$req->input('name');
       $email=$req->input('email');
       $password=$req->input('password');
       $phno=$req->input('phno');
       $data=[
        'name'=>$name,
        'email'=>$email,
        'password'=>$password,
        'phno'=>$phno
       ];
       registrate::where('id',$id)->update($data);
       return redirect('/myprofile');
    }
    public function firstform()
    {
        return view('user.firstform');
    }
    public function firstformaction(Request $req)
    {
        $id=session('sess');
        $name=$req->input('name');
        $permanentaddress=$req->input('permanentaddress');
        $currentaddress=$req->input('currentaddress');
        $dob=$req->input('dob');
        $email=$req->input('email');
        $contactno=$req->input('contactno');
        $password=$req->input('password');
        $data=[
            'name'=>$name,
            'permanentaddress'=>$permanentaddress,
            'currentaddress'=>$currentaddress,
            'dob'=>$dob,
            'email'=>$email,
            'contactno'=>$contactno,
            'password'=>$password,
            'userid'=>$id
        ];
        first::insert($data);
        return redirect('/viewfirstform');
    }
    public function viewfirstform()
    {
        $id=session('sess');
        $data['first']=first::where('userid',$id)->get();
        return view('user.viewfirstform',$data);
    }
    public function appliedinsurancepolicies()
    {
        $id=session('sess');
        $data['registrate']=registrate::where('id',$id)->get();
        return view('user.appliedinsurancepolicies',$data);
    }
    public function apply()
    {
        $data['category']=category::get();
        return view('user.apply',$data);
    }
    public function applyaction(Request $req,$id)
    {
        $category=$req->input('category');
        $subcategory=$req->input('subcategory');
        $policyname=$req->input('policyname');
        $sumassured=$req->input('sumassured');
        $premium=$req->input('premium');
        $tenure=$req->input('tenure');
        $data=[
            'category'=>$category,
            'subcategory'=> $subcategory,
            'policyname'=>$policyname,
            'sumassured'=>$sumassured,
            'premium'=>$premium,
            'tenure'=>$tenure
        ];
        policy::where('id',$id)->update($data);
        return redirect('/apply');
    }
    public function tickets()
    {
        return view('user.tickets');
    }
    public function ticketsaction(Request $req)
    {
        $id=session('sess');
        $title=$req->input('title');
        $description=$req->input('description');
        $data=[
            'title'=>$title,
            'description'=>$description,
            'userid'=>$id
        ];
        ticket::insert($data);
        return redirect('/viewticket');
    }
    public function viewticket()
    {
        $id=session('sess');
        $data['ticket']=ticket::where('userid',$id)->get();
        return view('user.viewticket',$data);
    }
}