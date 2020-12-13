<div class="bg-alabaster min-vh-100">
	<div class="container">
		<div class="row justify-content-center pt-5">
			<div class="col-12 col-md-10 col-lg-8">
				<div class="my-3">
					<h2 class="text-fogra">Register Here</h2>
					<form action="javascript:;" method="post" class="register-form" data-action="<?= WEBSITE_DOMAIN; ?>/register/signup" autocomplete="off">
						<div class="alert my-3 px-3 register-message d-none"></div>
						<div class="form-row">
							<div class="form-group input-group-lg col-md-6">
								<label class="text-muted">Email</label>
								<input type="email" name="email" class="form-control form-control-lg email" placeholder="e.g., john@doe.com">
								<small class="error email-error text-danger"></small>
							</div>
							<div class="form-group input-group-lg col-md-6">
								<label class="text-muted">Phone</label>
								<input type="text" name="phone" class="form-control form-control-lg phone" placeholder="e.g., +144 567 9114">
								<small class="error phone-error text-danger"></small>
							</div>
						</div>
						<div class="form-row">
							<div class="form-group input-group-lg col-md-6">
								<label class="text-muted">Password</label>
								<input type="password" name="password" class="form-control form-control-lg password" placeholder="&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;">
								<small class="error password-error text-danger"></small>
							</div>
							<div class="form-group input-group-lg col-md-6">
								<label class="text-muted">Retype Password</label>
								<input type="password" name="confirmpassword" class="form-control form-control-lg confirmpassword" placeholder="&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;">
								<small class="error confirmpassword-error text-danger"></small>
							</div>
						</div>
						<div class="form-row">
							<div class="form-group input-group-lg col-12">
								<label class="text-muted">Captcha (Please enter the characters below)</label>
								<input type="text" name="captcha" class="form-control form-control-lg captcha" placeholder="e.g., 94571B">
								<small class="error captcha-error text-danger"></small>
							</div>
						</div>
						<img src="<?= $captcha->inline(); ?>" class="mt-2">
						<button type="submit" class="btn mt-4 btn-lg border-0 bg-tiffany text-white register-button btn-block">
							<img src="<?= PUBLIC_URL; ?>/images/banners/spinner.svg" class="mr-2 d-none register-spinner mb-1">
							Register
						</button>
						<div class="pt-3 pb-5">
							<a href="<?= WEBSITE_DOMAIN; ?>/login" class="text-muted float-left">Already Have An Account? Login</a>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

