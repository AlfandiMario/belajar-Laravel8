@extends('dashboard.layout.layout')

@section('content')
     <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
          <h1 class="h2">Post Categories</h1>
     </div>

     {{-- Notifikasi --}}
     @if (session()->has('success'))
          <div class="alert alert-success alert-dismissible fade show col-lg-6 mx-auto" role="alert">
               {{ session ('success') }}
          </div>
     @endif

     <a href="/dashboard/categories/create" class="btn btn-info btn-sm my-2"> Create New Category </a>
     <div class="table-responsive col-lg-6 mx-auto">
          <table class="table table-striped table-sm">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Category Name</th> 
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
               @foreach ($categories as $kategori)
               <tr>
                    <td>{{  $loop->iteration }}</td>
                    <td>{{ $kategori->name }}</td>
                    <td>
                         <a href="/dashboard/categories/{{ $kategori->slug }}" class="badge bg-secondary"><span data-feather="eye"></span> </a>
                         {{-- /edit adalah aturan default dari route --}}
                         <a href="/dashboard/categories/{{ $kategori->slug }}/edit" class="badge bg-warning"><span data-feather="edit"></span> </a>
                         <form action="/dashboard/categories/{{ $kategori->slug }}" method="POST" class="d-inline">
                              @method('delete')
                              @csrf
                              <button class="badge bg-danger border-0" onclick="return confirm('Are you sure to delete this post?')"><span data-feather="trash"></span></button>
                         </form>
                    </td>
               </tr>
               @endforeach
            </tbody>
          </table>
     </div>
@endsection
