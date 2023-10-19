<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<!--<![endif]-->

<head>
<meta charset="utf-8">
<meta name="description" content="">
<meta name="author" content="webthemez">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Express</title>
<link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/flexslider.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/jquery.fancybox.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/font-icon.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/animate.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style4.css') }}" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
<link rel="stylesheet" href="http://cdn.bootcss.com/animate.css/3.5.1/animate.min.css">
</head>

<body>
<!-- header section -->
<section class="banner" role="banner" id="home">
  <header id="header">
    <div class="header-content clearfix"> <a class="logo" href="{{ url('/') }}">Carwash Project</a>
      <nav class="navigation" role="navigation">
        <ul class="primary-nav">
            @if (Route::has('login'))
                    @auth
                        <li><a href="{{ url('/home') }}">Dashboard</a></li>
                    @else
                        <li><a href="{{ route('login') }}">Login</a></li>

                        @if (Route::has('register'))
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @endif
                    @endauth
            @endif
		 <li><a href="{{ url('/') }}">Home</a></li>
          <li><a href="#services">Services</a></li>
          <li><a href="#content-3-10">About</a></li>
        </ul>
      </nav>
      <a href="#" class="nav-toggle">Menu<span></span></a> </div>
  </header>
  <!-- banner text -->

<div id="first-slider">
    <div id="carousel-example-generic" class="carousel slide carousel-fade">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
            <li data-target="#carousel-example-generic" data-slide-to="1"></li>
            <li data-target="#carousel-example-generic" data-slide-to="2"></li>
            <li data-target="#carousel-example-generic" data-slide-to="3"></li>
        </ol>
        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">
            <!-- Item 1 -->
            <div class="item active slide1">
                <div class="row"><div class="container">
                    <div class="col-md-9 text-left">
                        <h3 data-animation="animated bounceInDown">Best Car Wash</h3>
                        <h4 data-animation="animated bounceInUp">Easily use stunning effects</h4>
                     </div>
                </div></div>
             </div>
            <!-- Item 2 -->
            <div class="item slide2">
                <div class="row"><div class="container">
                    <div class="col-md-7 text-left">
                        <h3 data-animation="animated bounceInDown">Quick Servicing</h3>
                        <h4 data-animation="animated bounceInUp">Create beautiful slideshows </h4>
                     </div>
                </div></div>
            </div>
            <!-- Item 3 -->
            <div class="item slide3">
                <div class="row"><div class="container">
                    <div class="col-md-7 text-left">
                        <h3 data-animation="animated bounceInDown">Quality Checkup</h3>
                        <h4 data-animation="animated bounceInUp">Checking in style</h4>
                     </div>
                </div></div>
            </div>
        </div>
        <!-- End Wrapper for slides-->
        <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
            <i class="fa fa-angle-left"></i><span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
            <i class="fa fa-angle-right"></i><span class="sr-only">Next</span>
        </a>
    </div>
</div>

</section>
<!-- header section -->
<!-- intro section -->
<section id="intro" class="section intro">
  <div class="container">
    <div class="col-md-10 col-md-offset-1 text-center">
      <h3>Best Car Wash In The City</h3>
      <p>We handle your cars in the best possible way. All bookings are managed accordingly.</p>
    </div>
  </div>
</section>
<!-- intro section -->
<!-- services section -->
<section id="services" class="services service-section">
    <div class="container">
      <div class="section-header">
        <h2 class="wow fadeInDown animated">Our Services</h2>
        <p class="wow fadeInDown animated">Discover our top-notch services that cater to all your car needs. We ensure your vehicle receives the care it deserves.</p>
      </div>
      <div class="row">
        <div class="col-md-4 col-sm-6 services text-center">
          <span class="icon icon-focus"></span>
          <div class="services-content">
            <h5>Car Wash</h5>
            <p>Our professional car wash service guarantees a spotless shine for your vehicle. We use advanced techniques to ensure your car looks brand new.</p>
          </div>
        </div>
        <div class="col-md-4 col-sm-6 services text-center">
          <span class="icon icon-ribbon"></span>
          <div class="services-content">
            <h5>Car Servicing</h5>
            <p>Experience comprehensive car servicing by our skilled technicians. We perform thorough inspections and maintenance to enhance your car's performance and longevity.</p>
          </div>
        </div>
        <div class="col-md-4 col-sm-6 services text-center">
          <span class="icon icon-megaphone"></span>
          <div class="services-content">
            <h5>Car Checkup</h5>
            <p>Ensure your car's health with our detailed checkup service. We diagnose and address any issues, providing you with a reliable and safe vehicle.</p>
          </div>
        </div>
        <div class="col-md-4 col-sm-6 services text-center">
          <span class="icon icon-flag"></span>
          <div class="services-content">
            <h5>Painting</h5>
            <p>Transform your car with our expert painting service. Our skilled painters use high-quality materials to give your vehicle a stunning and durable finish.</p>
          </div>
        </div>
        <div class="col-md-4 col-sm-6 services text-center">
          <span class="icon icon-map"></span>
          <div class="services-content">
            <h5>Modifying</h5>
            <p>Explore endless possibilities with our car modification service. We customize your vehicle according to your preferences, enhancing both style and performance.</p>
          </div>
        </div>
        <div class="col-md-4 col-sm-6 services text-center">
          <span class="icon icon-envelope"></span>
          <div class="services-content">
            <h5>Alignment</h5>
            <p>Ensure your car's stability and handling with our precise wheel alignment service. We optimize your vehicle's alignment for a smooth and safe ride.</p>
          </div>
        </div>
      </div>
    </div>
  </section>

