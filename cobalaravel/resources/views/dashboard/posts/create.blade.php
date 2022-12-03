@extends('dashboard.layout.layout')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
     <h1 class="h2">My Posts</h1>
</div>

<div class="col-lg-6">
     <form method="POST" action="/dashboard/posts" class="mb-5" enctype="multipart/form-data">
          @csrf
          <div class="mb-3">
            <label for="title" class="form-label @error('title') is-invalid @enderror"> Title </label>
            <input type="text" class="form-control" id="title" name="title" required autofocus value="{{ old('title') }}">
               @error('title') 
                    <div class="invalid-feedback">{{ $message }}</div> 
               @enderror
          </div>
          <div class="mb-3">
            <label for="slug" class="form-label @error('slug') is-invalid @enderror"> Slug </label>
            <input type="text" class="form-control" id="slug" name="slug" required value="{{ old('slug') }}">
               @error('slug') 
                    <div class="invalid-feedback">{{ $message }}</div> 
               @enderror
          </div>
          <div class="mb-3">
               <label for="category" class="form-label"> Category </label>
               <select class="form-select" name="category_id">
                    @foreach ($categories as $kategori)
                         @if (old('category_id') == $kategori->id)
                              <option value="{{ $kategori->id }}" selected>{{ $kategori->name }}</option>   
                         @else
                              <option value="{{ $kategori->id }}" >{{ $kategori->name }}</option>   
                         @endif
                    @endforeach
               </select>
          </div>
          <div class="mb-3">
               <label for="image" class="form-label @error('image') is-invalid @enderror">Thumbnail </label>
               <img class="img-preview img-fluid mb-2 col-sm-5">
               <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image" onchange="previewImage()">
               @error('image') 
                    <div class="invalid-feedback">{{ $message }}</div> 
               @enderror
          </div>
          <div class="mb-3">
               <label for="body" class="form-label"> Body </label>
               @error('body') <p class="text-danger">{{ $message }}</p> @enderror
               <input id="body" type="hidden" name="body" value="{{ old('body') }}"> 
               <trix-editor input="body"></trix-editor>

          </div>
          
          <button type="submit" class="btn btn-primary">Create Post</button>
     </form>
</div>

<script>
     // Untuk men-slug kan title
     const title = document.querySelector('#title');
     const slug = document.querySelector('#slug');

     title.addEventListener('change', function(){
          fetch('/dashboard/posts/checkSlug?title=' + title.value)
               .then(response=>response.json())
               .then(data=>slug.value = data.slug)
     });

     // ========================================
     // Mencegah upload file pada trix-editor
     document.addEventListener('trix-file-accept', function(e){
          e.preventDefault();
     });

     // ========================================
     // Preview Image
     function previewImage(){
          const image = document.querySelector('#image');
          const imgPreview = document.querySelector('.img-preview');

          imgPreview.style.display = 'block';

          const oFReader = new FileReader();
          oFReader.readAsDataURL(image.files[0]);

          oFReader.onload = function(oFREvent){
               imgPreview.src=oFREvent.target.result;
          }
     }

</script>

@endsection