<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the form data
    $nama_customer = $_POST['nama_customer'];
    $layanan = $_POST['layanan'];

    // Replace with your database credentials
    $host = 'localhost';
    $username = 'root';
    $password = '';
    $database = 'crud_laundry';

    // Create a database connection
    $conn = new mysqli($host, $username, $password, $database);

    // Check the connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare and execute the SQL query to insert the data into the database
    $sql = "INSERT INTO transaksi (masuk, keluar, nama_customer, layanan, berat, harga_satuan, harga_total, status) VALUES (NOW(), NULL, ?, ?, NULL, NULL, NULL, NULL)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $nama_customer, $layanan);

    // Initialize a variable to track the success status
    $success = false;

    // Check if the query is executed successfully
    if ($stmt->execute()) {
        // Data inserted successfully
        $success = true;
    }

    // Close the statement and database connection
    $stmt->close();
    $conn->close();

    // Return the success status as a JSON response
    echo json_encode(array('success' => $success));
}
