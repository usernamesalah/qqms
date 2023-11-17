<h2 class="page-title"><b>Data Borang</b></h2>
<div class="row">
	<div class="col-md-12">
		<!-- TABLE NO PADDING -->
		<?= $this->session->flashdata('msg') ?>
		<div class="clearfix">
			<a class="btn btn-xs btn-success" href="<?=base_url('admin/borang/tambah') ?>"><i class="fa fa-plus"></i> Tambah Borang</a>

		</div>
		<hr>
		<div class="panel">
			<div class="panel-body">
				<table class="table table-striped table-responsive" id="table">
				<thead>
				<tr>
					<th>
						#
					</th>
					<th>
						Judul
					</th>
					<th>
						Jenis Borang
					</th>
					<th>
						View File
					</th>
					<th>
						Action
					</th>
				</tr>
				</thead>
				<tbody>
				<?php $i=0; foreach ($borang as $data): ?>
				<tr>
					<td>
						<?= ++$i ?>
					</td>
					<td>
						<?= $data->judul ?>
					</td>
					<td>
						<?= $this->jenis_borang_m->get_row(['id_jenis' => $data->id_jenis])->nama ?>
					</td>
					<td style="text-align: center;">
						<a class="btn btn-default btn-sm" href="<?= base_url('assets/berkas') .'/'. $data->berkas ?>"><i class="fa fa-eye"></i> </a>
					</td>
					<td>
						<div class="btn-group btn-xs">
							<button type="button" class="btn btn-primary">Action</button>
							<button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
							<span class="caret"></span>
							</button>
							<ul class="dropdown-menu" role="menu">
								<li><a href="#" data-toggle="modal" data-target="#edit" onclick="edit('<?= $data->id_borang?>')">Edit</a></li>
								<li><a href="#">Detail</a></li>
								<li><a href="#" onclick="deleteData('<?= $data->id_borang?>')">Hapus</a></li>
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

<!-- Modal tambah Bidang Keahlian -->
<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title" id="myModalLabel">Tambah Data Bidang Keahlian</h4>
			</div>
			<?=form_open_multipart('admin/borang')?>
			<div class="modal-body">
				<div class="form-group">
                    <label>File Borang</label>
                    <input type="file" name="borang" class="form-control">
                    <input type="hidden" name="id_borang" id="id_borang" class="form-control">
                </div>
                <div class="form-group">
                    <label>Judul Borang</label>
                    <input type="text" name="judul" class="form-control" id="judul">
                </div>
                <div class="form-group">
                    <label>Jenis Borang</label>
                    <div id="jenis">
                    	
                    </div>
                </div>
                <div class="form-group">
                    <label>Detail Borang</label>
                    <textarea name="detail" id="detail"></textarea>
                </div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
				<input type="submit" name="simpan" value="Simpan" class="btn btn-lg btn-primary">
			</div>
			<?=form_close()?>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>

<script type="text/javascript">
	$(document).ready(function() {
	    $('#table').DataTable();
	    tinymce.init({
                selector: 'textarea',
                height: 500,
                plugins: [
                    'advlist autolink lists link image charmap print preview hr anchor pagebreak',
                    'searchreplace wordcount visualblocks visualchars code fullscreen',
                    'insertdatetime media nonbreaking save table contextmenu directionality',
                    'emoticons template paste textcolor colorpicker textpattern imagetools'
                ],
                toolbar1: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
                toolbar2: 'print preview media | forecolor backcolor',
                image_advtab: true
            });
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
                            url: '<?= base_url('admin/borang') ?>',
                            type: 'POST',
                            data: {
                                delete: true,
                                id: id
                            },
                            success: function() {
                                window.location = '<?= base_url('admin/borang') ?>';
                            }
                        });
                    }
                    });
                }

                function edit(id) {
                	$.ajax({
                        url: '<?= base_url('admin/borang') ?>',
                        type: 'POST',
                        data: {
                            id: id,
                            get: true
                        },
                        success: function(response) {
                            response = JSON.parse(response);
                            console.log(response);
                            $('#jenis').html(response.dropdown);
                            $('#judul').val(response.judul);
                            $('#id_borang').val(response.id_borang);
                            tinymce.get('detail').setContent(response.detail);

                        }
                    });
                }
</script>