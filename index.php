	<?php
		require_once 'includes/conn.php';				// Fetch data from database
$sql = "SELECT id FROM sales";
$result = mysqli_query($database, $sql);

if (mysqli_num_rows($result) > 0) {
    echo "<h2>Messages</h2>";
    echo "<table border='1'>
            <tr>
                <th>ID</th>
            </tr>";
    // Output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        echo "<tr>
                <td>{$row['id']}</td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}


							?>
