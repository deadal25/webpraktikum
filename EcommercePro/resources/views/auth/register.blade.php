<!DOCTYPE html>
<html>
   <head>
      <!-- Basic -->
      <base href="/public">
      <meta charset="utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <!-- Mobile Metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
      <!-- Site Metas -->
      <meta name="keywords" content="" />
      <meta name="description" content="" />
      <meta name="author" content="" />
      <link rel="shortcut icon" href="images/favicon.png" type="">
      <title>Famms - Fashion HTML Template</title>
      <!-- bootstrap core css -->
      <link rel="stylesheet" type="text/css" href="home/css/bootstrap.css" />
      <!-- font awesome style -->
      <!-- Font Awesome CSS -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-H5k5IaHzERf7ZpNiVDTm3SyFctsgYih0P2Wy9I3VH6cXTg0iVSdz1UqnJqwMVfU1q7V62eAKL6iF2/3zEN8Gw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

      <link href="home/css/font-awesome.min.css" rel="stylesheet" />
      <!-- Custom styles for this template -->
      <link href="home/css/style.css" rel="stylesheet" />
      <!-- responsive style -->
      <link href="home/css/responsive.css" rel="stylesheet" />
      {{-- ICON --}}
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
   </head>
   <body>
      <div class="hero_area">
         <!-- header section strats -->
        @include('home.header')
         <!-- end header section -->
        <!-- slider section -->
        {{-- @include('home.slider') --}}
         <!-- end slider section -->
      {{-- </div> --}}
      <!-- why section -->
      {{-- @include('home.why') --}}
      <!-- end why section -->
      
      <!-- arrival section -->
      {{-- @include('home.new_arival') --}}
      <!-- end arrival section -->
      
      <!-- product section -->
      {{-- @include('home.product') --}}
      <!-- end product section -->

      <!-- subscribe section -->
      {{-- @include('home.subscribe') --}}
      <!-- end subscribe section -->
      <!-- client section -->
      {{-- @include('home.client') --}}
      <!-- end client section -->
      <!-- footer start -->
      <x-guest-layout>
          <x-authentication-card>
              <x-slot name="logo">
                  {{-- <x-authentication-card-logo /> --}}
                  <h1 style="font-size: 50px;"> REGISTER </h1>
              </x-slot>
      
              <x-validation-errors class="mb-4" />
      
              <form method="POST" action="{{ route('register') }}">
                  @csrf
      
                  <div>
                      <x-label for="name" value="{{ __('Name') }}" />
                      <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                  </div>
      
                  <div class="mt-4">
                      <x-label for="email" value="{{ __('Email') }}" />
                      <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
                  </div>
      
                  <div>
                      <x-label for="phone" value="{{ __('phone') }}" />
                      <x-input id="phone" class="block mt-1 w-full" type="number" name="phone" :value="old('phone')" required autofocus autocomplete="phone" />
                  </div>
      
                  <div>
                      <x-label for="address" value="{{ __('address') }}" />
                      <x-input id="address" class="block mt-1 w-full" type="text" name="address" :value="old('address')" required autofocus autocomplete="address" />
                  </div>
      
                  <div class="mt-4">
                      <x-label for="password" value="{{ __('Password') }}" />
                      <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
                  </div>
      
                  <div class="mt-4">
                      <x-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                      <x-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
                  </div>
      
                  @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                      <div class="mt-4">
                          <x-label for="terms">
                              <div class="flex items-center">
                                  <x-checkbox name="terms" id="terms" required />
      
                                  <div class="ms-2">
                                      {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                              'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Terms of Service').'</a>',
                                              'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Privacy Policy').'</a>',
                                      ]) !!}
                                  </div>
                              </div>
                          </x-label>
                      </div>
                  @endif
      
                  <div class="flex items-center justify-end mt-4">
                      <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                          {{ __('Already registered?') }}
                      </a>
      
                      <x-button class="ms-4">
                          {{ __('Register') }}
                      </x-button>
                  </div>
              </form>
          </x-authentication-card>
      </x-guest-layout>
      {{-- @include('home.footer') --}}
      <!-- footer end -->
      <div class="cpy_">
         <p class="mx-auto">© 2021 All Rights Reserved By <a href="https://html.design/">Free Html Templates</a><br>
         
            Distributed By <a href="https://themewagon.com/" target="_blank">ThemeWagon</a>
         
         </p>
      </div>
      <!-- jQery -->
      <script src="home/js/jquery-3.4.1.min.js"></script>
      <!-- popper js -->
      <script src="home/js/popper.min.js"></script>
      <!-- bootstrap js -->
      <script src="home/js/bootstrap.js"></script>
      <!-- custom js -->
      <script src="home/js/custom.js"></script>
   </body>
</html>
