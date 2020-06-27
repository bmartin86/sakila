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
        <input maxlength="3" type="number" min=0 name="rental_duration" required="true"
               value="">
        <br>

        <label for="rental_rate"> Cijena najma:</label>
        <br>
        <input maxlength="4" type="number" name="rental_rate" required="true" min="0" max="999" step="0.01" 
               value="4.99">
        <br>

        <label for="length"> Duljina filma:</label>
        <br>
        <input maxlength="5" type="number" min=0 name="length" required="false"
               value="0">
        <br>

        <label for="replacement_cost"> Trošak oštećenja ili gubitka filma:</label>
        <br>
        <input maxlength="5" type="number" name="replacement_cost" required="true" min="0" max="9999" step="0.01" 
               value="19.99">
        <br>
        <br>

        <!-- rating radio button  'G','PG','PG-13','R','NC-17' -->

        <p>Odaberite kategoriju:</p>
        <input type="radio" id="rating_G" name="rating" value="G">
        <label for="rating_G">G</label><br>
        <input type="radio" id="rating_PG" name="rating" value="PG">
        <label for="rating_PG">PG</label><br>  
        <input type="radio" id="rating_PG13" name="rating" value="PG-13">
        <label for="rating_PG13">PG-13</label><br>
        <input type="radio" id="rating_R" name="rating" value="R">
        <label for="rating_R">R</label><br>
        <input type="radio" id="rating_NC17" name="rating" value="NC-17">
        <label for="rating_NC17">NC-17</label><br> <br>


        <!-- special_features CHECKBOX 'Trailers','Commentaries','Deleted Scenes','Behind the Scenes' -->
        <p>Odaberite dodatke:</p>
        <input type="checkbox" id="Trailers" name="special_features[]" value="Trailers">
        <label for="Trailers"> Trailers</label><br>
        <input type="checkbox" id="Commentaries" name="special_features[]" value="Commentaries">
        <label for="Commentaries"> Commentaries</label><br>
        <input type="checkbox" id="DeletedScenes" name="special_features[]" value="Deleted Scenes">
        <label for="DeletedScenes"> Deleted Scenes</label><br>  
        <input type="checkbox" id="BehindtheScenes" name="special_features[]" value="Behind the Scenes">
        <label for="BehindtheScenes">Behind the Scenes</label><br>

    </div>
    <div class="form-group">
        <input type="submit" name="dodaj_film_sbm" value="Dodaj novi film">
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