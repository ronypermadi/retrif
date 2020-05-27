<!DOCTYPE html>
<html>
<head>
<title>Resale a Business Category Flat Bootstrap Responsive Website Template | Home :: w3layouts</title>
<link rel="stylesheet" href="{{ asset('/front/css/bootstrap.min.css')}}">
<link rel="stylesheet" href="{{ asset('/front/css/bootstrap-select.css')}}">
<link href="{{ asset('/front/css/style.css')}}" rel="stylesheet" type="text/css" media="all" />
<link rel="stylesheet" href="{{ asset('/front/css/flexslider.css')}}" type="text/css" media="screen" />
<link rel="stylesheet" href="{{ asset('/front/css/font-awesome.min.css')}}" />
<!-- for-mobile-apps -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Resale Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, Sony Ericsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //for-mobile-apps -->
<!--fonts-->
<link href='//fonts.googleapis.com/css?family=Ubuntu+Condensed' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
<!--//fonts-->	
<!-- js -->
<script type="text/javascript" src="{{ asset('/front/js/jquery.min.js')}}"></script>
<!-- js -->
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="{{ asset('/front/js/bootstrap.min.js')}}"></script>
<script src="{{ asset('/front/js/bootstrap-select.js')}}"></script>
<script>
  $(document).ready(function () {
    var mySelect = $('#first-disabled2');

    $('#special').on('click', function () {
      mySelect.find('option:selected').prop('disabled', true);
      mySelect.selectpicker('refresh');
    });

    $('#special2').on('click', function () {
      mySelect.find('option:disabled').prop('disabled', false);
      mySelect.selectpicker('refresh');
    });

    $('#basic2').selectpicker({
      liveSearch: true,
      maxOptions: 1
    });
  });
</script>
<script type="text/javascript" src="{{ asset('/front/js/jquery.leanModal.min.js')}}"></script>
<link href="{{ asset('/front/css/jquery.uls.css')}}" rel="stylesheet"/>
<link href="{{ asset('/front/css/jquery.uls.grid.css')}}" rel="stylesheet"/>
<link href="{{ asset('/front/css/jquery.uls.lcd.css')}}" rel="stylesheet"/>
<!-- Source -->
<script src="{{ asset('/front/js/jquery.uls.data.js')}}"></script>
<script src="{{ asset('/front/js/jquery.uls.data.utils.js')}}"></script>
<script src="{{ asset('/front/js/jquery.uls.lcd.js')}}"></script>
<script src="{{ asset('/front/js/jquery.uls.languagefilter.js')}}"></script>
<script src="{{ asset('/front/js/jquery.uls.regionfilter.js')}}"></script>
<script src="{{ asset('/front/js/jquery.uls.core.js')}}"></script>
<script>
			$( document ).ready( function() {
				$( '.uls-trigger' ).uls( {
					onSelect : function( language ) {
						var languageName = $.uls.data.getAutonym( language );
						$( '.uls-trigger' ).text( languageName );
					},
					quickList: ['en', 'hi', 'he', 'ml', 'ta', 'fr'] //FIXME
				} );
			} );
        </script>
