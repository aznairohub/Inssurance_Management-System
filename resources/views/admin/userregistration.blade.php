@extends('admin.header_footer')
@section('admin-body')
<section class="content">
    <div class="container">
        <div class="row">
            <div class="col-sm-3"></div>
            <div class="col-sm-9">
                <table id="example2" class="table table-bordered table-hover dataTable ">
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Password</th>
                        <th>Phno</th>
                    </tr>
                    @foreach($registrate as $value)
                    <tr>                        
                        <td>{{$value->id}}</td>
                        <td>{{$value->name}}</td>
                        <td>{{$value->email}}</td>
                        <td>{{$value->password}}</td>
                        <td>{{$value->phno}}</td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</section>
@endsection