@extends('user.headerfooter')
@section('user-body')
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center mx-auto" style="max-width: 500px">
            <h1 class="display-6 mb-5">
                We Provide professional Insurance Services
            </h1>
        </div>
        <div class="row g-4 justify-content-center">
            @foreach($policy as $value)
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s" style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInUp;">
                <div class="service-item rounded h-100 p-5">
                    <div class="d-flex align-items-center ms-n5 mb-4">
                        <div class="service-icon flex-shrink-0 bg-primary rounded-end me-4">
                            <img class="img-fluid" src="img/icon/icon-10-light.png" alt="">
                        </div>
                        <center>
                            <h4 class="mb-0">POLICY NAME : {{$value->policyname}}</h4>
                        </center>
                        <!-- <h4 class="mb-0">POLICY NAMECATEGORY : {{$value->category}}</h4> -->
                    </div>
                    <p class="mb-4">CATEGORY : {{$value->category}}</p>
                    <p class="mb-4">SUB CATEGORY : {{$value->subcategory}}</p>
                    <a class="btn btn-light px-3" href="apply">Apply</a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection