<h2 class="page-title"><b>Data Dosen</b></h2>
<div class="row">
	<div class="col-md-12">
		<!-- TABLE NO PADDING -->
		<?= $this->session->flashdata('msg') ?>
		<div class="clearfix">
			<button class="btn btn-xs btn-success" data-toggle="modal" data-target="#add"><i class="fa fa-plus"></i> Tambah Dosen</button>

		</div>
		<hr>
		<div class="panel">
			<div class="panel-body">
				<table class="table table-striped table-responsive" id="table">
				<thead>
				<tr>
					<th>
						NIP
					</th>
					<th>
						Nama
					</th>
					<th>
						Jenis Kelamin
					</th>
					<th>
						Jabatan Fungsional
					</th>
					<th>
						Bidang Keahlian
					</th>
					<th>
						Action
					</th>
				</tr>
				</thead>
				<tbody>
				<?php foreach ($dosen as $data): ?>
				<tr>
					<td>
						<?= $data->NIP ?>
					</td>
					<td>
						<?= $data->nama ?>
					</td>
					<td>
						<?= $this->jenis_kelamin_m->get_row(['id_jenis_kelamin' => $data->jenis_kelamin])->nama ?>
					</td>
					<td>
						<?= $this->jabatan_fungsional_m->get_row(['id_jabatan' => $data->jabatan_fungsional])->nama ?>
					</td>
					<td>
						<div class="row">
							<div class="col-md-2" align="center">
								<button class="btn btn-default btn-xs" data-toggle="modal" data-target="#add_makul" onclick="add_makul('<?= $data->NIP ?>','<?= $data->nama ?>')"><i class="fa fa-plus"></i></button>
							</div>
							<div class="col-md-10">
								<ul >
								<?php 
								$makul = $this->makul_ajar_m->get(['id_dosen' => $data->NIP]);
								foreach ($makul as $key): ?>
									<li><?= $this->mata_kuliah_m->get_row(['kode_makul' => $key->id_makul])->nama_makul ?></li>
								<?php endforeach ?>
								</ul>
							</div>
						</div>
					</td>
					<td>
						<div class="btn-group btn-xs">
							<button type="button" class="btn btn-primary">Action</button>
							<button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
							<span class="caret"></span>
							</button>
							<ul class="dropdown-menu" role="menu">
								<li><a href="<?= base_url('admin/detail_dosen') . $data->NIP ?>">Detail</a></li>
								<li><a href="#" data-toggle="modal" data-target="#edit" onclick="edit(<?= $data->NIP ?>)">Edit</a></li>
								<li><a href="#" onclick="deleteData(<?= $data->NIP ?>)">Hapus</a></li>
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
<!-- Modal Add Dosen -->
<div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title" id="myModalLabel">Tambah Data Dosen</h4>
			</div>
			<?=form_open_multipart('admin/dosen')?>
			<div class="modal-body">
				<div class="form-group">
					<label>Foto Dosen</label>
					<input class="form-control" type="file" name="foto">
				</div>
				<div class="form-group">
					<label>NIP <small>* Wajib Diisi ( bila tidak ada isikan dengan id unik )</small></label>
					<input class="form-control" type="text" name="nip" required>
				</div>
				<div class="form-group">
					<label>Nama</label>
					<input class="form-control" type="text" name="nama" required="">
				</div>
				<div class="form-group">
					<label>Jenis Kelamin</label>
					<select name="jenis_kelamin" class="form-control">
						<option value="1">Laki - Laki</option>
						<option value="2">Perempuan</option>
					</select>
				</div>
				<div class="form-group">
					<label>Jabatan Fungsional</label>
					<select name="jabatan_fungsional" class="form-control" required="">
						<?php foreach ($this->jabatan_fungsional_m->get() as $key): ?>
						<option value="<?= $key->id_jabatan ?>"><?= $key->nama ?></option>
						<?php endforeach ?>
					</select>
				</div>
				<div class="form-group">
					<label>NIDN</label>
					<input class="form-control" type="text" name="nidn">
				</div>
				<div class="form-group">
					<label>Tempat Lahir</label>
					<input class="form-control" type="text" name="tempat_lahir">
				</div>
				<div class="form-group">
					<div class="form-group">
						<label for="Tanggal">Tanggal Lahir</label>
						<!-- <input type="text" class="form-control" name="edit_tgl_angsuran" id="edit_tgl_angsuran" required> -->
						<div class="input-group date">
							<span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
							<input type="text" name="tanggal_lahir" class="form-control" placeholder="YYYY-MM-DD" required>
						</div>
					</div>
				</div>
				<div class="form-group">
					<label>Email</label>
					<input class="form-control" type="email" name="email">
				</div>
				<div class="form-group">
					<label>Telepon</label>
					<input class="form-control" type="number" name="telepon" placeholder="628xxxxxxxx">
				</div>
				<div class="form-group">
					<label>Alamat</label>
					<textarea name="alamat" class="form-control"></textarea>
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

