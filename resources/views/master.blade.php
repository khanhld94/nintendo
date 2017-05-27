<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1">
        <link rel="shortcut icon" href="{{ asset('/images/gamepad.png')}}"/>
        <title>Nintendo World</title>

        <!-- Loading third party fonts -->
        <link href="http://fonts.googleapis.com/css?family=Roboto:300,400,700|" rel="stylesheet" type="text/css">
        <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
        <script src="{{ asset('js/jquery-1.8.3.min.js') }}"></script>
        <script src="{{ asset('js/bootstrap.min.js') }}"></script>

        <!-- Loading main css file -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.2/components/icon.min.css" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.2/components/comment.min.css" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.2/components/form.min.css" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.2/components/button.min.css" rel="stylesheet">
        <link href="{{ asset('/vendor/laravelLikeComment/css/style.css') }}" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/bootstrap-theme.css') }}">
        <link rel="stylesheet" href="{{ asset('css/client-side-style.css') }}">
        <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
        <style type="text/css">
            @font-face {
                font-family: fipps;
                src: url('{{ asset('/fonts/Fipps-Regular.otf') }}');
            }
            .example3 {
                font-family: fipps;
            }
        </style>
        <!--[if lt IE 9]>
        <script src="js/ie-support/html5.js"></script>
        <script src="js/ie-support/respond.js"></script>
        <![endif]-->
    </head>
    <body>
      @include ('layouts.header')
      @if (Session::has('flash_message'))
        <div class="alert alert-danger" style="text-align: center">{{ Session::get('flash_message') }}</div>
      @endif
      <div id="site-content">
          @yield('content')
      </div>
      <!-- Default snippet for navigation -->
      
      <script src="{{ asset('js/plugins.js') }}"></script>
      <script src="{{ asset('/vendor/laravelLikeComment/js/script.js') }}"></script>
      <script src="{{ asset('js/custom.js') }}"></script>
    </body>

</html>