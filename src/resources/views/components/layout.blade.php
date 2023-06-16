<!doctype html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script> --}}
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


    <link rel="stylesheet" type="text/css" href="{{url('css/main.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('css/auth.css')}}">
    <script type="text/javascript" src="{{ URL::asset('js/main.js') }}"></script>
    <title>Skaitītāju rādījumi</title>
</head>
<body style="font-family: Open Sans, sans-serif;" >
  {{-- <div id="grid-container"> --}}
        <header>
            <nav>
                {{-- <p>navigation</p> --}}
                @auth
                  <div id="button-nav-menu" onclick="openNav()"&#9776;  style="cursor: pointer;float:left;" >
                    <button type="button" class="menu_button"  >
                      <img src="/images/align-justify-svgrepo-com.svg" alt="menu" class="menu_button">
                    </button>
                  </div> 
                @endauth
                <div  class="{{ (request()->is('/')) ? 'nav_active' : 'button' }}" id="button-nav" onclick="window.location.href ='/';" style="cursor: pointer;">
                    <div id="circle"></div>
                    <a href="/">Sākums</a>
                </div>
                <div class="{{ (request()->is('about')) ? 'nav_active' : 'button' }}" id="button-nav" onclick="window.location.href ='/about';" style="cursor: pointer;">
                    <div id="circle"></div>
                    <a href="/about">Par Mums</a>
                </div>
                <div class="{{ (request()->is('contacts')) ? 'nav_active' : 'button' }}" id="button-nav" onclick="window.location.href ='/contacts';" style="cursor: pointer;">
                    <div id="circle"></div>
                    <a href="/contacts">Kontakti</a>
                </div>
                @auth
                {{-- @can('admin')
                  <div class="button" id="button-nav" onclick="window.location.href ='/#';" style="cursor: pointer;">
                    <div id="circle"></div>
                    <a href="#">Admin</a>
                  </div>
                  @endcan --}}
                  <div class="button_right"  id="button-nav" x-data="{}"  @click.prevent="document.querySelector('#logout-form').submit()" style="cursor: pointer;">
                      <div id="circle"></div>
                      <a href="/logout" x-data="{}" @click.prevent="document.querySelector('#logout-form').submit()">Izrakstīties</a>
                  </div>
                    <form id="logout-form" method="POST" action="/logout" class="hidden">
                      @csrf
                    </form>
                    <div class="badge" style="display:flex;align-items: center;
                    justify-content: center;">
                      <div style="padding: 0;margin:zero;display:flex">
                        <img class="human_icon" src="/images/id-card-svgrepo-com.svg" alt="human_icon">
                      </div> 
                    <div  style="color: white;float:right; padding: 7px 7px;">
                        <a >{{ Auth::user()->name }} {{ Auth::user()->surname }}</a>
                    </div>
                        {{-- <img class="human_icon" src="/images/id-card-svgrepo-com.svg" alt=""> --}}
                  </div>

                @else
                  <div class="{{ (request()->is('register')) ? 'nav_active_right' : 'button_right' }}"  id="button-nav" onclick="window.location.href ='/register';" style="cursor: pointer;">
                      <div id="circle"></div>
                      <a href="#">Reģistrēties</a>
                  </div>
                  <div class="{{ (request()->is('login')) ? 'nav_active_right' : 'button_right' }}" id="button-nav" onclick="window.location.href ='/login';" style="cursor: pointer;">
                      <div id="circle"></div>
                      <a href="/login">Pieslēgties</a>
                  </div>
                {{-- @include ('login.popup_login') --}}
                @endauth
            </nav>
        </header>
        <div id="maincontent"style="display:flex;width:100%; flex:1;">
          @auth
            {{-- side navigation --}}
            
            {{-- <div id="sidenav" style=" flex:1; background-color:#E9FFFF; box-shadow: 1px 0 5px #888;"></div> --}}
            <div id="placesidenav">
                @can('user')
                  <div class="{{ (request()->is('addresses*')) ? 'sidenav_div_active' : 'sidenav_div' }}" onclick="window.location.href ='/addresses';" >
                    <a style="padding-left: 10px; text-decoration:none;font-weight: bold;" class="sidenav_item" href="/addresses">Adreses</a>
                  </div>
                  <div class="{{ (request()->is('readers*')) ? 'sidenav_div_active' : 'sidenav_div' }}" onclick="window.location.href ='/readers';" >
                    <a style="padding-left: 10px; text-decoration:none;font-weight: bold;" class="sidenav_item" href="/readers">Skaitītāji</a>
                  </div>
                @endcan
                @can('admin')
                  <div class="{{ (request()->is('admin/addresses*')) ? 'sidenav_div_active' : 'sidenav_div' }}" onclick="window.location.href ='/admin/addresses';" >
                    <a style="padding-left: 10px; text-decoration:none;font-weight: bold;" class="sidenav_item" href="/admin/addresses">Adreses</a>
                  </div>
                  <div class="{{ (request()->is('readers*')) ? 'sidenav_div_active' : 'sidenav_div' }}" onclick="window.location.href ='/readers';" >
                    <a style="padding-left: 10px; text-decoration:none;font-weight: bold;" class="sidenav_item" href="/readers">Skaitītāji</a>
                  </div>
                  <div class="{{ (request()->is('admin/users*')) ? 'sidenav_div_active' : 'sidenav_div' }}" onclick="window.location.href ='/admin/users';" >
                    <a style="padding-left: 10px; text-decoration:none;font-weight: bold;" class="sidenav_item" href="/admin/users">Lietotāji</a>
                  </div>
                @endcan
            </div>
          @endauth
          {{ $slot }}
        </div>
        <footer>
        </footer>

        <script>
          //side show script}
            let slideIndex = 1;
            showSlides(slideIndex);
            
            function plusSlides(n) {
              showSlides(slideIndex += n);
            }
            
            function currentSlide(n) {
              showSlides(slideIndex = n);
            }
            
            function showSlides(n) {
              let i;
              let slides = document.getElementsByClassName("mySlides");
              let dots = document.getElementsByClassName("dot");
              if(slides.length !== 0){
              if (n > slides.length) {slideIndex = 1}    
              if (n < 1) {slideIndex = slides.length}
              for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";  
              }
              for (i = 0; i < dots.length; i++) {
                dots[i].className = dots[i].className.replace(" active", "");
              }
              slides[slideIndex-1].style.display = "block";  
              dots[slideIndex-1].className += " active";
            }
          }
            </script>
  {{-- </div> --}}
</body>
</html>