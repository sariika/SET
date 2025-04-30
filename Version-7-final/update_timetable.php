<?php include "template/header.php"?>
<link rel="stylesheet" href="timetable.css">
<link rel="stylesheet" href="css/timeform.css">

<?php
/**
* List all users with a link to edit
*/
try {
require "template/common.php";
require_once 'timetable_database.php';
$sql = "SELECT * FROM activity";
$statement = $connection->prepare($sql);
$statement->execute();
$result = $statement->fetchAll();
} catch(PDOException $error) {
echo $sql . "<br>" . $error->getMessage();
}
?>
<h2>Update Timetable</h2>
<table class="table">
<thead>
<tr>
<th>Tasks</th>
<th>Days</th>
<th>Activity</th>
<th>Description</th>
<th>DateTime</th>
<th>Action</th>
</tr>
</thead>
<tbody>
<?php foreach ($result as $row) : ?>
<tr>
<td><?php echo escape($row["id"]); ?></td>
<td><?php echo escape($row["days"]); ?></td>
<td><?php echo escape($row["activity"]); ?></td>
<td><?php echo escape($row["description"]); ?></td>
<td><?php echo escape($row["date"]); ?></td>
<td><a href="edit.php?id=<?php echo escape($row["id"]);?>"><svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#1f1f1f"><path d="M200-200h57l391-391-57-57-391 391v57Zm-80 80v-170l528-527q12-11 26.5-17t30.5-6q16 0 31 6t26 18l55 56q12 11 17.5 26t5.5 30q0 16-5.5 30.5T817-647L290-120H120Zm640-584-56-56 56 56Zm-141 85-28-29 57 57-29-28Z"/></svg></a></td>
</tr>
<?php endforeach; ?>
</tbody>
</table>
<button><a href="timetable.php">Back to timetable</a></button>
<?php include "template/footer.php"?>