			<!--MAIN SLIDE-->
			<div class="wrap-main-slide">
				<div class="slide-carousel owl-carousel style-nav-1" data-items="1" data-loop="1" data-nav="true" data-dots="false">
                     {{-- @foreach ($sliders as $slider)
                    <div class="item-slide">
						<img style="height:70vh; " src="{{ asset('productimages/'.$slider->image) }}" alt="" class="img-slide">
						<div class="slide-info slide-1">
							<h2 class="f-title">{{ $slider->name }}</b></h2>
							<span class="subtitle">{{ $slider->description }}</span>
							<p class="sale-info">Only price: <span class="price">{{ $slider->price }}</span></p>
							<a href="#" class="btn-link">Shop Now</a>
						</div>
					</div>
                    @endforeach --}}

                    @foreach ($sliders as $slider)
					<div class="item-slide">
						<img src="{{ asset('productimages/'.$slider->image) }}" alt="" class="img-slide">
						<div class="slide-info slide-2">
							<h2 class="f-title">{{ $slider->name }}</h2>
							{{-- <span class="f-subtitle">On online payments</span> --}}
							{{-- <p class="discount-code">Use Code: #FA6868</p> --}}
							<h4 class="s-price">{{ $slider->price }}</h4>
							<p class="s-subtitle">{{ $slider->description }}</p>
						</div>
					</div>
                    @endforeach
{{-- 
					<div class="item-slide">
						<img src="{{ asset('frontend/assets/images/main-slider-1-3.jpg')}}" alt="" class="img-slide">
						<div class="slide-info slide-3">
							<h2 class="f-title">Great Range of <b>Exclusive Furniture Packages</b></h2>
							<span class="f-subtitle">Exclusive Furniture Packages to Suit every need.</span>
							<p class="sale-info">Stating at: <b class="price">$225.00</b></p>
							<a href="#" class="btn-link">Shop Now</a>
						</div>
					</div> --}}

                </div>
			</div>

			<!--BANNER-->
			<div class="wrap-banner style-twin-default">
				<div class="banner-item">
					<a href="#" class="link-banner banner-effect-1">
						<figure><img src="{{ asset('frontend/assets/images/home-1-banner-1.jpg')}}" alt="" width="580" height="190"></figure>
					</a>
				</div>
				<div class="banner-item">
					<a href="#" class="link-banner banner-effect-1">
						<figure><img src="{{ asset('frontend/assets/images/home-1-banner-2.jpg')}}" alt="" width="580" height="190"></figure>
					</a>
				</div>
			</div>
            <!--On Sale-->
			<div class="wrap-show-advance-info-box style-1 has-countdown">
				<h3 class="title-box">On Sale</h3>
				<div class="wrap-countdown mercado-countdown" data-expire="2020/12/12 12:34:56"></div>
				<div class="wrap-products slide-carousel owl-carousel style-nav-1 equal-container " data-items="5" data-loop="false" data-nav="true" data-dots="false" data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"4"},"1200":{"items":"5"}}'>
                    @foreach($products as $pro)
					<div class="product product-style-2 equal-elem ">
						<div class="product-thumnail">
							<a href="detail.html" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
								<figure><img src="{{ asset('productimages/'.$pro->image) }}" width="800" height="800" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
							</a>
							<div class="group-flash">
								<span class="flash-item sale-label">sale</span>
							</div>
							<div class="wrap-btn">
								<a href="#" class="function-link">quick view</a>
							</div>
						</div>
						<div class="product-info">
							<a href="#" class="product-name"><span>{{ $pro->name }}</span></a>
							<div class="wrap-price"><span class="product-price">{{ $pro->price }}</span></div>
						</div>
					</div>
                    @endforeach
				</div>
			</div>
			<!--Latest Products-->
			<div class="wrap-show-advance-info-box style-1">
				<h3 class="title-box">Latest Products</h3>
				<div class="wrap-top-banner">
					<a href="#" class="link-banner banner-effect-2">
						<figure><img src="{{ asset('frontend/assets/images/digital-electronic-banner.jpg')}}" width="1170" height="240" alt=""></figure>
					</a>
				</div>
				<div class="wrap-products">
					<div class="wrap-product-tab tab-style-1">
						<div class="tab-contents">
							<div class="tab-content-item active" id="digital_1a">
								<div class="wrap-products slide-carousel owl-carousel style-nav-1 equal-container" data-items="5" data-loop="false" data-nav="true" data-dots="false" data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"4"},"1200":{"items":"5"}}' >
								@foreach($latest_products as $lp)
								<div class="product product-style-2 equal-elem ">
										<div class="product-thumnail">
											<a href="detail.html" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
												<figure><img src="{{ asset('productimages/'.$lp->image) }}" width="800" height="800" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
											</a>
											<div class="group-flash">
												<span class="flash-item new-label">new</span>
											</div>
											<div class="wrap-btn">
												<a href="#" class="function-link">quick view</a>
											</div>
										</div>
										<div class="product-info">
											<a href="#" class="product-name"><span>{{ $lp->name }}</span></a>
											<div class="wrap-price"><span class="product-price">{{ $lp->price }}</span></div>
										</div>
									</div>
									@endforeach

								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<!--Product Categories-->
			<div class="wrap-show-advance-info-box style-1">
				<h3 class="title-box">Product Categories</h3>
				<div class="wrap-top-banner">
					<a href="#" class="link-banner banner-effect-2">
						<figure><img src="{{ asset('frontend/assets/images/fashion-accesories-banner.jpg')}}" width="1170" height="240" alt=""></figure>
					</a>
				</div>
				<div class="wrap-products">
					<div class="wrap-product-tab tab-style-1">
						<div class="tab-control">
						<!-- <a href="#all-cats" class="tab-control-item active">All Categories</a> -->
                            @foreach($cats as $cat)
							<a href="#{{ $cat->id }}" data-value="{{$cat->id}}" class="tab-control-item @if($loop->first) active @endif">{{ $cat->name }}</a>
                            @endforeach
						</div>
						<div class="tab-contents">

						@foreach($cats as $cat)
							<div class="tab-content-item  @if($loop->first) active @endif" id="{{ $cat->id }}">
								<div class="wrap-products slide-carousel owl-carousel style-nav-1 equal-container" data-items="5" data-loop="false" data-nav="true" data-dots="false" data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"4"},"1200":{"items":"5"}}' >
                                @foreach($products as $pro)
								@if($pro->category_id == $cat->id)
                                <div class="product product-style-2 equal-elem ">
										<div class="product-thumnail">
											<a href="detail.html" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
												<figure><img src="{{ asset('productimages/'.$pro->image) }}" width="800" height="800" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
											</a>
											<div class="group-flash">
												<span class="flash-item new-label">new</span>
											</div>
											<div class="wrap-btn">
												<a href="#" class="function-link">quick view</a>
											</div>
										</div>
										<div class="product-info">
											<a href="#" class="product-name"><span>{{ $pro->name }}</span></a>
											<div class="wrap-price"><span class="product-price">{{ $pro->price }}</span></div>
										</div>
									</div>
									@endif
                                    @endforeach
								</div>
							</div>
							@endforeach

							<!-- @foreach($cats as $cat)
							<div class="tab-content-item" id="all-cats">
								<div class="wrap-products slide-carousel owl-carousel style-nav-1 equal-container" data-items="5" data-loop="false" data-nav="true" data-dots="false" data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"4"},"1200":{"items":"5"}}' >
                                @foreach($products as $pro)
                                <div class="product product-style-2 equal-elem ">
										<div class="product-thumnail">
											<a href="detail.html" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
												<figure><img src="{{ asset('productimages/'.$pro->image) }}" width="800" height="800" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
											</a>
											<div class="group-flash">
												<span class="flash-item new-label">new</span>
											</div>
											<div class="wrap-btn">
												<a href="#" class="function-link">quick view</a>
											</div>
										</div>
										<div class="product-info">
											<a href="#" class="product-name"><span>{{ $pro->name }}</span></a>
											<div class="wrap-price"><span class="product-price">{{ $pro->price }}</span></div>
										</div>
									</div>
                                    @endforeach
								</div>
							</div>
							@endforeach -->

						</div>
					</div>
				</div>
			</div>

<script>


const buttons = document.querySelectorAll('.cats');

// Loop through each button and add a click event listener
buttons.forEach(button => {
  button.addEventListener('click', function() {
    // Get the value of the "data-value" attribute on the clicked button
    const value = this.dataset.value;

    // Log the value to the console
    console.log(value);

  });
});

</script>
