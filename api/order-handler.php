<?php 
if (isset($_POST['btn_order'])) { 
    echo 'Processing Order....'; 

    $kode_barang = $_POST['kode_barang'];

    $cn = mysqli_connect("localhost", "root", "", "db_tokoagni"); 
    if (!$cn) { 
        die('Koneksi database gagal: ' . mysqli_connect_error()); 
    } 

    $kode_barang = mysqli_real_escape_string($cn, $kode_barang);
    $nama_pembeli = mysqli_real_escape_string($cn, $_POST['nama_pembeli']);
    $nomor_whatsapp = mysqli_real_escape_string($cn, $_POST['nomor_whatsapp']);
    $jumlah_pesanan = mysqli_real_escape_string($cn, $_POST['jumlah_pesanan']);

    $s = "INSERT INTO tb_order (kode_barang, nama_pembeli, nomor_whatsapp, jumlah_pesanan) VALUES ('$kode_barang', '$nama_pembeli', '$nomor_whatsapp', '$jumlah_pesanan')"; 

    $q = mysqli_query($cn, $s) or die(mysqli_error($cn)); 

    echo '<hr>Data baru berhasil disimpan.<hr>'; 

    $s = "SELECT * FROM tb_barang WHERE kode_barang = '$kode_barang'"; 
    $q = mysqli_query($cn, $s) or die(mysqli_error($cn)); 

    $d = mysqli_fetch_assoc($q); 

    $date_system = date('d-F-Y H:i:s'); 

    $no_penjual = '6283142435970'; 
    $text_wa = "Hai, saya $nama_pembeli, %0a%0aSaya ingin membeli *{$d['nama_barang']}*, dengan jumlah pesanan *$jumlah_pesanan {$d['satuan']}*. %0a%0aMohon segera di follow-up, Terima Kasih. [$date_system]"; 

    $link_wa = "https://api.whatsapp.com/send?phone=$no_penjual&text=$text_wa"; 

    echo $link_wa; 
    echo "<script>location.replace('$link_wa')</script>"; 

    exit; 
} else { 
    echo 'Tampilan Awal Form'; 
} 
?>
