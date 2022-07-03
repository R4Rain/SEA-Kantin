<div class="col-md-6 col-lg-4 col-xl-3 py-2 d-flex">
    <div class="card shadow-sm flex-fill">
            @if($item->image)
                <img src="{{ asset('storage/'.$item->image) }}" class="card-img-top" alt="food" style="width: 100%; height: 300px; object-fit: cover;">
            @else
                <img src="{{ url('images/food1.jpg') }}" class="card-img-top" alt="food" style="width: 100%; height: 300px; object-fit: cover;">
            @endif
            <div class="card-body">
                <a href="/items/{{$item->id}}" class="link link-dark text-decoration-none stretched-link"><h4 class="card-title text-truncate">{{$item->name}}</h4></a>
                <span class="card-text text-secondary">Seller: <span class="fw-bold text-dark">{{$item->user->name}}</span></span>
                <div class="mt-3">
                    <strong class="card-text text-danger">Rp {{number_format($item->price, 0, ',', '.')}}</strong>
                </div>
            </div>
            <div class="card-footer">
                <small class="text-muted">Created at {{date('D-M-Y H:i:s',strtotime($item->created_at))}}</small>
            </div>
    </div>
</div>