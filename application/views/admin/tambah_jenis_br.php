<h2 class="page-title"><b>Jenis Borang</b></h2>


        
        <hr>
        <div class="row">
            <div class="col-md-6">
                <div class="panel">
                    <div class="panel-heading">
                        
                        <h4>Data Jenis Borang</h4>
                    </div>
                    <div class="panel-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nama</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i=0; foreach ($jenis as $value): ?>
                                <tr>
                                    <td><?= ++$i  ?></td>
                                    <td><?= $value->nama  ?></td>
                                    <td>
                                        <button class="fa fa-trash btn btn-danger btn-xs" onclick="deleteData('<?= $value->id_jenis ?>')"></button>
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
                    <?= form_open_multipart('admin/jenis-borang') ?>
                        <div class="form-group">
                            <label for="input">Jenis Borang</label>
                            <input type="text" name="nama" class="form-control" required="">
                        </div>
                        <div class="form-group">
                            <input type="submit" name="simpan" class="btn btn-success" value="Simpan">
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
                            url: '<?= base_url('admin/jenis-borang') ?>',
                            type: 'POST',
                            data: {
                                delete: true,
                                id: id
                            },
                            success: function() {
                                window.location = '<?= base_url('admin/jenis-borang') ?>';
                            }
                        });
                    }
                    });
                }
</script>