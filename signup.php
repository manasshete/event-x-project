<?php
// Database configuration
$servername = "localhost";
$username = "root";
$password = "manasm.a.s"; // Change if needed
$dbname = "signup";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize input data
    $college_name = $conn->real_escape_string($_POST['collegeName']);
    $contact = $conn->real_escape_string($_POST['contact']);
    $email = $conn->real_escape_string($_POST['email']);
    $address = $conn->real_escape_string($_POST['address']);
    $event_name = $conn->real_escape_string($_POST['eventName']);
    $event_id = $conn->real_escape_string($_POST['eventId']);
    $venue = $conn->real_escape_string($_POST['venue']);
    $description = $conn->real_escape_string($_POST['eventDescription']);
    $date_time = $conn->real_escape_string($_POST['dateTime']);

    // Insert into database
    $sql = "INSERT INTO events (college_name, contact, email, address, event_name, event_id, venue, description, event_date) 
            VALUES ('$college_name', '$contact', '$email', '$address', '$event_name', '$event_id', '$venue', '$description', '$date_time')";

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php?message=Event registered successfully!");
        exit();
    } else {
        header("Location: index.php?message=Error: " . $conn->error);
        exit();
    }
}

$conn->close();
?>
