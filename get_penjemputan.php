<?php
include 'connection.php';

// Ambil data penjemputan sampah
$query = "SELECT id, hari, waktu, lokasi_pengangkutan, lokasi_terkini_lat, lokasi_terkini_lng FROM penjemputan_sampah";
$result = $con->query($query);

$data = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
}

// Kirim data sebagai JSON
header('Content-Type: application/json');
echo json_encode($data);
?>
