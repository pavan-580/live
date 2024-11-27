<?php
$servername = "sdb-76.hosting.stackcp.net";
$username = "ps@580"; 
$password = "8074399963@ps"; 
$dbname = "user_management-3530373310d3"; 

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$service = isset($_GET['service']) ? $_GET['service'] : '';
$address = isset($_GET['address']) ? $_GET['address'] : '';

$sql = "SELECT * FROM user_details WHERE service LIKE '%$service%' AND address LIKE '%$address%'";
$result = $conn->query($sql);

$users = [];
if ($result->num_rows > 0) {
    // Output data of each row
    while($row = $result->fetch_assoc()) {
        $users[] = $row;
    }
}

echo json_encode($users);

$conn->close();
?>
