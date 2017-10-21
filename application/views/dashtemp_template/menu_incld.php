<?php
  $current_controller = $this->uri->segment(1);
  $dashboard_active = ($current_controller == "dashboard") ? "active" : "";
  $datatable_active = ($current_controller == "datatable") ? "active" : "";
?>

<aside class="main-sidebar">
  <section class="sidebar">
    <div class="user-panel">
      <div class="pull-left image">
        <img src="<?= base_url("assets/dashtemp") ?>/dist/img/user.png" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p>Demo</p>
        <a href="#"><i class="fa fa-building"></i> Your Company</a>
      </div>
    </div>

    <ul class="sidebar-menu">
      <li class="header">MENU</li>
      <li class="<?= $dashboard_active  ?>"><a href="<?= base_url("dashboard") ?>"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>       
      <li class="<?= $datatable_active  ?>"><a href="<?= base_url("datatable") ?>"><i class="fa fa-table"></i> <span>Data Table</span></a></li>  
    </ul>
  </section>
</aside>