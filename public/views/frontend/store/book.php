<div class="wrapper">
	<?php require FRONTEND_PATH . DS . 'layouts' . DS . 'navbar.php'; ?>
	<div class="store-booklists-section bg-alabaster">
		<div class="container">
			<!-- <h4 class="mb-2 text-fogra">
				<?= empty($book->title) ? '' : $book->title; ?>
			</h4> -->
			<?php if(empty($book)): ?>
				<div class="alert alert-info">Book Not Found</div>
			<?php else: ?>
				<div class="row">
					<?php $id = empty($book->id) ? 0 : $book->id; ?>
					<div class="col-12 col-md-7 col-lg-8 mb-4">
						<div class="card-body px-0">
							<h6 class="card-title text-fogra">
								<?= empty($book->title) ? '' : $book->title; ?>
							</h6>
							<div class="card-text text-muted mb-3 d-block">
								<?= empty($book->description) ? '' : $book->description; ?>
							</div>
							<div class="d-flex">
								<h6 class="mr-4 mb-3">NGN<?= empty($book->price) ? 0 : $book->price; ?></h6>
							</div>
							<div class="d-flex align-items-center">
								<a href="javascript:;" class="btn bg-tiffany px-4 rounded-0 text-white mr-3">Register</a>
								<a href="javascript:;" class="btn bg-rose px-4 rounded-0 text-white">Login</a>
							</div>
							<!-- <form action="javascript:;" class="payment-form">
								<div class="form-row">
									<div class="form-group input-group-lg">
										<input type="text" name="">
									</div>
								</div>
							</form>
                            <a href="javascript:;" class="btn bg-tiffany px-4 rounded-0 text-white">Buy Now</a> -->
                            <br><br>
                            <p class="text-muted">Other Success and Motivation Book Series is also available on <a href="https://www.amazon.com" target="_blank">Amazon</a> and <a href="https://www.okadabooks.com" target="_blank">Okada Books</a></p>
						</div>
					</div>
					<div class="col-12 col-md-5 col-lg-4">
						<div class="card border-0 position-relative">
							<img src="<?= PUBLIC_URL; ?>/images/books/<?= empty($book->image) ? 'def.jpg' : $book->image; ?>" class="card-img-top shadow">
						</div>
					</div>
				</div>
			<?php endif; ?>
		</div>
	</div>
	<?php require FRONTEND_PATH . DS . 'layouts' . DS . 'bottom.php'; ?>
</div>