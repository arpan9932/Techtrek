@include('auth.register')
@include('auth.login')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
      <a class="navbar-brand" href="#"> <img src='/images/logo.png' alt='TT' width='50' height='50' style='border-radius: 100%;'></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active fw-bold" aria-current="page" href="#">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active fw-bold" aria-current="page" href="#">Tech news</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active fw-bold" aria-current="page" href="#">Gadget reviews</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active fw-bold" aria-current="page" href="#">Cybersecurity</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active fw-bold" aria-current="page" href="#">Contacts</a>
          </li> 
        </ul>
        <div class='d-flex align-items-center'>   
          <!-- The form -->
          <form class='example'>
            <input type='text' placeholder='Search' name='search'>
            <button type='submit'><i class="bi bi-search"></i></button>
          </form>
          @if (Route::has('login'))
          @auth
          <div class='ml-3'><h5>{{ auth()->user()->name }}</h5></div>
          <a href='{{ route('logout') }}' type='button' class='btn btn-primary ml-3'>
            Sign out
          </a>
          @else
          <button data-mdb-ripple-init type='button' class='btn'data-toggle='modal' data-target='#loginmodal'>
            Login
          </button>
          <button data-mdb-ripple-init type='button' class='btn btn-primary me-3'data-toggle='modal' data-target='#signupmodal'>
            Sign up
          </button>
          @endauth
          @endif
        </div>
      </div>
    </div>
  </nav>