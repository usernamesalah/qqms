<!-- <div class="container"> -->

    <h4 align="left"><b>Artikel</b></h4>
    <hr>

    <div class="list-group">
    <?php foreach ($blog as $key): ?>
      <div class="row list-group-item">
      	<div class="col-md-4">
      		<img src="<?=base_url('assets/img/blog/').$key->header.'.jpg' ?>" class="img img-responsive img-thumbnail">
      	</div>
      	<div class="col-md-8">
      		<h3 class="list-group-item-heading">List group item heading</h3>
      		<small><i>Posted by <?= $key->penerbit ?> at <?= $this->tanggal->convert_date($key->post_date, true) ?> &nbsp; /  <?= $this->kategori_m->get_row(['id_kategori' => $key->id_kategori])->nama ?></i></small>
        	<p class="list-group-item-text"><?= substr($key->isi, 0,100) ?></p>
        	<a href="<?=base_url('home/artikel/').$key->id_blog ?>" class="btn btn-primary pull-right">Read More</a>
      	</div>
      </div>
      <br>
    <?php endforeach ?>
    </div>
    <hr>
    	<ul class="pagination">
    	  <li class="disabled"><a href="#">&laquo;</a></li>
    	  <li class="active"><a href="#">1</a></li>
    	  <li><a href="#">2</a></li>
    	  <li><a href="#">3</a></li>
    	  <li><a href="#">4</a></li>
    	  <li><a href="#">5</a></li>
    	  <li><a href="#">&raquo;</a></li>
    	</ul>

<!-- </div> -->
