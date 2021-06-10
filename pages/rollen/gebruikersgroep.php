<?php
session_start();
include('../../conn/db.php');
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/home.css">
    <title>Document</title>
</head>
<body>
<a href="../home.php">Home</a>
<div class="formWrapper">
    <?php
    $sql = $conn->prepare("SELECT * FROM rollen");
            
    $sql->execute();
    echo '<form action="" method="post">';
    echo'<select name="rol" id="">';

    while ($row = $sql->fetch(PDO::FETCH_ASSOC)){
        echo '<option value="'.$row['rol_id'].'">'.$row['rol'].'</option>';
    }
    echo '</select><br>';
    echo '<input type="submit" name="laden" value="laden"><br>';
    echo '</form>';

    if(isset($_POST['laden'])){
        $rol = $_POST['rol'];
        $_SESSION['rol'] = $rol;

        $sql = $conn->prepare("SELECT * FROM rollen WHERE rol_id = :rol");
        $sql->execute(array(':rol'=>$rol));

        while ($row = $sql->fetch(PDO::FETCH_ASSOC))
        {
            echo "<strong><span style='color:white;'>".$row["rol"]."</span></strong>";
        }
    
        $sql = $conn->prepare("SELECT * FROM rechten");
        $sql->execute();

        $sqlRechten = "SELECT rechten.recht_id, rechten.omschrijving, gebruikers_rechten.rol, gebruikers_rechten.recht_id FROM rechten 
            INNER JOIN gebruikers_rechten ON rechten.recht_id = gebruikers_rechten.recht_id WHERE gebruikers_rechten.rol = ?";
        $stmt = $conn->prepare($sqlRechten);
        $stmt->execute([$_POST['rol']]);
        $resultaat = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        while ($row1 = $sql->fetch(PDO::FETCH_ASSOC)){
            echo "<form action='' method='post' style='color:white;'>";
            echo "<input class='rechten' class='rechten' type='checkbox' name='rechten[]' value='".$row1["recht_id"]."'>".$row1["omschrijving"]."<br>";   
        }
        echo "<input type='submit' name='toevoegen' value='Toevoegen'>";     
        echo "</form>";     

    }
    ?>

<script>

var recht = document.getElementsByClassName('rechten');
   
for (let i = 0; i < recht.length; i++) {
    <?php foreach($resultaat as $res){?>
     if(recht[i].value == <?php echo $res['recht_id']; ?>){
        recht[i].checked = true;
     } 
    <?php } ?>
    
}       
</script>
<?php
if(isset($_POST['toevoegen'])){
    $rol = $_SESSION['rol'];


    foreach ($_POST['rechten'] as $rechten) {
        $sql = "DELETE FROM `gebruikers_rechten` WHERE rol = ?";
        $stmt = $conn->prepare($sql);
        try{
            $stmt->execute(array($rol));
        }catch(PDOException $e){
            $e->getMessage();
        } 
    }


    foreach ($_POST['rechten'] as $recht) {
        $sql = "INSERT INTO `gebruikers_rechten`(`rol`, `recht_id`) VALUES (?,?)";
        $stmt = $conn->prepare($sql);
        try{
            $stmt->execute(array($rol,$recht));
            echo 'recht is toegevoegd <br>';
        }catch(PDOException $e){
            echo 'er is iets fout gegaan ';
        } 
    }

}
?>
</div>
</body>
</html>