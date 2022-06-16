@extends('layouts.main')
@section('section')
<div class="section-header">
    <h1>Edit Pengguna</h1>
  </div>
<div class="row">
    <div class="col-lg-12">
    <div class="card">
        <div class="card-header">
          <h4>Form Edit Pengguna</h4>
        </div>
        <div class="card-body">
            <form action="/ubahpengguna/{{ $user->id_user }}" method="post">
                @csrf
            <div class="form-group">
                <label>Username</label>
                <input type="text" class="form-control @error('username') is-invalid
                @enderror" id="username" name="username"
                required autofocus value="{{ old('username',$user->username) }}">
                @error('username')
                    <div class="invalid-message">
                        {{ $message }}
                    </div>
                @enderror
              </div>
            <div class="form-group">
                <label>Nama</label>
                <input type="text" class="form-control @error('nama') is-invalid
                @enderror" id="nama" name="nama"
                required autofocus value="{{ old('nama',$user->nama) }}">
                @error('nama')
                    <div class="invalid-message">
                        {{ $message }}
                    </div>
                @enderror
              </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" class="form-control @error('email') is-invalid
                @enderror" id="email" name="email"
                required autofocus value="{{ old('email',$user->email) }}">
                @error('email')
                    <div class="invalid-message">
                        {{ $message }}
                    </div>
                @enderror
              </div>
            <div class="form-group">
                <label>Role Users</label>
                <select name="role_users" class="form-control">
                    <option value="admin" {{ old('role_users',$user->role_users)=='admin' ? 'selected' : '' }}>Admin</option>
                    <option value="bendahara" {{ old('role_users',$user->role_users)=='bendahara' ? 'selected' : '' }}>Bendahara</option>
                    <option value="pemantau" {{ old('role_users',$user->role_users)=='pemantau' ? 'selected' : '' }}>Pemantau</option>
                </select>
              </div>
              <div class="form-group">
                <label>Password</label>
                <div class="input-group" id="show_hide_password">
                    <div class="input-group-prepend">
                      <div class="input-group-text">
                        <i class="fas fa-lock"></i>
                      </div>
                    </div>
                    <input type="password" class="form-control pwstrength @error('password') is-invalid
                    @enderror" data-indicator="pwindicator" id="password" name="password"
                    required autofocus value="{{ old('password',$user->password_temp) }}">
                    <div class="input-group-append">
                        <div class="input-group-text">
                        <a href=""><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
                      </div>
                    </div>
                    @error('password')
                        <div class="invalid-message">
                            {{ $message }}
                        </div>
                    @enderror
                  </div>
              </div>
              <div>
                  <button type="submit" class="btn btn-primary">
                      Ubah Pengguna
                  </button>
              </div>
            </form>
            </div>
          </div>
        </div>
    </div>
    </div>
</div>
@push('custom-script')
<script>
    $(document).ready(function() {
    $("#show_hide_password a").on('click', function(event) {
        event.preventDefault();
        if($('#show_hide_password input').attr("type") == "text"){
            $('#show_hide_password input').attr('type', 'password');
            $('#show_hide_password i').addClass( "fa-eye-slash" );
            $('#show_hide_password i').removeClass( "fa-eye" );
        }else if($('#show_hide_password input').attr("type") == "password"){
            $('#show_hide_password input').attr('type', 'text');
            $('#show_hide_password i').removeClass( "fa-eye-slash" );
            $('#show_hide_password i').addClass( "fa-eye" );
        }
    });
});
</script>
@endpush
@endsection
