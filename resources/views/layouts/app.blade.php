<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- <meta charset="UTF-8">
    <meta name="description" content="Yoga Studio Template">
    <meta name="keywords" content="Yoga, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Yummy</title> -->

    <!-- Google Font -->
    <link href="{{url('https://fonts.googleapis.com/css?family=PT+Sans:400,700&display=swap')}}" rel="stylesheet">
    <link href="{{url('https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap')}}" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="{{url('css/bootstrap.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{url('css/font-awesome.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{url('css/nice-select.css')}}" type="text/css">
    <link rel="stylesheet" href="{{url('css/slicknav.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{url('css/style.css')}}" type="text/css">

    <style>
        body {
            font-family: 'Nunito';
        }
    </style>
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Header Section Begin -->
    <header class="header-section">
        <div class="container">
            <div class="logo">
                <a href="{{url('home')}}"><img src="{{url('img/logo.png')}}" alt=""></a>
            </div>
            <div class="nav-menu">
                <nav class="main-menu mobile-menu">
                    <ul>
                        <li><a href="{{url('addrecipe')}}">Add Recipe</a></li>
                        <li><a href="{{url('contact-us')}}">Contact</a></li>
                    </ul>
                </nav>
                <div class="nav-right search-switch">
                    <i class="fa fa-search"></i>
                </div>
            </div>
            <div id="mobile-menu-wrap"></div>
        </div>
    </header>
    <!-- Header End -->

    <!-- Recent Recipe Section Begin -->
    <title>Yummy | @yield('mytitle')</title>
    @yield('content')
    <!-- Recent Recipe Section End -->

    <!-- Footer Section Begin -->

    <footer class="footer-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-5">
                    <div class="fs-left">
                        <div class="logo">
                            <a href="{{url('home')}}">
                                <img src="{{url('img/footer-logo.png')}}" alt="">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-12 text-right pt-0">
                        <div class="social-links">
                            <a href="{{url('https://github.com/hanmatharu/tproject-referral.git')}}"><i class="fa fa-github"></i><span>GitHub</span></a>
                        </div>
                    </div>
                </div>
        </div>
    </footer>
    <!-- Footer Section End -->

    <!-- Search model -->
	<div class="search-model">
		<div class="h-100 d-flex align-items-center justify-content-center">
			<div class="search-close-switch">+</div>
			<form class="search-model-form">
				<input type="text" id="search-input" placeholder="Search here.....">
			</form>
		</div>
	</div>
	<!-- Search model end -->

    <!-- Js Plugins -->
    <script src="{{url('js/jquery-3.3.1.min.js')}}"></script>
    <script src="{{url('js/bootstrap.min.js')}}"></script>
    <script src="{{url('js/jquery.slicknav.js')}}"></script>
    <script src="{{url('js/jquery.nice-select.min.js')}}"></script>
    <script src="{{url('js/mixitup.min.js')}}"></script>
    <script src="{{url('js/main.js')}}"></script>
    <link rel="stylesheet" href="{{url('https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css')}}" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    <script src="{{url('https://code.jquery.com/jquery-3.1.1.slim.min.js')}}" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
    <script src="{{url('https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js')}}" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="{{url('https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js')}}" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
</body>

</html>
