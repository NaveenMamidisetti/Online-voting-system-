<?php
$conn = mysqli_connect("localhost", "root", "", "voting");

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Check if 'poolno', 'loksabha', and 'rajyasabha' parameters are set in the GET request
if (isset($_GET['poolno']) && isset($_GET['loksabha']) && isset($_GET['rajyasabha'])) {
    // Retrieve and sanitize the 'poolno' parameter
    $poolno = htmlspecialchars($_GET['poolno']);

    // Retrieve and decode the 'loksabha' JSON string
    $lokSabhaCandidates = json_decode($_GET['loksabha'], true);

    // Retrieve and decode the 'rajyasabha' JSON string
    $rajyaSabhaCandidates = json_decode($_GET['rajyasabha'], true);

    // Check if decoding was successful
    if (json_last_error() !== JSON_ERROR_NONE) {
        echo "Error decoding JSON data.";
        exit;
    }


    // Insert Lok Sabha Candidates into the database
    if (!empty($lokSabhaCandidates)) {
        $stmt = $conn->prepare("INSERT INTO LokSabhaCandidates (poolno, candidate_name, party_name) VALUES (?, ?, ?)");
        foreach ($lokSabhaCandidates as $candidate) {
            $candidateName = htmlspecialchars($candidate['name']);
            $partyName = htmlspecialchars($candidate['party']);
            $stmt->bind_param("sss", $poolno, $candidateName, $partyName);
            $stmt->execute();
        }
        $stmt->close();
    }

    // Insert Rajya Sabha Candidates into the database
    if (!empty($rajyaSabhaCandidates)) {
        $stmt = $conn->prepare("INSERT INTO RajyaSabhaCandidates (poolno, candidate_name, party_name) VALUES (?, ?, ?)");
        foreach ($rajyaSabhaCandidates as $candidate) {
            $candidateName = htmlspecialchars($candidate['name']);
            $partyName = htmlspecialchars($candidate['party']);
            $stmt->bind_param("sss", $poolno, $candidateName, $partyName);
            $stmt->execute();
        }
        $stmt->close();
    }

    echo "<script>alert('Candidates inserted successfully');window.location.href='./Index.html'</script>";
} else {
    echo "<script>alert('Candidates inserted failed');window.location.href='./Index.html'</script>";

}
    // Display the pooling number
//     echo "<h1>Pooling Number: " . $poolno . "</h1>";

//     // Display Lok Sabha Candidates
//     echo "<h2>Lok Sabha Candidates</h2>";
//     if (!empty($lokSabhaCandidates)) {
//         echo "<table border='1'>";
//         echo "<tr><th>Candidate Name</th><th>Party Name</th></tr>";
//         foreach ($lokSabhaCandidates as $candidate) {
//             echo "<tr><td>" . htmlspecialchars($candidate['name']) . "</td><td>" . htmlspecialchars($candidate['party']) . "</td></tr>";
//         }
//         echo "</table>";
//     } else {
//         echo "<p>No Lok Sabha candidates provided.</p>";
//     }

//     // Display Rajya Sabha Candidates
//     echo "<h2>Rajya Sabha Candidates</h2>";
//     if (!empty($rajyaSabhaCandidates)) {
//         echo "<table border='1'>";
//         echo "<tr><th>Candidate Name</th><th>Party Name</th></tr>";
//         foreach ($rajyaSabhaCandidates as $candidate) {
//             echo "<tr><td>" . htmlspecialchars($candidate['name']) . "</td><td>" . htmlspecialchars($candidate['party']) . "</td></tr>";
//         }
//         echo "</table>";
//     } else {
//         echo "<p>No Rajya Sabha candidates provided.</p>";
//     }
// } else {
//     echo "Required parameters not set.";
// }
?>
