<div class="navbar navbar-default navbar-fixed-top">
      
      <div class="container">
        <div class="navbar-header">
          <a href="../" class="navbar-brand"><img src ="<?= base_url('assets/img') ?>/logo-unsri-Copy.png" style="max-width:12%; float:left; margin-right:10px; margin-bottom:10px;" />Agribisnis</a>
          <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#navbar-main">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div>
        <div class="navbar-collapse collapse" id="navbar-main">
          <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown" href="#" id="download">Visi & Misi <span class="caret"></span></a>
              <ul class="dropdown-menu" aria-labelledby="download">
                <?php foreach ($this->sub_menu_m->get(['id_menu' => 1]) as $key): ?>
                 <li><a href="<?=base_url('home/sub_menu/').'/' . $key->id_sub_menu ?>"><?= $key->judul ?></a></li> 
                <?php endforeach ?>
              </ul>
            </li>
            <li><a href="<?=base_url('home/menu/2') ?>">Tentang Prodi</a></li>
            <li class="dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown" href="#" id="download1">Profil <span class="caret"></span></a>
              <ul class="dropdown-menu" aria-labelledby="download1">
                <?php foreach ($this->sub_menu_m->get(['id_menu' => 3]) as $key): ?>
                 <li><a href="<?=base_url('home/sub_menu/').'/' . $key->id_sub_menu ?>"><?= $key->judul ?></a></li> 
                <?php endforeach ?>
              </ul>
            </li>
            <li class="dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown" href="#" id="download2">Akademik <span class="caret"></span></a>
              <ul class="dropdown-menu" aria-labelledby="download2">
                <?php foreach ($this->sub_menu_m->get(['id_menu' => 4]) as $key): ?>
                 <li><a href="<?=base_url('home/sub_menu/').'/' . $key->id_sub_menu ?>"><?= $key->judul ?></a></li> 
                <?php endforeach ?>
                <li class="divider"></li>
                <li><a href="#">Pendaftaran Sidang</a></li>
              </ul>
            </li>
            <li class="dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown" href="#" id="download11">Laboratorium <span class="caret"></span></a>
              <ul class="dropdown-menu" aria-labelledby="download11">
                <?php foreach ($this->sub_menu_m->get(['id_menu' => 5]) as $key): ?>
                 <li><a href="<?=base_url('home/sub_menu/').'/' . $key->id_sub_menu ?>"><?= $key->judul ?></a></li> 
                <?php endforeach ?>
              </ul>
            </li>
            <li class="dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown" href="#" id="download12">Download <span class="caret"></span></a>
              <ul class="dropdown-menu" aria-labelledby="download12">
                <li><a href="<?=base_url('home/berkas/1') ?>">Berkas</a></li>
                <li><a href="<?=base_url('home/berkas/2') ?>">Modul</a></li>
              </ul>
            </li>
            <li class="dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown" href="#" id="download121">Borang Akreditasi <span class="caret"></span></a>
              <ul class="dropdown-menu" aria-labelledby="download121">
                <?php foreach ($this->jenis_borang_m->get() as $key): ?>
                  <li><a href="<?=base_url('home/borang/').$key->id_jenis ?>"><?= $key->nama ?></a></li>
                <?php endforeach ?>
              </ul>
            </li>
            <li><a href="#">Tracer</a></li>
            <?php if ($this->session->userdata('username') !== null): ?>
            <li class="dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown" href="#" id="download12">Admin <span class="caret"></span></a>
              <ul class="dropdown-menu" aria-labelledby="download12">
                <li><a href="<?=base_url('admin') ?>">Profil</a></li>
                <li><a href="<?=base_url('logout') ?>">Logout</a></li>
              </ul>
            </li>
            
            <?php else: ?>
            <li><a href="<?=base_url('login') ?>">Login</a></li>
            <?php endif; ?>
          </ul>

        </div>
      </div>
    </div>

<br>   <div class="container">