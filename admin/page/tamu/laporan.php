<?php
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
include "../../../koneksi/koneksi.php";

$content = '

<style type="text/css">
	
	.tabel{border-collapse: collapse;}
	.tabel th{padding: 8px 5px;  background-color:  #cccccc;  }
	.tabel td{padding: 8px 5px;     }
</style>


';

function tglIndonesia2($str)
{
    $tr = trim($str);
    $str = str_replace(array('Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'), array('Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jum\'at', 'Sabtu', 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'), $tr);
    return $str;
}

if (isset($_POST['cetak'])) {

    $tgl1 = $_POST['tgl1'];
    $tgl2 = $_POST['tgl2'];

}


$content .= '
<page>
    <h2 style="text-align:center;">Laporan Tamu <br> Tanggal ' . tglIndonesia2(date('d F Y', strtotime($tgl1))) . ' s/d ' . tglIndonesia2(date('d F Y', strtotime($tgl2))) . '</h2>
    <br>';


$content .= '
    

    <p></p>
    <table width="100%" border="1px" class="tabel" align="center">
    	
    		<tr>
    			<th align="center">No</th>
    			<th align="center">Tanggal</th>
    			<th align="center">Jam</th>
    			<th align="center">Nama</th>
    			<th align="center">Alamat</th>
    			<th width="100" align="center">Instansi</th>
                <th align="center">No Telpon</th>
    			<th align="center">Jenis Kelamin</th>
    			<th align="center">Ketemu</th>
    			<th align="center">Keperluan</th>
                <th align="center">Foto</th>
    		
               
    		</tr>';


$tgl4 = date("d-m-Y");


if (isset($_POST['cetak'])) {

    $tgl1 = $_POST['tgl1'];
    $tgl2 = $_POST['tgl2'];

    $no = 1;


    $sql = $koneksi->query("select * from tb_tamu, tb_perlu where tb_tamu.keperluan=tb_perlu.id  and tanggal between '$tgl1' and '$tgl2' ");
    while ($data = $sql->fetch_assoc()) {

        $jk = ($data['jk'] == L) ? "Laki-laki" : "Wanita";

        $content .= '
					<tr>
		    			<td>' . $no++ . ' </td>
		    			<td> ' . date('d F Y', strtotime($data['tanggal'])) . ' </td>
		    			<td> ' . $data['jam'] . ' </td>
		    			<td width="150"> ' . $data['nama'] . ' </td>
		    			<td width="150"> ' . $data['alamat'] . ' </td>
		    			<td width="100"> ' . $data['instansi'] . ' </td>
                        <td> ' . $data['telp'] . ' </td>
		    			<td> ' . $jk . ' </td>
		    			
		    			
		    			<td> ' . $data['ketemu'] . ' </td>
                        <td width="130"> ' . $data['judul'] . ' </td>
                        <td> <img src="../../../upload/' . $data['foto'] . '" width="75" height="75" alt=""> </td>
		    			
		    			
		    		</tr>
		    		';


    }


} else {


    $no = 1;
    $sql = $koneksi->query("select * from tb_tamu");
    while ($data = $sql->fetch_assoc()) {
        $jk = ($data['jk'] == L) ? "Laki-laki" : "Wanita";

        $content .= '

    		<tr>
    			<td>' . $no++ . ' </td>
    			<td> ' . date('d F Y', strtotime($data['tanggal'])) . ' </td>
    			<td> ' . $data['jam'] . ' </td>
    			<td width="150"> ' . $data['nama'] . ' </td>
    			<td width="150"> ' . $data['alamat'] . ' </td>
    			<td width="100"> ' . $data['instansi'] . ' </td>
                <td> ' . $data['telp'] . ' </td>
    			<td> ' . $jk . ' </td>
    			
    			
    			<td> ' . $data['ketemu'] . ' </td>
                <td width="130"> ' . $data['keperluan'] . ' </td>
                 <td> <img src="../upload/' . $data['foto'] . '" width="75" height="75" alt=""> </td>
    		

    		</tr>

    		';

    }
}


$content .= ' 	
    </table>

    
</page>';

require_once('../../assets/html2pdf/html2pdf.class.php');
$html2pdf = new HTML2PDF('L', 'LEGAL', 'fr');
$html2pdf->WriteHTML($content);
$html2pdf->Output('exemple.pdf');
?>