<div class="bg-alabaster min-vh-100">
	<?php require FRONTEND_PATH . DS . 'layouts' . DS . 'navbar.php'; ?>
	<div class="py-5 my-5">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-12 col-md-6 col-lg-4">
					<div class="mt-5">
						<h2 class="text-fogra">Login Here</h2>
						<form action="javascript:;" method="post" class="login-form" data-action="<?= WEBSITE_DOMAIN; ?>/login/signin" autocomplete="off">
							<div class="alert my-3 px-3 login-message d-none"></div>
							<div class="mb-3">
								<label for="" class="text-muted">Email</label>
								<input type="email" name="email" class="form-control form-control-lg email" placeholder="e.g., john@doe.com">
								<small class="error email-error text-danger"></small>
							</div>
							<div class="form-group input-group-lg">
								<label for="" class="d-flex justify-content-between">
									<span class="text-muted ">Password</span>
									<a href="javascript:;" class="">Forgot Password?</a>
								</label>
								<input type="password" name="password" class="form-control form-control-lg password" placeholder="&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;">
								<small class="error password-error text-danger"></small>
							</div>
							<button type="submit" class="btn mt-4 btn-lg border-0 bg-tiffany text-white login-button btn-block">
								<img src="<?= PUBLIC_URL; ?>/images/banners/spinner.svg" class="mr-2 d-none login-spinner mb-1">
								Login
							</button>
							<div class="pt-3 pb-5">
								<a href="<?= WEBSITE_DOMAIN; ?>/register" class="">Don't Have An Account? Register</a>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php require FRONTEND_PATH . DS . 'layouts' . DS . 'bottom.php'; ?>
</div>

