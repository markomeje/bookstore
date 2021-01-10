<div class="position-relative">
	<?php require BACKEND_PATH . DS . "layouts" . DS . "navbar.php"; ?>
    <div class="pt-5 mt-5">
	    <div class="container pt-5">
	    	<div class="row mb-1" data-url="<?= WEBSITE_DOMAIN; ?>" data-images="<?= PUBLIC_URL; ?>/images">
	    		<?php if(empty($allPayments)): ?>
	    			<div class="col-12 alert-danger alert">No Payments Found</div>
	    		<?php else: ?>
	    			<?php foreach($allPayments as $payment): ?>
	    				<?php require BACKEND_PATH . DS . 'payments' . DS . 'partials' . DS . 'listings.php'; ?>
	    			<?php endforeach; ?>
	    		<?php endif; ?>
	    	</div>
	    </div>
    </div>
</div>