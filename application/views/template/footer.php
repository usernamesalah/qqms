</div>
<div class="col-md-3">
      <div class="panel panel-default" align="center">
        <div class="panel-heading"><h4><b>Informasi</b></h4></div>
      </div>
      <?php foreach ($this->kategori_m->get() as $k): ?>
        <div class="panel panel-success">
          <div class="panel-heading">
            <h3 class="panel-title"><?= $k->nama ?></h3>
          </div>
          <div class="panel-body">
            <div class="list-group">
              <?php foreach ($this->blog_m->get_by_order_any_limit('id_blog','DESC', 5, ['id_kategori' => $k->id_kategori]) as $y ): ?>
                <a href="<?= base_url('home/artikel/') . $y->id_blog ?>" class="list-group-item"><?= $y->judul_blog ?></a>
              <?php endforeach ?>
            </div>
          </div>
        </div>
      <?php endforeach ?>
      <div class="panel" align="center">
        <div class="panel-body"><a class="btn btn-primary" href="<?= base_url('home/artikel') ?>">Lihat Semua Berita</a></div>
      </div>
    </div>
  </div>
      <footer>
        <div class="row">
          <div class="col-lg-12">

            <ul class="list-unstyled">
              <li class="pull-right"><a href="#top">Back to top</a></li>
            </ul>
            <p>Official Website Agribisnis Fakultas Pertanian @2017</p>
            <p>Made by <a href="http://pudinglab.id" rel="nofollow">PudingLab</a></p>

          </div>
        </div>

      </footer>


    </div>


    <script type="text/javascript">
      $(document).ready(function() {
          $('.input-group.date').datepicker({format: "yyyy-mm-dd"});
      } );
    </script>

    <script src="<?= base_url('assets') ?>/vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?= base_url('assets') ?>/lumen/js/custom.js"></script>
    <script src="<?= base_url('assets/datepicker') ?>/js/bootstrap-datepicker.min.js"></script>
  </body>
</html>
