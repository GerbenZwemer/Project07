<head>
  <title>upload bestand</title>
  <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="../../css/home.css">
</head>
  <?php
    require_once('../../conn/db.php');
    session_start();
    $clientId = $_GET['cliëntid'];
       
    if (isset($_POST['upload'])) {       
        $target = "files/".basename($_FILES['file']['name']);

        // $ext = pathinfo($fileName, PATHINFO_EXTENSION);

        $file = $_FILES['file']['name'];

        $fileExtention = pathinfo($file, PATHINFO_EXTENSION); 

        $sql = "INSERT INTO files (`file`, cliënt_id, `type`)
        values ('$file', '$clientId', '$fileExtention');";
        if ($conn->query($sql)){
        echo "";
        }
        else{
        echo "Error: ". $sql ."". $conn->error;
        }

        if (move_uploaded_file($_FILES['file']['tmp_name'], $target)) {
          $msg = "Image uploaded successfully";
        }else{
          $msg = "Failed to upload image";
        }
      
    }
    echo "U bekijkt de bestanden van: ".$_SESSION['voornaamcliënt']." ".$_SESSION['achternaam'];
  ?>
<div class="dms">
<form method="POST" action="" enctype="multipart/form-data">
  	<input type="hidden" name="size" value="1000000">
  	<div>
  	  <input type="file" name="file">
      <input type='hidden' name='clientId' value='<?php echo $clientId; ?>'/>
  	</div>
  	<div>
  	<div>
  		<button type="submit" name="upload">uploaden</button>
  	</div>
  </form>

  <?php 
  
    $sql2 = "SELECT * FROM files WHERE cliënt_id = $clientId ORDER BY type";
    $stmt = $conn->prepare($sql2);
    $stmt->execute();
    $files = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach ($files as $file) {
      echo $file['file']."<br>";
      echo "<div class='img_div' style='width:100px;'><img class='files' src='files/".$file['file']."'><br>";

      fopen('files/'.$file['file'].'', 'r');
      echo "<div class='buttons'>";
      echo "<a href='files/". $file['file'] ."'>
        <i class='button download fa fa-arrow-circle-o-down fa-2x' aria-hidden='true'></i>
      </a>";

      echo "<form action='' method='POST'>
      <button class='button delete' type='submit' name='submit' value='info'><i class='button fa fa-ban fa-2x' aria-hidden='true'></i></button>
      <input type='hidden' name='clientId' value='". $clientId ."'/>
      <input type='hidden' name='delete' value='". $file['id'] ."'/>
      </form>
      </div>
      </div>
      </div>";

    }

    if(isset($_POST['delete'])) {
      $deletefile = $_POST['delete'];
      $sql = "DELETE FROM `files` WHERE id = $deletefile";
      $conn->query($sql);
      header('LOCATION: documenten.php?cliëntid='.$clientId);
    }
  
  ?>