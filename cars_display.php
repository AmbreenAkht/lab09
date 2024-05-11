<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="description" content="All Cars" />
    <title>Retrieving records to HTML</title>
    <meta name="keywords" content="PHP, MySql" />
</head>
<body>
    <h1>All Cars</h1>
    <?php
        // Include the settings file
        require_once("settings.php");

        // Attempt to establish a connection to the database
        $conn = @mysqli_connect($host, $user, $pwd, $sql_db);

        // Check if connection is successful
        if (!$conn) {
            // Display an error message if connection fails
            echo "<p>Database connection failure</p>"; // not in production script
        } else {
            // Upon successful connection

            // Set up the SQL command to query the 'cars' table
            $query = "SELECT make, model, price FROM cars ORDER BY make, model";

            // Execute the query and store result into the result pointer
            $result = mysqli_query($conn, $query);

            // Check if the execution was successful
            if (!$result) {
                // Display an error message if execution fails
                echo "<p>Something is wrong with", $query, "</p>";
            } else {
                // Display the retrieved records in an HTML table
                echo "<table border=\"1\">\n";
                echo "<tr>\n";
                echo "<th scope=\"col\">Make</th>\n";
                echo "<th scope=\"col\">Model</th>\n";
                echo "<th scope=\"col\">Price</th>\n";
                echo "</tr>\n";

                // Loop through each record and display it in the table
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>\n";
                    echo "<td>", $row["make"], "</td>\n";
                    echo "<td>", $row["model"], "</td>\n";
                    echo "<td>", $row["price"], "</td>\n";
                    echo "</tr>\n";
                }

                echo "</table>\n";

                // Free up the memory, after using the result pointer
                mysqli_free_result($result);
            }

            // Close the database connection
            mysqli_close($conn);
        }
    ?>
</body>
</html>
