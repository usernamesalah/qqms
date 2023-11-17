<h2 class="page-title"><b>Pendaftaran Ujian Skripsi</b></h2>
<div class="row">
	<div class="col-md-12">
		<!-- TABLE NO PADDING -->
		<?= $this->session->flashdata('msg') ?>
		<div class="clearfix">
			<!-- <button class="btn btn-xs btn-success" data-toggle="modal" data-target="#add"><i class="fa fa-plus"></i> Tambah Data</button> -->

		</div>
		<hr>
		<div class="panel">
			<div class="panel-body">
				<table class="table table-striped table-responsive" id="table">
				<thead>
				<tr>
					<th>
						Nama
					</th>
					<th>
						NIM
					</th>
					<th>
						Angkatan
					</th>
					<th>
						Judul Makalah Seminar
					</th>
					<th>
						Pembimbing 1
					</th>
					<th>
						Pembimbing 2
					</th>
					<th>
						Action
					</th>
				</tr>
				</thead>
				<tbody>
				<?php foreach ($sidang as $data): ?>
				<tr>
					<td>
						<?= $data->nama ?>
					</td>
					<td>
						<?= $data->nim ?>
					</td>
					<td>
						<?= $data->angkatan ?>
					</td>
					<td>
						<?= $data->judul_makalah ?>
					</td>
					<td>
						<?= $this->dosen_m->get_row(['NIP' => $data->pembimbing_1])->nama ?>
					</td>
					<td>
						<?= $this->dosen_m->get_row(['NIP' => $data->pembimbing_2])->nama ?>
					</td>
					<td>
						<div class="btn-group btn-xs">
							<button type="button" class="btn btn-primary">Action</button>
							<button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
							<span class="caret"></span>
							</button>
							<ul class="dropdown-menu" role="menu">
								<li><a href="<?= base_url('admin/detail_pendaftaran_sidang/') . $data->id_pendaftaran ?>">Detail</a></li>
								<!-- <li><a href="#" data-toggle="modal" data-target="#edit" onclick="get_sidang(<?= $data->id_pendaftaran ?>)">Edit</a></li> -->
								<li><a href="#" onclick="deleteData(<?= $data->id_pendaftaran ?>)">Hapus</a></li>
							</ul>
						</div>
					</td>
				</tr>
				<?php endforeach ?>
				</tbody>
				</table>
			</div>
		</div>
		<!-- END TABLE NO PADDING -->
	</div>
