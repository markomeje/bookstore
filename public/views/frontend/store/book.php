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
							<h6 class="text-fogra">
								<?= empty($book->title) ? '' : $book->title; ?>
							</h6>
							<div class="text-muted mb-3 d-block">
								<?= empty($book->description) ? '' : $book->description; ?>
							</div>
							<div class="d-flex">
								<h6 class="mr-4 mb-3">NGN<?= empty($book->price) ? 0 : number_format($book->price); ?></h6>
							</div>
							<?php if(Bookstore\Library\Session::get('isLoggedIn') === false): ?>
								<div class="alert alert-info mb-4">Please, if you don't have an account, <a href="<?= WEBSITE_DOMAIN; ?>/register">Register Here</a> or <a href="<?= WEBSITE_DOMAIN; ?>/login/?redirect=<?= $redirect; ?>">Login Here</a> to your existing account to proceed.</div>
								<div class="d-flex align-items-center mb-4">
									<a href="<?= WEBSITE_DOMAIN; ?>/register" class="btn bg-tiffany px-4 rounded-0 text-white mr-3">Register</a>
									<a href="<?= WEBSITE_DOMAIN; ?>/login/?redirect=<?= $redirect; ?>" class="btn bg-rose px-4 rounded-0 text-white">Login</a>
								</div>
							<?php else: ?>
								<p class="text-muted">We'll send your book to your account email as soon as your payment is successfull.</p>
								<a href="javascript:;" class="btn mb-4 btn-lg border-0 bg-tiffany text-white payment-button rounded-0" data-url="<?= WEBSITE_DOMAIN; ?>/payments/pay/<?= $id; ?>">
									<img src="<?= PUBLIC_URL; ?>/images/banners/spinner.svg" class="mr-2 d-none payment-spinner mb-1">
									Buy Now
								</a>
							<?php endif; ?>
                            <p class="text-muted">Other Success and Motivation Book Series is also available on <a href="<?= AMAZON_LINK; ?>" target="_blank">Amazon</a> and <a href="<?= OKADABOOKS_LINK; ?>" target="_blank">Okada Books</a>
                            </p>
						</div>
					</div>
				</div>
			<?php endif; ?>
		</div>
	</div>
	<?php require FRONTEND_PATH . DS . 'layouts' . DS . 'bottom.php'; ?>
</div>