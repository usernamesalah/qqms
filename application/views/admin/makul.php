<h2 class="page-title"><b>Data Mata Kuliah</b></h2>
<div class="row">
	<div class="col-md-12">
		<!-- TABLE NO PADDING -->
		<?= $this->session->flashdata('msg') ?>
		<div class="clearfix">
			<button class="btn btn-xs btn-success" data-toggle="modal" data-target="#add"><i class="fa fa-plus"></i> Tambah</button>
		</div>
		<hr>
		<div class="panel">
			<div class="panel-body">
				<table class="table table-striped table-responsive" id="table">
				<thead>
				<tr>
					<th>
						Semester
					</th>
					<th>
						Kode
					</th>
					<th>
						Mata Kuliah
					</th>
					<th>
						SKS
					</th>
					<th>
						Prasyarat
					</th>
					<th>
						Deskripsi
					</th>
					<th>
						Action
					</th>
				</tr>
				</thead>
				<tbody>
				<?php foreach ($makul as $data): ?>
					<?php if (!empty($data->kode_makul)) :?>
				<tr style="text-align: center !important;">
					<td>
						<?= $data->semester ?>
					</td>
					<td>
						<?= $data->kode_makul ?>
					</td>
					<td>
						<?= $data->nama_makul ?>
					</td>
					<td>
						<?= $data->sks ?>
					</td>
					<td>
						<?= $data->prasyarat ?>
					</td>
					<td>
						<button class="btn btn-xs btn-success" data-toggle="modal" data-target="#lihat" onclick="lihat_data('<?= $data->kode_makul ?>')"><i class="fa fa-eye"></i> Lihat</button>
					</td>
					<td>
						<div class="btn-group btn-xs">
							<button type="button" class="btn btn-primary">Action</button>
							<button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
							<span class="caret"></span>
							</button>
							<ul class="dropdown-menu" role="menu">
								<li><a href="#" data-toggle="modal" data-target="#edit" onclick="edit('<?= $data->kode_makul ?>')">Edit</a></li>
								<li><a href="#" onclick="deleteData('<?= $data->kode_makul ?>')">Hapus</a></li>
							</ul>
						</div>
					</td>
				</tr>
				<?php endif; ?>
				<?php endforeach ?>
				</tbody>
				</table>
			</div>
		</div>
		<!-- END TABLE NO PADDING -->
	</div>
</div>
<!-- Modal Add  -->
<div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title" id="myModalLabel">Tambah Data Mata Kuliah</h4>
			</div>
			<?=form_open('admin/mata-kuliah')?>
			<div class="modal-body">
				<div class="form-group">
					<label>Kode Mata Kuliah<small>* Wajib Diisi ( bila tidak ada isikan dengan id unik )</small></label>
					<input class="form-control" type="text" name="kode" required>
				</div>
				<div class="form-group">
					<label>Nama</label>
					<input class="form-control" type="text" name="nama" required="">
				</div>
				<div class="form-group">
					<label>Semester</label>
					<select name="semester" class="form-control">
						<?php for ($i=1; $i < 9; $i++) { ?>
							<option value="<?= $i ?>"><?= $i ?></option>
						<?php } ?>
					</select>
				</div>
				<div class="form-group">
					<label>Jumlah SKS</label>
					<input class="form-control" type="text" name="sks">
				</div>
				<div class="form-group">
					<label>Prasyarat</label>
					<select name="prasyarat" class="form-control">
						<?php foreach ($makul as $key): ?>
							
							<option value="<?= $key->kode_makul ?>"><?= $key->nama_makul ?></option>
						<?php endforeach ?>
					</select>
				</div>
				<div class="form-group">
					<label>Deskripsi Mata Kuliah</label>
					<textarea name="deskripsi" class="form-control"></textarea>
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
<!-- Modal Add Dosen -->
<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title" id="myModalLabel">Edit Data Dosen</h4>
			</div>
			<?=form_open_multipart('admin/mata-kuliah')?>
			<div class="modal-body">
				<div class="form-group">
					<label>Kode Mata Kuliah</label>
					<input class="form-control" type="text" name="kode" id="kode" readonly>
				</div>
				<div class="form-group">
					<label>Nama</label>
					<input class="form-control" type="text" name="nama" id="nama" required="">
				</div>
				<div class="form-group">
					<label>Semester</label>
					
					<input class="form-control" type="text" name="semester" id="semester" required="">
				</div>
				<div class="form-group">
					<label>Jumlah SKS</label>
					<input class="form-control" type="text" name="sks" id="sks">
				</div>
				<div class="form-group">
					<label>Prasyarat</label>
					<div id="prasyarat">
						
					</div>
				</div>
				<div class="form-group">
					<label>Deskripsi Mata Kuliah</label>
					<textarea name="deskripsi" id="deskripsia" class="form-control"></textarea>
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


<div class="modal fade" id="lihat" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title" id="myModalLabel">Deskripsi Mata Kuliah <span id="nama"></span></h4>
			</div>
			<div class="modal-body">
				<p id="deskripsi"></p>
			</div>
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
                            url: '<?= base_url('admin/mata-kuliah') ?>',
                            type: 'POST',
                            data: {
                                delete: true,
                                kode_makul: id
                            },
                            success: function() {
                                window.location = '<?= base_url('admin/mata-kuliah') ?>';
                            }
                        });
                    }
                    });
                }

                function edit(id) {
                	$.ajax({
                        url: '<?= base_url('admin/mata-kuliah') ?>',
                        type: 'POST',
                        data: {
                            kode_makul: id,
                            get: true
                        },
                        success: function(response) {
                            response = JSON.parse(response);
                            console.log(response);
                            $('#prasyarat').html(response.dropdown);
                            $('#nama').val(response.nama_makul);
                            $('#kode').val(response.kode_makul);
                            $('#semester').val(response.semester);
                            $('#deskripsia').val(response.deskripsi);
                            $('#sks').val(response.sks);

                        }
                    });
                }

                function lihat_data(id) {
                	$.ajax({
                        url: '<?= base_url('admin/mata-kuliah') ?>',
                        type: 'POST',
                        data: {
                            kode_makul: id,
                            get: true
                        },
                        success: function(response) {
                            response = JSON.parse(response);
                            console.log(response);
                            $('#deskripsi').html(response.deskripsi);
                        }
                    });
                }
</script>