<!-- Modal tambah Bidang Keahlian -->
<div class="modal fade" id="add_makul" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title" id="myModalLabel">Tambah Data Bidang Keahlian</h4>
			</div>
			<?=form_open_multipart('admin/dosen')?>
			<div class="modal-body">
				<div class="form-group">
					<label>Nama Dosen</label>
					<input class="form-control" type="text" name="nama" id="nama_add" readonly>
					<input class="form-control" type="hidden" name="nip" id="nip_add">
				</div>
				<div class="form-group">
					<label>Mata Kuliah</label>
					<select name="makul" class="form-control" required="">
						<?php foreach ($this->mata_kuliah_m->get() as $key): ?>
						<option value="<?= $key->kode_makul ?>"><?= $key->nama_makul ?></option>
						<?php endforeach ?>
					</select>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
				<input type="submit" class="btn btn-primary" name="add_makul" value="Simpan">
			</div>
			<?=form_close();?>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
<!-- Modal Edit Dosen -->
<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title" id="myModalLabel">Edit Data Dosen</h4>
			</div>
			<?=form_open_multipart('admin/dosen')?>
			<div class="modal-body">
				<div class="form-group">
					<label>Foto Dosen</label>
					<input class="form-control" type="file" name="foto">
				</div>
				<div class="form-group">
					<label>NIP</label>
					<input class="form-control" type="text" name="nip" id="nip" readonly="">
				</div>
				<div class="form-group">
					<label>Nama</label>
					<input class="form-control" type="text" name="nama" id="nama" required="">
				</div>
				<div class="form-group">
					<label>Jenis Kelamin</label>
					<div id="jk"></div>
				</div>
				<div class="form-group">
					<label>Jabatan Fungsional</label>
					<div id="jab"></div>
				</div>
				<div class="form-group">
					<label>NIDN</label>
					<input class="form-control" type="text" name="nidn" id="nidn">
				</div>
				<div class="form-group">
					<label>Tempat Lahir</label>
					<input class="form-control" type="text" name="tempat_lahir" id="tempat_lahir">
				</div>
				<div class="form-group">
					<div class="form-group">
						<label for="Tanggal">Tanggal Lahir</label>
						<!-- <input type="text" class="form-control" name="edit_tgl_angsuran" id="edit_tgl_angsuran" required> -->
						<div class="input-group date">
							<span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
							<input type="text" name="tanggal_lahir" id="tanggal_lahir" class="form-control" placeholder="YYYY-MM-DD" required>
						</div>
					</div>
				</div>
				<div class="form-group">
					<label>Email</label>
					<input class="form-control" type="email" name="email" id="email">
				</div>
				<div class="form-group">
					<label>Telepon</label>
					<input class="form-control" type="number" name="telepon" id="telepon" placeholder="628xxxxxxxx">
				</div>
				<div class="form-group">
					<label>Alamat</label>
					<textarea name="alamat" class="form-control" id="alamat"> </textarea>
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
                            url: '<?= base_url('admin/dosen') ?>',
                            type: 'POST',
                            data: {
                                delete: true,
                                NIP: id
                            },
                            success: function() {
                                window.location = '<?= base_url('admin/dosen') ?>';
                            }
                        });
                    }
                    });
                }

                function edit(id) {
                	$.ajax({
                        url: '<?= base_url('admin/dosen') ?>',
                        type: 'POST',
                        data: {
                            NIP: id,
                            get: true
                        },
                        success: function(response) {
                            response = JSON.parse(response);
                            console.log(response);
                            $('#jk').html(response.dropdown);
                            $('#jab').html(response.dropdown_jab);
                            $('#nama').val(response.nama);
                            $('#nip').val(response.NIP);
                            $('#tempat_lahir').val(response.tempat_lahir);
                            $('#tanggal_lahir').val(response.tanggal_lahir);
                            $('#telepon').val(response.telepon);
                            $('#email').val(response.email);
                            $('#alamat').val(response.alamat);
                            $('#nidn').val(response.nidn);
                        }
                    });
                }

                function add_makul(id,nama) {
                	$('#nama_add').val(nama);
                    $('#nip_add').val(id);
                }
</script>