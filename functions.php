<?php

function main_header(): void {
	wp_enqueue_style( "unocss", get_template_directory_uri() . '/assets/css/uno.css', null, null, null );
	wp_enqueue_style( "main", get_template_directory_uri() . '/assets/css/style.css', null, null, null );
	wp_enqueue_style( "reset", "https://cdn.jsdelivr.net/npm/@unocss/reset/tailwind.min.css", null, null, null );

	wp_enqueue_script( "main", get_template_directory_uri() . '/assets/js/box.js', null, null, true );
}

add_action( 'wp_enqueue_scripts', 'main_header' );

add_action( 'wp_ajax_get_products', 'get_products' );
add_action( 'wp_ajax_nopriv_get_products', 'get_products' );

function get_products(): void {
	$category = $_POST["category"];
	$args     = [
		'post_type'      => 'product',
		'posts_per_page' => 10,
		'tax_query'      => [
			[
				'taxonomy' => 'product_cat',
				'field'    => 'slug',
				'terms'    => $category
			]
		]
	];
	$products = new WP_Query( $args );

	ob_start();

	if ( $products->have_posts() ) :
		while ( $products->have_posts() ) : $products->the_post();
			$product_price      = wc_price( get_post_meta( get_the_ID(), '_price', true ) );
			$product_title      = get_the_title();
			$product_excerpt    = get_the_excerpt();
			$product_categories = wp_get_post_terms( get_the_ID(), 'product_cat' );
			$categories_slugs   = array();

			foreach ( $product_categories as $category ) {
				$categories_slugs[] = $category->slug;
			}

			$categories_string = implode( ' ', $categories_slugs );
			$permalink         = get_permalink();

			?>
			<li class="product-item <?php echo $categories_string; ?> rounded-2xl hover:cursor-pointer transition-colors duration-150 ease-linear flex flex-col items-center gap-2 overflow-hidden bg-white">
				<a href="<?= $permalink; ?>">
					<?php the_post_thumbnail( '', array( 'class' => 'w-230px h-230px' ) ); ?>
					<div class="p-4">
						<div class="font-600 line-clamp-2"><?php echo $product_title; ?></div>
						<?php if ( $product_excerpt ): ?>
							<div class="text-red-5 font-600 my-4 border-b pb-4">
                                <span
	                                class="text-slate-5/80 font-500 text-12px">Từ: </span><?php echo $product_price; ?>
							</div>
							<div class="text-gray-5 font-500 mt-4 text-12px"><?php echo $product_excerpt; ?></div>
						<?php else: ?>
							<div class="text-red-5 font-600 my-4">
                                <span
	                                class="text-slate-5/80 font-500 text-12px">Từ: </span><?php echo $product_price; ?>
							</div>
						<?php endif; ?>
					</div>
				</a>
			</li>
		<?php endwhile; ?>
	<?php endif; ?>

	<?php
	$content = ob_get_clean();
	wp_reset_postdata();

	echo json_encode( $content );
	exit();
}

add_filter( 'woocommerce_coupons_enabled', '__return_false' );

function woocommerce_search_filter( $query ): void {
	if ( ! is_admin() && $query->is_main_query() && $query->is_search() ) {
		$query->set( 'post_type', array( 'product' ) );
	}
}

add_action( 'pre_get_posts', 'woocommerce_search_filter' );

function is_mobile(): bool {
	$user_agent    = $_SERVER['HTTP_USER_AGENT'];
	$mobile_agents = array(
		'iPhone',
		'iPod',
		'iPad',
		'Android',
		'webOS',
		'BlackBerry',
		'Windows Phone',
		'Opera Mini',
		'IEMobile',
	);
	foreach ( $mobile_agents as $agent ) {
		if ( str_contains( $user_agent, $agent ) ) {
			return true;
		}
	}

	return false;
}