 <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-dark-primary elevation-4">
   <!-- Brand Logo -->
   <a href="<?= base_url(); ?>qr/dashboard" class="brand-link">
     <img src="<?= base_url(); ?>assets/qrcode/images/favicon/favicon1.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
     <span class="brand-text font-weight-light">AssetsApp</span>
   </a>

   <!-- Sidebar -->
   <div class="sidebar">
     <!-- Sidebar Menu -->
     <nav class="mt-2">
       <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
         <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->
         <?php foreach ($list_menu as $menu) : ?>
           <li class="nav-item has-treeview <?php if ($menu['Route'] == $this->uri->segment(1, 0)) { ?>menu-open<?php } else { ?><?php } ?>">
             <a href="#" class="nav-link <?php if ($menu['Route'] == $this->uri->segment(1, 0)) { ?>active<?php } else { ?><?php } ?>">
               <i class="nav-icon fas fa-tachometer-alt"></i>
               <p>
                 <?= $menu['Name']  ?>
                 <i class="right fas fa-angle-left"></i>
               </p>
             </a>
             <ul class="nav nav-treeview">
               <?php foreach ($list_sub_menu as $item) :
                  if ($item['ParentNavigationId'] == $menu['Id']) {
                ?>
                   <li class="nav-item">
                     <a href="<?= base_url($item['Route']) ?>" class="nav-link active">
                       <i class="far fa-circle nav-icon"></i>
                       <p><?= $item['Name'] ?></p>
                     </a>
                   </li>
               <?php }
                endforeach ?>
             </ul>
           </li>
         <?php endforeach ?>

         <li class="nav-item">
           <a href="<?= base_url(); ?>qr/dashboard" class="nav-link">
             <i class="nav-icon fas fa-tachometer-alt"></i>
             <p>
               Dashboard
             </p>
           </a>
         </li>
         <li class="nav-header">MENU</li>
         <li class="nav-item">
           <a href="<?= base_url(); ?>qr/asset/scan" class="nav-link">
             <i class="fas fa-camera"></i>
             <p>
               Scan Asset
             </p>
           </a>
         </li>
         <li class="nav-item">
           <a href="<?= base_url(); ?>qr/asset/setup" class="nav-link">
             <i class="fas fa-cog"></i>
             <p>
               Konfigurasi Assets
             </p>
           </a>
         </li>
         <li class="nav-header">Report</li>
         <li class="nav-item">
           <a href="<?= base_url(); ?>qr/report" class="nav-link">
             <i class="fas fa-folder"></i>
             <p>
               Rekap
             </p>
           </a>
         </li>
         <li class="nav-item">
           <a href="<?= base_url(); ?>qr/report/log" class="nav-link">
             <i class="fas fa-database"></i>
             <p>
               Log Asset
             </p>
           </a>
         </li>
         <li class="nav-header">Akun</li>
         <li class="nav-item">
           <a href="<?= base_url(); ?>qr/auth/logout" class="nav-link">
             <i class="nav-icon far fa fa-reply"></i>
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