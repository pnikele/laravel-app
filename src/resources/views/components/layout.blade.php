<!doctype html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script> --}}
    <link rel="stylesheet" type="text/css" href="{{url('css/main.css')}}">
    <script type="text/javascript" src="{{ URL::asset('js/main.js') }}"></script>
    <title>Skaitītāju rādījumi</title>
</head>
<body style="font-family: Open Sans, sans-serif">
        <header>
            <nav>
                {{-- <p>navigation</p> --}}
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
                        {{-- <div class="button" id="button-nav">
                            <div id="circle"></div>
                            <a href="#">Serviss</a>
                        </div> --}}
                        <div class="button_right"  id="button-nav" onclick="window.location.href ='#';" style="cursor: pointer;">
                            <div id="circle"></div>
                            <a href="#">Reģistrēties</a>
                        </div>
                        {{-- <div class="button_right" id="button-nav" onclick="window.location.href ='#';" style="cursor: pointer;">
                            <div id="circle"></div>
                            <a href="#">Pieslēgties</a>
                        </div> --}}
                        @include ('components.popup_login')
            </nav>
        </header>
        {{ $slot }}
        <footer>
        </footer>
        <script>
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
            </script>
</body>
</html>