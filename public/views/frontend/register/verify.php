<div class="bg-alabaster min-vh-100">
	<?php require FRONTEND_PATH . DS . 'layouts' . DS . 'navbar.php'; ?>
	<div class="py-5 my-5">
		<div class="container pt-5">
			<div class="row">
				<?php if(isset($verification) && $verification === true): ?>
					<div class="col-12 col-md-6 mb-4">
						<div class="my-3">
							<h3 class="text-fogra"><span class="text-tiffany">Successful</span> Verification.</h3>
							<div class="mb-4 text-muted">Your Account Verification Was Successful. Please Use Any Of The Following Links Below. To Purchase Any Of Our Books, You'll Have To Login To Your Account With Your Email And Password.</div>
							<div class="d-flex">
								<a href="<?= WEBSITE_DOMAIN; ?>/login" class="btn px-4 rounded-0 bg-tiffany text-white mr-3">Login Here</a>
								<a href="<?= WEBSITE_DOMAIN; ?>/login" class="btn px-4 rounded-0 bg-rose text-white">Visit Store</a>
							</div>
						</div>
					</div>
				<?php else: ?>
					<div class="col-12 col-md-6 mb-4">
						<div class="my-3">
							<h3 class="text-fogra">Verification <span class="text-rose">Failed</span>.</h3>
							<div class="mb-4 text-muted">Your Account Verification Failed Due To An Invalid Link. You can Click On Resend Email To Try Again.</div>
							<div class="d-flex">
								<a href="<?= WEBSITE_DOMAIN; ?>/login" class="btn px-4 rounded-0 bg-tiffany text-white mr-3">Resend Email</a>
								<a href="<?= WEBSITE_DOMAIN; ?>/login" class="btn px-4 rounded-0 bg-rose text-white">Contact</a>
							</div>
							
						</div>
					</div>
				<?php endif; ?>
			</div>
		</div>
	</div>
	<?php require FRONTEND_PATH . DS . 'layouts' . DS . 'bottom.php'; ?>
</div>

