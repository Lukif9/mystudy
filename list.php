<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8" >
    <style>
        table{border:1px solid gray; border-collapse:collapse;}
        td{border:1px solid gray;padding:5px;}
    </style>
</head>
<body>
<?php
  
$conn = mysqli_connect("localhost", "c14st16", "oPQH4E2f5sg1Fjq8" "c14st16");

if (!$conn) {
    echo "Unable to connect to DB: " . mysqli_error($conn);
    exit;
}
  
if (!mysqli_select_db($conn, "c14st16")) {
    echo "Unable to select mydbname: " . mysqli_error($conn);
    exit;
}
  
$sql = "SELECT * FROM `student` LIMIT 10";
  
$result = mysqli_query($conn, $sql);
  
if (!$result) {
    echo "Could not successfully run query ($sql) from DB: " . mysqli_error($conn);
    exit;
}
  
if (mysqli_num_rows($result) == 0) {
    echo "No rows found, nothing to print so am exiting";
    exit;
}

echo "<table>";
while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr><td>{$row['id']}</td><td>{$row['name']}</td><td>{$row['department']}</td></tr>";
}
echo "</table>";
mysqli_free_result($result);
mysqli_ close($conn);  
?>
</body>
</html>