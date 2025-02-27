<?php
// Database configuration
$servername = "localhost";
$username = "your_db_user";
$password = "your_db_password";
$dbname = "event_xpert";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die(json_encode(['success' => false, 'message' => 'Connection failed']));
}

// Sanitize inputs
$data = json_decode(file_get_contents('php://input'), true);
$cleanData = array_map(function($item) use ($conn) {
    return mysqli_real_escape_string($conn, $item);
}, $data);

// Insert into database
$sql = "INSERT INTO events (
    college_name, contact, email, address, 
    event_name, event_id, venue, description, event_date
) VALUES (?,?,?,?,?,?,?,?,?)";

$stmt = $conn->prepare($sql);
$stmt->bind_param("sssssssss", 
    $cleanData['collegeName'],
    $cleanData['contact'],
    $cleanData['email'],
    $cleanData['address'],
    $cleanData['eventName'],
    $cleanData['eventId'],
    $cleanData['venue'],
    $cleanData['eventDescription'],
    $cleanData['dateTime']
);

if ($stmt->execute()) {
    echo json_encode(['success' => true, 'message' => 'Event registered successfully']);
} else {
    echo json_encode(['success' => false, 'message' => 'Database error']);
}

$stmt->close();
$conn->close();
?>