@extends('admin.header_footer')
@section('admin-body')
<div class="container">
    <div class="row">
        <div class="col-sm-3"></div>
        <div class="col-sm-8">
            @foreach($policy as $value)
            <form action="/editpolicyaction/{{$value->id}}" method="post">
                @csrf
                <table>
                    <tr>
                        <td>Category</td>
                        <td><input type="text" name="category" id="category" value="{{$value->category}}"></td>
                    </tr>
                    <tr>
                        <td>Subcategory</td>
                        <td><input type="text" name="subcategory" id="subcategory" value="{{$value->subcategory}}"></td>
                    </tr>
                    <tr>
                        <td>Policyname</td>
                        <td><input type="text" name="policyname" id="Policyname" value="{{$value->policyname}}"></td>
                    </tr>
                    <tr>
                        <td>Sumassured</td>
                        <td><input type="text" name="sumassured" id="sumassured" value="{{$value->sumassured}}"></td>
                    </tr>
                    <tr>
                        <td>Premium</td>
                        <td><input type="number" name="premium" id="Premium" value="{{$value->premium}}"></td>
                    </tr>
                    <tr>
                        <td>Tenure</td>
                        <td><input type="number" name="tenure" id="Tenure" value="{{$value->tenure}}"></td>
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