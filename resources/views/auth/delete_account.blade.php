@extends('layouts.master')
@section('content')
  <!-- --- Start Main -->
  <main class="mb-5" id="Main">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-6">
          <div class="card">
            <div class="card-header">{{ __('general.delete_account') }}</div>

            <div class="card-body">
              <p class="text-danger">
                {{ __('general.delete_account_warning') }}
              </p>

              <form method="POST" action="{{ route('delete.account') }}">
                @csrf
                @method('DELETE')

                <div class="form-group mb-3">
                  <label for="password">{{ __('general.confirm_password') }}</label>
                  <input class="form-control @error('password') is-invalid @enderror" id="password" name="password"
                    type="password" required placeholder="{{ __('general.confirm_password_placeholder') }}">
                  @error('password')
                    <span class="invalid-feedback">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>

                <div class="form-group mb-3">
                  <button class="btn btn-danger w-100" type="submit">
                    {{ __('general.delete_account') }}
                  </button>
                </div>
              </form>

              <div class="form-group text-center">
                <a class="btn btn-secondary" href="{{ url()->previous() }}">
                  {{ __('general.cancel') }}
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
  </main>
  <!-- ---- End Main -->
@endsection
