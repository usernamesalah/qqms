<h2 class="page-title"><b>Detail Pendaftaran Ujian Skripsi</b></h2>
<div class="row">
	<div class="col-md-11 col-md-offset-1">
		<table class="table table-hover table-responsive table-stripped">
			<tbody>
				<tr>
					<th>Nama</th>
					<td><?= $detail_sidang->nama ?></td>
				</tr>
				<tr>
					<th>NIM</th>
					<td><?= $detail_sidang->nim ?></td>
				</tr>
				<tr>
					<th>Angkatan</th>
					<td><?= $detail_sidang->angkatan ?></td>
				</tr>
				<tr>
					<th>Pembimbing 1</th>
					<td><?= $this->dosen_m->get_row(['NIP' => $detail_sidang->pembimbing_1])->nama ?></td>
				</tr>
				<tr>
					<th>Pembimbing 2</th>
					<td><?= $this->dosen_m->get_row(['NIP' => $detail_sidang->pembimbing_1])->nama ?></td>
				</tr>
				<tr>
					<th>Dosen Penguji 1</th>
					<td><?= $this->dosen_m->get_row(['NIP' => $detail_sidang->pembimbing_1])->nama ?></td>
				</tr>
				<tr>
					<th>Dosen Penguji 2</th>
					<td><?= $this->dosen_m->get_row(['NIP' => $detail_sidang->pembimbing_1])->nama ?></td>
				</tr>
				<tr>
					<th>Dosen Penguji 3</th>
					<td><?= $this->dosen_m->get_row(['NIP' => $detail_sidang->pembimbing_1])->nama ?></td>
				</tr>
				<tr>
					<th>Judul Makalah Seminar</th>
					<td>
						<a href="<?= base_url('assets/pendaftaran_sidang/'.$detail_sidang->judul_makalah.'.pdf') ?>"><?= $detail_sidang->judul_makalah ?></a>
					</td>
				</tr>
				<tr>
					<th>Hari</th>
					<td><?= $detail_sidang->hari ?></td>
				</tr>
				<tr>
					<th>Tanggal</th>
					<td><?= $detail_sidang->tanggal ?></td>
				</tr>
				<tr>
					<th>Pukul</th>
					<td><?= $detail_sidang->waktu ?></td>
				</tr>
				<tr>
					<th>Tempat</th>
					<td><?= $detail_sidang->tempat ?></td>
				</tr>
			</tbody>
		</table>
	</div>
</div>