<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<x-auth-session-status class="mb-4" :status="session('status')" />
 <div class="form-container">
      <p class="title">Welcome back</p>
      <form class="form" method="POST" action="{{ route('login') }}">
      @csrf
        <input name="email" id="email" type="email" class="input" placeholder="Email" :value="old('email')" required autofocus autocomplete="username">
        <x-input-error :messages="$errors->get('email')"/>
        <input id="password" type="password" class="input" placeholder="Password" name="password" required autocomplete="current-password">
<x-input-error :messages="$errors->get('password')" class="mt-2" />
@if (Route::has('password.request'))
      <a href="{{ route('password.request') }}">  <p class="page-link">
          <span class="page-link-label">Forgot Password?</span>
        </p> </a> @endif
        <button class="form-btn">Log in</button>
      </form>
      
    <a href="{{ route('register') }}"  <div class="buttons-container">
        <div class="apple-login-button">
          <span>Register</span>
        </div>
</body>
</html>   