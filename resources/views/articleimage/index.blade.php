@extends('layouts.app')

@section('content')
<div class="container">
    @foreach ($articleImages as $image)
        <img id='image{{$image->id}}' class='{{$image->class}}' src='/images/{{$image->src}}' alt='{{$image->alt}}' width='{{$image->width}}' height='{{$image->height}}' />
    @endforeach
</div>
@endsection