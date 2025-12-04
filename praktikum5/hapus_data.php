<?php

    include 'koneksi.php';

    $hasil = array();
    $_POST = json_decode(file_get_contents('php://input'), true);

    $stb = $_POST['stb'];

    $ps = $conn->stmt_init();
    $ps->prepare('DELETE FROM tb_mhs WHERE stb=?');
    $ps->bind_param('s', $stb);

    if($ps->execute()){
        $hasil['hasil'] = 1;
    }else{
        $hasil['hasil'] = 0;
    }

    $ps->close();
    $conn->close();

    echo json_encode($hasil);

?>