@extends('layouts.app')
@section('title', 'Svi jezici')
@section('content_header')
<h1>Jezici</h1>
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

<h3>Lista jezika:</h3>



<ol reversed> 
    @foreach ($jezici as $jez)


    <li>
        <a href='{{url("/languages/{$jez->language_id}/edit")}}'>
            <span class="label label-info">Edit</span></a>
   
        <form style="display:inline" name="language_delete" action="{{url("/languages/{$jez->language_id}")}}" method="POST" enctype="multipart/form-data">
            @method('delete')
            @csrf
            <button type="submit" style="color: blue">
                <i class="fa fa-trash" aria-hidden="true"></i>
            </button>
        </form>  

        <a href='{{url("/languages/{$jez->language_id}")}}'> {{$jez->name }} {{$jez->last_update}}</a>
    </li>

    @endforeach
</ol>

&nbsp;&nbsp;<a href='{{route('languages.create')}}'>
    <i class="fas fa-plus"></i> Dodaj novi jezik</a>
@endsection

@section('css')
<link rel="stylesheet" href="/css/app.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css">
@stop

@section('js')
<script> console.log('Hi!');</script>
@stop