@stack('header')
</head>
<body>
	<div class="header">
		<div class="container">
			<div class="logo">
				<a href="#"><span>Re</span>sale</a>
			</div>
			<div class="header-right">
			<a class="account" href="#">My Account</a>
			<span class="active uls-trigger">Select language</span>
	<!-- Large modal -->
			<div class="selectregion">
				<button class="btn btn-primary" data-toggle="modal" data-target="#myModal">
				Select Your Region</button>
					<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
					aria-hidden="true">
						<div class="modal-dialog modal-lg">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
										&times;</button>
									<h4 class="modal-title" id="myModalLabel">
										Please Choose Your Location</h4>
								</div>
								<div class="modal-body">
									 <form class="form-horizontal" role="form">
										<div class="form-group">
											<select id="basic2" class="show-tick form-control" multiple>
												<optgroup label="Popular Cities">
													<option selected style="display:none;color:#eee;">Select City</option>
													<option>Birmingham</option>
													<option>Anchorage</option>
													<option>Phoenix</option>
													<option>Little Rock</option>
													<option>Los Angeles</option>
													<option>Denver</option>
													<option>Bridgeport</option>
													<option>Wilmington</option>
													<option>Jacksonville</option>
													<option>Atlanta</option>
													<option>Honolulu</option>
													<option>Boise</option>
													<option>Chicago</option>
													<option>Indianapolis</option>
												</optgroup>
											</select>
										</div>
									  </form>    
								</div>
							</div>
						</div>
					</div>
				<script>
				$('#myModal').modal('');
				</script>
			</div>
		</div>
		</div>
	</div>
	<div class="main-banner banner text-center">
	  <div class="container">    
			<h1>Sell or Advertise   <span class="segment-heading">    anything online </span> with Resale</h1>
			<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry</p>
			<a href="#">Post Free Ad</a>
	  </div>
	</div>
		<!-- content-starts-here -->
@yield('content')
<!--footer section start-->		
<footer>
    <div class="footer-top">
        <div class="container">
            <div class="foo-grids">
                <div class="col-md-3 footer-grid">
                    <h4 class="footer-head">Who We Are</h4>
                    <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>
                    <p>The point of using Lorem Ipsum is that it has a more-or-less normal letters, as opposed to using 'Content here.</p>
                </div>
                <div class="col-md-3 footer-grid">
                    <h4 class="footer-head">Help</h4>
                    <ul>
                        <li><a href="#">How it Works</a></li>						
                        <li><a href="#">Sitemap</a></li>
                        <li><a href="#">Faq</a></li>
                        <li><a href="#">Feedback</a></li>
                        <li><a href="#">Contact</a></li>
                        <li><a href="#">Shortcodes</a></li>
                    </ul>
                </div>
                <div class="col-md-3 footer-grid">
                    <h4 class="footer-head">Information</h4>
                    <ul>
                        <li><a href="#">Locations Map</a></li>	
                        <li><a href="#">Terms of Use</a></li>
                        <li><a href="#">Popular searches</a></li>	
                        <li><a href="#">Privacy Policy</a></li>	
                    </ul>
                </div>
                <div class="col-md-3 footer-grid">
                    <h4 class="footer-head">Contact Us</h4>
                    <span class="hq">Our headquarters</span>
                    <address>
                        <ul class="location">
                            <li><span class="glyphicon glyphicon-map-marker"></span></li>
                            <li>CENTER FOR FINANCIAL ASSISTANCE TO DEPOSED NIGERIAN ROYALTY</li>
                            <div class="clearfix"></div>
                        </ul>	
                        <ul class="location">
                            <li><span class="glyphicon glyphicon-earphone"></span></li>
                            <li>+0 561 111 235</li>
                            <div class="clearfix"></div>
                        </ul>	
                        <ul class="location">
                            <li><span class="glyphicon glyphicon-envelope"></span></li>
                            <li><a href="mailto:info@example.com">mail@example.com</a></li>
                            <div class="clearfix"></div>
                        </ul>						
                    </address>
                </div>
                <div class="clearfix"></div>
            </div>						
        </div>	
    </div>	
    <div class="footer-bottom text-center">
    <div class="container">
        <div class="footer-logo">
            <a href="#"><span>Re</span>sale</a>
        </div>
        <div class="footer-social-icons">
            <ul>
                <li><a class="facebook" href="#"><span>Facebook</span></a></li>
                <li><a class="twitter" href="#"><span>Twitter</span></a></li>
                <li><a class="flickr" href="#"><span>Flickr</span></a></li>
                <li><a class="googleplus" href="#"><span>Google+</span></a></li>
                <li><a class="dribbble" href="#"><span>Dribbble</span></a></li>
            </ul>
        </div>
        <div class="copyrights">
            <p> © 2016 Resale. All Rights Reserved | Design by  <a href="http://w3layouts.com/"> W3layouts</a></p>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
</footer>
<!--footer section end-->
@stack('footer')
</body>
</html>