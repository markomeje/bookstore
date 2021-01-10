<div class="col-12 col-md-6 mb-4">
	<div class="card border-0 rounded bg-white shadow">
		<div class="card-body d-flex align-items-center br-sm">
			<div class="rounded bg-alabaster text-center mr-3 panel-icons">
				<i class="icofont-signal text-warning"></i>
			</div>
			<div class="">
				<a href="<?= WEBSITE_DOMAIN; ?>/payments" class="d-block">
					Payments
				</a>
				<small class="text-muted">
					<?= empty($allPaymentsCount) ? 0 : $allPaymentsCount; ?> Made
				</small>
			</div>
		</div>
		<div class="card-footer bg-tiffany"></div>
	</div>
</div>
<div class="col-12 col-md-6 mb-4">
	<div class="card border-0 rounded bg-white shadow">
		<div class="card-body d-flex align-items-center br-sm">
			<div class="rounded bg-alabaster text-center mr-3 panel-icons">
				<i class="icofont-signal text-warning"></i>
			</div>
			<div class="">
				<a href="<?= WEBSITE_DOMAIN; ?>/books" class="d-block">
					Books
				</a>
				<small class="text-muted">
					<?= empty($allBooksCount) ? 0 : $allBooksCount; ?> Added
				</small>
			</div>
		</div>
		<div class="card-footer bg-tiffany"></div>
	</div>
</div>