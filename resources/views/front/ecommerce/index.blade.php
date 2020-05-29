@extends('front.ecommerce.layouts.ecommerce')

@section('title')
    <title>DW Ecommerce - Pusat Belanja Online</title>
@endsection

@section('content')
    <!--================Home Banner Area =================-->
	<section class="home_banner_area">
		<div class="overlay"></div>
		<div class="banner_inner d-flex align-items-center">
			<div class="container">
				<div class="banner_content row">
					<div class="offset-lg-2 col-lg-8">
						<h3>Fashion for
							<br />Upcoming Winter</h3>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna
							aliqua. Ut enim ad minim veniam, quis nostrud exercitation.</p>
						<a class="white_bg_btn" href="#">View Collection</a>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--================End Home Banner Area =================-->
<!--================Category Area =================-->
<section class="category_area section_gap">
<div class="main_box">
	<div class="row">
		<div class="main_title">
			<h2>Semua Kategori</h2>
			<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Vitae excepturi, quae officia cum repellendus quidem molestias earum repellat dignissimos, voluptate labore sapiente repudiandae inventore eum, similique modi impedit quasi. Quas..</p>
		</div>
	</div>
	<div class="container-fluid row">
		<div class="col-md-2 focus-grid">
			<a href="categories.html">
				<div class="focus-border">
					<div class="focus-layout">
						<div class="focus-image"><i class="fa fa-mobile"></i></div>
						<h4 class="clrchg">Mobiles</h4>
					</div>
				</div>
			</a>
		</div>
		<div class="col-md-2 focus-grid">
			<a href="categories.html#parentVerticalTab2">
				<div class="focus-border">
					<div class="focus-layout">
						<div class="focus-image"><i class="fa fa-laptop"></i></div>
						<h4 class="clrchg"> Electronics & Appliances</h4>
					</div>
				</div>
			</a>
		</div>
		<div class="col-md-2 focus-grid">
			<a href="categories.html#parentVerticalTab3">
				<div class="focus-border">
					<div class="focus-layout">
						<div class="focus-image"><i class="fa fa-car"></i></div>
						<h4 class="clrchg">Cars</h4>
					</div>
				</div>
			</a>
		</div>	
		<div class="col-md-2 focus-grid">
			<a href="categories.html#parentVerticalTab4">
				<div class="focus-border">
					<div class="focus-layout">
						<div class="focus-image"><i class="fa fa-motorcycle"></i></div>
						<h4 class="clrchg">Bikes</h4>
					</div>
				</div>
			</a>
		</div>	
		<div class="col-md-2 focus-grid">
			<a href="categories.html#parentVerticalTab5">
				<div class="focus-border">
					<div class="focus-layout">
						<div class="focus-image"><i class="fa fa-wheelchair"></i></div>
						<h4 class="clrchg">Furnitures</h4>
					</div>
				</div>
			</a>
		</div>
		<div class="col-md-2 focus-grid">
			<a href="categories.html#parentVerticalTab6">
				<div class="focus-border">
					<div class="focus-layout">
						<div class="focus-image"><i class="fa fa-paw"></i></div>
						<h4 class="clrchg">Pets</h4>
					</div>
				</div>
			</a>
		</div>	
		<div class="col-md-2 focus-grid">
			<a href="categories.html#parentVerticalTab7">
				<div class="focus-border">
					<div class="focus-layout">
						<div class="focus-image"><i class="fa fa-book"></i></div>
						<h4 class="clrchg">Books, Sports & Hobbies</h4>
					</div>
				</div>
			</a>
		</div>	
		<div class="col-md-2 focus-grid">
			<a href="categories.html#parentVerticalTab8">
				<div class="focus-border">
					<div class="focus-layout">
						<div class="focus-image"><i class="fa fa-asterisk"></i></div>
						<h4 class="clrchg">Fashion</h4>
					</div>
				</div>
			</a>
		</div>	
		<div class="col-md-2 focus-grid">
			<a href="categories.html#parentVerticalTab9">
				<div class="focus-border">
					<div class="focus-layout">
						<div class="focus-image"><i class="fa fa-gamepad"></i></div>
						<h4 class="clrchg">Kids</h4>
					</div>
				</div>
			</a>
		</div>	
		<div class="col-md-2 focus-grid">
			<a href="categories.html#parentVerticalTab10">
				<div class="focus-border">
					<div class="focus-layout">
						<div class="focus-image"><i class="fa fa-shield"></i></div>
						<h4 class="clrchg">Services</h4>
					</div>
				</div>
			</a>
		</div>
		<div class="col-md-2 focus-grid">
			<a href="categories.html#parentVerticalTab11">
				<div class="focus-border">
					<div class="focus-layout">
						<div class="focus-image"><i class="fa fa-at"></i></div>
						<h4 class="clrchg">Jobs</h4>
					</div>
				</div>
			</a>
		</div>
		<div class="col-md-2 focus-grid">
			<a href="categories.html#parentVerticalTab12">
				<div class="focus-border">
					<div class="focus-layout">
						<div class="focus-image"><i class="fa fa-home"></i></div>
						<h4 class="clrchg">Real Estate</h4>
					</div>
				</div>
			</a>
		</div>
	</div>
