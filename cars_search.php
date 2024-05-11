<?php
// Include the settings file for database connection
require_once("settings.php");

// Retrieve search criteria from GET request
$make = isset($_GET['make']) ? trim($_GET['make']) : '';
$model = isset($_GET['model']) ? trim($_GET['model']) : '';
$price = isset($_GET['price']) ? trim($_GET['price']) : '';

// Connect to the database
$conn = mysqli_connect($host, $user, $pwd, $sql_db);

// Check connection
if (!$conn) {
    die("Database connection failed: " . mysqli_connect_error());
}

// Build the SQL query
$query = "SELECT * FROM cars WHERE 1";

if (!empty($make)) {
    $query .= " AND make LIKE '%$make%'";
}

if (!empty($model)) {
    $query .= " AND model LIKE '%$model%'";
}

if (!empty($price)) {
    $query .= " AND price = $price";
}

// Execute the query
$result = mysqli_query($conn, $query);

// Display the results in a table
echo "<h2>Search Results</h2>";
if (mysqli_num_rows($result) > 0) {
    echo "<table border='1'>";
    echo "<tr><th>Make</th><th>Model</th><th>Price</th><th>Year</th></tr>";
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($row['make']) . "</td>";
        echo "<td>" . htmlspecialchars($row['model']) . "</td>";
        echo "<td>" . $row['price'] . "</td>";
        echo "<td>" . $row['yom'] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "No cars found.";
}

// Close the database connection
mysqli_close($conn);
?>
