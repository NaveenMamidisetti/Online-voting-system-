<?php
$conn = mysqli_connect("localhost", "root", "", "voting");

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_GET['election'])) {
    $tablename = $_GET['election'];
    $sql = "SELECT candidate_name FROM $tablename";
    $result = mysqli_query($conn, $sql);

    $candidates = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $candidates[] = ['name' => $row['candidate_name']];
    }

    echo json_encode($candidates);
}

mysqli_close($conn);
?>
