<?php
// Include the settings file for database connection
require_once("settings.php");

// Retrieve form data and trim whitespace
$make = trim($_POST['carmake']);
$model = trim($_POST['carmodel']);
$price = (int)$_POST['price']; // Convert to integer to prevent SQL injection
$year = (int)$_POST['yom']; // Convert to integer to prevent SQL injection

// Check if any field is empty
if (empty($make) || empty($model) || empty($price) || empty($year)) {
    // Redirect back to the addcar.html page with an error message
    header("Location: addcar.html?error=1");
    exit;
}

// Connect to the database
$conn = @mysqli_connect($host, $user, $pwd, $sql_db);

// Check connection
if (!$conn) {
    die("Database connection failed: " . mysqli_connect_error());
}

// Escape special characters to prevent SQL injection
$make = mysqli_real_escape_string($conn, $make);
$model = mysqli_real_escape_string($conn, $model);

// SQL query to insert car data into the 'cars' table
$query = "INSERT INTO cars (make, model, price, yom) VALUES ('$make', '$model', $price, $year)";

// Execute the query
if (mysqli_query($conn, $query)) {
    echo "Car added successfully!<br>";

    // Retrieve and display the list of cars
    $result = mysqli_query($conn, "SELECT * FROM cars");
    if (mysqli_num_rows($result) > 0) {
        echo "<h2>List of Cars</h2>";
        echo "<table border='1'>";
        echo "<tr><th>Make</th><th>Model</th><th>Price</th><th>Year</th></tr>";
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($row['make']) . "</td>"; // Sanitize output
            echo "<td>" . htmlspecialchars($row['model']) . "</td>"; // Sanitize output
            echo "<td>" . $row['price'] . "</td>";
            echo "<td>" . $row['yom'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "No cars found.";
    }
} else {
    echo "Error: " . $query . "<br>" . mysqli_error($conn);
}

// Close the database connection
mysqli_close($conn);
?>
