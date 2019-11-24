<?php
require('db.php');
include('auth.php');

$db = new db();
$con = $db->con;

?>


<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>New Heroes</title>
<link rel="stylesheet" href="css/style.css" />
</head>
<body>
<div class="form">
<h2> <a href="index.php">View New Heroes </a></h2>
<table width="100%" border="1" style="border-collapse:collapse;">
<thead>
<tr>
    <th><strong>ID</strong></th>
    <th><strong>First Name</strong></th>
    <th><strong>Last Name</strong></th>
    <th><strong>Occupation</strong></th>
    <th><strong>Wilaya</strong></th>
    <th><strong>Birthdate</strong></th>
    <th><strong>Arrestation Date</strong></th>
    <th><strong>Court Date</strong></th>
    <th><strong>Release Date</strong></th>
    <th><strong>Charges</strong></th>
    <th><strong>Sentence</strong></th>
    <th><strong>Comments</strong></th>
</tr>
</thead>
<tbody>
<?php
$count=1;
$sel_query="Select id,name, last_name, occupation, wilaya, birthdate, arrested_date, court, released_date, reason, sentence, comment 
            FROM new_heroes ORDER BY id asc;";
$result = $db->query($sel_query)->fetchAll();
foreach($result as $hero) { ?>
<tr>
    <td align="center"><?php echo $hero["id"]; ?></td>
    <td align="center"><?php echo $hero["name"]; ?></td>
    <td align="center"><?php echo $hero["last_name"]; ?></td>
    <td align="center"><?php echo $hero["occupation"]; ?></td>
    <td align="center"><?php echo $hero["wilaya"]; ?></td>
    <td align="center"><?php echo $hero["birthdate"]; ?></td>
    <td align="center"><?php echo $hero["arrested_date"]; ?></td>
    <td align="center"><?php echo $hero["court"]; ?></td>
    <td align="center"><?php echo $hero["released_date"]; ?></td>
    <td align="center"><?php echo $hero["reason"]; ?></td>
    <td align="center"><?php echo $hero["sentence"]; ?></td>
    <td align="center"><?php echo $hero["comment"]; ?></td>

    <td align="center"><a href="edit.php?action=validate&id=<?php echo $hero["id"]; ?>">validate</a></td>
<?php  } ?>
</tbody>
</table>

</div>
</body>
</html>
