	<?php
		include 'includes/conn.php';				// Fetch data from database
$sql = "SELECT id, name, email, message, created_at FROM contacts";
$result = mysqli_query($database, $sql);

if (mysqli_num_rows($result) > 0) {
    echo "<h2>Messages</h2>";
    echo "<table border='1'>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Message</th>
                <th>Date</th>
            </tr>";
    // Output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        echo "<tr>
                <td>{$row['id']}</td>
                <td>{$row['name']}</td>
                <td>{$row['email']}</td>
                <td>{$row['message']}</td>
                <td>{$row['created_at']}</td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}


							?>
