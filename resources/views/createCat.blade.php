@extends('layouts.app')

@section('content')
    <div class="container">

        <h1>Creer une Nouvelle categorie</h1>

        <hr>
        <form method="POST" action="{{ Route('cat.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name">Nom de la categorie :</label>
                <input type="name" class="form-control  {{ $errors->has('name') ? 'is-invalid' : '' }}" id="name"
                    aria-describedby="name" name="name">

                @if ($errors->has('name'))
                    <span class="invalid-feedback"> {{ $errors->first('name') }}</span>
                @endif
            </div>

            <div class="form-group">
                <label for="image">Choisir un logo :</label>
                <input type="file" class="form-control {{ $errors->has('image') ? 'is-invalid' : '' }} " id="image"
                    aria-describedby="image" name="image">
                @if ($errors->has('image'))
                    <span class="invalid-feedback"> {{ $errors->first('image') }}</span>
                @endif
            </div>


            <button type="submit" class="btn btn-primary">Soumettre</button>
        </form>

    </div>
@endsection
