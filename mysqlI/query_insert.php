<?php
require_once 'connection.php';


$sql = "INSERT INTO users (name, email, id_role) VALUES ('John Doe', 'johndoe@example.com', 1)";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
