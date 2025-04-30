<?php include "template/header.php"?>
<link rel="stylesheet" href="timetable.css">
<link rel="stylesheet" href="css/timeform.css">

<?php
/**
* Delete a user
*/
require "template/common.php";
if (isset($_GET["id"])) {
    try {
        require_once 'timetable_database.php';
        $id = $_GET["id"];
        $sql = "DELETE FROM activity WHERE id = :id";
        $statement = $connection->prepare($sql);
        $statement->bindValue(':id', $id);
        $statement->execute();
        $success = "User ". $id. " successfully deleted";
    } catch(PDOException $error) {
        echo $sql . "<br>" . $error->getMessage();
    }
}
try {
    require_once 'timetable_database.php';
    $sql = "SELECT * FROM activity";
    $statement = $connection->prepare($sql);
    $statement->execute();
    $result = $statement->fetchAll();
} catch(PDOException $error) {
    echo $sql . "<br>" . $error->getMessage();
}
?>
<h2>Delete users</h2>
<?php if (isset($success)) echo $success; ?>
<table class="table">
<thead>
<tr>
    <th>#</th>
    <th>Days</th>
    <th>Activity</th>
    <th>Description</th>
    <th>DateTime</th>
    
    <th>Delete</th>
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
    <td><a href="deleteTimetable.php?id=<?php echo escape($row["id"]); ?>"><svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#1f1f1f"><path d="M280-120q-33 0-56.5-23.5T200-200v-520h-40v-80h200v-40h240v40h200v80h-40v520q0 33-23.5 56.5T680-120H280Zm400-600H280v520h400v-520ZM360-280h80v-360h-80v360Zm160 0h80v-360h-80v360ZM280-720v520-520Z"/></svg></a></td>
</tr>
<?php endforeach; ?>
</tbody>
</table>
<button><a href="timetable.php" class="update" >Go Back to timetable page </a></button>

<?php include "template/footer.php"?>
