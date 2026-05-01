{{-- <x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ml-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
 --}}

@extends('layouts.main')

@section('title')
    Student Registration
@endsection

@section('content')

<!-- ===== Page title section start ===== -->
<section class="page-top-bg mb-5">
    <div class="page-overlay">
        <div class="container">
        <div class="row">
            <div class="col">
            <h3 class="font_six text-white">User Registration</h3>
            </div>
        </div>
        </div>
    </div>
</section>
<!-- ===== Page title section end ===== -->



<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card p-5">
                <form method="POST" action="{{ route('register') }}">
                            @csrf

                    <p class="text-center h4 mb-4 mfw-5">Student Registration Form</p>
                        <input type="hidden" name="role" value="patient" />

                        <div class="row">
                            <div class="col-12 col-sm-6">
                                <div class="form-row mb-2">
                                    <label for="f_name" class="mfw-5 col-md-12 col-form-label text-md-left">{{ __('First Name') }}</label>

                                    <div class="col-md-12">
                                        <input id="f_name" type="text" class="mfw-4 form-control @error('f_name') is-invalid @enderror" name="f_name" value="{{ old('f_name') }}" required autocomplete="f_name" autofocus>

                                        @error('f_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="form-row mb-2">
                                    <label for="l_name" class="mfw-5 col-md-12 col-form-label text-md-left">{{ __('Last Name') }}</label>

                                    <div class="col-md-12">
                                        <input id="l_name" type="text" class="mfw-4 form-control @error('name') is-invalid @enderror" name="l_name" value="{{ old('l_name') }}" required autocomplete="l_name" autofocus>

                                        @error('l_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-row mb-2">
                            <label for="email" class="mfw-5 col-md-12 col-form-label text-md-left">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-12">
                                <input id="email" type="email" class="mfw-4 form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-row mb-2">
                          <label for="mobile" class="mfw-5 col-md-12 col-form-label text-md-left">{{ __('Mobile Number') }}</label>

                          <div class="col-md-12">
                              <input id="mobile" type="text" class="mfw-4 form-control @error('mobile') is-invalid @enderror" name="mobile" value="{{ old('mobile') }}" required autocomplete="mobile">

                              @error('mobile')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                              @enderror
                          </div>
                      </div>
                      <div class="form-row mb-2">
                          <label for="password" class="mfw-5 col-md-12 col-form-label text-md-left">{{ __('Password') }} <small>*Minium 8 characters</small></label>

                          <div class="col-md-12">
                              <input id="password" type="password" class="mfw-4 form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                              @error('password')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                              @enderror
                          </div>
                      </div>

                      <div class="form-row mb-2">
                          <label for="password-confirm" class="mfw-5 col-md-12 col-form-label text-md-left">{{ __('Confirm Password') }}  </label>

                          <div class="col-md-12">
                              <input id="password-confirm" type="password" class="mfw-4 form-control" name="password_confirmation" required autocomplete="new-password">
                          </div>
                      </div>

                      <div class="custom-control custom-checkbox my-4">
                        <input type="checkbox" class="custom-control-input" id="terms" name="terms" required="required">
                        <label class="mfw-5 custom-control-label" for="terms">Agree <a href="#" target="_blank">Terms of service</a></label>
                      </div>

                      <button class="btn btn-info my-4 btn-block mfw-4" type="submit">Register</button> 

                </form>
                </div>
        </div>
    </div>
</div>


@endsection