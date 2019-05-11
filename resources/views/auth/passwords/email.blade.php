@extends('layouts.master')

@section('title','Reset Password')

@section('content')

    <div class="flex my-5">
        <div class="w-1/3"></div>
        <div class="w-1/3">
            <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 flex flex-col">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                <h1 class="mb-12 text-center text-grey-darker">{{ __('Reset Password') }}</h1>
                <form method="POST" action="{{ route('password.email') }}">
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

                    <div class="flex items-center justify-between">
                        <button type="submit" class="bg-blue hover:bg-blue-dark text-white font-bold py-2 px-4 rounded">
                            {{ __('Send Password Reset Link') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
        <div class="w-1/3"></div>
    </div>

@endsection
