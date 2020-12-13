<?php $id = empty($book->id) ? 0 : $book->id; ?>
<div class="col-12 col-md-6 col-lg-3 mb-4">
	<div class="card br-sm border-0 shadow-sm">
		<a href="javascript:;" class="position-relative change-image" data-id="<?= $id; ?>">
			<img src="<?= PUBLIC_URL; ?>/images/books/<?= empty($book->image) ? 'def.jpg' : $book->image; ?>" class="card-img-top h-100 object-fit-cover">
		</a>
		<div class="card-body">
			<a href="javascript:;" data-toggle="modal" data-target="#edit-book-<?= $id; ?>">
				<?= Bookstore\Core\Help::limitStringLength(empty($book->title) ? '' : $book->title, 20); ?>
			</a>
			<div class="text-muted d-block">
			    <?= Bookstore\Core\Help::limitStringLength(empty($book->description) ? '' : $book->description, 60); ?>
			</div>
		</div>
		<div class="card-footer">
		    <div class="d-flex justify-content-between">
		        <div class="text-muted">
		        	<?= Bookstore\Core\Help::formatDate(empty($book->date) ? Date() : $book->date); ?>
		        </div>
		        <div class="d-flex">
		            <small class="mr-2 cursor-pointer text-orange" data-toggle="modal" data-target="#edit-book-<?= $id; ?>">
		            	<i class="icofont-edit"></i>
		            </small>
		            <small class="cursor-pointer text-rose delete-book" data-url="<?= WEBSITE_DOMAIN; ?>/books/deleteBook/<?= $id; ?>">
		            	<i class="icofont-ui-delete"></i>
		            </small>
		        </div>
		    </div>
		</div>
	</div>
</div>