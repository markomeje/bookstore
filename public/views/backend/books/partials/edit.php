<?php $id = empty($book->id) ? 0 : $book->id; ?>
<div class="modal fade" id="edit-book-<?= $id; ?>" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg br-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <p class="modal-title text-muted mb-0">Edit Book</p>
                <div class="cursor-pointer" data-dismiss="modal" aria-label="Close">
                    <i class="icofont-close text-danger"></i>
                </div>
            </div>
            <form method="post" action="javascript:;" class="edit-book-form" data-action="<?= WEBSITE_DOMAIN; ?>/books/editBook/<?= $id; ?>" autocomplete="off">
                <div class="modal-body">
                    <div class="row mb-3">
                        <div class="col-12 col-md-6">
                            <label class="form-label">Title</label>
                            <input type="text" name="title" class="form-control form-control-lg title" placeholder="e.g., The Gold Cast" value="<?= empty($book->title) ? '' : $book->title; ?>">
                            <small class="invalid-feedback title-error"></small>
                        </div>
                        <div class="col-12 col-md-6">
                            <label class="form-label">Price</label>
                            <div class="input-group">
                                <div class="input-group-text">NGN</div>
                                <input type="number" name="price" class="form-control form-control-lg price" placeholder="e.g., 3000" value="<?= empty($book->price) ? '' : $book->price; ?>"><small class="invalid-feedback price-error"></small>
                            </div>
                            
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-12">
                            <label class="form-label">Description</label>
                            <textarea class="form-control form-control-lg description" name="description" rows="6"><?= empty($book->description) ? '' : $book->description; ?></textarea>
                            <small class="invalid-feedback description-error"></small>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="d-flex justify-content-right">
                        <button type="submit" class="btn btn-dark text-white edit-book-button px-4">
                            <img src="<?= PUBLIC_URL; ?>/images/banners/spinner.svg" class="mr-2 d-none edit-book-spinner mb-1">
                            Submit
                        </button>
                        <button type="button" class="btn bg-danger ml-3 text-white" data-dismiss="modal">
                            Close
                        </button>
                    </div>
                </div>
                <div class="px-3">
                    <div class="alert mb-3 edit-book-message d-none"></div>
                </div>
            </form>
        </div>
    </div>
</div>