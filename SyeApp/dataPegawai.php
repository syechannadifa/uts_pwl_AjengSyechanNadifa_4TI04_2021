<?php
require_once 'models/Pegawai.php';
$obj = new Pegawai();
$rs = $obj->dataPegawai();
?>
<h3>Data Pegawai</h3>
<?php
error_reporting(0);
if(isset($member)){
?>
<a href="index.php?hal=formPegawai" class="btn btn-primary">Tambah</a>
<?php } ?>
<br/> <br/>
<table class="table">
  <thead class="table-info">
    <tr>
      <th scope="col">NO</th>
      <th scope="col">Nip</th>
      <th scope="col">Nama</th>
      <th scope="col">Email</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $no = 1;
    foreach ($rs as $peg) {
      // code...
    ?>
    <tr>
      <td><?= $no; ?></td>
      <td><?= $peg['nip']; ?></td>
      <td><?= $peg['nama']; ?></td>
      <td><?= $peg['email']; ?></td>
      <td>
      <form method="POST" action="controllers/pegawaiControllers.php">
      <a href="index.php?hal=detailPegawai&id=<?= $peg['id']; ?>"
         class="btn btn-info">Detail</a>
     <?php
     $role = $member['role'];
     if(isset($member)){
     ?>
      <a href="index.php?hal=formEditPegawai&id=<?= $peg['id']; ?>"
         class="btn btn-warning">Ubah</a>
      <?php
      }
      if($role != 'staff' && isset($member)){
       ?>
      <button name="proses" value="hapus"
        onclick="return confirm('Anda yakin data dihapus?')"
        class="btn btn-secondary">Hapus</button>
      <?php } ?>
        <input type="hidden" name="idx" value="<?= $peg['id']; ?>"/>
      </form>
      </td>
    </tr>
    <?php
    $no++;
    }
    ?>
  </tbody>
</table>
