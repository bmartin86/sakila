@extends('layouts.app')
@section('title', 'Uredi glumicu/glumca ')
@section('content_header')
<h1>Glumica/glumac</h1>
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
@error('message')
    <div class="alert alert-success">{{ $message }}</div>
@enderror

<h3>Uredi glumicu/glumca:</h3>


<form method="POST" action="/actors/{{$actor->actor_id}}" enctype="multipart/form-data">
    @method('PUT')
    @csrf
    <div class="form-group">
        <label for="actor_id"> id:</label><br>
        <input maxlength="191" type="number" name="actor_id" required="true" readonly="true"
               value="{{ $actor->actor_id }}"><br>

        <label for="first_name"> First name:</label>
        <br>
        <input maxlength="45" type="text" name="first_name" required="true"
               value="{{ $actor->first_name }}"><br>

        <label for="last_name"> Last name:</label><br>
        <input maxlength="45" type="text" name="last_name" required="true"
               value="{{ $actor->last_name }}"><br>
    </div>
    <div class="form-group">
        <input type="submit" name="actor_sbm" value="Izmijeni detalje glumice/glumca">
    </div>
</form>

@endsection

@section('css')
<link rel="stylesheet" href="/css/app.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css">
@stop

@section('js')
<script> console.log('Hi!');</script>
@stop