</div>
</section>
<!--================End Category Area =================-->
	<!--================Hot Deals Area =================-->
	{{-- <section class="hot_deals_area section_gap">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-6">
					<div class="hot_deal_box">
						<img class="img-fluid" src="{{ asset('ecommerce/img/product/hot_deals/deal1.jpg') }}" alt="">
						<div class="content">
							<h2>Hot Deals of this Month</h2>
							<p>shop now</p>
						</div>
						<a class="hot_deal_link" href="#"></a>
					</div>
				</div>

				<div class="col-lg-6">
					<div class="hot_deal_box">
						<img class="img-fluid" src="{{ asset('ecommerce/img/product/hot_deals/deal1.jpg') }}" alt="">
						<div class="content">
							<h2>Hot Deals of this Month</h2>
							<p>shop now</p>
						</div>
						<a class="hot_deal_link" href="#"></a>
					</div>
				</div>
			</div>
		</div>
	</section> --}}
	<!--================End Hot Deals Area =================-->
	
	<!--================Feature Product Area =================-->
	<section class="feature_product_area section_gap">
		<div class="main_box">
			<div class="container-fluid">
				<div class="row">
					<div class="main_title">
						<h2>Produk Terbaru</h2>
						<p>Tampil trendi dengan kumpulan produk kekinian kami.</p>
					</div>
				</div>
				<div class="row">
          
          <!-- PERHATIAKAN BAGIAN INI, LOOPING DATA PRODUK -->
          @forelse($products as $row)
					<div class="col col1">
						<div class="f_p_item">
							<div class="f_p_img">
                <!-- KEMUDIAN TAMPILKAN IMAGENYA DARI FOLDER /PUBLIC/STORAGE/PRODUCTS -->
                <img class="img-fluid" src="{{ asset('storage/products/' . $row->image) }}" alt="{{ $row->name }}">
								<div class="p_icon">
									<a href="{{ url('/product/' . $row->slug) }}">
										<i class="lnr lnr-cart"></i>
									</a>
								</div>
							</div>
              <!-- KETIKA PRODUK INI DIKLIK MAKA AKAN DIARAHKAN KE URL DIBAWAH -->
              <!-- HANYA SAJA URL TERSEBUT BELUM DISEDIAKAN PADA ARTIKEL KALI INI -->
              <a href="{{ url('/product/' . $row->slug) }}">
                <!-- TAMPILKAN NAMA PRODUK -->
                 <h4>{{ $row->name }}</h4>
							</a>
              <!-- TAMPILKAN HARGA PRODUK -->
              <h5>Rp {{ number_format($row->price) }}</h5>
						</div>
					</div>
          @empty
                    
          @endforelse
				</div>

        <!-- GENERATE PAGINATION UNTUK MEMBUAT NAVIGASI DATA SELANJUTNYA JIKA ADA -->
				<div class="row">
					{{ $products->links() }}
				</div>
			</div>
		</div>
	</section>
	<!--================End Feature Product Area =================-->
@endsection