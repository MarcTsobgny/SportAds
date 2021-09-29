@extends('layouts.app')

@section('content')

    <script>
        alert(
            "PPage pour profil de redacteur,devenir recdacteur,et validation par admin et regarder tailler image like ward menu"
        )
        alert("marc repo")
    </script>


    <style>
        .demo-1 {
            overflow: hidden;
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
        }

        /* .wrapper {
                                                                    padding: 20px;
                                                                    background: #eaeaea;
                                                                    max-width: 400px;
                                                                    margin: 50px auto;
                                                                  }
                                                                  
                                                                  .demo-2 {
                                                                    overflow: hidden;
                                                                    white-space: nowrap;
                                                                    text-overflow: ellipsis;
                                                                    max-width: 450px;
                                                                  } */

    </style>
    {{-- <div class="wrapper">
    <p class="demo-1">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ut odio temporibus voluptas error distinctio hic quae corrupti vero doloribus optio! Inventore ex quaerat modi blanditiis soluta maiores illum, ab velit.</p>
  </div>
  
  <div class="wrapper">
    <p class="demo-2">2222Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ut odio temporibus voluptas error distinctio hic quae corrupti vero doloribus optio! Inventore ex quaerat modi blanditiis soluta maiores illum, ab velit.</p>
  </div> --}}


    {{-- content --}}
    <div class="container mt-5">

        {{-- carousel --}}
        <div class="row">
            <div class="col">
                @if (session()->has('success'))
                    <div class="alert alert-success">
                        {{ session()->get('success') }}
                    </div>

                @endif
                <h1>A la une</h1>
                <div id="carouselControls" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        @foreach ($posts as $post)

                            <div class="carousel-item ">
                                <div class="container">
                                    <div class="carousel-caption text-start ">
                                        <h1 class="text-success rounded-lg font-weight-bold "
                                            style="font-size: 220%; font-family: 'Lucida Sans'; background-color: rgba(23, 31, 21,0.7)">
                                            {{ $post->title }}</h1>
                                        <a href="{{ route('posts.show', ['id' => $post->id]) }}"
                                            class=" text-danger font-weight-bold stretched-link ">Lire l'article</a>
                                    </div>
                                    <img src="{{ Storage::url(getImage($post->image_id)->path) }}"
                                        class=" rounded mx-auto img-thumbnail w-100" alt="..."
                                        style=" width:100%; height: 350px ;">

                                </div>

                            </div>
                        @endforeach
                        <div class="carousel-item active">
                            <img src="{{ Storage::url('posts/imagePP.jpg') }}" class="d-block img-thumbnail  w-100"
                                alt="..." style=" width:100%; height: 350px ;">
                            <div class="container">
                                <div class="carousel-caption text-start">
                                    <h1 class="text-success rounded-lg font-weight-bold "
                                        style="font-size: 220%; font-family: 'Lucida Sans'; background-color: rgba(23, 31, 21,0.7)">
                                        Bienvenu sur sport Ad</h1>

                                </div>

                            </div>
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselControls" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Précédent</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselControls" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Suivant</span>
                    </a>
                </div>
            </div>
        </div>

        <br>

        {{-- scearch input --}}
        <div class="row mb-3">
            <div class="col">
                @csrf
                <form method="post" action="{{ route('post.search') }}" id="searchForm">

                    <input class="form-control" id="searchInput" type="text" placeholder="Search..">
                </form>
            </div>
        </div>


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

                                @if (Auth::user()->is_admin == 1)

                                    {{-- delete link icon --}}
                                    <a href="{{ route('post.delete', ['id' => $post->id]) }}"
                                        onclick="return confirm('Etes vous de vouloir supprimer cette annonce?')">
                                        <svg style="color: red" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-x-circle-fill" viewBox="0 0 16 16">
                                            <path
                                                d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293 5.354 4.646z" />
                                        </svg>
                                @endif

                        @endif

                        </a>
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

                                @auth
                                    <button type="submit" class="btn ">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                                            class="bi bi-hand-thumbs-up-fill float-right" viewBox="0 0 16 16" id="like">
                                            <path
                                                d="M6.956 1.745C7.021.81 7.908.087 8.864.325l.261.066c.463.116.874.456 1.012.965.22.816.533 2.511.062 4.51a9.84 9.84 0 0 1 .443-.051c.713-.065 1.669-.072 2.516.21.518.173.994.681 1.2 1.273.184.532.16 1.162-.234 1.733.058.119.103.242.138.363.077.27.113.567.113.856 0 .289-.036.586-.113.856-.039.135-.09.273-.16.404.169.387.107.819-.003 1.148a3.163 3.163 0 0 1-.488.901c.054.152.076.312.076.465 0 .305-.089.625-.253.912C13.1 15.522 12.437 16 11.5 16H8c-.605 0-1.07-.081-1.466-.218a4.82 4.82 0 0 1-.97-.484l-.048-.03c-.504-.307-.999-.609-2.068-.722C2.682 14.464 2 13.846 2 13V9c0-.85.685-1.432 1.357-1.615.849-.232 1.574-.787 2.132-1.41.56-.627.914-1.28 1.039-1.639.199-.575.356-1.539.428-2.59z" />
                                        </svg>

                                    </button>
                                @else
                                    <a href="{{ route('login') }}" class="btn ">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                                            class="bi bi-hand-thumbs-up-fill float-right" viewBox="0 0 16 16" id="like">
                                            <path
                                                d="M6.956 1.745C7.021.81 7.908.087 8.864.325l.261.066c.463.116.874.456 1.012.965.22.816.533 2.511.062 4.51a9.84 9.84 0 0 1 .443-.051c.713-.065 1.669-.072 2.516.21.518.173.994.681 1.2 1.273.184.532.16 1.162-.234 1.733.058.119.103.242.138.363.077.27.113.567.113.856 0 .289-.036.586-.113.856-.039.135-.09.273-.16.404.169.387.107.819-.003 1.148a3.163 3.163 0 0 1-.488.901c.054.152.076.312.076.465 0 .305-.089.625-.253.912C13.1 15.522 12.437 16 11.5 16H8c-.605 0-1.07-.081-1.466-.218a4.82 4.82 0 0 1-.97-.484l-.048-.03c-.504-.307-.999-.609-2.068-.722C2.682 14.464 2 13.846 2 13V9c0-.85.685-1.432 1.357-1.615.849-.232 1.574-.787 2.132-1.41.56-.627.914-1.28 1.039-1.639.199-.575.356-1.539.428-2.59z" />
                                        </svg>

                                    </a>
                                @endauth

                            </form>
                            {{-- dans le cas contaire lien vers login --}}

                        </div>
                    </div>

                </div>
            @empty
                <span class="alert alert-danger" role="alert"> Pas d'annonces</span>
            @endforelse




        </div>
        {{-- <nav aria-label="Page navigation example">
            <ul class="pagination">
                <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item"><a class="page-link" href="#">Next</a></li>
            </ul>
            {{ $posts->links() }}
        </nav> --}}
    </div>






    <div class="bg-light mt-5">
        <div class="container">
            <div class="row pt-4 pb-3">
                <div class="col">

                    <div class="d-flex justify-content-center">
                        {!! $posts->links() !!}
                    </div>
                    <ul class="list-inline text-center">
                        <li class="list-inline-item"><a href="#">À propos</a></li>
                        <li class="list-inline-item">&middot;</li>
                        <li class="list-inline-item"><a href="#">Vie privée</a></li>
                        <li class="list-inline-item">&middot;</li>
                        <li class="list-inline-item"><a href="#">Conditions d'utilisations</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $("#searchInput").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#postsList .col-12").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
        });
    </script>

@endsection

@section('extra-js')
    {{-- <script>
    function search(event){
        event.preventDefault();
        const words=document.querySelector('#searchInput').value
        console.log(words)

        const url=document.querySelector('#searchForm').getAttribute('action')
        console.log(url)
        axios.post(`${url}`, {
    words: words,
  })
  .then(function (response) {
    console.log(response);
    
    const posts=response.data.posts;
    console.log(posts);
    let results=document.querySelector('#postsList')
    results.innerHTML=posts[0].title
    for(let i=0; i<posts.length; i++){
        let card=document.createElement('div');
        let cardBody =document.createElement('div')
        cardBody.classList.add('card-body')
        card.classList.add('card','mb-3')
        let title=document.createElement('h5');
        title.classlist.add('card-title')
        title.innerHTML=posts[i].title
        let content=document.createElement('p')
        content.classList('card-text')
        content.innerHTML=posts[i].content
        cardBody.appendChild(title)
        cardBody.appendChild(content)
        card.appendChild(cardBody)
        results.appendChild(card)
    }
  })
  .catch(function (error) {
    console.log(error);
  });
    }
</script> --}}
@endsection
