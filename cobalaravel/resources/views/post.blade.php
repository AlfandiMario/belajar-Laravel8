@extends('layouts/utama')

@section('section-container')

<div class="container">
    <div class="row justify-content-center mb-5">
        <div class="col-md-8">
            <h2 class="mb-3"> {{ $post->title }} </h2>

            <p>By. <a href="/authors/{{ $post->author->username }}" class="text-decoration-none">{{ $post->author->name }}</a> 
               in <a href="/blog?kategori={{ $post->category->slug }}">{{ $post->category->name }}</a>
           </p>

           @if ($post->image)
                <div style="max-height: 240px ; overflow:hidden" >
                    <img src="{{ asset('storage/' . $post->image) }}" alt="" class="img-fluid mx-auto d-block">
                </div>
            @else
                <img src="https://source.unsplash.com/480x240?{{ $post->category->name }}" class="img-fluid" alt="{{ $post->category->name }}">
            @endif

           <article class="my-3 fs-5">
               {{-- Agar Script HTML dapat dieksekusi --}}
               {!! $post->body !!}
               
               {{-- Script HTML ditampilkan jadi String --}}
               {{-- {{ $post->body}} --}}
           </article>
            <a href="/blog">Back to Posts</a>
        </div>
    </div>
</div>

@endsection