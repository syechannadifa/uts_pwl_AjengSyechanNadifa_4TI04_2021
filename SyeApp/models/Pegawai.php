<?php
class Pegawai{
  private $koneksi;
  public function __construct(){
    global $dbh;
    $this->koneksi = $dbh;
  }
  //untuk lihat data
  public function dataPegawai(){
    $sql = "SELECT pegawai.*, divisi.nama AS kategori FROM pegawai
            INNER JOIN divisi ON divisi.id = pegawai.iddivisi
            ORDER BY pegawai.id DESC";
    $ps = $this->koneksi->prepare($sql);
    $ps->execute();
    $rs = $ps->fetchAll();
    return $rs;
  }
  public function getPegawai($id){
      $sql = "SELECT pegawai.*, divisi.nama AS kategori FROM pegawai
              INNER JOIN divisi ON divisi.id = pegawai.iddivisi
              WHERE pegawai.id = ?";
        //prepare statement
        $ps = $this->koneksi->prepare($sql);
        $ps->execute([$id]);
        $rs = $ps->fetch();
        return $rs;
    }
  //untuk input data
  public function dataDivisi(){
    $sql = "SELECT * FROM divisi";
    $rs = $this->koneksi->query($sql);
    return $rs;
  }
  //untuk simpan data
  public function simpan($data){
    $sql = "INSERT INTO pegawai(nip,nama, email, agama, iddivisi, foto)
           VALUES (?,?,?,?,?,?)";
    $ps = $this->koneksi->prepare($sql);
    $ps->execute($data);
  }
  //untuk edit
  public function ubah($data){
    $sql = "UPDATE pegawai SET nip=?, nama=?, email=?, agama=?, iddivisi=?, foto=?
           WHERE id=?";
    $ps = $this->koneksi->prepare($sql);
    $ps->execute($data);
  }
  //untuk hapus
  public function hapus($id){
    $sql = "DELETE FROM pegawai WHERE id=?";
    $ps = $this->koneksi->prepare($sql);
    $ps->execute($id);
  }
}
