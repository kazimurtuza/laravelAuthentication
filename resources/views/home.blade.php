@extends('layouts.admin')


@section('content')

<div class="container">
<div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{route('changepass')}}">
                                        {{ __('change pass') }}
                                    </a>

                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                            
                         
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
</div>
                       

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                     
                     {{Auth::user()->name}} <br/>
                     {{Auth::user()->email}} <br/>
                     <!-- {{Hash::make(Auth::user()->email)}} <br/> -->
                     {{Auth::user()->id}} <br/>
                     {{Auth::user()->password}} <br/>
                  

                    You are logged in!

                    <div class="container mt-4">
                    @if(Session::has('sms'))
                    <div class="alert alert-success">
                     <ul>
                      <li>{!! \Session::get('sms') !!}</li>
                     </ul>
                   </div>
                   
                    @endif
                   
                            <form action="{{route('customeEmail')}}" method="post">
                            @csrf
                            <div class="formp-group">
                            <label for="shipping_address">Email Form</label>
                            </div>

                            <div class="formp-group">
                            <label for="shipping_address">shipping_address</label>
                            <input type="text" name="shipping_address" class="form-control">

                            </div>
                            <div class="formp-group">
                            <label for="shipping_address">phone_number</label>
                            <input type="text" name="phone_number" class="form-control">

                            </div>
                            <div class="formp-group">
                            <label for="shipping_address">user_id</label>
                            <input type="text" name="user_id" value="{{auth::user()->id}}" class="form-control">

                            </div>
                            <div class="formp-group">
                            <label for="shipping_address">price</label>
                            <input type="text" name="price" class="form-control">

                            </div>

                           <div class="form-group float-right mt-4" >
                           <input type="submit" value="send Email"  class="btn btn-success">
                           
                           </div>
                            
                            </form>
                            
                            </div>
                </br>
            </div>
        </div>
    </div>
</div>
@endsection
