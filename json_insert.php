
<?php
include "polacz.php";

$isActive = $_GET['isActive'];
$age = $_GET['age'];
$first_name = $_GET['first_name'];
$last_name = $_GET['last_name'];

$sql = $baza->prepare("INSERT INTO users VALUES (NULL, ?, ?, ?, ?);");
if ($sql)
{
        $sql->bind_param("ssss",$isActive, $age, $first_name, $last_name);
        $sql->execute();
        $sql->close();
}
else
    die( 'Błąd: '. $baza->error);
$baza->close();
?>