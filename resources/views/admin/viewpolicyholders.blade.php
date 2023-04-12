@extends('admin.header_footer')
@section('admin-body')
<section class="content">
    <div class="container">
        <div class="row">
            <div class="col-sm-3"></div>
            <div class="col-sm-9">
               <div class="card card-primary">
                    <div class="card-header">
                      <h3 class="card-title">VIEW POLICY HOLDERS</h3>
                    </div>
                <table id="example2" class="table py-3  table-bordered table-hover dataTable ">
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>PERMANENT ADDRESS</th>
                        <th>CURRENT ADDRESS</th>
                        <th>EMAIL</th>
                        <th>DOB</th>
                        <th>CONTACT NO</th>
                        <th>PASSWORD</th>
                        <th>STATUS</th>
                    </tr>
                    @foreach($first as $value)
                    <tr>
                        <td>{{$value->id}}</td>
                        <td>{{$value->name}}</td>
                        <td>{{$value->permanentaddress}}</td>
                        <td>{{$value->currentaddress}}</td>
                        <td>{{$value->email}}</td>
                        <td>{{$value->dob}}</td>
                        <td>{{$value->contactno}}</td>
                        <td>{{$value->password}}</td>
                        <td>{{$value->status}}</td>
                        <td><a class="btn btn-danger" href="/approvedpolicyholders/{{$value->id}}">Approvedpolicyholders</a></td>
                        <td><a class="btn btn-danger" href="/declinedpolicyholders/{{$value->id}}">Declinedpolicyholders</a></td>
                    </tr>
                    @endforeach
                </table>
               </div>
            </div>
        </div>
    </div>
</section>
@endsection