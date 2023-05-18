@extends("layouts.front")

@section("content")
    @include("$folder[viewFolder].$folder[subViewFolder].$folder[transaction].content")
@endsection()
