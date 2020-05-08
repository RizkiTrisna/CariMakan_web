<?php

require '../vendor/autoload.php';

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;

$id_user = $_POST['id_user'];
$nama = $_POST['nama'];
$email = $_POST['email'];
$nohp = $_POST['nohp'];
$no_ktp = $_POST['no_ktp'];
$alamat = $_POST['alamat'];
$password = $_POST['password'];
$id_level = $_POST['id_level'];
$id_cafe = $_POST['id_cafe'];


$client = new Client();
//User
$id_user_lama = $_GET['id_user'];
$responseUser = $client->request('PUT', 'http://localhost/rest-api/wpu-rest-server/api/user/', [
    'query' => [
        'json' => [
            'id_user' => $id_user,
            'nama' => $nama,
            'email' => $email,
            'nohp' => $nohp,
            'no_ktp' => $no_ktp,
            'alamat' => $alamat,
            'id_level' => $id_level,
            'id_cafe' =>$id_cafe,
            'password' => $password

        ]
    ]
]);

$resultUser = json_decode($responseUser->getBody()->getContents(), true);
echo $resultUser['status'];
?>