<!-- services section -->
<!--About-->
<section id="content-3-10" class="content-block data-section nopad content-3-10">
	<div class="image-container col-sm-6 col-xs-12 pull-left">
		<div class="background-image-holder">

		</div>
	</div>

	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-6 col-sm-offset-6 col-xs-12 content">
      <div class="editContent">
    <h3>About Our Company</h3>
</div>
<div class="editContent">
    <p>Welcome to Carwash Project, your premier destination for top-notch car care services in the heart of the city. With a passion for excellence and a commitment to quality, we redefine the car wash experience.</p>
    <p>At Carwash Project, we pride ourselves on delivering exceptional car cleaning, servicing, and maintenance solutions tailored to your vehicle's needs. Our team of skilled professionals ensures your car not only looks its best but also operates at peak performance.</p>
    <p>Driven by innovation and customer satisfaction, we go the extra mile to provide you with a seamless and convenient car care experience. Discover the difference of our meticulous attention to detail and customer-focused approach. Trust us with your car, and let us exceed your expectations.</p>
</div>

			</div>
		</div><!-- /.row-->
	</div><!-- /.container -->
</section>


<!-- package section -->

<!-- package section -->


<!-- Testimonials section -->
<section id="testimonials" class="section testimonials no-padding">
  <div class="container-fluid">
    <div class="row no-gutter">
      <div class="flexslider">
        <ul class="slides">
          <li>
            <div class="col-md-12">
              <blockquote>
                <h1>"Carwash Project provides top-notch car care services. They truly care about their customers and go the extra mile to ensure your vehicle is in great hands." </h1>
                <p>Chris Mentsl</p>
              </blockquote>
            </div>
          </li>
          <li>
            <div "col-md-12">
              <blockquote>
                <h1>"I was amazed by the quality of service at Carwash Project. Their team is professional and efficient, and I always leave with a spotless car." </h1>
                <p>Kristean Velnly</p>
              </blockquote>
            </div>
          </li>
          <li>
            <div class="col-md-12">
              <blockquote>
                <h1>"Carwash Project is the best in the business. They provide top-tier car servicing and maintenance, ensuring my vehicle runs smoothly." </h1>
                <p>Markus Denny</p>
              </blockquote>
            </div>
          </li>
          <li>
            <div class="col-md-12">
              <blockquote>
                <h1>"I trust Carwash Project with all my car care needs. Their alignment and modification services are exceptional, and their staff is friendly and reliable." </h1>
                <p>John Doe</p>
              </blockquote>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </div>
</section>
<!-- Testimonials section -->

<!-- Footer section -->
<footer class="footer">
<div class="container-fluid">
<div id="map-row" class="row">
          <div id="map-overlay" class="col-sm-6" style="">
    		<h2 style="margin-top:0;color:#fff;">Contact us</h2>
    		<address style="color:#fff;">
    			<strong>Company name</strong><br>
    			25, Alheri Zaria Rd. Jos.<br>
    			Jos North, HQ<br>
    			Nigeria<br>
    			V6G 1G9<br>
    			<abbr title="Phone">Tel:</abbr> (234) 800000000000
    		</address>
			  © 2018 Company Name. Template by <a target="_blank" href="#" title="Bootstrap Themes and HTML Templates">iykeslim.com</a>
    	</div>
    <div class="col-sm-6">
    <iframe width="100%" height="400" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3925.683051444394!2d8.8976!3d9.9173!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x104c5f1a8ee87f77%3A0xfa4a975f0b1be9d7!2sJos%2C%20Plateau%20State%2C%20Nigeria!5e0!3m2!1sen!2sus!4v1634245043949!5m2!1sen!2sus"></iframe>


    </div>
	 </div>
</div>
</footer>
<!-- Footer section -->
<!-- JS FILES -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="{{ asset('asset/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('asset/js/jquery.flexslider-min.js') }}"></script>
<script src="{{ asset('asset/js/jquery.fancybox.pack.js') }}"></script>
<script src="{{ asset('asset/js/retina.min.js') }}"></script>
<script src="{{ asset('asset/js/modernizr.js') }}"></script>
<script src="{{ asset('asset/js/main.js') }}"></script>
<script type="text/javascript" src="{{ asset('asset/js/jquery.contact.js') }}"></script>
</body>
</html>
