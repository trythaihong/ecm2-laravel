<header class="">
    <nav class="navbar navbar-expand-lg">
      <div class="container">
        <a class="navbar-brand" href="index.html"><h2>Sixteen <em>Clothing</em></h2></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link" href="{{url('/')}}">Home
                <span class="sr-only">(current)</span>
              </a>
            </li> 
            <li class="nav-item">
              <a href="{{url('our')}}"  class="nav-link">Our product</a>
            </li>
            
            <li class="nav-item">
              <a class="nav-link"​ href="{{url('about')}}">About Us</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{url('contact')}}"​​​​>Contact Us</a>
            </li>
            <li class="nav-item">
              <a href="" class="nav-link"><i class="fa-solid fa-moon"  id="darkModeToggle" ></i></a>
              {{-- <button class="btn btn-sm btn-dark">Dark Mode</button> --}}
            </li>
            <li>
                @if (Route::has('login'))
                    @auth
                    <li class="nav-item">
                      <a class="nav-link" href="{{url('show_cart')}}"><i class="fa-solid fa-cart-shopping"></i>  Cart[{{$count}}]</a>
                    </li>
                            <x-app-layout>
 
                            </x-app-layout>
                            
                            
                    @else
                        <li>
                            <a
                                href="{{ route('login') }}"
                                class="nav-link"
                            >
                                Log in
                            </a>
                        </li>
                        @if (Route::has('register'))
                            <li> 
                                <a
                                    href="{{ route('register') }}"
                                    class="nav-link">
                                    Register
                                </a>
                            </li>
                        @endif
                    @endauth
                
                          @endif
            </li>
           
            
          </ul>
        </div>
      </div>
    </nav>
    @if (session()->has('message'))
<div class="alert alert-success">

    {{session()->get('message')}}
    <button type="button" class="close" data-dismiss="alert">X</button>
</div>
@endif
  </header>