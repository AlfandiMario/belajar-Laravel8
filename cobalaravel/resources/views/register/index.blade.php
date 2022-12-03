@extends('layouts.utama')

@section('section-container')

<div class="row justify-content-center mt-5">
     <div class="col-lg-5">
          <main class="form-registration">
               <h1 class="h3 mb-4 fw-normal text-center">Registration Form</h1>
               <form method="POST">
                {{-- Untuk Membuat Token Keamanan Cross Side --}}
                @csrf 
                 <div class="form-floating">
                   <input type="text" class="form-control rounded-top @error('name') is-invalid @enderror" id="name" name="name" placeholder="John Doe" required value="{{ old('name') }}">
                   <label for="name">Nama Lengkap</label>
                   @error('name')
                   <div class="invalid-feedback">
                    {{ $message }}
                   </div>
                   @enderror
                 </div>
                 <div class="form-floating">
                   <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" name="username" placeholder="john_doe" required value="{{ old('username') }}">
                   <label for="username">Username</label>
                   @error('username')
                   <div class="invalid-feedback">
                    {{ $message }}
                   </div>
                   @enderror
                 </div>
                 <div class="form-floating">
                   <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="name@example.com" required value="{{ old('email') }}">
                   <label for="email">Email address</label>
                   @error('email')
                   <div class="invalid-feedback">
                    {{ $message }}
                   </div>
                   @enderror
                 </div>
                 <div class="form-floating">
                   <input type="password" class="form-control rounded-bottom @error('password') is-invalid @enderror" id="password" name="password" placeholder="Password" required>
                   <label for="password">Password</label>
                   @error('password')
                   <div class="invalid-feedback">
                    {{ $message }}
                   </div>
                   @enderror
                 </div>
                 <button class="w-100 btn btn-lg btn-primary mt-3" type="submit">Register</button>
               </form>
               <small class="d-block text-center mt-3">Sudah daftar? <a href="/login"> Login di sini!</a></small>
          </main>
     </div>
</div>

    
@endsection