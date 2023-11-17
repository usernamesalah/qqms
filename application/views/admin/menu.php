<h2 class="page-title"><b><?= $menu->nama ?></b></h2>
<div class="row">
	<div class="col-md-12">
	
		<?= $this->session->flashdata('msg') ?>
	<hr>
		<?= form_open_multipart('admin/menu') ?>
		<div class="form-group">
            <textarea name="detail"><?= $menu->detail_menu ?></textarea>
            <input type="hidden" name="id_menu" value="<?= $this->uri->segment(3)?>">
        </div>
        <div class="form-group">
            <input type="submit" name="simpan" value="Simpan" class="btn btn-lg btn-primary">
        </div>
		<?= form_close() ?>
	</div>
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