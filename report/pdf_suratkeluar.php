<?php
 //Define relative path from this script to mPDF
 $nama_file='Laporan_Surat_Keluar'; //Beri nama file PDF hasil.
define('_MPDF_PATH','mpdf60/');
//define("_JPGRAPH_PATH", '../mpdf60/graph_cache/src/');

//define("_JPGRAPH_PATH", '../jpgraph/src/'); 
 
include(_MPDF_PATH . "mpdf.php");
//include(_MPDF_PATH . "graph.php");

//include(_MPDF_PATH . "graph_cache/src/");

$mpdf=new mPDF('utf-8', 'A4'); // Create new mPDF Document
 
//Beginning Buffer to save PHP variables and HTML tags
ob_start(); 

$mpdf->useGraphs = true;

?>
<!DOCTYPE html>
<html>
<head>
    <title>Report Surat Keluar</title>
    <link rel="stylesheet" type="text/css" href="../assets/css/pdf.css" />
    <link rel="stylesheet" type="text/css" href="../assets/bootstrap/css/bootstrap.css" />
</head>
<body>
<div id="wrapper">
     <?php
     include "../config/config.php";
     ?>
   
    <table class="heading" style="width:100%;">
        <tr>
        <td> <center><p style="text-align:center; font-size: 16px; font-weight:bold;">Laporan Surat Keluar</p></center></td>
        </tr>
    </table>
         
         
    <div id="content">
         
        <div id="invoice_body">
        <?php
        $apaan=$_POST['month'];
            $query1="SELECT * FROM surat_keluar WHERE SUBSTRING(tgl_kirim,1,7)='$apaan'";
        
            $tampil=mysqli_query($conn, $query1) or die(mysqli_error());
            ?>
            <table border="1">
            <tr class="bg-info">
                <td style="width:10%;"><b>No Surat</b></td>
                <td style="width:10%;"><b>Tanggal Kirim</b></td>
                <td style="width:10%;"><b>Penerima</b></td>
                <td style="width:10%;"><b>Perihal</b></td>
            </tr>
            <?php
            $no=0;
                     while($data1=mysqli_fetch_array($tampil))
                    { $no++; ?>
            <tr style="background-color: #f2f2f2;">
                <td style="width:10%;"><b><?php echo $data1['no_surat']; ?></b></td>
                <td style="width:10%;"><b><?php echo $data1['tgl_kirim']; ?></b></td>
                <td style="width:10%;"><b><?php echo $data1['penerima']; ?></b></td>
                <td style="width:10%;"><b><?php echo $data1['perihal']; ?></b></td>
            </tr>         
             <?php   
              } 
              ?>
        </table>
        </div>
        <div id="invoice_total">
            <br>
            <b>Jumlah Data     : <?php echo (mysqli_num_rows(mysqli_query($conn, $query1))); ?></b><br>
            <b>Dicetak Tanggal : <?php echo date("d - F - Y") ?></b>
            <table>
                <tr>
                    
                </tr>
            </table>
        </div>
        <br />
        <hr />
        <br />
    </div>
    <br />
    </div>
     
     <?php

     $sql=$conn->query("SELECT * FROM surat_keluar WHERE SUBSTRING(tgl_kirim,1,7)='$apaan'");
     $data=$sql->fetch_assoc();

$html = ob_get_contents(); //Proses untuk mengambil data
ob_end_clean();
//Here convert the encode for UTF-8, if you prefer the ISO-8859-1 just change for $mpdf->WriteHTML($html);
$mpdf->WriteHTML(utf8_encode($html));
// LOAD a stylesheet
//$stylesheet = file_get_contents('mpdfstyletables.css');
$mpdf->WriteHTML($stylesheet,1);	// The parameter 1 tells that this is css/style only and no body/html/text

$mpdf->WriteHTML($html,1);

$mpdf->Output($nama_file."-".$data['no_surat'].".pdf" ,'I');

 


exit; 
?>
</body>
</html>