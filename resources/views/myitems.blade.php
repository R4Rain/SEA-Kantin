@extends('layouts.main')
@section('content')
    <div class="container mt-5">
        @if(session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{session('success')}}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="row mb-1">
            <h1 class="text-center mb-4">My Items</h1>
            <form action="/my-items">
                @include('components.searchBar')
            </form>  
        </div>
        <div class="row mb-2 border-bottom">
            <div class="col d-flex justify-content-start">
                <h1>{{((request('search')) ? 'Search results' : 'All Items')}}</h1>
            </div>
            <div class="col">
                <form id='form-2' action="/my-items">
                    @if(request('search'))
                        <input type="hidden" name="search" value="{{request('search')}}">
                    @endif
                    <div class="d-flex flex-row-reverse">
                        <div class="d-flex align-items-center my-2 mx-2">
                            <a href="/my-items/create" role="button" class="btn btn-primary"><i class="bi bi-plus-lg"></i></a>
                        </div>
                        <div class="d-flex align-items-center my-2">
                            <span class="mx-1">Sort by:</span>
                            <select id='selection' name='select' class="form-select w-75" aria-label="Default select example">
                                @if(request('select') === "old")
                                    <option value="new">Newest item</option>
                                    <option selected value="old">Oldest item</option>
                                    <option value="asc">Ascending by name</option>
                                    <option value="desc">Descending by name</option>
                                @elseif(request('select') === "asc")
                                    <option value="new">Newest item</option>
                                    <option value="old">Oldest item</option>
                                    <option selected value="asc">Ascending by name</option>
                                    <option value="desc">Descending by name</option>
                                @elseif(request('select') === "desc")
                                    <option value="new">Newest item</option>
                                    <option value="old">Oldest item</option>
                                    <option value="asc">Ascending by name</option>
                                    <option selected value="desc">Descending by name</option>
                                @else
                                    <option selected value="new">Newest item</option>
                                    <option value="old">Oldest item</option>
                                    <option value="asc">Ascending by name</option>
                                    <option value="desc">Descending by name</option>
                                @endif
                            </select>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="row mb-3">
            @if ($items->isEmpty())
                @include('components.empty')
            @else
                @foreach ($items as $item)
                    @include('components.item')
                @endforeach
            @endif
        </div>
        <div class="col d-flex justify-content-start">
            {{$items->links()}}
        </div>
    </div>
    <script>
        const select = document.getElementById('selection');
        const form = document.getElementById('form-2');
        select.addEventListener('change', function(){
            form.submit();
        });
    </script>
</div>
@endsection