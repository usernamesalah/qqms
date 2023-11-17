<!-- <div class="container"> -->

		<br>
		<table class="table table-striped">
			<thead>
				<tr>
					<th>#</th>
					<th>Judul Berkas</th>
					<th>#</th>
				</tr>
			</thead>
			<tbody>
				<?php $i=0; foreach ($berkas as $key): ?>
				<tr>
					<td><?= ++$i ?></td>
					<td><?= $key->judul ?></td>
					<td><a class="btn btn-primary" href="<?= base_url('assets/berkas/').'/'.$key->id_berkas ?>">Download</a></td>
				</tr>
				<?php endforeach ?>
			</tbody>
		</table>

<!-- </div> -->
		