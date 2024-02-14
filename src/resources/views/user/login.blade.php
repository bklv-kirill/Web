@extends('layouts.user')

@section('content')
@section('title', 'Login')
<x-forms.form :action="route('user.auth')" method="POST">
    <x-forms.input name="login" type="text" :value="old('login')">
        Login
    </x-forms.input>
    <x-forms.input name="password" type="password">
        Password
    </x-forms.input>

    <button type="submit" class="btn btn-primary">Login</button>
    <a class="ms-1" href="{{ route('user.register') }}">Register</a>
</x-forms.form>
@endsection
