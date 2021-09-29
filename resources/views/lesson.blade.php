@extends('layouts.app')

@section('content')

    <div class="container">
     
      <div class="row">
        <div class="col">
          <h1>Créez des animations CSS</h1>
        </div>
      </div>
      <div class="row">
        <div class="col">
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            <h5 class="alert-heading">Prérequis</h5>
            <p>Bases en CSS. Si vous ne les maîtrisez pas, suivez ce cours : 
              <a class="alert-link">Apprenez à créer votre site web avec HTML5 et CSS3</a> </p>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
               <span aria-hidden="true">×</span>
            </button>
         </div>
          <div class="embed-responsive embed-responsive-16by9 shadow-lg">
            <iframe
              
              class="embed-responsive-item "
              src="https://www.youtube.com/embed/lOox4UJVFb4"
              frameborder="0"
              allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
              allowfullscreen>
            </iframe>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col">
          <h2>À la fin de ce cours, vous serez capable de :</h2>
          <ul>
            <li>réaliser vos premières animations CSS ;</li>
            <li>maîtriser les translations, les rotations et l’opacité ;</li>
            <li>réaliser des animations dynamiques.</li>
          </ul>
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
 @endsection
