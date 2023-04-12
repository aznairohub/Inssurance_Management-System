@extends('admin.header_footer')
@section('admin-body')
<section class="content">
  <div class="container">
    <div class="row">
      <div class="col-sm-3"></div>
      <div class="col-sm-9">
        <div class="card card-primary">
          <div class="card-header">
           <h3 class="card-title">VIEW COMPLAINTS</h3>
          </div>
        <table id="example2" class="table py-3  table-bordered table-hover dataTable ">
          <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Password</th>
            <th>Message</th>
          </tr>
          @foreach($contactu as $value)
          <tr>
            <td>{{$value->id}}</td>
            <td>{{$value->name}}</td>
            <td>{{$value->email}}</td>
            <td>{{$value->password}}</td>
            <td>{{$value->message}}</td>
          </tr>
          @endforeach
        </table>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection