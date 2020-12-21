<div class="position-relative">
	<?php require BACKEND_PATH . DS . "layouts" . DS . "navbar.php"; ?>
    <div class="pt-5 mt-5">
	    <div class="container pt-5">
	    	<div class="d-flex mb-4 justify-content-between">
	    		<a href="javascript:;" data-toggle="modal" data-target="#add-book" class="btn btn-sm bg-rose rounded-pill text-white text-decoration-none px-4">Add Book</a>
	    		<?php require BACKEND_PATH . DS . 'books' . DS . 'partials' . DS . 'add.php'; ?>
	    		<div class="">
	    			<a href="" class="btn btn-sm bg-orange text-white text-decoration-none px-4 rounded-pill">Options <i class="icofont-caret-down"></i></a>
	    		</div>
	    	</div>
	    	<div class="row mb-1" data-url="<?= WEBSITE_DOMAIN; ?>" data-images="<?= PUBLIC_URL; ?>/images">
	    		<?php if(empty($allBooks)): ?>
	    			<div class="col-12 alert-danger alert">No Books Found</div>
	    		<?php else: ?>
	    			<?php foreach($allBooks as $book): ?>
	    				<?php require BACKEND_PATH . DS . 'books' . DS . 'partials' . DS . 'listings.php'; ?>
	    			<?php endforeach; ?>
	    			<?php foreach($allBooks as $book): ?>
	    				<?php require BACKEND_PATH . DS . 'books' . DS . 'partials' . DS . 'edit.php'; ?>
	    			<?php endforeach; ?>
	    		<?php endif; ?>
	    	</div>
	    </div>
    </div>
</div>