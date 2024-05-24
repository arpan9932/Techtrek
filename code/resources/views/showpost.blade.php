@extends('layout.template')
@extends('layout.header')
@section('title', 'Post')
@section('content')
    <div class="container">
        <div class="container mt-3" style="margin: 0%;">
            <h1>{{ $post->title }}</h1>
        </div>
        <div class="container mt-2" style="display: flex; margin: 0%;">
            <div style="display: flex; margin: 0%;">
                <i class="bi bi-person-circle"></i>
                <h5 class="ml-1">{{ $post->user->name }}</h5>
            </div>
            <div class="ml-3" style="display: flex; margin: 0%;">
                <i class="bi bi-clock"></i>
                <h5 class="ml-1">{{ $post->created_at->format('M d, Y') }}</h5>
            </div>
        </div>
        <div class="container" style="margin: 0%;">
            <div class="row">
                <div class="col">
                    <img src='{{ Storage::url('images/' . $post->image) }}' class='card-img' alt='...' width='200px'
                        height='500px'>
                </div>
                <div class="col overflow-scroll" style="height:508px;">
                    {!! nl2br(e($post->details)) !!}
                </div>

            </div>
        </div>


        <div class="container mt-5 pt-5" style="margin: 0%;">
            <div class="row d-flex">
                <div class="col-9">
                    <div class="card text-dark">
                        <div class="card-body p-4">
                            <h4 class="mb-0">Recent comments</h4>
                            <p class="fw-light mb-4 pb-2">Latest Comments section by users</p>
                            @foreach($post->comments as $comment)
                            <div class="d-flex flex-start">
                                <i class="bi bi-person-square mt-1"></i>
                                <div class="flex-grow-1 flex-shrink-1 pl-1">
                                    <div>
                                        <div class="d-flex justify-content align-items-center">
                                            <p class="mb-1 fs-5 fw-bold">
                                                {{ $comment->user->name }}<span class="small pl-2">{{ $comment->created_at->format('M d, Y H:i') }}</span>
                                            </p>
                                            <div class="ml-5">
                                            <a href="#!"><i class="bi bi-reply"></i></a>
                                            @auth
                                            @if (auth()->id()==$comment->user_id)
                                            <form action="{{ route('posts.comments.delete', $comment->id) }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('POST')
                                                <button type="submit" class="btn btn-link p-0"><i class="bi bi-trash"></i></button>
                                            </form>
                                            @endif
                                            @endauth
                                        </div>
                                        </div>
                                        <p class="small mb-0 fs-6">
                                            {!! nl2br(e($comment->content)) !!}
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <hr class="my-3" />
                            @endforeach


                            @auth
                            
                            <form action="{{ route('posts.comments.store', $post->id) }}" method="post" >
                                @csrf
                                <div class="card-footer pt-3 border-0" style="background-color: #f8f9fa;">
                                <div class=" flex-start w-100">
                                    <i class="bi bi-person-square mt-1 "></i>
                                  <div class="form-outline w-75 border border-secondary ml-2">
                                    <textarea class="form-control" id="textAreaExample" rows="4"
                                      style="background: #fff;" name="content"></textarea>
                                    </div>
                                    @if ($errors->has('content'))
                                    <p class="text-danger">{{ $errors->first('content') }}</p>
                                @endif
                                    <div class="float-end mb-3 pt-1" style="margin-right: 13rem;">
                                        <button type="submit" class="btn btn-primary btn-sm">Post comment</button>
                                      </div>
                                </div>
                               
                        </div>
                        </form>
                    
                            @endauth
                        </div>
                    </div>
                </div>
                
            </div>


        



    </div>

  



    @endsection
