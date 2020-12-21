<div class="navigation bg-powder fixed-top py-2 border-bottom">
	<div class="container d-flex justify-content-between align-items-center">
		<div class="left-nav d-flex align-items-center">
			<a href="<?= WEBSITE_DOMAIN; ?>" class="website-logo mr-4">
				<img src="<?= PUBLIC_URL; ?>/images/assets/logo.png" class="img-fluid w-100 h-100 object-fit-cover">
			</a>
		</div>
		<div class="right-nav d-flex align-items-center">
			<ul class="d-flex align-items-center">
				<li class="mr-4">
					<a href="<?= WEBSITE_DOMAIN; ?>/" class="text-fogra text-decoration-none">Home</a>
				</li>
				<li class="mr-4">
					<a href="<?= WEBSITE_DOMAIN; ?>/about" class="text-fogra text-decoration-none">About</a>
				</li>
				<li class="mr-4">
					<a href="<?= WEBSITE_DOMAIN; ?>/store" class="text-fogra text-decoration-none">Store</a>
				</li>
				<li class="mr-4">
					<a href="<?= WEBSITE_DOMAIN; ?>/author" class="text-fogra text-decoration-none position-relative">Author</a>
				</li>
				<li class="mr-4">
					<a href="<?= WEBSITE_DOMAIN; ?>/contact" class="text-fogra text-decoration-none">Contact</a>
				</li>
			</ul>
			<div class="d-flex align-items-center">
				<a href="<?= WEBSITE_DOMAIN; ?>/register" class="text-fogra text-decoration-none mr-4">Register</a>
				<a href="<?= WEBSITE_DOMAIN; ?>/login" class="btn px-4 border-0 rounded-0 bg-tiffany text-white">Login</a>
			</div>
		</div>
		<div class="cursor-pointer text-white ml-4 menu-icon-circle rounded-circle bg-tiffany text-center">
			<i class="icofont-navigation-menu"></i>
		</div>
	</div>
</div>
<div class="navbar-mobile position-fixed bg-alabaster px-4">
	<div class="mobile-content">
		<ul class="">
			<li class="mb-3">
				<a href="<?= WEBSITE_DOMAIN; ?>/" class="d-block border-bottom pb-2 text-muted text-decoration-none"><i class="icofont-home"></i> Home</a>
			</li>
			<li class="mb-3">
				<a href="<?= WEBSITE_DOMAIN; ?>/about" class="d-block border-bottom pb-2 text-muted text-decoration-none"><i class="icofont-book"></i> About</a>
			</li>
			<li class="mb-3">
				<a href="<?= WEBSITE_DOMAIN; ?>/store" class="d-block border-bottom pb-2 text-muted text-decoration-none"><i class="icofont-cart-alt"></i> Store</a>
			</li>
			<li class="mb-3">
				<a href="<?= WEBSITE_DOMAIN; ?>/author" class="d-block border-bottom pb-2 text-muted text-decoration-none position-relative"><i class="icofont-teacher"></i> Author</a>
			</li>
			<li class="mb-3">
				<a href="<?= WEBSITE_DOMAIN; ?>/contact" class="d-block border-bottom pb-2 text-muted text-decoration-none"><i class="icofont-contacts"></i> Contact</a>
			</li>
			<li class="mb-3">
				<a href="<?= WEBSITE_DOMAIN; ?>/register" class="d-block border-bottom pb-2 text-muted text-decoration-none"><i class="icofont-sign-out"></i> Register</a>
			</li>
			<li class="mb-3">
				<a href="<?= WEBSITE_DOMAIN; ?>/login" class="d-block border-bottom pb-2 text-muted text-decoration-none"><i class="icofont-sign-in"></i> Login</a>
			</li>
		</ul>
	</div>
</div>
