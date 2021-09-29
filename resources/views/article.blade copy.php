@extends('layouts.app')

@section('content')

    <div class="container">

        <div class="row">

            <div class="col">
                @if (session()->has('success'))
                    <div class="alert alert-success">
                        {{ session()->get('success') }}
                    </div>
                @endif
                {{-- edit link icon --}}
                @auth
                    <a href="{{ route('post.edit', ['id' => $post->id]) }}">
                        <svg style="color:blue" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-pencil-square" viewBox="0 0 16 16">
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
                    @endauth
                    <div class="container shadow-lg">
                        <h1 class="font-weight-bold">{{ $post->title }}</h1>
                        <hr>
                        <div class="float-lg-left" style="width:40% ;margin-right: 2%">
                            <img class="shadow-lg img-thumbnail " src="{{ Storage::url(getImage($post->image_id)->path) }}"
                                alt="Animations CSS modernes" style="width: 100%">
                        </div>
                        <div style="font-size: 120% ; text-align: justify; " class="d-inline">
                            {{ $post->content }} Lorem ipsum dolor sit amet consectetur adipisicing elit. Deserunt
                            magni fgfgfgexpedita sapiente quidem at distinctio est dolore explicabo, sint omnis, ipsum
                            necessitatibus, tenetur repudiandae quod similique voluptas tempora labore cum?
                            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Praesentium quia labore illum quaerat
                            est vel voluptas ullam dolore amet odit exercitationem autem, necessitatibus dicta voluptatibus
                            dignissimos, sed repellendus repudiandae. Sint.
                            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Praesentium veniam dolorum quasi ullam
                            ducimus nihil quo ab nam necessitatibus fugit iusto totam dignissimos aperiam sit fugiat,
                            voluptatum quia reiciendis. Porro.
                        </div>
                        <hr>
                        <span class="text-primary">
                            Rédiger le {{ $post->created_at->format('d/m/Y') }}

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
                            {{-- {{ $post->comment_number }} --}}

                            {{-- share icon --}}
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-share" viewBox="0 0 16 16">
                                <path
                                    d="M13.5 1a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3zM11 2.5a2.5 2.5 0 1 1 .603 1.628l-6.718 3.12a2.499 2.499 0 0 1 0 1.504l6.718 3.12a2.5 2.5 0 1 1-.488.876l-6.718-3.12a2.5 2.5 0 1 1 0-3.256l6.718-3.12A2.5 2.5 0 0 1 11 2.5zm-8.5 4a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3zm11 5.5a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3z" />
                            </svg> 0

                            By {{ getUser($post->user_id)->name }}
                        </span>
                    </div>
            </div>
        </div>
        <br>

        {{-- commments show --}}
        <form method="POST" id="commentForm" action="{{ route('comment.store') }}">
            @csrf
            <div class="container bg-white">
                <hr>
                <h4>Commentaires</h4>
                <hr>

                <div class="col" id="comment-container">
                    @forelse ($comments as $comment)
                        <div class="row" >
                            <p class="text-danger" >{{ getUser($comment->user_id)->name }} __:</p>
                            <p>{{ $comment->content }} 
                                <i>{{ Carbon\Carbon::parse($comment->created_at)->diffForHumans() ;}}</i> </p>
                        </div>
                    @empty
                        <span>Pas de commentaires</span>
                    @endforelse

                </div>
            </div>



            {{-- <form method="POST" action="{{ Route('comment.store') }}" > --}}
            <div class="form-group">
                <textarea name="content" id="content" cols="30" rows="3"
                    class="form-control  {{ $errors->has('content') ? 'is-invalid' : '' }} "
                    placeholder="Votre comentaire"></textarea>
                @if ($errors->has('content'))
                    <span class="invalid-feedback"> {{ $errors->first('content') }}</span>
                @endif
            </div>

            <input type="hidden" name="cpost_id_js" id="cpost_id_js" value="{{ $post->id }}">

            <button type="submit" class="btn btn-primary">Envoyer</button>

        </form>
    </div>



    {{-- <script>
    function commentStore(event){
        event.preventDefault()
        const comment=document.querySelector('#content').value
        console.log(comment)
        const url=document.querySelector('#commentForm').getAttribute('action')
        console.log(url)
        axios.post(`${url}`, {
    comment: comment,
  })
  .then(function (response) {
    console.log(response);
    
    // const posts=response.data.posts;
    // console.log(posts);
    
 })
  .catch(function (error) {
    console.log(error);
  });
    }

</script> --}}


