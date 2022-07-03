@extends('layouts.main')

@section('content')
    @include('components.header')
    <div class="container mt-5 mb-5">
        <h1 class="text-center mb-3">Current Cheap Items</h1>
        <div class="row mx-auto">
            @if ($items->isEmpty())
                @include('components.empty')
            @else
                @foreach ($items as $item)
                    @include('components.item')
                @endforeach
            @endif
        </div>
    </div>
    @include('components.footer')
@endsection
