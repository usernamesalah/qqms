<!-- <div class="container"> -->

    <h4 align="left"><b><?= $blog->judul_blog ?></b></h4>
    <hr>
    <?php if ($blog->header !== null): ?>
    	<img src="<?=base_url('assets/img/blog/').$blog->header.'.jpg' ?>" class="img img-responsive img-thumbnail" width="100%">
    <?php endif; ?>
    <hr>
    <div class="well well-sm">
    <i>Posted by <?= $blog->penerbit ?> at <?= $this->tanggal->convert_date($blog->post_date, true) ?> &nbsp; / <?= $this->kategori_m->get_row(['id_kategori' => $blog->id_kategori])->nama ?></i>  
    </div>
    <div>
    	<?= $blog->isi ?>
    </div>
    <hr>
    <?= $this->session->flashdata('msg') ?>
    <?= form_open('home/artikel',['class' => 'form-horizontal'])?>
      <fieldset>
        <legend>Tinggalkan Komentar</legend>
        <div class="form-group">
          <label for="inputEmail" class="col-lg-2 control-label">Nama</label>
          <div class="col-lg-10">
            <input type="text" class="form-control" name="nama" placeholder="Nama">
            <input type="hidden" class="form-control" name="id" placeholder="Nama" value="<?= $this->uri->segment(3) ?>">
          </div>
        </div>
        <div class="form-group">
          <label for="inputEmail" class="col-lg-2 control-label">Email</label>
          <div class="col-lg-10">
            <input type="email" class="form-control" name="email" placeholder="Email">
          </div>
        </div>
        <div class="form-group">
          <label for="textArea" class="col-lg-2 control-label">Komentar</label>
          <div class="col-lg-10">
            <textarea class="form-control" rows="3" name="komentar"></textarea>
          </div>
        </div>
        <div class="form-group">
          <div class="col-lg-10 col-lg-offset-2">
            <button type="reset" class="btn btn-default">Cancel</button>
            <input name="kirim" type="submit" class="btn btn-primary" value="Submit">
          </div>
        </div>
      </fieldset>
    </form>
    <hr>

<!-- </div>
 -->
