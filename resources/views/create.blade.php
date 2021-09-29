@extends('layouts.app')

@section('content')
    <div class="container">

        <h1>Déposer une annonce</h1>

        <hr>
        <form method="POST" action="{{ Route('post.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="category" class="d-block">Choisir une catégorie</label>
                
                <select required name="category"  id="category"  class="form-control  d-inline {{ $errors->has('category') ? 'is-invalid' : '' }} " style="width: 30%"  >
                    <option selected>...</option>
                    @forelse ($cats as $cat )

                        <option value="{{ $cat->id }}">{{ $cat->name }}   </option>
                    @empty
                        <option class="alert alert-danger " value="1">Aucune categorie</option>

                    @endforelse

                    @if ($errors->has('category')) 
                    <span class="invalid-feedback"> {{ $errors->first('category') }}</span>
                    @endif
                </select>


                {{-- boutton plus --}}
                <a href="{{ route('cat.create') }}" class=" d-inline">
                    <svg style="font-size: 7rem; color: cornflowerblue;" xmlns="http://www.w3.org/2000/svg" width="25"
                        height="25" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                        <path
                            d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />

                    </svg>
                </a>

            </div>
            <div class="form-group">
                <label for="title">Titre de l'annoce</label>
                <input type="text" class="form-control  {{ $errors->has('title') ? 'is-invalid' : '' }}" id="title"
                    aria-describedby="title" name="title">

                @if ($errors->has('title'))
                    <span class="invalid-feedback"> {{ $errors->first('title') }}</span>
                @endif
            </div>

            <div class="form-group">
                <label for="content">Description de l'annoce</label>
                <textarea class="form-control {{ $errors->has('content') ? 'is-invalid' : '' }} " cols="30" rows="10"
                    id="content" name="content"></textarea>

                @if ($errors->has('content'))
                    <span class="invalid-feedback"> {{ $errors->first('content') }}</span>
                @endif
            </div>


            <div class="form-group">
                <label for="image">Choisir une image</label>
                <input type="file" accept=".jpg, .jpeg, .png" class="form-control-file {{ $errors->has('image') ? 'is-invalid' : '' }} " id="image"
                    aria-describedby="image" name="image">
                @if ($errors->has('image'))
                    <span class="invalid-feedback"> {{ $errors->first('image') }}</span>
                @endif
            </div>




            {{-- @guest
          <h1>Vos informations</h1>

          <div class="form-group">
            <label for="name">Votre nom</label>
            <input type="text" class="form-control  {{ $errors->has('name')? 'is-invalid' : '' }}" id="name" aria-describedby="name" name="name">
          
            @if ($errors->has('name'))
            <span class="invalid-feedback">  {{ $errors->first('name') }}</span>
        @endif
          </div>

          <div class="form-group">
            <label for="email">Votre email</label>
            <input type="email" class="form-control  {{ $errors->has('email')? 'is-invalid' : '' }}" id="email" aria-describedby="email" name="email">
          
            @if ($errors->has('email'))
            <span class="invalid-feedback">  {{ $errors->first('email') }}</span>
        @endif
          </div>

          <div class="form-group">
            <label for="password">Mot de passe</label>
            <input type="password" class="form-control  {{ $errors->has('password')? 'is-invalid' : '' }}" id="password" aria-describedby="password" name="password">
          
            @if ($errors->has('password'))
            <span class="invalid-feedback">  {{ $errors->first('password') }}</span>
        @endif
          </div>

          <div class="form-group">
            <label for="password_confirmation">Confirm Mot de passe</label>
            <input type="password" class="form-control  {{ $errors->has('password_confirmation')? 'is-invalid' : '' }}" id="password_confirmation" aria-describedby="password_confirmation" name="password_confirmation">
          
            @if ($errors->has('password_confirmation'))
            <span class="invalid-feedback">  {{ $errors->first('password_confirmation') }}</span>
        @endif
          </div>

          


      @endguest --}}


            <button type="submit" class="btn btn-primary">Soumettre</button>
        </form>

    </div>
@endsection
