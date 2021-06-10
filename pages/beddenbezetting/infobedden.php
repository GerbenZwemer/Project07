<?php
session_start();
include('../../conn/db.php');
if($_SESSION['loggedin'] != true){
    session_destroy();
    header("LOCATION: ../../");
    exit;
}?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="../../css/home.css">
    <title>Document</title>
</head>
<body>

<a href="../home.php">Home</a>
<div class="formWrapper">
<?php
$sql = "SELECT * FROM afdeling;";
$stmt = $conn->prepare($sql);
$stmt->execute();
$resultaat = $stmt->fetchAll(PDO::FETCH_ASSOC);
echo "<pre>";
foreach($resultaat as $id => $val){
    echo "<strong>Afdeling: ".$val['afdeling']."</strong><br>";

    $sql2 = "SELECT * FROM kamer WHERE afdeling_id=:afdeling_id;";
    $stmt2 = $conn->prepare($sql2);
    $stmt2->execute(array($val['id']));
    $resultaat2 = $stmt2->fetchAll(PDO::FETCH_ASSOC);

    foreach($resultaat2 as $res){
        echo "  Kamer: ".$res['kamer']."<br>";

        $sql3 = "SELECT * FROM bedden_kamer WHERE kamer_id=:kamer_id";
        $stmt3 = $conn->prepare($sql3);
        $stmt3->execute(array($res['id']));
        $resultaat3 = $stmt3->fetchAll(PDO::FETCH_ASSOC);
        
        foreach ($resultaat3 as $res3) {
            $sql4 = "SELECT * FROM bedbezetting WHERE bed_id= ? AND kamer_id =?";
            $stmt4 = $conn->prepare($sql4);
            $stmt4->execute(array($res3['bed_id'], $res['id']));
            $resultaat4 = $stmt4->fetchAll(PDO::FETCH_ASSOC);
            if($stmt4->rowCount() > 0){
                echo "      <strong style='color:red;'>Bed: ".$res3['bed_id']." is bezet</strong><br>";
            }else{
                echo "      <span style='color:green;'>Bed: ".$res3['bed_id']." is vrij</span><br>";
            }
        }
    }
}
echo "</pre>";
?>
</div>
</body>
</html>
