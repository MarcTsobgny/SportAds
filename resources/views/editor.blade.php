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
                    <th scope="col">Email</th>
                    <th scope="col">Posts</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr class="bg-light">
                    <th scope="row">{{ $editor->name }}</th>
                    <td>{{ $editor->email }}</td>
                    <td>{{ $posts->count() }}</td>
                    <td>
                        <a href="{{ route('editor.delete',['id'=>$editor->id]) }}" class="btn btn-danger {{ getAdminUser()->id == $editor->id ? 'disabled' : '' }}  ">
                            Supprimer
                        </a>
                        <a href="" class="btn btn-warning {{ getAdminUser()->id == $editor->id ? 'disabled' : '' }}  ">
                            Bloquer
                        </a>
                    </td>
                </tr>

            </tbody>
        </table>
        <hr>

        {{-- articles --}}


        <div class="row" id="postsList">

            @forelse ($posts as $post)

                <div class="col-12 col-lg-4">
                    {{-- edit link icon --}}
                    @auth
                        @if (Auth::user()->is_admin == 1 || Auth::user()->id == $post->user_id)


                            <a href="{{ route('post.edit', ['id' => $post->id]) }}">
                                <svg style="color:blue" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                    <path
                                        d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                    <path fill-rule="evenodd"
                                        d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                </svg>

                                {{-- delete link icon --}}
                                <a href="{{ route('post.delete', ['id' => $post->id]) }}"
                                    onclick="return confirm('Etes vous de vouloir supprimer cette annonce?')">
                                    <svg style="color: red" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="bi bi-x-circle-fill" viewBox="0 0 16 16">
                                        <path
                                            d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293 5.354 4.646z" />
                                    </svg>


                                </a>
                        @endif
                    @endauth

                    <div class="card mb-4 mb-lg-4 shadow " id="card">
                        <div class="card-header text-right bg-success" style="height:50px">
                            <h5 class="float-right">

                                {{-- category --}}
                                {{ getCategory($post->category_id)->name }}
                                <img src="{{ Storage::url(getImage(getCategory($post->category_id)->image_id)->path) }}"
                                    width="10%" height="10%" alt="">
                            </h5>

                        </div>

                        <div class="card-body">
                            <h4 class="card-title font-weight-bold">{{ $post->title }}</h5>
                                <img src="{{ Storage::url(getImage($post->image_id)->path) }}"
                                    alt="Animations CSS modernes" class="card-img-top" height="150px">
                                <p class="card-text demo-1">
                                    {{ $post->content }}
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Perspiciatis corporis fuga
                                    doloribus blanditiis quasi dicta deleniti asperiores veniam, magnam odit nulla quo porro
                                    necessitatibus aut eos ut ea quos maiores.
                                </p>
                                <a href="{{ route('posts.show', ['id' => $post->id]) }}"
                                    class="btn btn-success {{-- stretched-link --}} ">Lire l'article</a>
                                Redigé par <span class="text-danger">{{ getUser($post->user_id)->name }}</span>
                        </div>
                        <div class="card-footer text-muted">
                            {{-- {{ Carbon\Carbon::parse($post->created_at)->format('d/m/Y') }} --}}
                            {{ Carbon\Carbon::parse($post->created_at)->diffForHumans() }}

                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-eye" viewBox="0 0 16 16">
                                <path
                                    d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z" />
                                <path
                                    d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z" />
                            </svg>
                            {{ $post->view_number }}

                            {{-- comment icon --}}
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-chat" viewBox="0 0 16 16">
                                <path
                                    d="M2.678 11.894a1 1 0 0 1 .287.801 10.97 10.97 0 0 1-.398 2c1.395-.323 2.247-.697 2.634-.893a1 1 0 0 1 .71-.074A8.06 8.06 0 0 0 8 14c3.996 0 7-2.807 7-6 0-3.192-3.004-6-7-6S1 4.808 1 8c0 1.468.617 2.83 1.678 3.894zm-.493 3.905a21.682 21.682 0 0 1-.713.129c-.2.032-.352-.176-.273-.362a9.68 9.68 0 0 0 .244-.637l.003-.01c.248-.72.45-1.548.524-2.319C.743 11.37 0 9.76 0 8c0-3.866 3.582-7 8-7s8 3.134 8 7-3.582 7-8 7a9.06 9.06 0 0 1-2.347-.306c-.52.263-1.639.742-3.468 1.105z" />
                            </svg>
                            {{ getCommentCount($post->id) }}

                            {{-- share icon --}}
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-share" viewBox="0 0 16 16">
                                <path
                                    d="M13.5 1a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3zM11 2.5a2.5 2.5 0 1 1 .603 1.628l-6.718 3.12a2.499 2.499 0 0 1 0 1.504l6.718 3.12a2.5 2.5 0 1 1-.488.876l-6.718-3.12a2.5 2.5 0 1 1 0-3.256l6.718-3.12A2.5 2.5 0 0 1 11 2.5zm-8.5 4a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3zm11 5.5a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3z" />
                            </svg> 0

                            {{-- like icon --}}
                            {{-- <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-suit-heart" viewBox="0 0 16 16">
                                <path d="m8 6.236-.894-1.789c-.222-.443-.607-1.08-1.152-1.595C5.418 2.345 4.776 2 4 2 2.324 2 1 3.326 1 4.92c0 1.211.554 2.066 1.868 3.37.337.334.721.695 1.146 1.093C5.122 10.423 6.5 11.717 8 13.447c1.5-1.73 2.878-3.024 3.986-4.064.425-.398.81-.76 1.146-1.093C14.446 6.986 15 6.131 15 4.92 15 3.326 13.676 2 12 2c-.777 0-1.418.345-1.954.852-.545.515-.93 1.152-1.152 1.595L8 6.236zm.392 8.292a.513.513 0 0 1-.784 0c-1.601-1.902-3.05-3.262-4.243-4.381C1.3 8.208 0 6.989 0 4.92 0 2.755 1.79 1 4 1c1.6 0 2.719 1.05 3.404 2.008.26.365.458.716.596.992a7.55 7.55 0 0 1 .596-.992C9.281 2.049 10.4 1 12 1c2.21 0 4 1.755 4 3.92 0 2.069-1.3 3.288-3.365 5.227-1.193 1.12-2.642 2.48-4.243 4.38z"/>
                              </svg> --}}


                            {{-- Like icon --}}
                            {{-- si connecter, requête ajax --}}
                            <form action="{{ route('posts.like') }}" method="post" id="likeForm" class="float-lg-right">
                                @csrf
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" id="likeIcon"
                                    fill="currentColor" class="bi bi-suit-heart" viewBox="0 0 16 16">
                                    <path
                                        d="m8 6.236-.894-1.789c-.222-.443-.607-1.08-1.152-1.595C5.418 2.345 4.776 2 4 2 2.324 2 1 3.326 1 4.92c0 1.211.554 2.066 1.868 3.37.337.334.721.695 1.146 1.093C5.122 10.423 6.5 11.717 8 13.447c1.5-1.73 2.878-3.024 3.986-4.064.425-.398.81-.76 1.146-1.093C14.446 6.986 15 6.131 15 4.92 15 3.326 13.676 2 12 2c-.777 0-1.418.345-1.954.852-.545.515-.93 1.152-1.152 1.595L8 6.236zm.392 8.292a.513.513 0 0 1-.784 0c-1.601-1.902-3.05-3.262-4.243-4.381C1.3 8.208 0 6.989 0 4.92 0 2.755 1.79 1 4 1c1.6 0 2.719 1.05 3.404 2.008.26.365.458.716.596.992a7.55 7.55 0 0 1 .596-.992C9.281 2.049 10.4 1 12 1c2.21 0 4 1.755 4 3.92 0 2.069-1.3 3.288-3.365 5.227-1.193 1.12-2.642 2.48-4.243 4.38z" />
                                </svg>
                                <span id="likeCount"> {{ $post->likes->count() }} </span>
                                <span>{{ $post->likes->get('post_id') }}</span>
                                <input type="hidden" name="post_id_js" id="post_id_js" value="{{ $post->id }}">



                            </form>
                            {{-- dans le cas contaire lien vers login --}}

                        </div>
                    </div>

                </div>
            @empty
                <span class="alert alert-danger" role="alert"> Pas d'annonces</span>
            @endforelse





        @endsection
