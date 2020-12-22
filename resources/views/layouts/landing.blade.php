<!DOCTYPE html>
<html lang="en" class="ie_11_scroll">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="hhhwidth=device-width, initial-scale=1">
        <title>ArsiTech</title>
        <!--

App Landing Template

http://www.templatemo.com/tm-474-app-landing

-->
        <!-- CSS -->
        <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/templatemo_style.css') }}">
        <!-- Favicon and touch icons -->
        <link rel="shortcut icon" href="favicon.png" />
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>

    <body>
        <!-- Top menu -->
        {{-- <div class="show-menu">
            <a href="#" class="shadow-top-down">+</a>
        </div>
        <nav class="main-menu shadow-top-down">
            <ul class="nav nav-pills nav-stacked">
                <li><a href="#templatemo_home" class="scroll_effect">Home</a></li>
                <li><a href="#templatemo_features" class="scroll_effect">Features</a></li>
                <li><a href="#templatemo_download" class="scroll_effect">Download</a></li>
                <li><a href="http://www.facebook.com/templatemo" rel="nofollow" target="_parent">Fan Page</a></li>
                <li><a href="elements.html">Elements</a></li>
                <li><a href="#templatemo_contact" class="scroll_effect">Contact</a></li>
            </ul>
        </nav> --}}
        <!-- Home -->
        <section id="templatemo_home">
            <div class="container">
                <div class="templatemo_home_inner_wapper">
                    <h1 class="text-center">ArsiTech</h1>
                </div>
                <div class="templatemo_home_inner_wapper btn_wapper">
                    <x-success-msg />
                    @if (Route::has('login'))
                    @auth
                    <center>
                        @if (Auth::user()->role == 'admin')
                        <a class="btn btn-primary" href="{{ route('admin.dashboard') }}">Dashboard</a>
                        @elseif (Auth::user()->role == 'arsitek')
                        <a class="btn btn-primary" href="{{ route('arsitek.dashboard') }}">Dashboard</a>
                        @else
                        <a class="btn btn-primary" href="{{ route('pelanggan.dashboard') }}">Dashboard</a>
                        @endif
                    </center>
                    @else
                    <div class="row">


                        <div class="col-6">
                            <a class="btn btn-primary btn-block" style="margin: 5px;"
                                href="{{ route('login') }}">Login</a>
                        </div>
                        <div class="col-6">
                            <a class="btn btn-primary btn-block" style="margin: 5px;"
                                href="{{ route('register') }}">Register</a>
                        </div>
                    </div>
                    @endif
                    @endif
                </div>
            </div>
        </section>
        <!-- Features -->
        {{-- <section id="templatemo_features">
            <div class="container-fluid">
                <header class="template_header">
                    <h1 class="text-center"><span>...</span> Features <span>...</span></h1>
                </header>
                <div class="col-sm-12">
                    <div class="col-sm-6 col-lg-3 feature-box">
                        <div class="feature-box-inner">
                            <div class="feature-box-icon">
                                <i class="fa fa-music"></i>
                            </div>
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                incididunt ut labore et dolore magna aliqua. Ut enim ad.
                            </p>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3 feature-box">
                        <div class="feature-box-inner">
                            <div class="feature-box-icon">
                                <i class="fa fa-pagelines"></i>
                            </div>
                            <p>
                                Quis nostrud exercitation ullamco laboris nisi ut aliquip. Duis aute irure dolor in
                                reprehenderit in voluptate velit esse.
                            </p>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3 feature-box">
                        <div class="feature-box-inner">
                            <div class="feature-box-icon">
                                <i class="fa fa-ship"></i>
                            </div>
                            <p>
                                Cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident,
                                sunt in culpa qui officia deserunt.
                            </p>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3 feature-box">
                        <div class="feature-box-inner">
                            <div class="feature-box-icon">
                                <i class="fa fa-trophy"></i>
                            </div>
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                incididunt ut labore et dolore magna aliqua. Ut enim ad.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section> --}}
        <!-- Download -->
        {{-- <section id="templatemo_download">
            <div class="container">
                <header class="template_header">
                    <h1 class="text-center"><span>...</span> Download <span>...</span></h1>
                </header>
                <div class="templatemo_download_text_wapper">
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut
                        labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation.
                    </p>
                </div>
                <div class="col-xs-12">
                    <h2>15,050,500</h2>
                </div>
                <div class="col-xs-12">
                    <p>Over 15 millions user on Google play store</p>
                </div>
                <div class="col-xs-12">
                    <a href="#" class="shadow-top-down"><img src="images/download_btn.png" /></a>
                </div>
            </div>
        </section> --}}
        <!-- Contact -->
        {{-- <section id="templatemo_contact">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <header class="template_header">
                            <h1 class="text-center"><span>...</span> Contact <span>...</span></h1>
                        </header>
                        <p class="text-center">
                            <i class="fa fa-map-marker"></i> 1234 Lincoln Way, San Francisco, California<br />
                            <i class="fa fa-envelope"></i> Email: <a
                                href="mailto:info@company.com">info@company.com</a><br />
                            <i class="fa fa-phone"></i> Phone: <a href="tel:010-020-0340">010-020-0340</a>
                        </p>
                    </div>
                </div>
                <form role="form" action="#" method="post">
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-addon"><i class="fa fa-user"></i></div>
                            <input type="text" name="name" class="form-control" id="contact-name" placeholder="Name">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-addon"><i class="fa fa-at"></i></div>
                            <input type="text" name="email" class="form-control" placeholder="Email">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-addon"><i class="fa fa-envelope-o"></i></div>
                            <textarea name="message" class="form-control" id="contact-message"
                                placeholder="Message"></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-xs-6 col-xs-offset-6">
                            <button type="submit" class="form-control">Send</button>
                        </div>
                    </div>
                </form>
                <div class="row">
                    <div class="col-md-6 col-md-offset-3">
                        <ul class="nav nav-pills social">
                            <li><a href="#" class="shadow-top-down social-facebook"><i
                                        class="fa fa-facebook-official"></i></a></li>
                            <li><a href="#" class="shadow-top-down social-twitter"><i
                                        class="fa fa-twitter-square"></i></a></li>
                            <li><a href="#" class="shadow-top-down social-youtube"><i
                                        class="fa fa-youtube-square"></i></a></li>
                            <li><a href="#" class="shadow-top-down social-instagram"><i class="fa fa-instagram"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </section> --}}
        <!-- Footer -->
        {{-- <footer>
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 footer-copyright">
                        <p>Copyright &copy; 2084 <a href="#" target="_parent">Company Name</a></p>
                    </div>
                </div>
            </div>
        </footer> --}}
        <!-- require plugins -->
        <script src="{{ asset('js/jquery.min.js') }}"></script>
        <script src="{{ asset('js/jquery-ui.min.js') }}"></script>
        <script src="{{ asset('js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('js/jquery.parallax.js') }}"></script>
        <!-- template mo config script -->
        <script src="{{ asset('js/templatemo_scripts.js') }}"></script>
    </body>

</html>
