<?php
$sql=mysqli_query($conn, "SELECT * FROM surat_masuk a JOIN disposisi b ON a.id_sm=b.id_sm WHERE b.id_user='$_SESSION[id]' AND b.status_surat='Belum Ditanggapi'");
$query=mysqli_query($conn, "SELECT * FROM surat_keluar a JOIN disposisi b ON a.id_sk=b.id_sk WHERE tgl_kirim='0000-00-00'");
?>

<li class="dropdown messages-dropdown">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-globe fa-spin"></i> Pemberitahuan <span class="badge"><?php
    if ($_SESSION['lvl']=='User') {
        echo (mysqli_num_rows($sql));
    }
    else {
        echo (mysqli_num_rows($query));
    }
    ?></span> <b class="caret"></b></a>
    <ul class="dropdown-menu">
        <li class="dropdown-header"><?php
    if ($_SESSION['lvl']=='User') {
        echo (mysqli_num_rows($sql));
    }
    else {
        echo (mysqli_num_rows($query));
    }
    ?> Pemberitahuan Baru</li>

        <?php 
        $sql=mysqli_query($conn, "SELECT * FROM surat_masuk a JOIN disposisi b ON a.id_sm=b.id_sm WHERE b.id_user='$_SESSION[id]' AND b.status_surat='Belum Ditanggapi'");
        $query=mysqli_query($conn, "SELECT * FROM surat_keluar a JOIN disposisi b ON a.id_sk=b.id_sk WHERE tgl_kirim='0000-00-00'");
        if ($_SESSION['lvl']=='User') {
            while ($row=$sql->fetch_assoc()) {
               echo "<li class='message-preview'>
                        <a href='?table=sm'>
                            <span class='avatar'><i class='fa fa-bell'></i></span>
                            <span class='message'>Surat dari ".$row['pengirim']." <strong>Belum ditanggapi</strong></span>
                        </a>
                    </li>
                    <li class='divider'></li>";
            }
        }
        else {
            while ($row=$query->fetch_assoc()) {
               echo "<li class='message-preview'>
                        <a href='?table=sm'>
                            <span class='avatar'><i class='fa fa-bell'></i></span>
                            <span class='message'>Permintaan pembuatan surat keluar untuk ".$row['penerima']."</span>
                        </a>
                    </li>
                    <li class='divider'></li>";
            }
        }
        ?>

    </ul>
</li>