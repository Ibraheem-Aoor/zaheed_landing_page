@extends('layouts.master')
@section('content')
  <!-- --- Start Main -->
  <main class="mb-5" id="Main">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-6">
          <div class="card">
            <div class="card-header">{{ __('general.login') }}</div>

            <div class="card-body">
              <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="form-group mb-3">
                  <label for="login">{{ __('general.email_or_phone') }}</label>
                  <input class="form-control @error('login') is-invalid @enderror" id="login" name="login"
                    type="text" value="{{ old('login') }}" required autofocus>
                  @error('login')
                    <span class="invalid-feedback">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>

                <div class="form-group mb-3">
                  <label for="password">{{ __('general.password') }}</label>
                  <input class="form-control @error('password') is-invalid @enderror" id="password" name="password"
                    type="password" required>
                  @error('password')
                    <span class="invalid-feedback">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>

                <div class="form-group mb-3">
                  <button class="btn btn-primary w-100" type="submit">
                    {{ __('general.login') }}
                  </button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
  </main>
  <!-- ---- End Main -->
@endsection
