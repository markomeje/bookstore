<div class="wrapper">
	<?php require FRONTEND_PATH . DS . 'layouts' . DS . 'navbar.php'; ?>
	<div class="store-booklists-section bg-alabaster">
		<div class="container">
			<?php if(strtolower($payment) === 'success'): ?>
				<div class="">
					Your Payment Was Successfull And Your Book Has Been Sent To Your Account Email. If You Did Not Get Any Email, <a href="<?= WEBSITE_DOMAIN; ?>/contact">Contact Our Support.</a> Thank You.
				</div>
			<?php else: ?>
				<div class="">
					Your Payment Failed. Please If You Have Any Complaint, <a href="<?= WEBSITE_DOMAIN; ?>/contact">Contact Our Support.</a> Thanks.
				</div>
			<?php endif; ?>
		</div>
	</div>
	<?php require FRONTEND_PATH . DS . 'layouts' . DS . 'bottom.php'; ?>
</div>