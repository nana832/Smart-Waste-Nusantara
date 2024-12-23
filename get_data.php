<?php
include 'connection.php';

// Ambil data volume sampah masuk
$query_volume = "SELECT kategori, SUM(volume) as total_volume FROM volume_sampah GROUP BY kategori";
$result_volume = $con->query($query_volume);

$data_volume = [];
while ($row = $result_volume->fetch_assoc()) {
    $data_volume[] = $row;
}

// Ambil data sampah terproses
$query_proses = "SELECT kategori, SUM(volume) as total_volume FROM sampah_proses GROUP BY kategori";
$result_proses = $con->query($query_proses);

$data_proses = [];
while ($row = $result_proses->fetch_assoc()) {
    $data_proses[] = $row;
}

// Ambil data komposisi sampah
$query_komposisi = "SELECT kategori, persentase FROM komposisi_sampah ORDER BY waktu DESC LIMIT 3";
$result_komposisi = $con->query($query_komposisi);

$data_komposisi = [];
while ($row = $result_komposisi->fetch_assoc()) {
    $data_komposisi[] = $row;
}

// Gabungkan semua data
$response = [
    "volume_sampah" => $data_volume,
    "sampah_proses" => $data_proses,
    "komposisi_sampah" => $data_komposisi
];

echo json_encode($response);
?>
