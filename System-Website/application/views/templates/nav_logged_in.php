<div class="row no-gutters">
  <div class="col-12">

    <ul class="nav nav-tabs bg-dark" id="myTab" role="tablist">
      <li class="nav-item">
        <a class="nav-link <?php if($this->uri->uri_string() == 'Show/temperature') { echo 'active text-black'; } else { echo 'text-light'; } ?>" href="<?php echo site_url('Show/temperature'); ?> ">Lämpötila</a>
      </li>
      <li class="nav-item">
        <a class="nav-link <?php if($this->uri->uri_string() == 'Show/temperature_NTC') { echo 'active text-black'; } else { echo 'text-light'; } ?>" href="<?php echo site_url('Show/temperature_NTC'); ?>">Lämpötila NTC</a>
      </li>
      <li class="nav-item">
        <a class="nav-link <?php if($this->uri->uri_string() == 'Show/humidity') { echo 'active text-black'; } else { echo 'text-light'; } ?>" href="<?php echo site_url('Show/humidity'); ?>">Kosteus</a>
      </li>
      <li class="nav-item">
        <a class="nav-link <?php if($this->uri->uri_string() == 'Show/light') { echo 'active text-black'; } else { echo 'text-light'; } ?>" href="<?php echo site_url('Show/light'); ?>">Valaistus</a>
      </li>
      <li class="nav-item">
        <a class="nav-link <?php if($this->uri->uri_string() == 'Show/audio') { echo 'active text-black'; } else { echo 'text-light'; } ?>" href="<?php echo site_url('Show/audio'); ?>">Ääni</a>
      </li>
      <li class="nav-item">
        <a class="nav-link <?php if($this->uri->uri_string() == 'Show/bat') { echo 'active text-black'; } else { echo 'text-light'; } ?>" href="<?php echo site_url('Show/bat'); ?>">Akku</a>
      </li>
      <li class="nav-item">
        <a class="nav-link <?php if($this->uri->uri_string() == 'Show/gas') { echo 'active text-black'; } else { echo 'text-light'; } ?>" href="<?php echo site_url('Show/gas'); ?>">Hiilidioksiidi</a>
      </li>
      <li class="nav-item">
        <a class="nav-link <?php if($this->uri->uri_string() == 'Show/voc') { echo 'active text-black'; } else { echo 'text-light'; } ?>" href="<?php echo site_url('Show/voc'); ?>">Ilmanlaatu</a>
      </li>
      <li class="nav-item ml-auto mr-1 mt-1">
        <a href="<?php echo site_url('Show/logout'); ?>" class="btn btn-danger btn-sm" role="button" aria-pressed="true">Kirjaudu ulos</a>
      </li>
    </ul>

  </div>
</div>
