<?php get_header();

include( "components/header.php" ) ?>
<div class="bg-slate-1/80">
	<div class="md:mx-14em mx-2 py-8">
		<div class="bg-white p-8 rounded-xl space-y-7">
			<div class="text-3xl font-700">Box <span class="pl-3 text-18px text-slate-5">Là nơi để bạn và người thân tin tưởng lựa chọn</span>
			</div>
			<ul class="grid md:grid-cols-4 grid-cols-1 bg-indigo-1/30 p-6 rounded-xl gap-4">
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
	<?php if ( is_product_category() ) {
		include( "components/product-category.php" );
	} else {
		include( "components/product-list.php" );
	} ?>
</div>

<?php get_footer(); ?>
