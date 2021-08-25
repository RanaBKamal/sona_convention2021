<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="{{setting('site.description')}}">
    <meta name="keywords" content="SONA, SONA convention 2021">
    <title>{{setting('site.title')}}</title>

    <!-- css -->
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" href="{{asset('css/ionicons/css/ionicons.min.css')}}">
</head>
<body data-spy="scroll" data-target="#site-nav">
    <nav id="site-nav" class="navbar navbar-fixed-top navbar-custom">
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
                @if (Route::has('login'))
                    <ul class="nav navbar-nav navbar-right">
                        @auth
                            <li class="dropdown">
                                <a href="{{ route('home') }}" class="text-sm text-gray-700 underline" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                                    @php 
                                        $arr = explode(' ', trim(auth()->user()->name));
                                        echo $arr[0];
                                    @endphp
                                    <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <div class="text-center">
                                            <a href="{{ route('home') }}" class="text-sm btn">Dashboard</a>
                                        </div>
                                    </li>
                                    <li class="divider"></li>
                                    <li>
                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf
                                            <div class="text-center">
                                                <button type="submit" class="btn btn-sm" style="margin-top: 5px;">Logout</button>
                                            </div>
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @else
                            <ul class="nav navbar-nav navbar-right">
                                <li>
                                    <a href="{{ route('login') }}" class="text-sm text-gray-700 underline">Log in</a>
                                </li>
                            </ul>
                        @endauth
                    </ul>
                @endif
                {{menu('Main_nav_menu', 'my_menu')}}
            </div>
        </div><!-- /.container -->
    </nav>

    <header id="site-header" class="site-header valign-center" style="background-image:url('{{Voyager::image(setting('site.home_theme_image'))}}');"> 
        <div class="intro">

            <h2>{{setting('site.description')}}</h2>
            
            <h1>{{setting('site.title')}}</h1>
            
            <p>{{setting('site.conference_date')}}</p>
            
            <a class="btn btn-theme" data-scroll href="#registration">Register Now</a>
        
        </div>
    </header>

    <section id="about-us" class="section about">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">

                    <h3 class="section-title">About Us</h3>

                    <p class="text-center">The world is changing fast and unexpectedly. The new global challenges of today are more complex than of yesterdays and challenges of tomorrow are waiting with unprecedented actions. The recent pandemic has taught a global lesson and our priorities and societal edifices have changed a lot. Challenges of pandemics are coupled with impacts of disasters such as landslides, flooding, and earthquakes. Being stuck inside a house for almost 2 years has given us more time to rethink our habitat and surroundings. In this background, architecture as the most dynamic and responsive entity of art and creativity holds the pinnacle of responsibility and inevitability to the changing global scenarios.
                    </p>
                </div><!-- /.col-sm-6 -->
                <div class="col-sm-12">
                    <div style="width:100px;margin: 0 auto;">
                        <a class="btn btn-theme" style="width: 100%;" href="/page/about-us">View</a>
                    </div>
                </div>
            </div><!-- /.row -->
        </div><!-- /.container -->
    </section>

    <section id="speakers" class="section speakers">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h3 class="section-title"><span>Keynote Speakers</span></h3>                    
                </div>
            </div>

            <div class="row">
                @if($keynote_speakers->isNotEmpty())
                    @foreach($keynote_speakers as $speaker)
                        <div class="col-md-3">
                            <div class="speaker-new">

                                <figure>
                                    <img alt="{{$speaker->name}}" class="img-responsive center-block" src="{{Voyager::image($speaker->image)}}">
                                </figure>

                                <h4>{{$speaker->name}}</h4>

                                <p>{{$speaker->designation}}</p>
                                <p>{{$speaker->description}}</p>

                            </div><!-- /.speaker -->
                        </div><!-- /.col-md-4 -->
                    @endforeach
                @else
                    <div class="col-md-12">
                        <h5 style="text-align:center;">No Speakers Found.</h5>
                    </div>
                @endif
            </div><!-- /.row -->
        </div>
    </section>
    <section id="speakers" class="section speakers">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h3 class="section-title"><span>Invited Speakers</span></h3>                    
                </div>
            </div>

            <div class="row">
                @if($invited_speakers->isNotEmpty())
                    @foreach($invited_speakers as $speaker)
                        <div class="col-md-3">
                            <div class="speaker-new">

                                <figure>
                                    <img alt="{{$speaker->name}}" class="img-responsive center-block" src="{{Voyager::image($speaker->image)}}">
                                </figure>

                                <h4>{{$speaker->name}}</h4>

                                <p>{{$speaker->designation}}</p>
                                <p>{{$speaker->description}}</p>

                            </div><!-- /.speaker -->
                        </div><!-- /.col-md-4 -->
                    @endforeach
                @else
                    <div class="col-md-12">
                        <h5 style="text-align:center;">No Speakers Found.</h5>
                    </div>
                @endif
            </div><!-- /.row -->
        </div>
    </section>

    <section id="contribution" class="section bg-image-2 contribution" style="background-image: url({{Voyager::image(setting('site.home_theme_image'))}});">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h3 class="text-uppercase mt0 font-400">Submit Your Contribution Work</h3>
                    
                    <p>You've inspired new consumer, racked up click-thru's, blown-up brand awareness. We can't give you back the weekends you worked, or erase the pain of being forced to make the logo bigger. But if you submit your best work.</p>

                    <a  href="{{ route('home') }}" class="btn btn-white">Submit</a>
                </div>
            </div>
        </div>
    </section>

    <section id="registration" class="section registration">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h3 class="section-title">Registration</h3>
                </div>
            </div>
                
            <form method="POST" action="{{ route('register') }}" id="registration-form">
                @csrf
                <div class="row">
                    <div class="col-md-12" id="registration-msg" style="display:none;">
                        <div class="alert"></div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Full Name" id="name" @error('name') is-invalid @enderror name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <input type="email" class="form-control" placeholder="Email" id="email" @error('email') is-invalid @enderror name="email" value="{{ old('email') }}" required autocomplete="email">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Phone" id="phone" @error('phone') is-invalid @enderror name="phone" value="{{ old('phone') }}" required autocomplete="phone">
                            @error('phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Involvement" id="involvement" @error('involvement') is-invalid @enderror name="involvement" value="{{ old('involvement') }}" required autocomplete="involvement">
                            @error('involvement')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <select class="form-control" name="register_as" id="register_as" required>
                                <option readonly value="none">Register As</option>
                                <option value="Sona Member">Sona Member</option>
                                <option value="Architecture Student">Architecture Student</option>
                                <option value="Non-SONA member Architect">Non-SONA member Architect</option>
                            </select>
                        </div>

                    </div>

                    <div class="col-sm-6">

                        <div class="form-group">
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Re-type Password">
                        </div>
                        <div class="form-group">
                            <textarea type="text" class="form-control" placeholder="Remarks" id="remarks" @error('remarks') is-invalid @enderror" name="remarks"  required autocomplete="remarks" placeholder="remarks">
                                {{ old('remarks') }}
                            </textarea> 
                        </div>
                        <div class="form-group">
                            <div class="captcha">
                                <span>{!! captcha_img() !!}</span>
                                <button type="button" class="btn btn-danger" class="reload" id="reload">
                                    &#x21bb;
                                </button>
                            </div>
                        </div>
                        <div class="form-group">
                            <input id="captcha" type="text" class="form-control" placeholder="Enter Sum" name="captcha">
                            @error('captcha')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="text-center mt20">
                    <button  type="submit" class="btn btn-theme" id="registration-submit-btn">Submit</button>
                </div>
            </form>
        </div>
    </section>

    <section id="faq" class="section faq">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h3 class="section-title">Event FAQs</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                        @if($event_faqs->isNotEmpty())
                            @foreach($event_faqs as $faq)
                                <div class="panel panel-default">
                                    <div class="panel-heading" role="tab" id="headingOne">
                                        <h4 class="panel-title">
                                            <a class="faq-toggle collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse{{$loop->index}}" aria-expanded="true" aria-controls="collapseOne"> {{$faq->question}}</a>
                                        </h4>
                                    </div>

                                    <div id="collapse{{$loop->index}}" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                                        <div class="panel-body">
                                            {{$faq->answer}}
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <h4 class="text-center">No Faqs</h4>
                        @endif
                    </div>
                </div>
            </div>
    </section>

    <section id="partner" class="section partner">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h3 class="section-title">Event Partner</h3>
                </div>
            </div>
            <div class="row">
                @if($event_partners->isNotEmpty())
                    @foreach($event_partners as $partner)
                        <div class="col-sm-3">
                            <a class="partner-box" style="background-image: url({{Voyager::image($partner->image)}});"></a>
                        </div>
                    @endforeach
                @else
                    <div class="col-md-12">
                        <h4 class="text-center">No Event Partners</h4>
                    </div>
                @endif
            </div>
        </div>
    </section>

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
    <script src="{{asset('js/smooth-scroll/dist/js/smooth-scroll.min.js')}}"></script>

    <script>
        $('#reload').on('click', function () {
            $.ajax({
                type: 'GET',
                url: 'reload-captcha',
                success: function (data) {
                    $(".captcha span").html(data.captcha);
                }
            });
        });
        /*
         * Change Navbar color while scrolling
        */

        $(window).scroll(function(){
            handleTopNavAnimation();
        });

        $(window).on('load',function(){
            handleTopNavAnimation();
        });

        function handleTopNavAnimation() {
            var top=$(window).scrollTop();

            if(top>10){
                $('#site-nav').addClass('navbar-solid'); 
            }
            else{
                $('#site-nav').removeClass('navbar-solid'); 
            }
        }


        /*
         * SmoothScroll
        */

        smoothScroll.init();
    </script>

</body>
</html>