<h1 style="color: rgb(9, 87, 9)">Nouvelle Annone Poster par <span style="color: rgb(11, 116, 116)">{{ getUser($post->user_id)->name }}</span></h1>
<hr>
<h2>{{ $post->title }}</h4>
    <a style="font-weight: bold;" href="{{ route('posts.show', ['id' => $post->id]) }}">Consulter le post</a>
