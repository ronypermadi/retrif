<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="icon" href="{{ asset('assets/img/favicon.jpg')}}">
    
    @yield('title')
    
	<link rel="stylesheet" href="{{ asset('ecommerce/css/bootstrap.css') }}">
	<link rel="stylesheet" href="{{ asset('ecommerce/vendors/linericon/style.css') }}">
	<link rel="stylesheet" href="{{ asset('ecommerce/css/font-awesome.min.css') }}">
	<link rel="stylesheet" href="{{ asset('ecommerce/vendors/owl-carousel/owl.carousel.min.css') }}">
	<link rel="stylesheet" href="{{ asset('ecommerce/vendors/lightbox/simpleLightbox.css') }}">
	<link rel="stylesheet" href="{{ asset('ecommerce/vendors/nice-select/css/nice-select.css') }}">
	<link rel="stylesheet" href="{{ asset('ecommerce/vendors/animate-css/animate.css') }}">
	<link rel="stylesheet" href="{{ asset('ecommerce/vendors/jquery-ui/jquery-ui.css') }}">
	
	<link rel="stylesheet" href="{{ asset('ecommerce/css/style.css') }}">
	<link rel="stylesheet" href="{{ asset('ecommerce/css/responsive.css') }}">
	<style>
		.menu-sidebar-area {
		  list-style-type:none; padding-left: 0; font-size: 15pt;
		}
		.menu-sidebar-area > li {
		  margin:0 0 10px 0;
		  list-style-position:inside;
		  border-bottom: 1px solid black;
		}
		.menu-sidebar-area > li > a {
		  color: black
		}
	  </style>
	  @yield('css')
</head>

<body>
	<!--================Header Menu Area =================-->
	<header class="header_area">
		<div class="top_menu row m0">
			<div class="container-fluid">
				<div class="float-left">
					<p onload="">Hubungi kami : 0272 0000 0000 | <b>Latitude</b> : <input type="text" name="lat" id="lat" style="border: none;
						border-color: transparent;" > | <b>Longitude</b> : <input type="text" name="long" id="long" style="border: none;
