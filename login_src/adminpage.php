<!DOCTYPE html>
<html>
<h4><a href="logout.php">Logout</a>  | <a href="privileges.php">Edit Privileges</a> | <a href="adduser.php">Add user</a> | <a href="remuser.php">Remove user</a></h4>
</html>
<?php
$con = mysqli_connect('localhost', 'root', '','credentials');
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$result = mysqli_query($con,"SELECT username,type FROM login");

echo "<table border='1'>
<tr>
<th>Username</th>
<th>Type</th>
</tr>";

while($row = mysqli_fetch_array($result))
{
echo "<tr>";
echo "<td>" . $row['username'] . "</td>";
echo "<td>" . $row['type'] . "</td>";
echo "</tr>";
}
echo "</table>";

mysqli_close($con);
?>