</div>
<!-- Modal Add Pendaftaran Ujian Skripsi -->
<div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title" id="myModalLabel">Tambah Data Pendaftaran Ujian Skripsi</h4>
			</div>

			<?=form_open_multipart('admin/pendaftaran_sidang')?>
			<div class="modal-body">
				<div class="form-group">
					<label>Nama</label>
					<input class="form-control" type="text" name="nama" required>
				</div>
				<div class="form-group">
					<label>NIM</label>
					<input class="form-control" type="number" name="nim" required>
				</div>
				<div class="form-group">
					<label>Jenis Kelamin</label>
					<select name="jenis_sidang" class="form-control" data-live-search="true">
                        <option>-- Pilih --</option>
                        <?php foreach ($jenis_kelamin as $row):?>
                        <option value="<?=$row->id_jenis_kelamin?>"><?=$row->nama?></option>
                        <?php endforeach;?>
                    </select>
				</div>
				<div class="form-group">
					<label>Angkatan</label>
					<select name="angkatan" class="form-control" required>
						<option>-- Pilih --</option>
						<?php for($i=2017; $i>=2011; $i--): ?>
							<option value="<?= $i ?>"><?= $i ?></option>
						<?php endfor; ?>
					</select>
				</div>
				<div class="form-group">
					<label>Jenis Sidang</label>
					<select name="jenis_sidang" class="form-control" data-live-search="true">
                        <option>-- Pilih --</option>
                        <?php foreach ($jenis_seminar as $row):?>
                        <option value="<?=$row->id_jenis?>"><?=$row->nama?></option>
                        <?php endforeach;?>
                    </select>
				</div>
				<div class="form-group">
					<label>Pembimbing 1</label>
					<select name="pembimbing1" class="form-control" data-live-search="true">
                        <option>-- Pilih --</option>
                        <?php foreach ($dosen as $row):?>
                        <option value="<?=$row->NIP?>"><?=$row->nama?></option>
                        <?php endforeach;?>
                    </select>
				</div>
				<div class="form-group">
					<label>Pembimbing 2</label>
					<select name="pembimbing2" class="form-control" data-live-search="true">
                        <option>-- Pilih --</option>
                        <?php foreach ($dosen as $row):?>
                        <option value="<?=$row->NIP?>"><?=$row->nama?></option>
                        <?php endforeach;?>
                    </select>
				</div>
				<div class="form-group">
					<label>Dosen Penguji 1</label>
					<select name="penguji1" class="form-control" data-live-search="true">
                        <option>-- Pilih --</option>
                        <?php foreach ($dosen as $row):?>
                        <option value="<?=$row->NIP?>"><?=$row->nama?></option>
                        <?php endforeach;?>
                    </select>
				</div>
				<div class="form-group">
					<label>Dosen Penguji 2</label>
					<select name="penguji2" class="form-control" data-live-search="true">
                        <option>-- Pilih --</option>
                        <?php foreach ($dosen as $row):?>
                        <option value="<?=$row->NIP?>"><?=$row->nama?></option>
                        <?php endforeach;?>
                    </select>				</div>
				<div class="form-group">
					<label>Dosen Penguji 3</label>
					<select name="penguji3" class="form-control" data-live-search="true">
                        <option>-- Pilih --</option>
                        <?php foreach ($dosen as $row):?>
                        <option value="<?=$row->NIP?>"><?=$row->nama?></option>
                        <?php endforeach;?>
                    </select>
				</div>
				<div class="form-group">
					<label>Judul Makalah Seminar</label>
					<input class="form-control" type="text" name="judul_makalah" required>
				</div>
				<div class="form-group">
					<label>Upload File</label>
                    <input type="file" id="upload_file" name="file">
                </div>
				<div class="form-group">
					<label>Hari</label>
					<select name="hari" class="form-control" data-live-search="true">
                        <option>-- Pilih --</option>
                        <option value="Senin">Senin</option>
                        <option value="Selasa">Selasa</option>
                        <option value="Rabu">Rabu</option>
                        <option value="Kamis">Kamis</option>
                        <option value="Jumat">Jumat</option>
                        <option value="Sabtu">Sabtu</option>
                    </select>
				</div>
				<div class="form-group">
                    <label for="tanggal">Tanggal</label>
                    <div class="input-group date">
                          <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                          <input type="text" name="tanggal" class="form-control" placeholder="YYYY-MM-DD">
                    </div>
              	</div>
				<div class="form-group">
					<label>Pukul</label>
					<input class="form-control" type="text" name="waktu" required>
				</div>
				<div class="form-group">
					<label>Tempat</label>
					<input class="form-control" type="text" name="tempat" required>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
				<input type="submit" class="btn btn-primary" name="tambah" value="Simpan">
			</div>
			<?=form_close();?>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>