<style>
    .chat
{
list-style: none;
margin: 0;
padding: 0;
}

.chat li
{
margin-bottom: 10px;
padding-bottom: 5px;
border-bottom: 1px dotted #B3A9A9;
}

.chat li.left .chat-body
{
margin-left: 60px;
}

.chat li.right .chat-body
{
margin-right: 60px;
}


.chat li .chat-body p
{
margin: 0;
color: #777777;
}

.panel .slidedown .glyphicon, .chat .glyphicon
{
margin-right: 5px;
}

.panel-body
{
overflow-y: scroll;
height: 250px;
}

::-webkit-scrollbar-track
{
-webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
background-color: #F5F5F5;
}

::-webkit-scrollbar
{
width: 12px;
background-color: #F5F5F5;
}

::-webkit-scrollbar-thumb
{
-webkit-box-shadow: inset 0 0 6px rgba(0,0,0,.3);
background-color: #555;
}

</style>

<link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<div class="container">
<div class="row">
    <div class="col-md-10">
        <div class="panel panel-default">
            <div class="panel-heading" id="accordion">
                <span class="glyphicon glyphicon-comment"></span> Commentaire
                <div class="btn-group pull-right">
                    <a type="button" class="btn btn-default btn-xs" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                        <span class="glyphicon glyphicon-chevron-down"></span>
                    </a>
                </div>
            </div>
        <div class="panel-collapse collapse" id="collapseOne">
            <div class="panel-body">
                <ul class="chat">

                    
                    <li class="left clearfix"><span class="chat-img pull-left">
                        <img src="http://placehold.it/50/55C1E7/fff&text=U" alt="User Avatar" class="img-circle" />
                    </span>
                        <div class="chat-body clearfix">
                            <div class="header">
                                <strong class="primary-font">Jack Sparrow</strong> <small class="pull-right text-muted">
                                    <span class="glyphicon glyphicon-time"></span>12 mins ago</small>
                            </div>
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur bibendum ornare
                                dolor, quis ullamcorper ligula sodales.
                            </p>
                        </div>
                    </li>



                    <li class="right clearfix"><span class="chat-img pull-right">
                        <img src="http://placehold.it/50/FA6F57/fff&text=ME" alt="User Avatar" class="img-circle" />
                    </span>
                        <div class="chat-body clearfix">
                            <div class="header">
                                <small class=" text-muted"><span class="glyphicon glyphicon-time"></span>13 mins ago</small>
                                <strong class="pull-right primary-font">Bhaumik Patel</strong>
                            </div>
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur bibendum ornare
                                dolor, quis ullamcorper ligula sodales.
                            </p>
                        </div>
                    </li>
                    <li class="left clearfix"><span class="chat-img pull-left">
                        <img src="http://placehold.it/50/55C1E7/fff&text=U" alt="User Avatar" class="img-circle" />
                    </span>
                        <div class="chat-body clearfix">
                            <div class="header">
                                <strong class="primary-font">Jack Sparrow</strong> <small class="pull-right text-muted">
                                    <span class="glyphicon glyphicon-time"></span>14 mins ago</small>
                            </div>
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur bibendum ornare
                                dolor, quis ullamcorper ligula sodales.
                            </p>
                        </div>
                    </li>
                    <li class="right clearfix"><span class="chat-img pull-right">
                        <img src="http://placehold.it/50/FA6F57/fff&text=ME" alt="User Avatar" class="img-circle" />
                    </span>
                        <div class="chat-body clearfix">
                            <div class="header">
                                <small class=" text-muted"><span class="glyphicon glyphicon-time"></span>15 mins ago</small>
                                <strong class="pull-right primary-font">Bhaumik Patel</strong>
                            </div>
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur bibendum ornare
                                dolor, quis ullamcorper ligula sodales.
                            </p>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="panel-footer">
                <div class="input-group">
                    <input id="btn-input" type="text" class="form-control input-sm" placeholder="Type your message here..." />
                    <span class="input-group-btn">
                        <button class="btn btn-warning btn-sm" id="btn-chat">
                            Send</button>
                    </span>
                </div>
            </div>
        </div>
        </div>
    </div>
</div>
</div>




    <div class="bg-light mt-5">
        <div class="container">
            <div class="row pt-4 pb-3">
                <div class="col">
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


    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    {{-- <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script> --}}
@endsection
