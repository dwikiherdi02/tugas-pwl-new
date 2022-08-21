<ul class='nav navbar-nav side-nav'>
    <!--  <li><a href='?index'><i class='fa fa-spin fa-circle-o-notch'></i> Dashboard</a></li>
     <li><a href='?table=sm'><i class='fa fa-envelope-o'></i> Surat Masuk</a></li>
     <li><a href='?table=sk'><i class='fa fa-envelope'></i> Surat Keluar</a></li>
     <li><a href='?table=jenis'><i class='fa fa-table'></i> Jenis Surat</a></li>
     <li><a href='?table=petugas'><i class='fa fa-user'></i> Petugas</a></li> -->

     <!-- <li><a href='?page=backup'><i class='fa fa-database'></i> Backup & Restore</a></li> -->

     <?php
     if ($_SESSION['lvl']=='Admin') {
          echo "<li><a href='?index'><i class='fa fa-spin fa-circle-o-notch'></i> Dashboard</a></li>
     <li class='nav navbar-nav dropdown'>
          <a href='#' class='dropdown-toggle' data-toggle='dropdown'><i class='fa fa-inbox'></i> Data Surat <b class='caret'></b></a>
          <ul class='dropdown-menu'>
               <li><a href='?table=sm'><i class='fa fa-envelope-o'></i> Surat Masuk</a></li>
               <li><a href='?table=sk'><i class='fa fa-envelope'></i> Surat Keluar</a></li>
          </ul>
     </li>
     <li><a href='?table=jenis'><i class='fa fa-table'></i> Jenis Surat</a></li>
     <li><a href='?table=user'><i class='fa fa-users'></i> Pengguna</a></li>
     <!-- <li><a href='?page=backup'><i class='fa fa-database'></i> Backup & Restore</a></li> -->";
     }
     elseif ($_SESSION['lvl']=='Archiver') {
          echo "<li><a href='?index'><i class='fa fa-spin fa-circle-o-notch'></i> Dashboard</a></li>
     <li class='nav navbar-nav dropdown'>
          <a href='#' class='dropdown-toggle' data-toggle='dropdown'><i class='fa fa-inbox'></i> Data Surat <b class='caret'></b></a>
          <ul class='dropdown-menu'>
               <li><a href='?table=sm'><i class='fa fa-envelope-o'></i> Surat Masuk</a></li>
               <li><a href='?table=sk'><i class='fa fa-envelope'></i> Surat Keluar</a></li>
          </ul>
     </li>
     <li><a href='?table=jenis'><i class='fa fa-table'></i> Jenis Surat</a></li>
     <!-- <li><a href='?page=backup'><i class='fa fa-database'></i> Backup & Restore</a></li> -->";
     }
     else {
          echo "<li><a href='?index'><i class='fa fa-spin fa-circle-o-notch'></i> Dashboard</a></li>
     <li><a href='?table=sm'><i class='fa fa-envelope-o'></i> Surat Masuk</a></li>
     <li><a href='?table=dispos'><i class='fa fa-comment'></i> Tanggapan</a></li>";
     }
     ?>
</ul>