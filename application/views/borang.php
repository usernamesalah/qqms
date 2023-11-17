<!-- <div class="container"> -->
	<h4 align="center"><b>
		<?= $this->jenis_borang_m->get_row(['id_jenis' => $this->uri->segment(3)])->nama ?>
	</b></h4>
	<br>
	<?php foreach ($borang as $key): ?>
		<div class="panel panel-default">
			<div class="panel-heading">
				<a href="<?= base_url('assets/borang/') . $key->berkas ?>" class="btn btn-info btn-sm pull-right" >Download</a>
				<h3><?= $key->judul ?></h3>
			</div>
			<div class="panel-body">
				<?= $key->detail ?>
			</div>
		</div>
		<hr>
	<?php endforeach ?>
<!-- </div> -->