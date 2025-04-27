<?php
/**
* Use an HTML form to edit an entry in the
* users table.
*
*/
//$formattedDateTime = $_POST['date'] . ' ' . $_POST['time'] . ':00'; 
require "template/common.php";
if (isset($_POST['submit'])) {
try {
require_once 'timetable_database.php';
// Convert 'time' to full DATETIME format


$user =[
"id" => escape($_POST['id']),
"days" => escape($_POST['days']),
"activity" => escape($_POST['activity']),
"description" => escape($_POST['description']),
"datetime" => $formattedDateTime,

];
$sql = "UPDATE activity
        SET days = :days,
            activity = :activity,
            description = :description,
            time = :time,
            date=:date
            
            
        WHERE id = :id";


$statement = $connection->prepare($sql);
$statement->execute($user);
} catch(PDOException $error) {
echo $sql . "<br>" . $error->getMessage();
}
}
if (isset($_GET['id'])) {
try {
require_once 'timetable_database.php';
$id = $_GET['id'];
$sql = "SELECT * FROM activity WHERE id = :id";
$statement = $connection->prepare($sql);
$statement->bindValue(':id', $id);
$statement->execute();
$user = $statement->fetch(PDO::FETCH_ASSOC);
} catch(PDOException $error) {
echo $sql . "<br>" . $error->getMessage();
}
} else {
echo "Something went wrong!";
exit;
}
?>

<?php if (isset($_POST['submit']) && $statement) : ?>
<?php echo escape($_POST['activity']); ?> successfully updated.
<?php endif; ?>
<link rel="stylesheet" href="css/edit.css">

<h2>Edit a user</h2>
<form method="post" id="add-form">
    <?php foreach ($user as $key => $value) : ?>
        <?php if ($key !== 'date' && $key !== 'age') : ?>
            <label for="<?php echo $key; ?>"><?php echo ucfirst($key); ?></label>
            <input type="text" name="<?php echo $key; ?>" id="<?php echo $key; ?>" value="<?php echo escape($value); ?>" <?php echo ($key === 'id' ? 'readonly' : null); ?>>
        <?php endif; ?>
    <?php endforeach; ?>
    <input type="submit" name="submit" value="Submit">
    <a href="timetable.php"><input type="button" name="gotott" value="go back to the timetable page">   </a> 
</form>


