<?php

    include 'koneksi.php';

    $hasil = array();

    $_POST = json_decode(file_get_contents('php://input'), true);
    $stb = $_POST["stb"];
    $nama = $_POST["nama"];
    $angkatan = $_POST["angkatan"];

    $ps = $conn->stmt_init();
    $ps->prepare("INSERT INTO tb_mhs VALUES (?, ?, ?)");
    $ps->bind_param("ssi", $stb, $nama, $angkatan);

    if ($ps->execute()) 
        $hasil['hasil'] = 1;
    else
        $hasil['hasil'] = 0;
    

    $ps->close();
    $conn->close();

    echo json_encode($hasil);

?>