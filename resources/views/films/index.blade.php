@extends('layouts.app')
@section('title', 'Svi filmovi')
@section('content_header')
<h1>Filmovi</h1>
@stop


@section('content')

@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<!-- Laravel > 7.* -->
@error('success') 
<div class="alert alert-success">{{ $success }}</div>
@enderror

@if (session('status'))
<div class="alert alert-success">
    {{ session('status') }}
</div>
@endif

<h3>Lista filmova:</h3>
{{--
//print_r($glumci);
//dd($glumci); //display and die
--}}

{{ $filmovi->links() }}
<ol start="{{ $filmovi->firstItem() }}" > 
    @foreach ($filmovi as $f)

    <li>
        <a href='{{url("/films/{$f->film_id}/edit")}}'>
            <i class="fas fa-edit"></i></a>

        <form style="display:inline" name="film_delete" action="{{url("/films/{$f->film_id}")}}" 
              method="POST" enctype="multipart/form-data">

            @method('delete')
            @csrf

            <button type="submit" style="color: blue">
                <i class="fa fa-trash" aria-hidden="true"></i>
            </button>
        </form>  

        &nbsp;&nbsp;<a href='{{url("/films/{$f->film_id}")}}'> {{$f->title }} ({{$f->release_year}})</a>
    </li>

    @endforeach
</ol>
{{ $filmovi->links() }}
<a href='{{route('films.create')}}'>
    <i class="fas fa-plus"></i> Dodaj novi zapis</a>
@endsection

@section('css')
<link rel="stylesheet" href="/css/app.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css">
@stop

@section('js')
<script> console.log('Hi!');</script>
@stop
