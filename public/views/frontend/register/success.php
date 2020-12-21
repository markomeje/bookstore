<div class="bg-alabaster min-vh-100">
	<?php require FRONTEND_PATH . DS . 'layouts' . DS . 'navbar.php'; ?>
	<div class="py-5 my-5">
		<div class="container pt-5">
			<div class="row">
				<div class="col-12 col-md-6 mb-4">
					<div class="my-3">
						<h3 class="text-fogra"><span class="text-tiffany">Registration</span> Successful.</h3>
						<div class="mb-4 text-muted">Your Registration Was Successful. Please Check Your Email For A Verification Link Has Been Sent. Click On The Link To Verify Your Account. Thank You.</div>
						<div class="d-flex">
							<a href="<?= WEBSITE_DOMAIN; ?>/login" class="btn px-4 rounded-0 bg-tiffany text-white mr-3">Login Here</a>
							<a href="<?= WEBSITE_DOMAIN; ?>/login" class="btn px-4 rounded-0 bg-rose text-white">Visit Store</a>
						</div>
					</div>
				</div>
				<div class="col-12 col-md-6 mb-4">
					<?php require FRONTEND_PATH . DS . 'register' . DS . 'partials' . DS . 'resend.php'; ?>
				</div>
			</div>
		</div>
	</div>
	<?php require FRONTEND_PATH . DS . 'layouts' . DS . 'bottom.php'; ?>
</div>

