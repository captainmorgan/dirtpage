<?php
$q=$_GET["q"];

$con = mysql_connect('dirtpage1.db.6263223.hostedresource.com', 'dirtpage1', 'Jason7734');
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("dirtpage1", $con);

$sql="SELECT * FROM comment WHERE id_comment = '".$q."'";

$result = mysql_query($sql);

echo "<table border='1'>
<tr>
<th>comment</th>
<th>date_created</th>
<th>rank</th>
</tr>";

while($row = mysql_fetch_array($result))
  {
  echo "<tr>";
  echo "<td>" . $row['comment'] . "</td>";
  echo "<td>" . $row['date_created'] . "</td>";
  echo "<td>" . $row['rank'] . "</td>";
  echo "</tr>";
  }
echo "</table>";

mysql_close($con);
?>