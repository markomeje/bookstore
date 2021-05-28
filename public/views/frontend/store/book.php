<div class="wrapper">
	<?php require FRONTEND_PATH . DS . 'layouts' . DS . 'navbar.php'; ?>
	<div class="store-booklists-section bg-alabaster">
		<div class="container">
			<?php if(empty($book)): ?>
				<div class="alert alert-info">Book Not Found</div>
			<?php else: ?>
				<div class="row">
					<?php $id = empty($book->id) ? 0 : $book->id; ?>
					<div class="col-12 col-md-5 col-lg-4">
						<div class="card border-0 position-relative">
							<img src="<?= PUBLIC_URL; ?>/images/books/<?= empty($book->image) ? 'def.jpg' : $book->image; ?>" class="card-img-top shadow">
						</div>
					</div>
					<div class="col-12 col-md-7 col-lg-8 mb-4">
						<div class="card-body px-0">
							<h4 class="text-fogra">
								<?= empty($book->title) ? '' : $book->title; ?>
							</h4>
							<div class="text-muted mb-3 d-block">
								<?= empty($book->description) ? '' : $book->description; ?>
							</div>
							<div class="d-flex">
								<h4 class="mb-3">NGN<?= empty($book->price) ? 0 : number_format($book->price); ?></h4>
							</div>
							<h5 class="font-weight-bold">(PDF Format Only)</h5>
							<?php if(Bookstore\Library\Session::get('isLoggedIn') === false): ?>
								<div class="pb-4 mb-4 mt-3 border-bottom">
									<div class="alert alert-info mb-4">Please, if you don't have an account, <a href="<?= WEBSITE_DOMAIN; ?>/register">Register Here</a> or <a href="<?= WEBSITE_DOMAIN; ?>/login/?redirect=<?= $redirect; ?>">Login Here</a> to your existing account to proceed.</div>
									<div class="d-flex align-items-center">
										<a href="<?= WEBSITE_DOMAIN; ?>/register" class="btn bg-tiffany px-4 rounded-0 text-white mr-3">Register</a>
										<a href="<?= WEBSITE_DOMAIN; ?>/login/?redirect=<?= $redirect; ?>" class="btn bg-rose px-4 rounded-0 text-white">Login</a>
									</div>
								</div>
							<?php else: ?>
								<div class="pb-3 mb-3 border-bottom">
									<p class="text-muted">Automatically recieve your book in your email on successful payment.</p> 
									<p class="alert alert-info mb-4">Note that you can either pay with card, bank transfer, USSD or QR Code. Click <span class="font-weight-bold">Pay With Paystack</span> button below to proceed.</p>
									<a href="javascript:;" class="btn btn-lg mb-2 border-0 bg-tiffany text-white payment-button rounded-0 px-4" data-url="<?= WEBSITE_DOMAIN; ?>/payments/pay/<?= isset($id) ? $id : 0; ?>">
										<img src="<?= PUBLIC_URL; ?>/images/banners/spinner.svg" class="mr-1 d-none payment-spinner">
										Pay With Paystack
									</a>
								</div>
							<?php endif; ?>
                            <p class="text-muted">All Our Success and Motivation Book Series are also available on <a href="<?= AMAZON_LINK; ?>" target="_blank">Amazon</a>, <a href="<?= OKADABOOKS_LINK; ?>" target="_blank">Okada Books</a> and <a href="<?= KOBO_LINK; ?>" target="_blank">Rakuten Kobo</a>.</p>
                            </p>
						</div>
					</div>
				</div>
			<?php endif; ?>
		</div>
	</div>
	<?php require FRONTEND_PATH . DS . 'layouts' . DS . 'bottom.php'; ?>
</div>