@extends('admin.header_footer')
@section('admin-body')
<div class="container">
    <div class="row">
        <div class="col-sm-3"></div>
        <div class="col-sm-8">
            @foreach($about as $value)
            <form action="/editaboutaction/{{$value->id}}" method="post">
                @csrf
                <table>
                    <tr>
                        <td>Title</td>
                        <td><input type="text" name="title" id="title" value="{{$value->title}}"></td>
                    </tr>
                    <tr>
                        <td>Description</td>
                        <td><textarea name="description" id="description" value="{{$value->description}}"></textarea></td>
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