border-color: transparent;"></p>
				</div>
				<div class="float-right">
					<ul class="right_side">
						<h5>{{\Carbon\Carbon::now()->format('d M Y')}}</h5>
					</ul>
				</div>
			</div>
		</div>
		<div class="main_menu">
			<nav class="navbar navbar-expand-lg navbar-light">
				<div class="container-fluid">
					<!-- Brand and toggle get grouped for better mobile display -->
                    <a class="navbar-brand logo_h" href="{{ url('/') }}">
						<img src="{{ asset('assets/img/Logo.png') }}" alt="">
					</a>
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
					 aria-expanded="false" aria-label="Toggle navigation">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse offset" id="navbarSupportedContent">
						<div class="row w-100">
							<div class="col-lg-7 pr-0">
								{{-- <ul class="nav navbar-nav center_nav  pull-right"></ul> --}}
								 <div class="container-fluid">
									<div class="input-group" id="adv-search">
										<input type="text" class="form-control" placeholder="Search for anything" />
										<div class="input-group-btn">
											<div class="btn-group" role="group">
												<div class="dropdown dropdown-lg">
													<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><span class="caret"></span></button>
													<div class="dropdown-menu dropdown-menu-right" role="menu">
														<form class="form-horizontal" role="form">
														  <div class="form-group">
															<label for="filter">Pilih Provinsi</label>
															<select class="form-control">
																<option value="0" selected>All Snippets</option>
																<option value="1">Featured</option>
																<option value="2">Most popular</option>
																<option value="3">Top rated</option>
																<option value="4">Most commented</option>
															</select>
														  </div>
														  <div class="form-group">
															<label for="filter">Pilih Provinsi</label>
															<select class="form-control">
																<option value="0" selected>All Snippets</option>
																<option value="1">Featured</option>
																<option value="2">Most popular</option>
																<option value="3">Top rated</option>
																<option value="4">Most commented</option>
															</select>
														  </div>
														  <div class="form-group">
															<label for="filter">Pilih Provinsi</label>
															<select class="form-control">
																<option value="0" selected>All Snippets</option>
																<option value="1">Featured</option>
																<option value="2">Most popular</option>
																<option value="3">Top rated</option>
																<option value="4">Most commented</option>
															</select>
														  </div>
														  <button type="submit" class="btn btn-primary"><span class="fa fa-search" aria-hidden="true"></span> Search</button>
														</form>
													</div>
												</div>
												<button type="button" class="btn btn-primary"><span class="fa fa-search" aria-hidden="true"></span> Search</button>
											</div>
										</div>
									</div>
								  </div>
								</div>
							</div>
							<div class="col-lg-5">
								<ul class="nav navbar-nav navbar-right right_nav pull-right">
									<hr>
									@if (auth()->guard('customer')->check())
									<li class="nav-item">
										<a href="{{ route('customer.dashboard') }}" class="icons"><i class="fa fa-user" aria-hidden="true"> Account</i>
										</a>
									</li>
									<li class="nav-item">
										<a href="{{ route('customer.logout') }}" class="icons">
											<i class="fa fa-sign-out" aria-hidden="true"></i>
										</a>
									</li>
									@else
										<li class="nav-item">
											<a href="{{ route('customer.login') }}" class="icons">
												<i class="fa fa-sign-in" aria-hidden="true"> Login</i>
											</a>
										</li>
									@endif									
									<hr>
									<li class="nav-item">
										<a href="{{ route('front.list_cart') }}" class="icons">
										  <i class="lnr lnr lnr-cart">({{$mycart}})</i>
										</a>
									  </li> 
									<hr>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</nav>
		</div>
		<div class="bot_menu row m0">
			@include('front.ecommerce.layouts.menu')
			
		</div>
	</header>
	<!--================Header Menu Area =================-->

    @yield('content')
    
    <!--================ Subscription Area ================-->
	<section class="subscription-area section_gap">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="section-title text-center">
                        <h2>Subscribe for Our Newsletter</h2>
                        <span>We won’t send any kind of spam</span>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div id="mc_embed_signup">
                        <form target="_blank" novalidate action="https://spondonit.us12.list-manage.com/subscribe/post?u=1462626880ade1ac87bd9c93a&id=92a4423d01"
                            method="get" class="subscription relative">
                            <input type="email" name="EMAIL" placeholder="Email address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email address'"
                                required="">
                            <!-- <div style="position: absolute; left: -5000px;">
                                <input type="text" name="b_36c4fd991d266f23781ded980_aefe40901a" tabindex="-1" value="">
                            </div> -->
                            <button type="submit" class="newsl-btn">Get Started</button>
                            <div class="info"></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================ End Subscription Area ================-->

	<!--================ start footer Area  =================-->
	<footer class="footer-area section_gap">
		<div class="container">
			<div class="row">
				<div class="col-lg-3  col-md-6 col-sm-6">
					<div class="single-footer-widget">
						<h6 class="footer_title">About Us</h6>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore dolore magna aliqua.</p>
					</div>
				</div>
				<div class="col-lg-4 col-md-6 col-sm-6">
					<div class="single-footer-widget">
						<h6 class="footer_title">Newsletter</h6>
						<p>Stay updated with our latest trends</p>
						<div id="mc_embed_signup">
							<form target="_blank" action="https://spondonit.us12.list-manage.com/subscribe/post?u=1462626880ade1ac87bd9c93a&amp;id=92a4423d01"
							 method="get" class="subscribe_form relative">
								<div class="input-group d-flex flex-row">
									<input name="EMAIL" placeholder="Email Address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email Address '"
									 required="" type="email">
									<button class="btn sub-btn">
										<span class="lnr lnr-arrow-right"></span>
									</button>
								</div>
								<div class="mt-10 info"></div>
							</form>
						</div>
					</div>
				</div>
				<div class="col-lg-3 col-md-6 col-sm-6">
					<div class="single-footer-widget instafeed">
						<h6 class="footer_title">Instagram Feed</h6>
						<ul class="list instafeed d-flex flex-wrap">
							@for ($i = 1; $i <= 8; $i++)
							<li>
								<img src="{{ asset('ecommerce/img/instagram/Image-01.jpg') }}" alt="">
							</li>
							@endfor
						</ul>
					</div>
				</div>
				<div class="col-lg-2 col-md-6 col-sm-6">
					<div class="single-footer-widget f_social_wd">
						<h6 class="footer_title">Follow Us</h6>
						<p>Let us be social</p>
						<div class="f_social">
							<a href="#">
								<i class="fa fa-facebook"></i>
							</a>
							<a href="#">
								<i class="fa fa-twitter"></i>
							</a>
							<a href="#">
								<i class="fa fa-dribbble"></i>
							</a>
							<a href="#">
								<i class="fa fa-behance"></i>
							</a>
						</div>
					</div>
				</div>
			</div>
			<div class="row footer-bottom d-flex justify-content-between align-items-center">
				<p class="col-lg-12 footer-text text-center">
                    Copyright &copy;<script>document.write(new Date().getFullYear());</script> 
                    All rights reserved |
                    <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://www.ronypermadi.com" target="_blank">Rony Permadi</a>
				</p>
			</div>
		</div>
	</footer>
	<!--================ End footer Area  =================-->

	<script src="{{ asset('ecommerce/js/jquery-3.2.1.min.js') }}"></script>
	<script src="{{ asset('ecommerce/js/popper.js') }}"></script>
	<script src="{{ asset('ecommerce/js/bootstrap.min.js') }}"></script>
	<script src="{{ asset('ecommerce/js/stellar.js') }}"></script>
	<script src="{{ asset('ecommerce/vendors/lightbox/simpleLightbox.min.js') }}"></script>
	<script src="{{ asset('ecommerce/vendors/nice-select/js/jquery.nice-select.min.js') }}"></script>
	<script src="{{ asset('ecommerce/vendors/isotope/imagesloaded.pkgd.min.js') }}"></script>
	<script src="{{ asset('ecommerce/vendors/isotope/isotope-min.js') }}"></script>
	<script src="{{ asset('ecommerce/vendors/owl-carousel/owl.carousel.min.js') }}"></script>
	<script src="{{ asset('ecommerce/js/jquery.ajaxchimp.min.js') }}"></script>
	<script src="{{ asset('ecommerce/vendors/counter-up/jquery.waypoints.min.js') }}"></script>
	<script src="{{ asset('ecommerce/vendors/flipclock/timer.js') }}"></script>
	<script src="{{ asset('ecommerce/vendors/counter-up/jquery.counterup.js') }}"></script>
	<script src="{{ asset('ecommerce/js/mail-script.js') }}"></script>
	<script src="{{ asset('ecommerce/js/theme.js') }}"></script>
	@yield('js')
	<script>
		// var x = document.getElementById("mylocation");
		
			function getLocation(){
				if (navigator.geolocation){
					navigator.geolocation.getCurrentPosition(showPosition);
				}
				// else{
				// 	x.innerHTML="Geolocation is not supported by this browser.";
				// }
			}
			
			function showPosition(position){
				// x.innerHTML="Latitude: " + position.coords.latitude + 
				// "<br>Longitude: " + position.coords.longitude;  
				$('#long').val(position.coords.longitude);
				$('#lat').val(position.coords.latitude);
			}
			getLocation()
		</script>
</body>
</html>