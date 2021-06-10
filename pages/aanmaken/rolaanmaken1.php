<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    session_start();
    include('../../conn/db.php');

    $sql = "SELECT * FROM rollen WHERE rol = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute(array($_POST['rol']));
    $resultaat = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($resultaat) {
        echo 1;
    }else{
        $sql = "INSERT INTO `rollen`(`rol`) VALUES (?)";
        $stmt = $conn->prepare($sql);
        $stmt->execute(array($_POST['rol']));


        $sql = "SELECT * FROM rollen WHERE rol = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute(array($_POST['rol']));
        $resultaat = $stmt->fetch(PDO::FETCH_ASSOC);
        
        $_SESSION['rol'] = $resultaat['rol_id'];


        $sql = $conn->prepare("SELECT * FROM rechten");
        $sql->execute();
        echo "<form action='../rollen/rolwijzigen.php' method='post'>";
        while ($row1 = $sql->fetch(PDO::FETCH_ASSOC)){
            echo "<input class='rechten' type='checkbox' name='rechten[]' value='".$row1["recht_id"]."'>".$row1["omschrijving"]."<br>";   
        }
        echo "<input type='submit' name='toevoegen' value='Toevoegen'>";     
        echo "</form>"; 

    }

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
</body>
</html>
