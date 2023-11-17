<h2 class="page-title"><b>Borang Akreditasi</b></h2>
<hr>
<div class="row">
    <?= form_open_multipart('admin/borang') ?>
	<div class="col-md-9">
    <?= $this->session->flashdata('msg') ?>
        <div class="panel">
            <div class="panel-body">
                <div class="form-group">
                    <label>File Borang</label>
                    <input type="file" name="borang" class="form-control">
                </div>
                <div class="form-group">
                    <label>Judul Borang</label>
                    <input type="text" name="judul" class="form-control">
                </div>
                <div class="form-group">
                    <label>Jenis Borang</label>
                    <select name="jenis" class="form-control">
                        <?php foreach ($this->jenis_borang_m->get() as $key): ?>
                        <option value="<?= $key->id_jenis ?>"> <?= $key->nama ?> </option>
                        <?php endforeach ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Detail Borang</label>
                    <textarea name="detail"></textarea>
                </div>
                <div class="form-group">
                    <input type="submit" name="simpan" value="Simpan" class="btn btn-lg btn-primary">
                </div>
            </div>
        </div>
	</div>

    <?= form_close() ?>
</div>


    <script type="text/javascript">
        $( document ).ready(function() {
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
        });
    </script>