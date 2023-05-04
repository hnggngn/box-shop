<footer class="md:mx-14em mx-2 py-6">
	<div class="flex flex-col gap-8">
		<a href="/"
		   class="h-2.5em w-2.5em rounded-full bg-dark ring-2 ring-dark-1/80 flex justify-center items-center">
			<i class="i-solar:box-minimalistic-bold-duotone h-5 w-5 text-white"></i>
		</a>
		<div class="flex flex-col gap-1">
			<h4 class="text-xl font-600">Đa dạng thanh toán</h4>
			<ul class="py-4 gap-4 md:flex grid grid-cols-2">
				<?php
				$products = [
					"i-solar:round-transfer-diagonal-bold-duotone text-orange-5" => "Chuyển khoản",
					"i-solar:cash-out-bold-duotone text-indigo-5"                => "Tiền mặt",
					"i-solar:global-bold-duotone text-blue-5"                    => "Thẻ quốc tế",
					"i-solar:card-bold-duotone text-yellow-5"                    => "Thẻ ATM",
				];

				foreach ( $products as $product => $title ) {
					?>
					<li class="p-4 md:w-165px w-full rounded-xl flex items-center justify-center gap-2 border border-slate-3">
						<i class="<?= $product ?> h-6 w-6 mb-.7"></i>
						<span class="font-600"><?= $title ?></span>
					</li>
				<?php } ?>
			</ul>
		</div>
		<div class="flex flex-col gap-1">
			<h4 class="text-xl font-600">Thông tin hữu ích</h4>
			<ul class="py-4 grid md:grid-cols-4 grid-cols-2 gap-4">
				<?php
				$products = [
					"i-solar:verified-check-bold-duotone"          => "Chính sách bảo hành",
					"i-solar:round-transfer-diagonal-bold-duotone" => "Chính sách đổi trả",
					"i-solar:delivery-bold-duotone"                => "Chính sách vận chuyển",
					"i-solar:shield-bold-duotone"                  => "Chính sách bảo mật",
					"i-solar:card-bold-duotone"                    => "Chính sách thanh toán",
					"i-solar:face-scan-square-bold-duotone"        => "Chính sách kiểm hàng",
					"i-solar:cart-5-bold-duotone"                  => "Chính sách mua hàng online",
					"i-solar:question-square-bold-duotone"         => "Về chúng tôi",
				];

				foreach ( $products as $product => $title ) {
					?>
					<li class="p-4 px-6 w-full rounded-xl flex items-center gap-2 border border-slate-3">
						<i class="<?= $product ?> h-6 w-6 text-indigo-5"></i>
						<span class="font-600"><?= $title ?></span>
					</li>
				<?php } ?>
			</ul>
		</div>
		<div class="flex flex-col gap-1">
			<h4 class="text-xl font-600">Theo dõi Box trên mạng xã hội</h4>
			<ul class="pt-4 gap-4 md:flex grid grid-cols-2">
				<?php
				$products = [
					"i-bxl:facebook-circle text-blue-5" => "Facebook",
					"i-bxl:youtube text-red-5"          => "Youtube",
					"i-bxl:telegram text-#229ED9"       => "Telegram",
					"i-bxl:tiktok"                      => "TikTok",
				];

				foreach ( $products as $product => $title ) {
					?>
					<li class="p-3 md:w-160px w-full justify-center rounded-xl flex items-center gap-2 border border-slate-3">
						<i class="<?= $product ?> h-6 w-6"></i>
						<span class="font-600"><?= $title ?></span>
					</li>
				<?php } ?>
			</ul>
		</div>
	</div>
</footer>

<?php wp_footer(); ?>