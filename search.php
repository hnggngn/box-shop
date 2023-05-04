<?php get_header();

include( "components/header.php" ); ?>

	<div class="bg-slate-1/80 py-6">
		<div class="md:mx-14em mx-2 space-y-4">
			<h1 class="font-500"> <?= $wp_query->found_posts; ?> <?php _e( 'Kết quả tìm kiếm cho', 'locale' ); ?>
				: "<?php the_search_query(); ?>" </h1>
			<ul class="grid md:grid-cols-5 grid-cols-2 gap-4">
				<?php
				$search_query = get_search_query();

				$product_query = new WC_Product_Query( array(
					's' => $search_query,
				) );

				$products = $product_query->get_products();

				if ( $products ) {
					foreach ( $products as $product ) {
						?>
						<li class="rounded-2xl hover:cursor-pointer transition-colors duration-150 ease-linear flex flex-col items-center gap-2 overflow-hidden bg-white">
							<a href="<?= get_permalink( $product->get_id() ); ?>">
								<?= $product->get_image( 'woocommerce_thumbnail', array( 'class' => 'w-230px h-230px' ) ); ?>
								<div class="p-4">
									<div class="font-600 line-clamp-2"><?= $product->get_name() ?></div>
									<?php if ( get_the_excerpt() ): ?>
										<div class="text-red-5 font-600 my-4 border-b pb-4">
                                    <span
	                                    class="text-slate-5/80 font-500 text-12px">Từ: </span><?= wc_price( get_post_meta( $product->get_id(), '_price', true ) ); ?>
										</div>
										<div
											class="text-gray-5 font-500 mt-4 text-12px"><?= get_the_excerpt(); ?></div>
									<?php else: ?>
										<div class="text-red-5 font-600 my-4">
                                    <span
	                                    class="text-slate-5/80 font-500 text-12px">Từ: </span><?= wc_price( get_post_meta( $product->get_id(), '_price', true ) ); ?>
										</div>
									<?php endif; ?>
								</div>
							</a></li>
					<?php }
				}
				?>
			</ul>
		</div>
	</div>

<?php get_footer(); ?>