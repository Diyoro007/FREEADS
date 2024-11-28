<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="{{ asset('css/register.css') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class="form-container">
      <p class="title">Create account</p>
      <form class="form" method="POST" action="{{ route('register') }}">
      @csrf
        <input type="text" class="input" placeholder="Name" id="name" name="name" :value="old('name')" required autofocus autocomplete="name">
        <x-input-error :messages="$errors->get('name')"/>
        <input type="email" class="input" placeholder="Email" id="email" name="email" :value="old('email')" required autocomplete="username">
        <x-input-error :messages="$errors->get('email')"/>
        <input type="password" class="input" placeholder="Password" id="password" name="password" required autocomplete="new-password">
        <x-input-error :messages="$errors->get('password')" class="mt-2" />
        <input type="password" class="input" placeholder="Confirm Password" id="password_confirmation" name="password_confirmation" required autocomplete="new-password">
        <input type="text" class="input" placeholder="Phone number" id="phone_number" name="phone_number" :value="old('phone_number')" required autofocus autocomplete="phone_number">
        <x-input-error :messages="$errors->get('phone_number')" class="mt-2" />
        <button class="form-btn">Create account</button>
      </form>
      <p class="sign-up-label">
        Already have an account?<a href="{{ route('login') }}"></a><span class="sign-up-link">Log in</span>
      </p>
    
</body>
</html>


