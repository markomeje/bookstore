<div class="wrapper">
	<?php require FRONTEND_PATH . DS . 'layouts' . DS . 'navbar.php'; ?>
	<div class="store-booklists-section bg-alabaster">
		<div class="container">
			<h2 class="mb-2 text-fogra">All Books List</h2>
			<p class="text-muted">All Our Success and Motivation Book Series are also available on <a href="<?= AMAZON_LINK; ?>" target="_blank">Amazon</a>, <a href="<?= OKADABOOKS_LINK; ?>" target="_blank">Okada Books</a> and <a href="<?= KOBO_LINK; ?>" target="_blank">Rakuten Kobo</a>.</p>
			<?php if(empty($allBooks)): ?>
				<div class="alert alert-info">No Books Yet</div>
			<?php else: ?>
				<div class="row">
					<?php foreach($allBooks as $book): ?>
						<?php $id = empty($book->id) ? 0 : $book->id; ?>
						<?php $title = Bookstore\Core\Help::explodeImplodeByDelimeter(' ', '-', strtolower($book->title)); ?>
						<div class="col-12 col-md-6 col-lg-3 mb-4">
							<div class="card bg-transparent border-0 position-relative">
								<a href="<?= WEBSITE_DOMAIN; ?>/store/book/<?= $id; ?>/<?= $title; ?>">
									<img src="<?= PUBLIC_URL; ?>/images/books/<?= empty($book->image) ? 'def.jpg' : $book->image; ?>" class="card-img-top shadow">
								</a>
								<div class="card-body px-0">
									<h6 class="card-title mt-2">
										<a href="<?= WEBSITE_DOMAIN; ?>/store/book/<?= $id; ?>/<?= $title; ?>" class="text-fogra">
											<?= empty($book->title) ? 0 : $book->title; ?>
										</a>
									</h6>
									<a href="<?= WEBSITE_DOMAIN; ?>/store/book/<?= $id; ?>/<?= $title; ?>" class="card-text text-muted mb-3 d-block">
										<?= Bookstore\Core\Help::limitStringLength(empty($book->description) ? '' : $book->description, 115); ?>
									</a>
									<div class="d-flex">
										<p class="mr-4">NGN<?= empty($book->price) ? 0 : number_format($book->price); ?></p>
									</div>
		                            <a href="<?= WEBSITE_DOMAIN; ?>/store/book/<?= $id; ?>/<?= $title; ?>" class="btn bg-tiffany px-4 rounded-0 text-white">Buy Now</a>
								</div>
							</div>
						</div>
					<?php endforeach; ?>
				</div>
			<?php endif; ?>
		</div>
	</div>
	<?php require FRONTEND_PATH . DS . 'layouts' . DS . 'bottom.php'; ?>
</div>