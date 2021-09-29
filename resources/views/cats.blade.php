@extends('layouts.app')

@section('content')



    <style>
        .demo-1 {
            overflow: hidden;
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
        }

    </style>

    {{-- content --}}
    <div class="container mt-5">

        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Nom</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($cats as $cat)

                    <tr class="bg-light">
                        <th scope="row">{{ $cat->name }}</th>
                        <td>
                            <a href="#"
                                class="btn btn-danger ">
                                Supprimer
                            </a>
                            <a href="#"
                                class="btn btn-primary ">
                                Editer
                            </a>
                        </td>
                    </tr>
                @empty

                    <span class="alert alert-danger" role="alert"> Pas de categorie</span>
                @endforelse

                <tr class="">
                    <td>
                        <a href="{{ route('cat.create') }}" class=" d-inline">
                            <svg style="font-size: 7rem; color: cornflowerblue;" xmlns="http://www.w3.org/2000/svg" width="25"
                                height="25" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
                                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                <path
                                    d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
        
                            </svg>
                        </a>
                    </td>
                </tr>
            </tbody>
        </table>
        <hr>




    </div>

@endsection
