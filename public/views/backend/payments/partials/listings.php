<?php $id = empty($payment->id) ? 0 : $payment->id; ?>
<div class="col-12 col-md-6 col-lg-4 mb-4">
	<div class="card br-sm border-0 shadow-sm">
		<div class="card-body">
			<div class="d-flex justify-content-between mb-2 pb-3 border-bottom">
				<div class="text-muted">
					NGN<?= empty($payment->amount) ? '' : $payment->amount; ?>
				</div>
				<?php $phone = empty($payment->phone) ? 'Nill' : $payment->phone; ?>
				<a href="<?= $phone === 'Nill' ? 'javascript:;' : 'tel:'.$phone; ?>" class="text-muted">
				    <?= $phone; ?>
				</a>
			</div>
			<div class="d-flex justify-content-between">
				<div class="text-muted">
					<?= Bookstore\Core\Help::limitStringLength(empty($payment->title) ? '' : $payment->title, 28); ?>
				</div>
				<div class="text-info">
					<?= empty($payment->status) ? 'Nill' : ucfirst($payment->status); ?>
				</div>
			</div>	
		</div>
		<div class="card-footer">
		    <div class="d-flex justify-content-between">
		        <div class="text-muted">
		        	<?= Bookstore\Core\Help::formatDate(empty($payment->date) ? 'Nill' : $payment->date); ?>
		        </div>
		        <div class="d-flex">
		            <small class="mr-2 cursor-pointer text-orange" data-toggle="modal" data-target="#edit-payment-<?= $id; ?>">
		            	<i class="icofont-edit"></i>
		            </small>
		            <small class="cursor-pointer text-rose delete-payment" data-url="<?= WEBSITE_DOMAIN; ?>/payments/deletePayment/<?= $id; ?>">
		            	<i class="icofont-ui-delete"></i>
		            </small>
		        </div>
		    </div>
		</div>
	</div>
</div>