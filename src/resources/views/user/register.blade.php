@extends('layouts.user')

@section('content')
@section('title', 'Register')
<x-forms.form :action="route('user.store')" method="POST">
    <x-forms.input name="login" type="text" :value="old('login')">
        Login
    </x-forms.input>
    <x-forms.input name="email" type="email" :value="old('email')">
        Email
    </x-forms.input>
    <x-forms.input name="password" type="password">
        Password
    </x-forms.input>

    <button type="submit" class="btn btn-primary">Register</button>
    <a class="ms-1" href="{{ route('user.login') }}">Login</a>
</x-forms.form>
@endsection
