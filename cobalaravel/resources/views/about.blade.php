@extends('layouts/utama')

@section('section-container')
     <h1>Halaman About</h1>
     <h3>@php echo $nama; @endphp</h3>
     <h5>{{ $email }}</h5>
     <img src="img/{{ $image; }}" alt="{{ $image; }}" class="img-thumbnail rounded-circle">
@endsection

