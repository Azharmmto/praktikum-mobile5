<?php

    include 'koneksi.php';
    include 'Mahasiswa.php';

    $hasil = array();
    $result = $conn->query("SELECT * FROM tb_mhs");

    $i = 0;

    while($record = $result->fetch_assoc()){
        $hasil[$i] = new Mahasiswa($record["stb"], $record["nama"], $record["angkatan"]);
        $i++;
    }

    echo json_encode($hasil);

?>