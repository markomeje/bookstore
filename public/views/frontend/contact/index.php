<div class="wrapper">
	<?php require FRONTEND_PATH . DS . 'layouts' . DS . 'navbar.php'; ?>
	<div class="contact-banner-section w-100 bg-alabaster">
		<div class="container">
			<h2 class="text-fogra">Contact Form</h2>
			<div class="text-muted mb-3">Please fill in all fields below and we'll get back to you.</div>
			<div class="row align-items-center">
				<div class="col-12 mb-4">
					<form action="javascript:;" method="post" autocomplete="off" class="contact-form" data-action="<?= WEBSITE_DOMAIN; ?>/contact/contact">
						<div class="form-row">
							<div class="form-group input-group-lg col-md-6">
								<label class="text-muted">Firstname</label>
								<input type="" class="form-control firstname" name="firstname" placeholder="e.g., John">
								<small class="text-danger firstname-error"></small>
							</div>
							<div class="form-group input-group-lg col-md-6">
								<label class="text-muted">Lastname</label>
								<input type="" class="form-control lastname" name="lastname" placeholder="e.g., Egwu">
								<small class="text-danger lastname-error"></small>
							</div>
						</div>
						<div class="form-row">
							<div class="form-group input-group-lg col-md-6">
								<label class="text-muted">Email</label>
								<input type="" class="form-control email" name="email" placeholder="e.g., john@gmail.com">
								<small class="text-danger email-error"></small>
							</div>
							<div class="form-group input-group-lg col-md-6">
								<label class="text-muted">Phone</label>
								<input type="" class="form-control phone" name="phone" placeholder="e.g., 07000000001">
								<small class="text-danger phone-error"></small>
							</div>
						</div>
						<div class="form-row">
							<div class="col-12">
								<label class="text-muted">Message</label>
								<textarea class="form-control message" name="message" placeholder="e.g., Type Your Message Here." rows="5"></textarea>
								<small class="text-danger message-error"></small>
							</div>
						</div>
						<button type="submit" class="btn mt-4 btn-lg border-0 bg-tiffany text-white contact-button btn-block">
							<img src="<?= PUBLIC_URL; ?>/images/banners/spinner.svg" class="mr-2 d-none contact-spinner mb-1">
							Send
						</button>
						<div class="alert mb-3 mt-4 px-3 contact-message d-none"></div>
					</form>
					<p class="text-fogra mt-3 font-weight-bolder">You Can Call <a href="tel:08130052359">08130052359</a> Or Send A Mail To <a href="mailto:author@charlesukemenam.com">author@charlesukemenam.com</a></p>
				</div>
			</div>
		</div>
	</div>
	<?php require FRONTEND_PATH . DS . 'layouts' . DS . 'bottom.php'; ?>
</div>