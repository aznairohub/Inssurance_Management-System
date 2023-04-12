@extends('admin.header_footer')
@section('admin-body')
<div class="contianer">
    <div class="row">
        <div class="col-sm-3"></div>
        <div class="col-sm-8">
            @foreach($result as $value)
            <form action="/editcategoryaction/{{$value->id}}" method="post">
                @csrf
                <table>
                    <tr>
                        <td>Category</td>
                        <td><input type=text name="category" id="exampleInputCategory1" value="{{$value->category}}">
                    </tr>
                    <tr>
                        <td><input type="submit" value="Add" name="submit"></td>
                    </tr>
                </table>
            </form>
            @endforeach
        </div>
    </div>
</div>
@endsection