<!-- Modal Edit Pendaftaran Ujian Skripsi -->
<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title" id="myModalLabel">Edit Data Pendaftaran Ujian Skripsi</h4>
			</div>
			<?=form_open_multipart('admin/pendaftaran_sidang')?>
			<div class="modal-body">
				<input type="hidden" name="id_pendaftaran" value="edit_id_pendaftaran">
				<div class="form-group">
					<label>Nama</label>
					<input class="form-control" type="text" name="nama" id="edit_nama" required>
				</div>
				<div class="form-group">
					<label>NIM</label>
					<input class="form-control" type="number" name="nim" id="edit_nim" required>
				</div>
				<div class="form-group">
					<label>Jenis Kelamin</label>
					<select name="jenis_sidang" id="edit_jenis_sidang" class="form-control" data-live-search="true">
                        <option>-- Pilih --</option>
                        <?php foreach ($jenis_kelamin as $row):?>
                        <option value="<?=$row->id_jenis_kelamin?>"><?=$row->nama?></option>
                        <?php endforeach;?>
                    </select>
				</div>
				<div class="form-group">
					<label>Angkatan</label>
					<select name="angkatan" id="edit_angkatan" class="form-control" required>
						<option>-- Pilih --</option>
						<?php for($i=2017; $i>=2011; $i--): ?>
							<option value="<?= $i ?>"><?= $i ?></option>
						<?php endfor; ?>
					</select>
				</div>
				<div class="form-group">
					<label>Jenis Sidang</label>
					<select name="jenis_sidang" id="edit_jenis_sidang" class="form-control" data-live-search="true">
                        <option>-- Pilih --</option>
                        <?php foreach ($jenis_seminar as $row):?>
                        <option value="<?=$row->id_jenis?>"><?=$row->nama?></option>
                        <?php endforeach;?>
                    </select>
				</div>
				<div class="form-group">
					<label>Pembimbing 1</label>
					<select name="pembimbing1" id="edit_pembimbing_1" class="form-control" data-live-search="true">
                        <option>-- Pilih --</option>
                        <?php foreach ($dosen as $row):?>
                        <option value="<?=$row->NIP?>"><?=$row->nama?></option>
                        <?php endforeach;?>
                    </select>
				</div>
				<div class="form-group">
					<label>Pembimbing 2</label>
					<select name="pembimbing2" id="edit_pembimbing_2" class="form-control" data-live-search="true">
                        <option>-- Pilih --</option>
                        <?php foreach ($dosen as $row):?>
                        <option value="<?=$row->NIP?>"><?=$row->nama?></option>
                        <?php endforeach;?>
                    </select>
				</div>
				<div class="form-group">
					<label>Dosen Penguji 1</label>
					<select name="penguji1" id="edit_penguji_1" class="form-control" data-live-search="true">
                        <option>-- Pilih --</option>
                        <?php foreach ($dosen as $row):?>
                        <option value="<?=$row->NIP?>"><?=$row->nama?></option>
                        <?php endforeach;?>
                    </select>
				</div>
				<div class="form-group">
					<label>Dosen Penguji 2</label>
					<select name="penguji2" id="edit_penguji_2" class="form-control" data-live-search="true">
                        <option>-- Pilih --</option>
                        <?php foreach ($dosen as $row):?>
                        <option value="<?=$row->NIP?>"><?=$row->nama?></option>
                        <?php endforeach;?>
                    </select>				</div>
				<div class="form-group">
					<label>Dosen Penguji 3</label>
					<select name="penguji3" id="edit_penguji_3" class="form-control" data-live-search="true">
                        <option>-- Pilih --</option>
                        <?php foreach ($dosen as $row):?>
                        <option value="<?=$row->NIP?>"><?=$row->nama?></option>
                        <?php endforeach;?>
                    </select>
				</div>
				<div class="form-group">
					<label>Judul Makalah Seminar</label>
					<input class="form-control" type="text" name="judul_makalah" id="edit_judul_makalah" required>
				</div>
				<div class="form-group">
					<label>Upload File</label>
                    <input type="file" id="upload_file" name="file">
                </div>
				<div class="form-group">
					<label>Hari</label>
					<select name="hari" id="edit_hari" class="form-control" data-live-search="true">
                        <option>-- Pilih --</option>
                        <option value="Senin">Senin</option>
                        <option value="Selasa">Selasa</option>
                        <option value="Rabu">Rabu</option>
                        <option value="Kamis">Kamis</option>
                        <option value="Jumat">Jumat</option>
                        <option value="Sabtu">Sabtu</option>
                    </select>
				</div>
				<div class="form-group">
                    <label for="tanggal">Tanggal</label>
                    <div class="input-group date">
                          <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                          <input type="text" name="tanggal" id="edit_tanggal" class="form-control" placeholder="YYYY-MM-DD">
                    </div>
              	</div>
				<div class="form-group">
					<label>Pukul</label>
					<input class="form-control" type="text" name="waktu" id="edit_waktu" required>
				</div>
				<div class="form-group">
					<label>Tempat</label>
					<input class="form-control" type="text" name="tempat" id="edit_tempat" required>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
				<input type="submit" class="btn btn-primary" name="edit" value="Simpan">
			</div>
			<?=form_close();?>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
<script type="text/javascript">
	$(document).ready(function() {
	    $('#table').DataTable();
	    $('.input-group.date').datepicker({format: "yyyy-mm-dd"});
	} );

				function deleteData(id) {
                    swal({
                    title: "Apakah Anda Ingin Menghapus Data ini?",
                    text: ' ',
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Ya",
                    cancelButtonText: "Tidak",
                    closeOnConfirm: true,
                    closeOnCancel: true
                    },
                    function(isConfirm){
                    if (isConfirm) {
                        $.ajax({
                            url: '<?= base_url('admin/pendaftaran_sidang') ?>',
                            type: 'POST',
                            data: {
                                delete: true,
                                id_pendaftaran: id
                            },
                            success: function() {
                                window.location = '<?= base_url('admin/pendaftaran_sidang') ?>';
                            },
                            error: function(e) {
							    console.log(e.responseText);
							}
                        });
                    }
                    });
                }

                function get_sidang(id_pendaftaran) {
		            $.ajax({
		                url: "<?= base_url('admin/pendaftaran_sidang') ?>",
		                type: 'POST',
		                data: {
		                    id_pendaftaran: id_pendaftaran,
		                    get: true
		                },
		                success: function(response) {
		                    response = JSON.parse(response);
		                    <?php foreach ($columns as $column): ?>
		                    $('#edit_<?= $column ?>').val(response.<?= $column ?>);
		                    <?php endforeach; ?>
		                    <?php if (in_array("id_pendaftaran", $columns)): ?>
		                    $('input[class="form-control"][name="id_pendaftaran"]').val(response.id_pendaftaran);
		                    <?php endif; ?>                }
		            });
		        }
                
</script>