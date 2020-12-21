<div class="wrapper">
	<?php require FRONTEND_PATH . DS . 'layouts' . DS . 'navbar.php'; ?>
	<div class="home-banner-section w-100">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-12 col-md-7 col-lg-6 mb-5">
					<h1 class="text-fogra">Success and <span class="text-tiffany">Motivation</span> Book Series<span class="text-rose">.</span></h1>
					<div class="text-muted mb-4">The three-fold Purpose of our book series is to promote reading culture amongst the youths particularly, Nigerians and Africans in general.</div>
					<div class="d-flex align-items-center">
						<a href="<?= WEBSITE_DOMAIN; ?>/store" class="btn px-4 border-0 rounded-0 bg-tiffany text-white mr-4">Visit Store</a>
						<a href="<?= WEBSITE_DOMAIN; ?>/about" class="btn px-4 border-0 rounded-0 bg-rose text-white">Learn More</a>
					</div>
				</div>
				<div class="col-12 col-md-5 col-lg-6 mb-4">
					<div class="">
						<img src="<?= PUBLIC_URL; ?>/images/assets/plain.png" class="img-fluid h-100 w-100">
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="home-booklists-section bg-white">
		<div class="container">
			<h2 class="mb-2 text-fogra">Our Book Lists</h2>
			<p class="text-muted">Our Success and Motivation Book Series is also available on <a href="<?= AMAZON_LINK; ?>" target="_blank">Amazon</a> and <a href="<?= OKADABOOKS_LINK; ?>" target="_blank">Okada Books</a></p>
			<?php if(empty($allBooks)): ?>
				<div class="alert alert-info">No Books Yet</div>
			<?php else: ?>
				<div class="row">
					<?php $latestThreeBooks = count($allBooks) > 3 ? array_slice($allBooks, 0, 3) : $allBooks; ?>
					<?php foreach($latestThreeBooks as $book): ?>
						<?php $id = empty($book->id) ? 0 : $book->id; ?>
						<div class="col-12 col-md-6 col-lg-4 mb-4">
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
										<p class="mr-4">NGN<?= empty($book->price) ? 0 : number_format($book->price); ?></p>
									</div>
									<div class="d-flex">
										<a href="<?= WEBSITE_DOMAIN; ?>/store/book/<?= $id; ?>" class="btn bg-tiffany px-4 rounded-0 text-white mr-3">Buy Now</a>
										<a href="<?= WEBSITE_DOMAIN; ?>/store" class="btn bg-rose px-4 rounded-0 text-white">Visit Store</a>
									</div>
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
				<div class="col-12 col-md-7 mb-5">
					<h2 class="text-fogra">About The Author</h2>
					<p class="text-muted font-weight-bold">Dr. Charles O. Ukemenam</p>
					<div class="card-text text-muted mb-3">Is a retired Banker, Finanacial and Management Consultant. He holds both Masters and Doctoral Degrees from the University of Benin, Edo State Nigeria.</div>
					<a href="<?= WEBSITE_DOMAIN; ?>/author" class="btn rounded-0 px-4 bg-rose text-white border-bottom mr-4">Learn More</a>
				</div>
				<div class="col-12 col-md-5 mb-4">
					<div class="pattern-dots-md gray-light w-100" style="height: 360px;">
						<img style="transform: translate(20px, -20px); width: 90%;" src="<?= PUBLIC_URL; ?>/images/assets/photo.jpg" class="img-fluid h-100 object-fit-cover">
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php require FRONTEND_PATH . DS . 'layouts' . DS . 'bottom.php'; ?>
</div>