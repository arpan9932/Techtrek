<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>TechTrek</title>
    <link rel="icon" href="/images/logo.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body>
    @include('layout.header')
        <!-- slider -->
       {{--  <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img src="https://source.unsplash.com/random/1600x400/?Gadgets" class="d-block w-100" alt="...">
              <div class="mask text-light d-flex justify-content-center flex-column text-center" style="background-color: rgba(0, 0, 0, 0.5)">
                <h4>Custom heading</h4>
                <p class="m-0">paragraph</p>
              </div>
              <div class="carousel-caption d-none d-md-block">
                <div class="col-md-6 px-0">
                  <h1 class="display-4 fst-italic">Title of a longer featured blog post</h1>
                  <p class="lead my-3">Multiple lines of text that form the lede, informing new readers quickly and efficiently about what’s most interesting in this post’s contents.</p>
                  <p class="lead mb-0"><a href="#" class="text-white fw-bold">Continue reading...</a></p>
                </div>
              </div>
            </div>
            <div class="carousel-item">
              <img src="https://source.unsplash.com/random/1600x400/?Tech" class="d-block w-100" alt="...">
              <div class="carousel-caption d-none d-md-block">
                <div class="col-md-6 px-0">
                  <h1 class="display-4 fst-italic">Title of a longer featured blog post</h1>
                  <p class="lead my-3">Multiple lines of text that form the lede, informing new readers quickly and efficiently about what’s most interesting in this post’s contents.</p>
                  <p class="lead mb-0"><a href="#" class="text-white fw-bold">Continue reading...</a></p>
                </div>
              </div>
            </div>
            <div class="carousel-item">
              <img src="https://source.unsplash.com/random/1600x400/?Cybersecurity" class="d-block w-100" alt="...">
              <div class="carousel-caption d-none d-md-block">
                <div class="col-md-6 px-0">
                  <h1 class="display-4 fst-italic">Title of a longer featured blog post</h1>
                  <p class="lead my-3">Multiple lines of text that form the lede, informing new readers quickly and efficiently about what’s most interesting in this post’s contents.</p>
                  <p class="lead mb-0"><a href="#" class="text-white fw-bold">Continue reading...</a></p>
                </div>
              </div>
            </div>
          </div>
          <button class="carousel-control-prev" type="button" data-target="#carouselExampleCaptions" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-target="#carouselExampleCaptions" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </button>
        </div> --}}
        {{-- end slider --}}

        {{-- container --}}

        <div class="container mt-4">
          @if(Session::has('message'))
          <div class="alert alert-danger d-flex align-items-center" role="alert">
            <i class="bi bi-exclamation-triangle-fill"></i> &ensp;
            <div>
              {{ Session::get('message') }}
            </div>
          </div>
          @endif
          @if(Session::has('status'))
          <div class="alert alert-success d-flex align-items-center" role="alert">
            <i class="bi bi-check-circle"></i>&ensp;
            <div>
              {{ Session::get('status') }}
            </div>
          </div>
          @endif
          @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
          <div class="row">
            <div class="col-11">
              <div class="row mb-3">
                @foreach ( $posts as $id)
              <div class="col-md-6">
                <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                  <div class="col p-4 d-flex flex-column position-static">
                    <h6 class="mb-0">{{ $id->title }}</h6>
                    <div class="mb-1 text-muted">{{ $id->created_date }}</div>
                    <p class="card-text mb-auto">{{ $id->truncated_details }}</p>
                    <a href="{{ route('posts.show', $id->slug) }}" class="stretched-link">Continue reading</a>
                  </div>
                  <div class="col-auto d-none d-lg-block">
                    <img src="{{ Storage::url('images/' . $id->image)}}" class="bd-placeholder-img" alt="{{ $id->catagory }}" width="200" height="250">
                  </div>
                </div>
              </div>
              @endforeach
            </div>
            <div class="pagination justify-content-end">
              {{ $posts->links('pagination::bootstrap-4'); }}
          </div>
          </div>
            <div class="col-1 position-relative mb-5">
              @auth
              <a href="{{ route('addblog') }}"><button type="button" class="btn btn-primary btn-lg rounded-circle position-absolute top-100 start-50 translate-middle"><i class="bi bi-plus"></i></button></a>
              @endauth
            

              
              
          </div>

          
        </div>

<footer>
  <div class="container">
    <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
      <div class="col-md-4 d-flex align-items-center">
        <a href="/" class="mb-3 me-2 mb-md-0 text-muted text-decoration-none lh-1">
          <svg class="bi" width="30" height="24"><use xlink:href="#bootstrap"/></svg>
        </a>
        <span class="text-muted">&copy; 2021 Company, Inc</span>
      </div>
  
      <ul class="nav col-md-4 justify-content-end list-unstyled d-flex">
        <li class="ms-3"><a class="text-muted" href="#"><svg class="bi" width="24" height="24"><use xlink:href="#twitter"/></svg></a></li>
        <li class="ms-3"><a class="text-muted" href="#"><svg class="bi" width="24" height="24"><use xlink:href="#instagram"/></svg></a></li>
        <li class="ms-3"><a class="text-muted" href="#"><svg class="bi" width="24" height="24"><use xlink:href="#facebook"/></svg></a></li>
      </ul>
    </footer>
  </div>
  
</footer>



          <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
          <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
          <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
          <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
          <script>
            $(document).ready(function() {
    // Set a timeout to automatically hide the alert after 1 second (1000 milliseconds)
    window.setTimeout(function() {
        // Fade the alert to 0 opacity over 1 second (1000 milliseconds)
        $(".alert").fadeTo(1000, 0).slideUp(1000, function() {
            // Remove the alert from the DOM after the slideUp animation completes
            $(this).remove();
        });
    }, 5000); // Delay before starting the fade/slideUp animation
});

          </script>
</body>
</html>