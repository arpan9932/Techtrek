<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add blog</title>
    <link rel="icon" href="/images/logo.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
      .intro {
          margin-top: 3rem;
      }
  </style>
</head>
<body>
  @include('layout.header')
   
  <section class="intro">
    <div class="mask d-flex align-items-center h-100 gradient-custom">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-9 col-xl-7">
                    <div class="card">
                        <div class="card-body p-4 p-md-5">
                            <h3 class="mb-4 pb-2">Add Your Blog</h3>

                            <form action="{{ route('post.submit') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-outline mb-2">
                                    <label class="form-label" for="Title">
                                        Title</label>
                                    <input type="text" id="Title" class="form-control" name="title" />
                                    <span class="text-danger">
                                      @error('title')
                                                {{ $message }}
                                            @enderror
                                    </span>
                                </div>

                                <div class="form-outline mb-2">
                                  <label class="form-label" for="catagory">
                                      Catagory</label>
                                      <select class="form-control" id="exampleFormControlSelect1" name="catagory">
                                        <option>Tech news</option>
                                        <option>Gadget reviews</option>
                                        <option>Cybersecurity</option>
                                      </select>
                                  <span class="text-danger">
                                    @error('catagory')
                                                {{ $message }}
                                            @enderror
                                  </span>
                              </div>

                              <div class="form-outline mb-2">
                                <label class="form-label" for="details">
                                    Details</label>
                                <textarea class="form-control" name="details" row="6"></textarea>
                                <span class="text-danger">
                                </span>
                                @error('details')
                                                {{ $message }}
                                            @enderror
                            </div>

                            <div class="form-outline mb-2">
                              <label class="form-label" for="details">
                                  Add image</label>
                                  <input type="file" id="image" class="form-control" name="image" />
                              <span class="text-danger">
                              </span>
                              @error('image')
                                              {{ $message }}
                                          @enderror
                          </div>


                                <div class="mt-4">
                                    <input class="btn btn-warning btn-md" type="submit" value="Submit"/>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

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

</body>
</html>