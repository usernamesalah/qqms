<h2 class="page-title"><b>Data Artikel</b></h2>
<div class="row">
	<div class="col-md-12">
		<!-- TABLE NO PADDING -->
		<?= $this->session->flashdata('msg') ?>
		<div class="clearfix">
			<a class="btn btn-xs btn-success" href="<?=base_url('admin/artikel/tambah') ?>"><i class="fa fa-plus"></i> Tambah Artikel</a>

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
						Date Post
					</th>
					<th>
						Kategori
					</th>
					<th>
						Total Komentar
					</th>
					<th>
						Action
					</th>
				</tr>
				</thead>
				<tbody>
				<?php $i=0; foreach ($blog as $data): ?>
				<tr>
					<td>
						<?= ++$i ?>
					</td>
					<td>
						<?= $data->judul_blog ?>
					</td>
					<td>
						<?= $data->post_date ?>
					</td>
					<td>
						<?= $this->kategori_m->get_row(['id_kategori' => $data->id_kategori])->nama ?>
					</td>
					<td style="text-align: center;">
						<a class="btn btn-default btn-sm" href="<?= base_url('admin/artikel/detail?id='.$data->id_blog) ?>"><?= count($this->komentar_m->get(['id_blog'=>$data->id_blog ])) ?></a>
					</td>
					<td>
						<div class="btn-group btn-xs">
							<button type="button" class="btn btn-primary">Action</button>
							<button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
							<span class="caret"></span>
							</button>
							<ul class="dropdown-menu" role="menu">
								<li><a href="<?= base_url('admin/artikel/detail?id='.$data->id_blog) ?>">Detail</a></li>
								<li><a href="#" onclick="deleteData(<?= $data->id_blog ?>)">Hapus</a></li>
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
</script>