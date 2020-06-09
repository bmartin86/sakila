@extends('layouts.app')
@section('title', 'Dodaj film')
@section('content_header')
<h1>Novi film</h1>
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

@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif

<h3>Dodaj novi film:</h3>


<form method="POST" action="/films" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="title"> Naziv filma:</label>
        <br>
        <input maxlength="128" type="text" name="title" required="true" value="">
        <br>

        <label for="description"> Opis:</label>
        <br>
        <textarea name="description" rows="4" cols="20" required="false" value="">
        </textarea>
        <br>
        
        <label for="release_year"> Godina:</label>
        <br>
        <input min="1950" max="2020" type="number" name="release_year" required="true"
               value="">
        <br>
        <br>
         
        <label for="language_id"> Jezik prijevoda:</label>
        &nbsp;
        <select name="language_id" required="true">
            <option value=""></option>
            @foreach ($lista_jezika as $lang)
            <option value="{{$lang->language_id}}">{{$lang->name}}</option>
            @endforeach
        </select>
        &nbsp;
        
        <label for="original_language_id"> Jezik originala:</label>
        &nbsp;
        <select name="original_language_id">
            <option value=""></option>
            @foreach ($lista_jezika as $lang)
            <option value="{{$lang->language_id}}">{{$lang->name}}</option>
            @endforeach
        </select>
        <br>
        
        <label for="rental_duration"> Duljina najma:</label
        ><br>
        <input maxlength="3" type="number" name="rental_duration" required="true"
               value="">
        <br>
        
        <label for="rental_rate"> Opis:</label>
        <br>
        <input maxlength="3" type="number" name="rental_rate" required="false"
               value="">
        <br>
        
        
        /*
        
	`rental_duration` TINYINT(3) UNSIGNED NOT NULL,
	`rental_rate` DECIMAL(4,2) NOT NULL DEFAULT 4.99,
	`length` SMALLINT(5) UNSIGNED NULL DEFAULT NULL,
	`replacement_cost` DECIMAL(5,2) NOT NULL DEFAULT 19.99,
	`rating` ENUM('G','PG','PG-13','R','NC-17') NULL DEFAULT 'G' COLLATE 'utf8mb4_general_ci',
	`special_features` SET('Trailers','Commentaries','Deleted Scenes','Behind the Scenes') NULL DEFAULT NULL COLLATE 'utf8mb4_general_ci',
	`last_update` TIMESTAMP NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
	`created_at` TIMESTAMP NULL DEFAULT NULL,
	`updated_at` TIMESTAMP NULL DEFAULT NULL
)
        
        */
        
        
        
        
        
        
        
        
        
        
        
        
    </div>
    <div class="form-group">
        <input type="submit" name="actor_sbm" value="Dodaj glumca/glumicu">
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