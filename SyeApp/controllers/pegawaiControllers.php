<?php
require_once '../koneksi.php';
require_once '../models/Pegawai.php';

$nip = $_POST['nip'];
$nama = $_POST['nama'];
$email = $_POST['email'];
$agama = $_POST['agama'];
$iddivisi = $_POST['iddivisi'];
$foto = $_POST['foto'];
$tombol = $_POST['proses'];

$data = [$nip, $nama, $email, $agama, $iddivisi, $foto];

$obj = new Pegawai();
switch ($tombol) {
    case 'simpan':
        $obj->simpan($data);
    break;
    case 'ubah':
        $data[] = $_POST['idx'];
        $obj->ubah($data);
    break;
    case 'hapus':
        $id[] = $_POST['idx'];
        $obj->hapus($id);
    break;
    default://tombol batal
        header('Location:http://localhost/SyeApp/index.php?hal=dataPegawai');
        break;
}

//4.landing page
header('Location:http://localhost/SyeApp/index.php?hal=dataPegawai');
