<?php
$args     = [
	'post_type'      => 'product',
	'posts_per_page' => 10,
	'tax_query'      => [
		[
			'taxonomy' => 'product_cat',
			'field'    => 'slug',
			'terms'    => 'ban-phim'
		]
	]
];
$products = new WP_Query( $args );

if ( $products->have_posts() ) :
	?>
	<div class="md:mx-14em mx-2 py-4">
		<h4 class="text-2xl font-600">Gợi ý cho bạn</h4>
		<div class="flex my-4">
			<ul class="flex space-x-4 overflow-auto">
				<?php
				$args       = array(
					'taxonomy'   => 'product_cat',
					'orderby'    => 'name',
					'order'      => 'ASC',
					'hide_empty' => true,
				);
				$categories = get_categories( $args );
				foreach ( $categories as $category ) {
					?>
					<li>
						<button
							class="category-btn w-7em p-3 bg-white rounded-xl transition-colors duration-150 ease-out font-500"
							data-category="<?= $category->slug; ?>"><?= $category->name; ?></button>
					</li>
					<?php
				}
				?>
			</ul>
		</div>
		<ul id="product-list" class="py-4 grid grid-cols-2 md:grid-cols-5 gap-6">
			<?php while ( $products->have_posts() ) : $products->the_post(); ?>
				<li class="product-item <?php foreach ( wp_get_post_terms( get_the_ID(), 'product_cat' ) as $term ) {
					echo $term->slug . ' ';
				} ?>rounded-2xl hover:cursor-pointer transition-colors duration-150 ease-linear flex flex-col items-center gap-2 overflow-hidden bg-white">
					<a href="<?= get_permalink(); ?>">
						<?php the_post_thumbnail( '', array( 'class' => 'w-230px h-230px' ) ); ?>
						<div class="p-4">
							<div class="font-600 line-clamp-2"><?php the_title(); ?></div>
							<?php if ( get_the_excerpt() ): ?>
								<div class="text-red-5 font-600 my-4 border-b pb-4">
                                    <span
	                                    class="text-slate-5/80 font-500 text-12px">Từ: </span><?= wc_price( get_post_meta( get_the_ID(), '_price', true ) ); ?>
								</div>
								<div
									class="text-gray-5 font-500 mt-4 text-12px"><?= get_the_excerpt(); ?></div>
							<?php else: ?>
								<div class="text-red-5 font-600 my-4">
                                    <span
	                                    class="text-slate-5/80 font-500 text-12px">Từ: </span><?= wc_price( get_post_meta( get_the_ID(), '_price', true ) ); ?>
								</div>
							<?php endif; ?>
						</div>
					</a>
				</li>
			<?php endwhile; ?>
		</ul>
	</div>
	<?php wp_reset_postdata(); ?>
<?php endif; ?>
