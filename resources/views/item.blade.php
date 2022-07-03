@extends('layouts.main')

@section('content')
    <div class="container px-2 px-lg-5 my-5">
        <div class="row gx-4 gx-lg-5 align-items-center">
                <div class="col-md-6">
                    @if($item->image)
                        <img id='item-image' src="{{ asset('storage/'.$item->image) }}" class="card-img-top image-fluid mb-5 mb-md-0" alt="Item image">
                    @else
                        <img id='item-image' src="{{ url('images/food1.jpg') }}" class="card-img-top image-fluid mb-5 mb-md-0" alt="Item image">
                    @endif
                </div>
                <div class="col-md-6">
                    <h1 class="display-5 fw-bolder">{{$item->name}}</h1>
                    <h4 class="mb-1 fw-light">Seller: <strong class='fw-bold'>{{$item->user->name}}</strong></h4>
                    <h6 class="mb-3 fw-light">Created at {{date('D-M-Y H:i:s',strtotime($item->created_at))}}</h6>
                    <div class="fs-5 mb-5">
                        <strong class="text-danger">Rp {{number_format($item->price, 0, ',', '.')}}</strong>
                    </div>
                    <p class="lead">{!!$item->description!!}</p>
                    @auth
                        <form action="/items/{{$item->id}}" method="POST">
                            @csrf
                            <div class="d-flex">
                                <input type="hidden" name="buy" value="buyed">
                                <button class="btn btn-outline-success flex-shrink-0" type="submit">
                                    <i class="bi-cart-fill me-1"></i>
                                    Buy the item
                                </button>
                            </div>
                        </form>
                    @endauth
                    <div class="mt-3">
                        <a href="{{url()->previous()}}" class="link-dark">Go back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection