@extends('user.headerfooter')
@section('user-body')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-4"></div>
            <div class="col-md-5">
                <div class="card card-primary">
                    <form action="/applyaction/{{$value->id}}" method="post">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputCategory">Category</label>
                                <select name="category" id="category">
                                    <option value="" disabled>Select Category</option>
                                    @foreach($category as $value)
                                    <option value="{{$value->id}}">{{$value->category}}</option>
                                    @endforeach
                                </select>
                                <div class="form-group">
                                    <label for="exampleInputsubcategory">Subcategory</label>
                                    <input type="text" name="subcategory" id="subcategory" value="{{$value->subcategory}}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPolicyname">Policyname</label>
                                    <input type="text" name="policyname" id="Policyname" value="{{$value->policyname}}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputsumassured">Sumassured</label>
                                    <input type="text" name="sumassured" id="sumassured" value="{{$value->sumassured}}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPremium">Premium</label>
                                    <input type="number" name="premium" id="Premium" value="{{$value->premium}}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputTenure">Tenure</label>
                                    <input type="number" name="tenure" id="Tenure" value="{{$value->tenure}}">
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Apply</button>
                            </div>
                    </form>
                </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection