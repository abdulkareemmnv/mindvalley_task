@extends('layouts.master')

@section('title','Login')

@section('content')

    <div class="flex my-5">
        <div class="w-1/3"></div>
        <div class="w-1/3">
            <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 flex flex-col">
                <h1 class="mb-12 text-center text-grey-darker">{{ __('Login') }}</h1>
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="mb-6">
                        <label for="email" class="block text-grey-darker text-sm font-bold mb-2">{{ __('E-Mail Address') }}</label>
                        <input id="email" type="email" class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker{{ $errors->has('email') ? ' is-invalid' : '' }}"  placeholder="{{ __('E-Mail Address') }}"  name="email" value="{{ old('email') }}" required autofocus>

                        @if ($errors->has('email'))
                            <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                        @endif
                    </div>
                    <div class="mb-6">
                        <label class="block text-grey-darker text-sm font-bold mb-2" for="password">{{ __('Password') }}</label>
                        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker mb-3 {{ $errors->has('password') ? ' is-invalid' : '' }}" id="password" type="password" name="password" required placeholder="**********">
                        @if ($errors->has('password'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="mb-6">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                        <label class="text-grey-darker text-sm font-bold mb-2" for="remember">
                            {{ __('Remember Me') }}
                        </label>
                    </div>

                    <div class="flex items-center justify-between">
                        <button type="submit" class="bg-blue hover:bg-blue-dark text-white font-bold py-2 px-4 rounded">
                            {{ __('Login') }}
                        </button>

                        @if (Route::has('password.request'))
                            <a class="inline-block align-baseline font-bold text-sm text-blue hover:text-blue-darker" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                        @endif
                    </div>
                </form>
            </div>
        </div>
        <div class="w-1/3"></div>
    </div>

@endsection
