<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @yield('meta')

    <!-- css -->
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" href="{{asset('css/ionicons/css/ionicons.min.css')}}">
    @section('css')
        @parent
    @show
</head>
<body data-spy="scroll" data-target="#site-nav">
    <nav id="site-nav" class="navbar navbar-fixed-top navbar-custom other-than-home-nav">
        <div class="container">
            <div class="navbar-header">

                <!-- logo -->
                <div class="site-branding">
                    <a class="logo" href="{{url('/')}}">
                        
                        <!-- logo image  -->
                        <img src="{{Voyager::image(setting('site.logo'))}}" alt="{{setting('site.title')}}" width="60">

                        <span class="site-title">{{setting('site.title')}}</span>
                    </a>
                </div>

                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-items" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

            </div><!-- /.navbar-header -->

            <div class="collapse navbar-collapse" id="navbar-items">
                {{menu('Main_nav_menu', 'my_menu')}}
            </div>
        </div><!-- /.container -->
    </nav>
    <div class="page-content">
        @yield('page-content')
    </div>

    <footer class="site-footer">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <p class="site-info"><br>© Society Of Nepalese Architects <span style="font-size: 0.8em;"> | Developed By: <a href="http://habretech.com.np">Habre Technology Pvt. Ltd.</a></span></p>
                </div>
            </div>
        </div>
    </footer>

    <!-- script -->
    <script src="{{asset('js/app.js')}}"></script>
    @section('js')
        @parent
    @show
</body>
</html>