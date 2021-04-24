<?php
/* Connect to a MySQL database using driver invocation */
$dsn = 'mysql:dbname=dbpegawai;host=localhost';
$user = 'root';
$password = '';

$dbh = new PDO($dsn, $user, $password);
try {
    $dbh = new PDO($dsn, $user, $password);
    $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    //echo 'Alhamdulillah sukses koneksi db';
}
catch( PDOException $e ) {
    echo 'Gagal koneksi db karena '.$e->getMessage( );
}
?>
