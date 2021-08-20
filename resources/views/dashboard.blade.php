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

    <section id="speakers" class="section speakers">
        <div class="container">
            <div class="row">
                <div class="col-md-12">

                    <h3 class="section-title">Speakers</h3>
                
                </div>
            </div>

            <div class="row">
                @if($speakers->isNotEmpty())
                    @foreach($speakers as $speaker)
                        <div class="col-md-4">
                            <div class="speaker">

                                <figure>
                                    <img alt="{{$speaker->name}}" class="img-responsive center-block" src="{{Voyager::image($speaker->image)}}">
                                </figure>

                                <h4>{{$speaker->name}}</h4>

                                <p>{{$speaker->conference_designation}}</p>
                                <p>{{$speaker->title}}</p>

                                <ul class="social-block">
                                    <li><a href=""><i class="ion-email"></i></a> {{$speaker->email}}</li>
                                </ul>
                                <ul class="social-block">
                                    <li><a href=""><i class="ion-ios-telephone"></i></a> {{$speaker->phone}}</li>
                                </ul>

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

    <section id="registration" class="section registration">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h3 class="section-title">Registration &amp; Pricing</h3>
                </div>
            </div>
                
            <form action="#" id="registration-form">
                <div class="row">
                    <div class="col-md-12" id="registration-msg" style="display:none;">
                        <div class="alert"></div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="First Name" id="fname" name="fname" required>
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Last Name" id="lname" name="lname" required>
                        </div>

                        <div class="form-group">
                            <input type="email" class="form-control" placeholder="Email" id="email" name="email" required>
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Phone" id="cell" name="cell" required>
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Address" id="address" name="address" required>
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Zip Code" id="zip" name="zip" required>
                        </div>

                        <div class="form-group">
                            <select class="form-control" name="city" id="city" required>
                                <option readonly>City</option>
                                <option>City Name 1</option>
                                <option>City Name 2</option>
                                <option>City Name 3</option>
                                <option>City Name 4</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <select class="form-control" name="program" id="program" required>
                                <option readonly>Select Your Program</option>
                                <option>Program Name 1</option>
                                <option>Program Name 2</option>
                                <option>Program Name 3</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="text-center mt20">
                    <button type="submit" class="btn btn-black" id="registration-submit-btn">Submit</button>
                </div>
            </form>
        </div>
    </section>

    <section id="contribution" class="section bg-image-2 contribution">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h3 class="text-uppercase mt0 font-400">Submit Your Contribution Work</h3>
                    
                    <p>You've inspired new consumer, racked up click-thru's, blown-up brand awareness. We can't give you back the weekends you worked, or erase the pain of being forced to make the logo bigger. But if you submit your best work.</p>

                    <a class="btn btn-white" href="#">Submit</a>
                </div>
            </div>
        </div>
    </section>

    <section id="schedule" class="section schedule">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h3 class="section-title">Event Schedule</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 col-sm-6">
                    <div class="schedule-box">
                        <div class="time">
                            <time datetime="09:00">09:00 am</time> - <time datetime="22:00">10:00 am</time>
                        </div>
                        <h3>Welcome and intro</h3>
                        <p>Mustafizur Khan, SD Asia</p>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="schedule-box">
                        <div class="time">
                            <time datetime="10:00">10:00 am</time> - <time datetime="22:00">10:00 am</time>
                        </div>
                        <h3>Tips and share</h3>
                        <p>Mustafizur Khan, SD Asia</p>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="schedule-box">
                        <div class="time">
                            <time datetime="10:00">10:00 am</time> - <time datetime="22:00">10:00 am</time>
                        </div>
                        <h3>View from the top</h3>
                        <p>Mustafizur Khan, SD Asia</p>
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
                <div class="col-sm-3">
                    <a class="partner-box partner-box-1"></a>
                </div>
                <div class="col-sm-3">
                    <a class="partner-box partner-box-2"></a>
                </div>
                <div class="col-sm-3">
                    <a class="partner-box partner-box-3"></a>
                </div>
                <div class="col-sm-3">
                    <a class="partner-box partner-box-4"></a>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-3">
                    <a class="partner-box partner-box-5"></a>
                </div>
                <div class="col-sm-3">
                    <a class="partner-box partner-box-6"></a>
                </div>
                <div class="col-sm-3">
                    <a class="partner-box partner-box-7"></a>
                </div>
                <div class="col-sm-3">
                    <a class="partner-box partner-box-8"></a>
                </div>
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
                        
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingOne">
                                <h4 class="panel-title">
                                    <a class="faq-toggle collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne"> What is the price of the ticket ?</a>
                                </h4>
                            </div>

                            <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                                <div class="panel-body">
                                    <h3>Hello</h3>
                                    <p>Lorem Ipsum</p>
                                </div>
                            </div>
                        </div>

                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingTwo">
                                <h4 class="panel-title">
                                    <a class="faq-toggle collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo"> What is included in my ticket ?</a>
                                </h4>
                            </div>

                            <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                                <div class="panel-body">Hello</div>
                            </div>
                        </div>
  
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingThree">
                                <h4 class="panel-title">
                                    <a class="faq-toggle collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree"> Office address ?</a>
                                </h4>
                            </div>

                            <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                                <div class="panel-body">Hello</div>
                            </div>
                        </div>

                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingFour">
                                <h4 class="panel-title">
                                    <a class="faq-toggle collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="false" aria-controls="collapseFour"> How should I dress ?</a>
                                </h4>
                            </div>

                            <div id="collapseFour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFour">
                                <div class="panel-body">Hello</div>
                            </div>
                        </div>

                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingFive">
                                <h4 class="panel-title">
                                    <a class="faq-toggle collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFive" aria-expanded="false" aria-controls="collapseFive"> I have specific questions that are not addressed here. Who can help me ?</a>
                                </h4>
                            </div>

                            <div id="collapseFive" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFive">
                                <div class="panel-body">Hello</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>

    <section id="photos" class="section photos">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h3 class="section-title">Photos</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <ul class="grid">
                        
                        <li class="grid-item grid-item-sm-6">
                            <img alt="" class="img-responsive center-block" src="assets/images/photos/photos-1.jpg">
                        </li>

                        <li class="grid-item grid-item-sm-3">
                            <img alt="" class="img-responsive center-block" src="assets/images/photos/photos-2.jpg">
                        </li>

                        <li class="grid-item grid-item-sm-3">
                            <img alt="" class="img-responsive center-block" src="assets/images/photos/photos-3.jpg">
                        </li>
                    
                        <li class="grid-item grid-item-sm-3">
                            <img alt="" class="img-responsive center-block" src="assets/images/photos/photos-5.jpg">
                        </li>

                        <li class="grid-item grid-item-sm-3">
                            <img alt="" class="img-responsive center-block" src="assets/images/photos/photos-6.jpg">
                        </li>

                        <li class="grid-item grid-item-sm-3">
                            <img alt="" class="img-responsive center-block" src="assets/images/photos/photos-7.jpg">
                        </li>

                        <li class="grid-item grid-item-sm-3">
                            <img alt="" class="img-responsive center-block" src="assets/images/photos/photos-8.jpg">
                        </li>

                        <li class="grid-item grid-item-sm-3">
                            <img alt="" class="img-responsive center-block" src="assets/images/photos/photos-2.jpg">
                        </li>

                        <li class="grid-item grid-item-sm-3">
                            <img alt="" class="img-responsive center-block" src="assets/images/photos/photos-3.jpg">
                        </li>
                    </ul>
                </div>
            </div>            
        </div>
    </section>

    <section id="location" class="section location">
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    <h3 class="section-title">Event Location</h3>
                    <address>
                        <p>Eardenia<br> The Grand Hall<br> House # 08, Road #52, Street<br> Phone: +1159t3764<br> Email: example@mail.com</p>
                    </address>
                </div>
                <div class="col-sm-9">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d96706.50013548559!2d-78.9870674333782!3d40.76030630398601!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x54eab584e432360b%3A0x1c3bb99243deb742!2sUnited+States!5e0!3m2!1sen!2sbd!4v1436299406518" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </section>

    <footer class="site-footer">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <p class="site-info"><br> Society Of Nepalese Architects> <span> | Habre Technology Pvt. Ltd.</span></p>
                    <ul class="social-block">
                        <li><a href=""><i class="ion-social-twitter"></i></a></li>
                        <li><a href=""><i class="ion-social-facebook"></i></a></li>
                        <li><a href=""><i class="ion-social-linkedin-outline"></i></a></li>
                        <li><a href=""><i class="ion-social-googleplus"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>

    <!-- script -->
    <script src="{{asset('js/app.js')}}"></script>
    <script src="{{asset('js/smooth-scroll/dist/js/smooth-scroll.min.js')}}"></script>

    <script>
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
         * Registration Form
        */

        $('#registration-form').submit(function(e){
            e.preventDefault();
            
            var postForm = { //Fetch form data
                    'fname'     : $('#registration-form #fname').val(),
                    'lname'     : $('#registration-form #lname').val(),
                    'email'     : $('#registration-form #email').val(),
                    'cell'      : $('#registration-form #cell').val(),
                    'address'   : $('#registration-form #address').val(),
                    'zip'       : $('#registration-form #zip').val(),
                    'city'      : $('#registration-form #city').val(),
                    'program'   : $('#registration-form #program').val()
            };

            $.ajax({
                    type      : 'POST',
                    url       : './assets/php/contact.php',
                    data      : postForm,
                    dataType  : 'json',
                    success   : function(data) {
                                    if (data.success) {
                                        $('#registration-msg .alert').html("Registration Successful");
                                        $('#registration-msg .alert').removeClass("alert-danger");
                                        $('#registration-msg .alert').addClass("alert-success");
                                        $('#registration-msg').show();
                                    }
                                    else
                                    {
                                        $('#registration-msg .alert').html("Registration Failed");
                                        $('#registration-msg .alert').removeClass("alert-success");
                                        $('#registration-msg .alert').addClass("alert-danger");
                                        $('#registration-msg').show();
                                    }
                                }
                });
        });

        /*
         * SmoothScroll
        */

        smoothScroll.init();
    </script>
</body>
</html>