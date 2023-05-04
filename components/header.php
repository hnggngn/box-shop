<header class="border-b">
	<div class="md:mx-14em mx-2 flex items-center justify-between h-80px">
		<div class="flex h-full items-center gap-4">
			<a href="/"
			   class="h-2.5em w-2.5em rounded-full bg-dark ring-2 ring-dark-1/80 flex justify-center items-center">
				<i class="i-solar:box-minimalistic-bold-duotone h-5 w-5 text-white"></i>
			</a>
			<form role="search" method="get" class="mb-0 md:block hidden"
			      action="<?php echo esc_url( home_url( '/' ) ); ?>">
				<label
					class="flex items-center relative rounded-2xl h-3/5 bg-slate-1/80 pl-12 mx-6 w-20em">
					<i class="i-solar:magnifer-bold-duotone absolute left-0 ml-4 mb-.5"></i>
					<input type="search" placeholder="Tên sản phẩm" class="outline-none bg-slate-1/80 h-3/5" name="s"/>
					<input type="hidden" name="post_type" value="product"/>
				</label>
			</form>
		</div>
		<form role="search" method="get" class="mb-0 md:hidden block"
		      action="<?php echo esc_url( home_url( '/' ) ); ?>">
			<label
				class="flex items-center relative rounded-2xl h-3/5 bg-slate-1/80 pl-12 w-20em">
				<i class="i-solar:magnifer-bold-duotone absolute left-0 ml-4 mb-.5"></i>
				<input type="search" placeholder="Tên sản phẩm" class="outline-none bg-slate-1/80 h-3/5" name="s"/>
				<input type="hidden" name="post_type" value="product"/>
			</label>
		</form>
		<div class="relative">
			<div class="absolute top-0 -right-1">
				<?php
				$cart_count = WC()->cart->get_cart_contents_count();

				if ( $cart_count > 0 ) { ?>
					<div
						class="bg-red-5 rounded-full h-5 w-5 flex items-center justify-center text-red-1 text-12px">
						<?= $cart_count ?>
					</div>
				<?php } ?>
			</div>
			<a href="<?= wc_get_cart_url() ?>"
			   class="bg-slate-1/80 rounded-full h-3em w-3em flex items-center justify-center">
				<i class="i-solar:cart-bold"></i>
			</a>
		</div>
	</div>
</header>
<ul class="md:mx-14em mx-2 py-4 flex md:justify-center gap-1 overflow-auto">
	<?php
	$categories = [
		"ban-phim" => "Bàn phím",
		"ghe"      => "Ghế công thái học",
		"laptop"   => "Laptop",
		"man-hinh" => "Màn hình",
		"o-cung"   => "Ổ cứng",
		"tay-cam"  => "Tay cầm",
	];
	foreach ( $categories as $slug => $title ) {
		$term = get_term_by( 'slug', $slug, 'product_cat' );
		if ( $term ) {
			$term_link = get_term_link( $term->term_id, 'product_cat' );
			?>
			<li
				class="p-3 md:w-full md:min-w-0 min-w-max rounded-xl hover:bg-slate-1/80 hover:cursor-pointer transition-colors duration-150 ease-linear">
				<div class="w-full">
					<a href="<?= esc_url( $term_link ); ?>" class="flex items-center justify-center gap-2">
						<img class="w-12 h-12" src="<?= get_template_directory_uri() . '/images/' . $slug . '.png' ?>"
						     alt="<?= $title ?>">
						<span class="font-600 whitespace-nowrap"><?= $title ?></span>
					</a>
				</div>
			</li>
			<?php
		}
	}
	?>
</ul>
