<h2 class="page-title"><b>Detail Artikel</b></h2>
<hr>
<div class="row">
    <?= form_open_multipart('admin/artikel') ?>
	<div class="col-md-9">
    <?= $this->session->flashdata('msg') ?>
        <div class="panel">
            <div class="panel-body">
                <div class="form-group">
                    <label>Header</label>
                    <input type="file" name="header" class="form-control" >
                </div>
                <div class="form-group">
                    <label>Judul Artikel</label>
                    <input type="text" name="judul" class="form-control" value="<?= $blog->judul_blog ?>">
                </div>
                <div class="form-group">
                    <textarea name="isi" id="isi"></textarea>
                </div>
                <div class="form-group">
                    <input type="submit" name="update" value="Update" class="btn btn-lg btn-primary">
                </div>
            </div>
        </div>
	</div>
    <div class="col-md-3">
        <div class="panel">
            <div class="panel-heading">
                <h4>Kategori</h4>
            </div>
            <div class="panel-body">
                <div class="form-group" >
                    <?php foreach ($this->kategori_m->get() as $key): ?>
	                    <?php if ($key->id_kategori == $blog->id_kategori): ?>
	                    	<label class="fancy-radio" >
		                        <input name="kategori" value="<?= $key->id_kategori ?>" type="radio" class="form-control" checked>
		                        <span style="font-size: 15px;"><i></i><b><?= $key->nama ?></b></span>
		                    </label>
	                    <?php else : ?>
	                    	<label class="fancy-radio" >
		                        <input name="kategori" value="<?= $key->id_kategori ?>" type="radio" class="form-control">
		                        <span style="font-size: 15px;"><i></i><b><?= $key->nama ?></b></span>
		                    </label>
	                    <?php endif ?>
                    <?php endforeach ?>
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
            $('#isi').html('<?= $blog->isi ?>');
        });
    </script>