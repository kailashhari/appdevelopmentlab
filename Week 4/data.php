<?php

$host = "localhost";
$user = "root";
$pass = "";
$db = "week4";

$conn = mysqli_connect($host, $user, $pass, $db);
$results = $conn->query("SELECT * FROM `books`");
?>

<?php while($data = $results->fetch_assoc()):?>
    <tr style="border: 2px solid black;">
        <td><?php print_r($data["book_id"]);?></td>
        <td><?php print_r($data["title"]);?></td>
        <td><?php print_r($data["author"]);?></td>
        <td><?php print_r($data["availability"]);?></td>
    </tr>
<?php endwhile;?>