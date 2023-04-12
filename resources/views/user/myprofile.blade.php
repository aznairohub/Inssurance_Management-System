@extends('user.headerfooter')
@section('user-body')
<div class="container-xxl py-5">
      <div class="container">
        <div class="row g-5">
          <div class="col-lg-12 wow fadeIn" data-wow-delay="0.1s" style="visibility: visible; animation-delay: 0.1s; animation-name: fadeIn;">
            <body class="bg-primary">
            <center>
            @foreach($registrate as $value)
            <form action="/myprofileaction/{{$value->id}}" method="post">
              @csrf
              <div class="row g-3">
                <div class="col-12">
                  <div class="form-floating">
                    <input type="text" name="name" id="name" value="{{$value->name}}">
                  </div>
                </div>
                <div class="col-12">
                  <div class="form-floating">
                    <input type="email" name="email" id="email" value="{{$value->email}}">
                  </div>
                </div>
                <div class="col-12">
                  <div class="form-floating">
                    <input type="password" name="password" id="password" value="{{$value->password}}">
                  </div>
                </div>
                <div class="col-12">
                  <div class="form-floating">
                    <input type="number" name="phno" id="phno" value="{{$value->phno}}">
                  </div>
                </div>
                <div class="col-12">
                  <button class="btn btn-primary py-3 px-5" type="submit">
                    Submit
                  </button>
                </div>
              </div>
            </form>
            @endforeach
            </center>
            </body>
          </div>
        </div>
      </div>
</div>
@endsection