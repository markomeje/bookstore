<div class="wrapper">
	<?php require FRONTEND_PATH . DS . 'layouts' . DS . 'navbar.php'; ?>
	<div class="store-booklists-section bg-white">
		<div class="container">
			<h2 class="mb-2 text-fogra">All Books List</h2>
			<p class="text-muted">Our Success and Motivation Book Series is also available on <a href="https://www.amazon.com" target="_blank">Amazon</a> and <a href="https://www.okadabooks.com" target="_blank">Okada Books</a></p>
			<?php if(empty($allBooks)): ?>
				<div class="alert alert-info">No Books Yet</div>
			<?php else: ?>
				<div class="row">
					<?php foreach($allBooks as $book): ?>
						<?php $id = empty($book->id) ? 0 : $book->id; ?>
						<div class="col-12 col-md-6 col-lg-3 mb-4">
							<div class="card border-0 position-relative">
								<a href="<?= WEBSITE_DOMAIN; ?>/store/book/<?= $id; ?>">
									<img src="<?= PUBLIC_URL; ?>/images/books/<?= empty($book->image) ? 'def.jpg' : $book->image; ?>" class="card-img-top shadow">
								</a>
								<div class="card-body px-0">
									<h6 class="card-title mt-2">
										<a href="<?= WEBSITE_DOMAIN; ?>/store/book/<?= $id; ?>" class="text-fogra">
											<?= empty($book->title) ? 0 : $book->title; ?>
										</a>
									</h6>
									<a href="<?= WEBSITE_DOMAIN; ?>/store/book/<?= $id; ?>" class="card-text text-muted mb-3 d-block">
										<?= Bookstore\Core\Help::limitStringLength(empty($book->description) ? '' : $book->description, 120); ?>
									</a>
									<div class="d-flex">
										<p class="mr-4">NGN<?= empty($book->price) ? 0 : $book->price; ?></p>
									</div>
		                            <a href="<?= WEBSITE_DOMAIN; ?>/store/book/<?= $id; ?>" class="btn bg-tiffany px-4 rounded-0 text-white">Buy Now</a>
								</div>
							</div>
						</div>
					<?php endforeach; ?>
				</div>
			<?php endif; ?>
		</div>
	</div>
	<div class="home-author-section bg-alabaster">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-12 col-lg-6 mb-4">
					<h2 class="text-fogra">About The Author</h2>
					<div class="card-text text-muted mb-3">He is a retired Banker, Finanacial and Management Consultant. He holds both Masters and Doctoral Degrees from the University of Benin, Edo State Nigeria.</div>
					<a href="<?= WEBSITE_DOMAIN; ?>/author" class="btn rounded-0 px-4 bg-rose text-white border-bottom mr-4">Learn More</a>
					<div class="mt-4">
					    <p>Or Join Our Discussion Forum? <a href="<?= WEBSITE_DOMAIN; ?>/forum">Click Here</a></p>
					</div>
				</div>
				<div class="col-12 col-lg-6 mb-4">
					<div class="pattern-dots-md gray-light w-100" style="height: 400px;">
						<img style="transform: translate(20px, -20px); width: 90%;" src="<?= PUBLIC_URL; ?>/images/assets/photo.jpg" class="img-fluid h-100 object-fit-cover">
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php require FRONTEND_PATH . DS . 'layouts' . DS . 'bottom.php'; ?>
</div>