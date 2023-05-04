<?php
get_header();

include( "components/header.php" );

if ( have_posts() ) {
	while ( have_posts() ) {
		the_post();
		?>
		<div class="bg-slate-1/80">
			<div class="md:mx-14em mx-2 flex flex-col gap-6 py-6">
				<div class="flex relative md:flex-row flex-col md:gap-0 gap-4">
					<div class="flex flex-col gap-6 xl:w-3/5">
						<?php woocommerce_show_product_images(); ?>
						<div class="bg-white p-8 rounded-xl space-y-7">
							<div class="text-3xl font-700">Box <span class="pl-3 text-18px text-slate-5">Là nơi để bạn và người thân tin tưởng lựa chọn</span>
							</div>
							<ul class="grid grid-cols-1 bg-indigo-1/30 p-6 rounded-xl gap-4">
								<?php
								$boxes = [
									[
										'icon'        => 'i-solar:cursor-bold-duotone',
										'title'       => 'Được trải nghiệm thực tế sản phẩm, lựa chọn đúng hơn.',
										'description' => 'Không còn bọc nilon, hạn chế quyền được trải nghiệm trước mua hàng của người dùng.'
									],
									[
										'icon'        => 'i-solar:headphones-round-bold-duotone',
										'title'       => 'Bạn lo lắng khi không biết sản phẩm nào phù hợp? Box có đội ngũ tư vấn tận tâm và có chuyên môn.',
										'description' => 'Giúp khách hàng lựa chọn sản phẩm đúng nhu cầu là trách nhiệm đầu tiên của Nhân viên tư vấn tại Box.'
									],
									[
										'icon'        => 'i-solar:mailbox-bold-duotone',
										'title'       => 'Bạn gặp khó khi gặp lỗi hỏng, Box có Trung tâm bảo vệ quyền lợi khách hàng',
										'description' => 'Để không bỏ sót bất kỳ một trải nghiệm không tốt nào của khách hàng, Ban Lãnh Đạo Tập đoàn có chuyên trang bảo vệ quyền lợi khách hàng.'
									],
									[
										'icon'        => 'i-solar:clock-circle-bold-duotone',
										'title'       => 'Bạn bận, Box phục vụ từ sáng tới khuya.',
										'description' => 'Khách hàng bận bịu. Cán bộ, nhân viên Box càng phải phục vụ ngoài giờ để trải nghiệm của khách hàng được thông suốt.'
									]
								];
								foreach ( $boxes as $box ) {
									?>
									<li class="flex flex-col gap-4">
										<i class="<?php echo $box['icon']; ?> h-6 w-6 text-indigo-5"></i>
										<p class="font-600 text-16px"><?php echo $box['title']; ?></p>
										<p><?php echo $box['description']; ?></p>
									</li>
									<?php
								}
								?>
							</ul>
						</div>
					</div>
					<div class="md:sticky block h-full md:w-2/5 w-full inset-0 md:ml-6 ml-0" id="product-sidebar">
						<div class="bg-white flex flex-col h-full rounded-xl p-6 gap-6 overflow-auto">
							<div class="p-3 bg-indigo-1/50 rounded-.7em flex items-center gap-3 m-2">
								<i class="i-solar:verified-check-bold-duotone text-indigo-6 mb-.5"></i>
								<span>Hàng chính hãng - Giá rẻ nhất thị trường</span>
							</div>
							<div class="border-b pb-4">
								<h4 class="font-600 text-xl"><?php the_title(); ?></h4>

							</div>
							<div class="prose border-b pb-4 flex-1">
								<?= get_the_excerpt(); ?>
							</div>
							<div class="flex gap-10 items-center justify-between">
								<span
									class="text-red-5 font-600 text-xl"><?= wc_price( get_post_meta( get_the_ID(), '_price', true ) ); ?></span>
								<?php woocommerce_simple_add_to_cart() ?>
							</div>
						</div>
					</div>
				</div>
				<?php
				woocommerce_related_products( [
					'posts_per_page' => is_mobile() ? 4 : 5,
					'orderby'        => 'rand',
					'order'          => 'desc',
				] ); ?>
			</div>
		</div>
		<?php
	}
}

get_footer();
?>
