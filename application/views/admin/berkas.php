<h2 class="page-title"><b>Upload Berkas</b></h2>


		
		<hr>
		<div class="row">
			<div class="col-md-6">
				<div class="panel">
					<div class="panel-heading">
						
						<h4>Data Berkas</h4>
					</div>
					<div class="panel-body">
						<table class="table table-striped">
							<thead>
								<tr>
									<th>#</th>
									<th>Judul</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								<?php $i=0; foreach ($berkas as $value): ?>
								<tr>
									<td><?= ++$i  ?></td>
									<td><?= $value->judul  ?></td>
									<td>
										<button class="fa fa-trash btn btn-danger btn-xs" onclick="deleteData('<?= $value->id_berkas ?>')"></button>
									</td>
								</tr>	
								<?php endforeach ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<?= $this->session->flashdata('msg') ?>
				<div class="panel">
					<div class="panel-body">
					<?= form_open_multipart('admin/berkas') ?>
						<div class="form-group">
							<label for="input">Judul Berkas</label>
							<input type="text" name="judul" class="form-control" required="">
						</div>
						<div class="form-group">
							<label for="input">Jenis Berkas</label>
							<select name="jenis" class="form-control">
							<?php foreach ($this->jenis_berkas_m->get() as $key ): ?>
								<option value="<?= $key->id_jenis ?>"><?= $key->nama ?></option>
							<?php endforeach ?>
							</select>
						</div>
						<div class="form-group">
							<label for="input">Masukan File</label>
							<input class="form-control" type="file" name="foto">
						</div>
						<div class="form-group">
							<input type="submit" name="upload" class="btn btn-success" value="Simpan">
						</div>
					</div>
				</div>
			</div>

		</div>

<script type="text/javascript">
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
                            url: '<?= base_url('admin/berkas') ?>',
                            type: 'POST',
                            data: {
                                delete: true,
                                id: id
                            },
                            success: function() {
                                window.location = '<?= base_url('admin/berkas') ?>';
                            }
                        });
                    }
                    });
                }
</script>