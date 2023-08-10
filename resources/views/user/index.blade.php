
@include('user.layout.header')
	<main id="main">
		<div class="container">
            @include('user.layout.home', ['products', $products, 'cats', $cats, 'latest_products', $latest_products])
		</div>
	</main>
@include('user.layout.footer')