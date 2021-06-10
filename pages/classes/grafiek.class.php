<?php
class Grafiek extends Db{
    public function getWoonplaast(){
        $query = 'SELECT DISTINCT woonplaats FROM allergie_woonplaats ORDER BY woonplaats ASC';
        $resultaat = $this->get($query);
        echo '<form action="" method="POST">';
        foreach($resultaat as $res){
            echo "<button name='woonplaats' value='{$res['woonplaats']}'>".$res['woonplaats']."</button><br>";
        }
        echo '</form>';
    }

    public function getAllergie($woonplaats){
        $query = 'SELECT allergie_woonplaats.*, allergie.* FROM allergie_woonplaats INNER JOIN allergie ON allergie_woonplaats.allergie_id = allergie.allergie_id WHERE woonplaats =?';
        $resultaat = $this->execute($query, array($woonplaats));
        foreach($resultaat as $res){
            echo $res['allergie'];
        }
    }
}
?>