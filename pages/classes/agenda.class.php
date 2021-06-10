<?php
class Agenda extends db{
    public function getEvents($user_id){
        $query = "SELECT * FROM afspraken WHERE `user_id` = ?";
        $afspraak = $this->execute($query, array($user_id));

        foreach($afspraak as $afspraken){
            $data[] = array(
                'id' => $afspraken["id"],
                'title' => $afspraken["title"],
                'start' => $afspraken["start_event"],
                'end' => $afspraken["end_event"]
            );
        }

        echo json_encode($data);
    }

    public function getEventsClient($user_id, $huisarts_id){
        $query = "SELECT * FROM afspraken WHERE `user_id` = ? OR huisarts_id =?";
        $afspraak = $this->execute($query, array($user_id, $huisarts_id));

        foreach($afspraak as $afspraken){
            $data[] = array(
                'id' => $afspraken["id"],
                'title' => $afspraken["title"],
                'start' => $afspraken["start_event"],
                'end' => $afspraken["end_event"]
            );
        }
        echo json_encode($data);
    }

    public function addEvents($title, $start, $end, $user_id){
        if(isset($title)){
            $query = "INSERT INTO afspraken (`title`, `start_event`, `end_event`, `user_id`) VALUES (?,?,?,?)";
            $this->execute($query, array($title, $start, $end, $user_id));
        }
    }
    
    public function addEventsClient($title, $start, $end, $afspraak, $cliënt_id, $huisarts){
        if(isset($title)){
            $query = "INSERT INTO afspraken (`title`, `start_event`, `end_event`, Afspraak, `user_id`, huisarts_id) VALUES (?,?,?,?,?,?)";
            $this->execute($query, array($title, $start, $end, $afspraak, $cliënt_id, $huisarts));
        }
    }

    public function updateEvents($title, $start, $end, $id){
        if(isset($id)){
            $query = "UPDATE afspraken SET title=?, start_event=?, end_event=? WHERE id=?";
            $this->execute($query, array($title, $start, $end, $id));
        }
    }

    public function deleteEvents($id){
        if(isset($id)){
            $query = "DELETE FROM afspraken WHERE id=?";
            $this->execute($query, array($id));
        }
    }

    public function cliënten($huisarts){
        $query = "SELECT * FROM huisartsen WHERE gebruikersnaam_gebruiker = ?";
        $huisartsen = $this->execute($query, array($huisarts));
        foreach($huisartsen as $huisarts){
            $huisarts_id = $huisarts['id'];
        }
        $query1 = "SELECT * FROM cliënten WHERE huisarts = ?";
        $cliënten = $this->execute($query1, array($huisarts_id));
        foreach($cliënten as $cliënt){
            echo $cliënt['voornaam']." ".$cliënt['achternaam'];
            echo "<form action='afspraakmaken.php' method='POST'>";
            echo "<input type='hidden' name='cliënt_gebruikersnaam' value={$cliënt['gebruikersnaam_gebruiker']}><br>";
            echo "<input type='hidden' name='voornaamCliënt' value={$cliënt['voornaam']}><br>";
            echo "<input type='submit' name='afspraak_toevoegen' value='Afspraak maken'>";
            echo "</form>";
        }
    }

    public function afspraakMaken($afspraak, $start_event, $end_event, $user_id, $huisarts_id){
        $query = "INSERT INTO afspraken (title, start_event, end_event, user_id, huisarts_id) VALUES (?,?,?,?,?)";
        $this->execute($query, array($afspraak, $start_event, $end_event, $user_id, $huisarts_id));
    }

    public function moreInfo($user_id){
        $query = "SELECT * FROM afspraken WHERE `user_id` = ? AND id =?";
        $afspraak = $this->execute($query, array($user_id, $_POST['id']));

        foreach($afspraak as $afspraken){
            echo $afspraken['Afspraak'];
        }
    }
}
?>