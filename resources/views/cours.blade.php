@extends('layouts.app')

@section('content')
  <div class="container">
    
    <div class="row">
      <div class="col">
        <h1>Cours</h1>
      </div>
    </div>
    <div class="row mb-3">
      <div class="col">
         <input class="form-control" id="searchInput" type="text" placeholder="Search..">
      </div>
   </div>
    <div class="row" id="lessonList">
      <div class="col-12 col-lg-4">
        <div class="card mb-4 mb-lg-0 shadow">
          <img src="{{ Storage::url('images/leçon/css.jpeg') }}" alt="Animations CSS modernes" class="card-img-top">
          <div class="card-body">
            <h5 class="card-title">Créez des animations CSS</h5>
            <p class="card-text">Vous allez plonger dans le monde des animations CSS pour donner vie à vos pages web !</p>
            <a href="{{ route('lesson') }}" class="btn btn-primary stretched-link ">Démarrer l'apprentissage</a>
            </div>
        </div>
      </div>
      <div class="col-12 col-lg-4">
        <div class="card mb-4 mb-lg-0 shadow">
          <img src="{{ Storage::url('images/leçon/js.jpeg') }}" alt="Programmation JavaScript" class="card-img-top">
          <div class="card-body">
            <h5 class="card-title">Programmer avec JavaScript</h5>
            <p class="card-text">Ce cours est conçu pour vous enseigner les bases du langage de programmation JavaScript.</p>
            <a href="lesson-1.html" class="btn btn-primary stretched-link">Démarrer l'apprentissage</a>
          </div>
        </div>
      </div>
      <div class="col-12 col-lg-4">
        <div class="card mb-4 mb-lg-0 shadow">
          <img src="{{ Storage::url ('images/leçon/swift.jpeg') }}" alt="Programmation Swift" class="card-img-top">
          <div class="card-body">
            <h5 class="card-title">Les fondamentaux de Swift</h5>
            <p class="card-text">Découvrez le développement iOS et réalisez des applications taillées pour l'iPhone et l'iPad !</p>
            <a href="lesson-1.html" class="btn btn-primary stretched-link">Démarrer l'apprentissage</a>
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
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

  <script>
    $(document).ready(function(){
       $("#searchInput").on("keyup", function() {
          var value = $(this).val().toLowerCase();
          $("#lessonList .col-12").filter(function() {
             $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
          });
       });
    });
 </script>
@endsection
