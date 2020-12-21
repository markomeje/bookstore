<form action="javascript:;" method="post" class="resend-email-form" data-action="<?= WEBSITE_DOMAIN; ?>/register/resend" autocomplete="off">
	<h3 class="text-fogra">Did'nt Get An Email?</h3>
	<p>Please enter your registration email below for a new verificaion link.</p>
	<div class="form-row">
		<div class="form-group input-group-lg col-12">
			<label class="text-muted">Email</label>
			<input type="email" name="email" class="form-control form-control-lg email" placeholder="Enter Your Email">
			<small class="error email-error text-danger"></small>
		</div>
	</div>
	<button type="submit" class="btn mt-2 btn-lg border-0 bg-tiffany text-white resend-email-button btn-block">
		<img src="<?= PUBLIC_URL; ?>/images/banners/spinner.svg" class="mr-2 d-none resend-email-spinner mb-1">
		Resend Email
	</button>
	<div class="alert mt-4 px-3 resend-email-message d-none"></div>
</form>