  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4 navbar-primary">
    <!-- Brand Logo -->
    <a href="<?=base_url()?>dashboard" class="brand-link">
      <img src="<?=base_url()?>assets/images/logo.png" alt="SMP Muhammadiyah 1" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">SMP MUHI DPS</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview <?php echo ($this->uri->segment(1)=='dashboard') ? 'menu-open' : '' ?>">
            <a href="<?=base_url()?>dashboard" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <?php if ($_SESSION["logged_in"]["role"]=="Admin"){ ?>
    	    <li class="nav-item has-treeview">
    			<a href="<?=base_url()?>user" class="nav-link">
    			  <p>
    				Pegawai
    			  </p>
    			</a>
    		</li>
    	    <li class="nav-item has-treeview">
    			<a href="<?=base_url()?>jabatan" class="nav-link">
    			  <p>
    				Jabatan
    			  </p>
    			</a>
    		</li>
    	    <li class="nav-item has-treeview">
    			<a href="<?=base_url()?>cuti" class="nav-link">
    			  <p>
    				Cuti
    			  </p>
    			</a>
    		</li>
    	    <li class="nav-item has-treeview">
    			<a href="<?=base_url()?>penggajian" class="nav-link">
    			  <p>
    				Penggajian
    			  </p>
    			</a>
    		</li>

    		<?php }elseif ($_SESSION["logged_in"]["role"]=="Waka Kurikulum"){?>
    	    <li class="nav-item has-treeview">
    			<a href="<?=base_url()?>absensi/dataabsen" class="nav-link">
    			  <p>
    				Validasi Absensi
    			  </p>
    			</a>
    		</li>
    	    <li class="nav-item has-treeview">
    			<a href="<?=base_url()?>cuti" class="nav-link">
    			  <p>
    				Validasi Cuti
    			  </p>
    			</a>
    		</li>
    		<?php }elseif ($_SESSION["logged_in"]["role"]=="Kepala Sekolah"){?>
    	    <li class="nav-item has-treeview">
    			<a href="<?=base_url()?>penggajian" class="nav-link">
    			  <p>
    				Penggajian
    			  </p>
    			</a>
    		</li>
    		<?php } ?>

    	    <li class="nav-item has-treeview">
    			<a href="<?=base_url()?>webadmin/memlogout" class="nav-link">
    			  <i class="fas fa-sign-out-alt"></i>
    			  <p>
    				Logout
    			  </p>
    			</a>
    		</li>
		</ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
  
    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"><?= $title?></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Home</a></li>
              <li class="breadcrumb-item active"><a href="<?= base_url($this->uri->segment(1)) ?>">
        	<?= ucfirst(str_replace('_', ' ', $this->uri->segment(1))) ?>
                </a></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    
    <!-- Main content -->
    <div class="content">
