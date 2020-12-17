<div class="wrapper">
	<?php require FRONTEND_PATH . DS . 'layouts' . DS . 'navbar.php'; ?>
	<div class="store-booklists-section bg-white">
		<div class="container">
			<h2 class="mb-2 text-fogra">All Books List</h2>
			<p class="text-muted">Our Success and Motivation Book Series is also available on <a href="https://www.amazon.com/s?i=digital-text&rh=p_27%3ADr.+Charles+O.+Ukemenam&s=relevancerank&text=Dr.+Charles+O.+Ukemenam&ref=dp_byline_sr_ebooks_1" target="_blank">Amazon</a> and <a href="https://www.okadabooks.com" target="_blank">Okada Books</a></p>
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
										<?= Bookstore\Core\Help::limitStringLength(empty($book->description) ? '' : $book->description, 115); ?>
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
	<?php require FRONTEND_PATH . DS . 'layouts' . DS . 'bottom.php'; ?>
</div>