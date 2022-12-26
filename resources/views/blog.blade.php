
@extends('layouts/utama')

@section('section-container')

<h1 class="mb-3 text-center">{{ $title }}</h1>

<div class="row justify-content-center mb-3">
     <div class="col-md-6">
          {{-- Default Method formnya GET --}}
          <form action="/blog">
               @if (request('kategori'))
                    <input type="hidden" name="kategori" value="{{ request ('kategori') }}">
               @endif
               @if (request('author'))
                    <input type="hidden" name="author" value="{{ request ('author') }}">
               @endif
               <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Cari postingan..." name="search" value="{{ request('search') }}">
                    <button class="btn btn-outline-dark" type="submit">Search</button>
               </div>
          </form>
     </div>
</div>



{{-- Cek ada postingan apa tidak --}}
@if ($posts->count())
{{-- START HERO POST --}}
     <div class="card mb-3 mx-5">
          @if ($posts[0]->image)
               <div style="max-height: 480px; max-width:240px; overflow:hidden;" class="mx-auto d-block">
                    <img src="{{ asset('storage/' . $posts[0]->image) }}" alt="{{ $posts[0]->category->name }}" class="img-fluid">
               </div>
          @else
               <img src="https://source.unsplash.com/480x240?{{ $posts[0]->category->name }}" class="card-img-top mx-auto d-block" alt="{{ $posts[0]->category->name }}">
          @endif
          <div class="card-body text-center">

               <h3 class="card-title"> 
                    <a href="/blog/{{ $posts[0]->slug}}" class="text-decoration-none text-dark" > {{ $posts[0]->title }} </a>
               </h3>

               <p>
                    <small class="text-muted">
                         By. <a href="/blog?author={{ $posts[0]->author->username }}" class="text-decoration-none"> {{ $posts[0]->author->name }}</a>
                         in <a href="/blog?kategori={{ $posts[0]->category->slug }}" class="text-decoration-none">{{ $posts[0]->category->name }}</a>
                         {{ $posts[0]->created_at->diffForHumans() }} 
                    </small>
               </p>
               
               <p class="card-text">{{ $posts[0]->excerpt }}</p>

               <a href="/blog/{{ $posts[0]->slug}}" class="text-decoration-none btn btn-primary">Read more...</a>
          </div>
     </div>
         
     
{{-- END HERO POST --}}

{{-- START POSTS --}}
<div class="container">
     <div class="row mx-3">
          @foreach ($posts->skip(1) as $post)
          {{-- foreach kecuali yang ke-1 --}}
               <div class="col-md-4">
                    <div class="card">
                         <div class="position-absolute py-2 px-3" style="background-color: rgba(0,0,0,0.7)">
                              {{-- py px padding x dan y --}}
                              <a href="/blog?kategori={{ $post->category->slug}}" class="text-white text-decoration-none">{{ $post->category->name }}</a>
                         </div>
                         
                         @if ($post->image)
                              <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->category->name }}" class="img-fluid" >
                         @else
                              <img src="https://source.unsplash.com/480x240?{{ $post->category->name }}" class="img-fluid" alt="{{ $post->category->name }}">
                         @endif
                         <div class="card-body">
                         <h5 class="card-title">{{ $post->title }}</h5>
                              <p>
                                   <small class="text-muted">
                                        By. <a href="/blog?author={{ $post->author->username }}" class="text-decoration-none"> {{ $post->author->name }}</a>
                                        {{ $post->created_at->diffForHumans() }} 
                                   </small>
                              </p>
                              <p class="card-text"> <p>{{ $post->excerpt}}</p></p>
                         <a href="/blog/{{ $post->slug}}" class="btn btn-primary">Read more</a>
                         </div>
                    </div>
               </div>
          @endforeach
     </div>
</div>

{{-- Apabila tidak ada post --}}
@else
          <p class="text-center fs-4">No posts found</p>
@endif

<div class="d-flex justify-content-end">
     {{ $posts->links() }}
</div>

@endsection

