<?php
session_start();
include('../../conn/db.php');

if($_SESSION['loggedin'] != true){
    session_destroy();
    header("LOCATION: ../../");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bedden toevoegen</title>
</head>
<body>
<a href="../home.php">Home</a>

    <?php
    $sql = $conn->prepare("SELECT * FROM kamer");
            
    $sql->execute();

    echo '<form action="" method="post">';
    echo'<select name="kamer" id="">';

    while ($row = $sql->fetch(PDO::FETCH_ASSOC)){
        echo '<option value="'.$row['id'].'">'.$row['kamer'].'</option>';
    }
    echo '</select>';
    echo '<input type="submit" name="laden" value="laden">';
    echo '</form>';

    if(isset($_POST['laden'])){
        $kamer = $_POST['kamer'];
        $_SESSION['kamer'] = $kamer;

        $sql = $conn->prepare("SELECT * FROM kamer WHERE id = :kamer_id");
        $sql->execute(array(':kamer_id'=>$kamer));

        echo "<table>";
        while ($row = $sql->fetch(PDO::FETCH_ASSOC))
        {
            echo "<tr>";   
            echo "<th>".$row["kamer"]."</th>";
            echo "</tr>";
        }
    
        $sql = $conn->prepare("SELECT * FROM bed");
        $sql->execute();

        $sqlBed = "SELECT bed.id, bed.omschrijving, bedden_kamer.kamer_id, bedden_kamer.bed_id, bedden_kamer.beddenKamer_id FROM bed 
        INNER JOIN bedden_kamer ON bed.id = bedden_kamer.bed_id WHERE bedden_kamer.kamer_id = ?";
        $stmt = $conn->prepare($sqlBed);
        $stmt->execute([$_POST['kamer']]);
        $resultaat = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        while ($row1 = $sql->fetch(PDO::FETCH_ASSOC)){
            echo "<tr>";
            echo "<form action='beddenkoppellen1.php' method='post'>";
            echo "<td><input class='bed' type='checkbox' name='bed[]' value='".$row1["id"]."'>".$row1["omschrijving"]."</td>";   
            echo "</tr>";
        }
        echo "<td><input type='submit' name='toevoegen' value='Opslaan'></td>";     
        echo "</form>";     

        echo "</table>";
    }
    ?>

<script>

var bed = document.getElementsByClassName('bed');
   
for (let i = 0; i < bed.length; i++) {
    <?php foreach($resultaat as $res){?>
     if(bed[i].value == <?php echo $res['bed_id']; ?>){
        bed[i].checked = true;
     } 
    <?php } ?>
    
}       
</script>
</body>
</html>