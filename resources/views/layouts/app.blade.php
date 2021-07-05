<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>{{ config('app.name', 'Laravel') }}</title>
  <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('images/favicon.png') }}">
  <link href="{{ asset('vendor/bootstrap-select/dist/css/bootstrap-select.min.css') }}" rel="stylesheet">
  <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>

<body>
<div id="preloader">
  <div class="sk-three-bounce">
    <div class="sk-child sk-bounce1"></div>
    <div class="sk-child sk-bounce2"></div>
    <div class="sk-child sk-bounce3"></div>
  </div>
</div>


<div id="main-wrapper">
  <div class="nav-header">
    <a class="brand-logo">
      <img class="logo-abbr" src="{{ asset('images/logo.png') }}" alt="">
      <img class="logo-compact" src="{{ asset('images/logo-text.png') }}" alt="">
      <img class="brand-title" src="{{ asset('images/logo-text.png') }}" alt="">
    </a>

    <div class="nav-control">
      <div class="hamburger">
        <span class="line"></span><span class="line"></span><span class="line"></span>
      </div>
    </div>
  </div>

  <div class="header">
    <div class="header-content">
      <nav class="navbar navbar-expand">
        <div class="collapse navbar-collapse justify-content-between">
          <div class="header-left">
            <div class="dashboard_bar">
              Declaración Patrimonial
            </div>
          </div>
          <ul class="navbar-nav header-right">
            <li class="nav-item dropdown notification_dropdown">
              <a class="nav-link dz-fullscreen" href="#">
                <svg id="icon-full" viewBox="0 0 24 24" width="26" height="26" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><path d="M8 3H5a2 2 0 0 0-2 2v3m18 0V5a2 2 0 0 0-2-2h-3m0 18h3a2 2 0 0 0 2-2v-3M3 16v3a2 2 0 0 0 2 2h3"></path></svg>
                <svg id="icon-minimize" width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-minimize"><path d="M8 3v3a2 2 0 0 1-2 2H3m18 0h-3a2 2 0 0 1-2-2V3m0 18v-3a2 2 0 0 1 2-2h3M3 16h3a2 2 0 0 1 2 2v3"></path></svg>
                <div class="pulse-css"></div>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="dropdown-item ai-icon">
                <svg id="icon-logout" xmlns="http://www.w3.org/2000/svg" class="text-danger" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg>
                <span class="ml-2">{{ __('Salir') }}</span>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                  @csrf
                </form>
              </a>
            </li>
          </ul>
        </div>
      </nav>
    </div>
  </div>
  <!--**********************************
  Header end ti-comment-alt
  ***********************************-->

<!--**********************************
  Sidebar start
***********************************-->



<div class="deznav">
  <div class="deznav-scroll">
    <ul class="metismenu" id="menu">
      @if(!empty(Route::current()->parameters()['formato_slug']))
      <li>
        <a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
          <i class="flaticon-381-home-3"></i>
          <span class="nav-text">Patrimonial</span>
        </a>
        <ul aria-expanded="false">
          @foreach($declaracion->formatos as $formato)
          <li>
            @if($formato->agrupacion == "patrimonial")
            <a href="{{ url('declaracion/'.$declaracion->id."/".$formato->slug) }}" @if(Route::current()->parameters()['formato_slug'] == $formato->slug) class="mm-active" @endif>
              {{ $formato->nombre }}
            </a>
            @endif
          </li>
          @endforeach
        </ul>
      </li>
      <li>
        <a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
          <i class="flaticon-381-briefcase"></i>
          <span class="nav-text">Intereses</span>
        </a>
        <ul aria-expanded="false">
          @foreach($declaracion->formatos as $formato)
            @if($formato->agrupacion == "intereses")
            <li>
              <a href="{{ url('declaracion/'.$declaracion->id."/".$formato->slug) }}">{{ $formato->nombre }}</a>
            </li>
            @endif
          @endforeach
        </ul>
      </li>
      @endif
      <li>
        <a class="has-arrow ai-icon" href="{{ url('inicio') }}" aria-expanded="false">
          <i class="flaticon-381-notepad"></i>
          <span class="nav-text">Mis Declaraciones</span>
        </a>
      </li>
    </ul>
    <div class="plus-box">
      <p>¿Dudas? Escríbenos por Whatsapp</p>
    </div>
    <div class="copyright">
      <p>
        <strong>Declarapat</strong> 2021
      </p>
    </div>
  </div>
</div>

<!-- WhatsHelp.io widget -->
<script>
    (function () {
        var options = {
            facebook: "526392554052398", // Facebook page ID
            whatsapp: "+5217224277722", // WhatsApp number
            telegram: "ayudig", // Telegram bot username
            email: "hola@ayuntamientodigital.gob.mx", // Email
            call: "+527224277722", // Call phone number
            company_logo_url: "//storage.getbutton.io/widget/c3/c38f/c38f2acdaa482c27f766525b28083db9/logo.jpg", // URL of company logo (png, jpg, gif)
            greeting_message: "Hola, ¿En que podemos ayudarte?.", // Text of greeting message
            call_to_action: "¿Necesitas ayuda? Escríbenos!", // Call to action
            button_color: "#0072BB", // Color of button
            position: "left", // Position may be 'right' or 'left'
            order: "facebook,whatsapp,call,email,telegram", // Order of buttons
            ga: true, // Google Analytics enabled
            branding: true, // Show branding string
            mobile: true, // Mobile version enabled
            desktop: true, // Desktop version enabled
            greeting: true, // Greeting message enabled
            shift_vertical: 60, // Vertical position, px
            shift_horizontal: 50, // Horizontal position, px
            domain: "ayuntamientodigital.gob.mx", // site domain
            key: "5RebRaoKSxy1OPn3fvVlgg", // pro-widget key
        };
        var proto = document.location.protocol, host = "getbutton.io", url = proto + "//static." + host;
        var s = document.createElement('script'); s.type = 'text/javascript'; s.async = true; s.src = url + '/widget-send-button/js/init.js';
        s.onload = function () { WhWidgetSendButton.init(host, proto, options); };
        var x = document.getElementsByTagName('script')[0]; x.parentNode.insertBefore(s, x);
    })();
</script>
<!-- /WhatsHelp.io widget -->
<!--**********************************
  Sidebar end
***********************************-->



  <!--**********************************
      Content body start
  ***********************************-->
  @yield('content')
  <!--**********************************
      Content body end
  ***********************************-->



  <!--**********************************
  Footer start
  ***********************************-->
  <div class="footer">
    <div class="copyright">
      <p>Copyright © Desarrollado por <a href="https://ayuntamiento.digital" target="_blank">Ayuntamiento Digital</a> 2021</p>
    </div>
  </div>
  <!--**********************************
    Footer end
  ***********************************-->
</div>
<!--**********************************
  Main wrapper end
***********************************-->


<!--**********************************
  Scripts
***********************************-->
  <!-- Required vendors -->
  <script src="{{ asset('/vendor/global/global.min.js') }}"></script>
  <script src="{{ asset('/js/custom.min.js') }}"></script>
  <script src="{{ asset('js/deznav-init.js') }}"></script>
  <script src="{{ asset('js/easy-number-separator.js') }}"></script>

  <script>
  @yield('script')
  </script>
</body>
</html>
