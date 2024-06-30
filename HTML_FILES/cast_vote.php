<?php

// Create connection
$conn = mysqli_connect("localhost", "root", "", "voting");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve and sanitize form data
    $election = htmlspecialchars($_POST['election']);
    $candidate = htmlspecialchars($_POST['candidate']);
    
    // Determine the table name based on the election type
    if ($election == 'loksabhacandidates') {
        $tablename = 'LokSabhaVotes';
    } elseif ($election == 'rajyasabhacandidates') {
        $tablename = 'RajyaSabhaVotes';
    } else {
        die("Invalid election type.");
    }
    
    // Insert the vote into the appropriate table
    $stmt = $conn->prepare("INSERT INTO $tablename (candidate_name) VALUES (?)");
    $stmt->bind_param("s", $candidate);
    
    if ($stmt->execute()) {
        header("Location: cast_vote.php");
    } else {
        echo "<script>alert('Error:" . $stmt->error."')";
    }
    
    $stmt->close();
}

$sql = "SELECT candidate_name, COUNT(*) as vote_count FROM LokSabhaVotes GROUP BY candidate_name";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Lok Sabha Votes - Online Voting System</title>
  <link rel="stylesheet" href="..\CSS_FILES\vote_styles.css">
</head>
<body>

  <header class="header">
    <div class="container">
      <h1 class="logo">Online Voting System</h1>
    </div>
  </header>

  <section class="vote-results">
    <div class="container">
      <h2>Lok Sabha Election Votes</h2>
      <table>
        <thead>
          <tr>
            <th>Candidate Name</th>
            <th>Votes</th>
          </tr>
        </thead>
        <tbody>
          <?php
          if ($result->num_rows > 0) {
              while($row = $result->fetch_assoc()) {
                  echo "<tr><td>" . $row['candidate_name'] . "</td><td>" . $row['vote_count'] . "</td></tr>";
              }
          } else {
              echo "<tr><td colspan='2'>No votes cast yet.</td></tr>";
          }
          ?>
        </tbody>
      </table>
    </div>
  </section>
<?php
$sql = "SELECT candidate_name, COUNT(*) as vote_count FROM rajyasabhavotes GROUP BY candidate_name";
$result = $conn->query($sql);
?>
  <section class="vote-results">
    <div class="container">
      <h2>Rajya Sabha Election Votes</h2>
      <table>
        <thead>
          <tr>
            <th>Candidate Name</th>
            <th>Votes</th>
          </tr>
        </thead>
        <tbody>
          <?php
          if ($result->num_rows > 0) {
              while($row = $result->fetch_assoc()) {
                  echo "<tr><td>" . $row['candidate_name'] . "</td><td>" . $row['vote_count'] . "</td></tr>";
              }
          } else {
              echo "<tr><td colspan='2'>No votes cast yet.</td></tr>";
          }
          ?>
        </tbody>
      </table>
    </div>
  </section>

  <footer class="footer">
    <div class="container">
      <p>Contact: info@onlinevotingsystem.com</p>
    </div>
  </footer>

</body>
</html>

<?php
$conn->close();
?>
