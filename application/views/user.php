
        <!-- Sweet Alert-->
        <link href="<?= base_url() ?>/assets/libs/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css" />
<script src="<?= base_url() ?>/assets/libs/sweetalert2/sweetalert2.min.js"></script>
<div class="row">
	<div class="col-lg-12">
		<div class="card">
			<div class="card-body">
				<?= $this->session->flashdata('msg') ?>
				<div class="row mb-2">
					<div class="col-md-6">
						<div class="mb-3">

							<button type="button" class="btn btn-success waves-effect waves-light"
								data-bs-toggle="modal" data-bs-target="#myModal"><i class="fa fa-plus"></i> &nbsp;
								Tambah User</button>
							<!-- sample modal content -->
							<div id="myModal" class="modal fade" tabindex="-1" role="dialog"
								aria-labelledby="myModalLabel" aria-hidden="true">
								<div class="modal-dialog">
									<?= form_open('admin/user') ?>
									<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title" id="myModalLabel">Tambah User</h5>
											<button type="button" class="btn-close" data-bs-dismiss="modal"
												aria-label="Close">
											</button>
										</div>
										<div class="modal-body">
											<div class="row mb-4">
												<label for="horizontal-firstname-input"
													class="col-sm-3 col-form-label">Nama User</label>
												<div class="col-sm-9">
													<input type="text" name="name" class="form-control"
														id="horizontal-firstname-input">
												</div>
											</div>
											<div class="row mb-4">
												<label for="horizontal-email-input"
													class="col-sm-3 col-form-label">Email</label>
												<div class="col-sm-9">
													<input type="email" name="email" class="form-control"
														id="horizontal-email-input">
												</div>
											</div>
											<div class="row mb-4">
												<label for="horizontal-email-input"
													class="col-sm-3 col-form-label">Role</label>
												<div class="col-sm-9">
													<select class="form-select" name="role">
														<option value="0">Admin</option>
														<option value="1">Gatekeeper</option>
														<option value="2">Pertashop</option>
													</select>
												</div>
											</div>
										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-light waves-effect"
												data-bs-dismiss="modal">Close</button>
											<input type="submit" name="create" value="Simpan"
												class="btn btn-primary waves-effect waves-light"></button>
										</div>
									</div><!-- /.modal-content -->
									<?= form_close() ?>
								</div><!-- /.modal-dialog -->

							</div>
						</div>


					</div>
					<!-- end row -->
					<div class="table-responsive mb-4">
						<table class="table table-centered table-nowrap mb-0">
							<thead>
								<tr>
									<th scope="col">Name</th>
									<th scope="col">Role</th>
									<th scope="col">Email</th>
									<th scope="col" style="width: 200px;">Action</th>
								</tr>
							</thead>
							<tbody>
								<?php
								foreach ($users as $user):
									// if ($user->email == $profile->email){ continue; }
									?>
									<tr>
										<td>
											<?= $user->name ?: '' ?>
										</td>
										<td>
											<?php
											switch ($user->role)
											{
												case 1:
													echo 'Gatekeeper';
													break;
												case 2:
													echo 'Pertashop';
													break;

												default:
													echo 'Admin QQ';

													break;
											}
											?>
										</td>
										<td>
											<?= $user->email ?>
										</td>
										<td>
											<div class="btn-group" role="group" aria-label="Basic example">
												<a href="<?= base_url('admin/user/reset-password/' . $user->id) ?>"
													class="btn btn-secondary"> Reset Password</a>
												<button onclick="deleteData(<?= $user->id ?>)" class="btn btn-danger"> Hapus</button>
											</div>
										</td>
									</tr>
								<?php endforeach; ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>

	<script>
			function deleteData(id) {
				console.log(id);
				Swal.fire({
					title: "Are you sure?",
					text: "You won't be able to revert this!",
					icon: "warning",
					showCancelButton: !0,
					confirmButtonText: "Yes, delete it!",
					cancelButtonText: "No, cancel!",
					confirmButtonClass: "btn btn-success mt-2",
					cancelButtonClass: "btn btn-danger ms-2 mt-2",
					buttonsStyling: !1
				}).then(function (t) {
					t.value ? 
						$.ajax({
							type: 'GET',
							url: '<?= base_url('admin/user/delete') ?>' + "/" + id,
							success: function (response) {
								window.location = '<?= base_url('admin/user') ?>';
							},
							error: function (error) {
								console.log('Error:', error);
							}
						})
					 : t.dismiss === Swal.DismissReason.cancel && Swal.fire({
						title: "Cancelled",
						text: "Your user data is safe :)",
						icon: "error"
					})
				})
				
			}
	</script>