@extends('layouts.app')

@section('content')
    <div class="container">

        <h1>Modifier une annonce</h1>
        <hr>
        <form method="POST" action="{{ Route('post.update') }}" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="post_id" value="{{ $post->id }}">
            <div class="form-group">
                <label for="category">Choisir une catégorie</label>
                <select name="category" id="category" class="form-select " ">
                    <option value="{{ $post->category_id }}" selected>{{ getCategory($post->category_id)->name }}</option>
                    @forelse ($cats as $cat )

                        <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                    @empty
                        <option value="1">Aucune categorir</option>

                    @endforelse
                </select>
                {{-- boutton plus --}}
                <a href="{{ route('cat.create') }}">
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
                    aria-describedby="title" name="title" value="{{ $post->title }}">

                @if ($errors->has('title'))
                    <span class="invalid-feedback"> {{ $errors->first('title') }}</span>
                @endif
            </div>

            <div class="form-group">
                <label for="content">Description de l'annoce</label>
                <textarea class="form-control {{ $errors->has('content') ? 'is-invalid' : '' }} " cols="30" rows="10"
                    id="content" name="content">{{ $post->content }}</textarea>

                @if ($errors->has('content'))
                    <span class="invalid-feedback"> {{ $errors->first('content') }}</span>
                @endif
            </div>


            <div class="form-group">
                <label for="image">Changer une image</label>
                <input type="file" class="form-control {{ $errors->has('image') ? 'is-invalid' : '' }} " id="image"
                    aria-describedby="image" name="image" >
                    <input type="hidden" name="image_id" value="{{ $post->image_id }}">
                  
                @if ($errors->has('image'))
                    <span class="invalid-feedback"> {{ $errors->first('image') }}</span>
                @endif
            </div>



            <button type="submit" class="btn btn-primary">Soumettre</button>
        </form>

    </div>
@endsection
