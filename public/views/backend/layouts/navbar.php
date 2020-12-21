<div class="fixed-top navigation">
	<div class="top-navigation bg-white py-2">
		<div class="container d-flex justify-content-between align-items-center">
			<p class="mb-0">
				<a href="<?= WEBSITE_DOMAIN; ?>/dashboard" class="text-muted text-decoration-none">Book<span class="text-danger">Store</span></a>
			</p>
			<div class="right">
				<ul class="">
				    <li>
					    <a href="<?= WEBSITE_DOMAIN; ?>/admin/profile" class="text-muted text-decoration-none">
					    	<span class="text-muted"><?= ucfirst(Bookstore\Library\Session::get('role')); ?></span>
						</a>
					</li>
				</ul>
			</div>
		</div>
	</div>
	<div class="low-navigation bg-tiffany py-4">
		<div class="container d-flex justify-content-between align-items-center">
			<ul class="d-flex">
				<li class="mr-3 text-center cursor-pointer">
			    	<a href="<?= WEBSITE_DOMAIN; ?>/dashboard" class="text-white text-decoration-none">
			    		<i class="icofont-home"></i>
			    	</a>
			    </li>
			</ul>
			<ul class="d-flex align-items-center">
				<li class="mr-3">
			    	<a href="<?= WEBSITE_DOMAIN; ?>/login/logout" class="text-white">
			    		<p class="mb-0">Logout</p>
			    	</a>
			    </li>
				<li class="cursor-pointer">
			    	<i class="icofont-navigation-menu text-white"></i>
			    </li>
			</ul>
		</div>
	</div>
</div>

