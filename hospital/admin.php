<?php
include "header.php";
?>

<table>
  <thead>
    <tr>
      <th>الرقم</th>
      <th>اسم المريض</th>
      <th>البريد الالكتروني</th>
      <th>التاريخ</th>
    </tr>
  </thead>
  <tbody>

<?php
$host = "localhost";
$user = "root";
$pass = "esam19";
$db = "hospital";

$conn = mysqli_connect($host, $user, $pass, $db);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$query = "SELECT * FROM patients";
$result = mysqli_query($conn, $query);

if ($result) {
    while ($row = mysqli_fetch_array($result)) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($row['id']) . "</td>";
        echo "<td>" . htmlspecialchars($row['name']) . "</td>";
        echo "<td>" . htmlspecialchars($row['email']) . "</td>";
        echo "<td>" . htmlspecialchars($row['date']) . "</td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='4'>No records found</td></tr>";
}

mysqli_close($conn);
?>

  </tbody>
</table>

