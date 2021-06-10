<?php
class Chat extends db{
    public function sendMessage($message, $userId){
        $msg = array($message, $userId);
        $query = "INSERT INTO chat(bericht, cliënt_id) VALUES(?,?)";
        $this->execute($query, $msg);
    }

    public function sendMessageHap($message, $cliënt){
        $msg = array($message, $cliënt, 'Hap');
        $query = "INSERT INTO chat(bericht, aan, id) VALUES(?,?,?)";
        $this->execute($query, $msg);
    }

    public function sendMessageCliënt($message, $cliënt_id){
        $query = "INSERT INTO chat(bericht, cliënt_id, id) VALUES(?,?,?)";
        $msg = array($message, $cliënt_id, 'Cliënt');
        $this->execute($query, $msg);
    }

    public function getCliënt(){
        $query = "SELECT DISTINCT cliënt_id FROM chat";
        $cliënten = $this->getAll($query);
        $i = 1;

        foreach($cliënten as $cliënt){
            $cliënt = $cliënt['cliënt_id'];
            $cliënt_id = array($cliënt);
            $query = "SELECT * FROM users WHERE gebruiker_id = ?";
            $cliëntNaam = $this->execute($query, $cliënt_id);

            foreach($cliëntNaam as $naam){
                $gebruikersnaam = array($naam['gebruikersnaam']);
                $query = "SELECT * FROM `cliënten` WHERE `gebruikersnaam_gebruiker` = ?";
                $voornaamCliënt = $this->execute($query, $gebruikersnaam);

                
                foreach($voornaamCliënt as $voornaam){
                    echo "<button class='button-chat' id='".$i."' value='".$voornaam['gebruikersnaam_gebruiker']."' onclick='buttonclick(\"#".$i."\"); getChat()'>".$voornaam['voornaam']." ".$voornaam['achternaam']."</button><br>";
                    $i++;
                    ?>
                    <script>
                        function getChat(){
                            $(document).ready(function(){
                            setInterval(function(){
                                $.ajax({
                                    url:"getchatRealTime.php",
                                    method: "POST",
                                    success:function(data){
                                        $("#Messages").html(data);
                                    }
                                });
                            }, 5000);
                        });
                    }
                    </script>
                    <?php
                }
            }
        }    
    }

    public function getMessagesHap($gebruikersnaam){
        $query = "SELECT * FROM users WHERE gebruikersnaam = ?";
        $cliënt = $this->execute($query, array($gebruikersnaam));
        foreach($cliënt as $messages){
            $id = $messages['gebruiker_id'];
            $_SESSION['w'] = $id;

            $query = "SELECT * FROM chat WHERE cliënt_id = ? OR aan = ?";
            $stmt = $this->execute($query, array($id, $gebruikersnaam));

            foreach($stmt as $msg){
                echo "<div class='incoming_msg'>
                    <div class='received_msg'>
                        <div class='received_withd_msg'> 
                            <p id={$msg['id']}>". $msg['bericht'] ."</p>
                            <span id={$msg['id']} class='time_date'>{$msg['time']}</span>
                        </div>
                    </div>
                </div>";
                echo "<style>
                #Cliënt{
                    margin-left: -70% !important;
                }
                .time_date{
                    margin-bottom: 20px;
                }
                </style>";
            }
        }
    }

    public function getMessagesCliënt($gebruikersnaam, $id){
        $query = 'SELECT * FROM chat WHERE cliënt_id = ? OR aan = ? ORDER BY `time` asc';
        $berichten = array($id, $gebruikersnaam);
        $berichten = $this->execute($query, $berichten);
        foreach($berichten as $msg){
            echo "<div class='incoming_msg'>
                <div class='received_msg'>
                    <div class='received_withd_msg'> 
                        <p id={$msg['id']}>". $msg['bericht'] ."</p>
                        <span id={$msg['id']} class='time_date'>{$msg['time']}</span>
                    </div>
                </div>
            </div>";
            echo "<style>
            #Hap{
                margin-left: -70% !important;
            }
            .time_date{
                margin-bottom: 20px;
            }
            </style>";
        }
    }

    public function getClientInfo($cliënt){
        $query = 'SELECT id FROM cliënten WHERE gebruikersnaam_gebruiker = ?';
        $resultaat = $this->execute($query, array($cliënt));
        foreach($resultaat as $res){
            $cliënt_id = $res['id'];
        }
        $query = 'SELECT aandoening_cliënt.*, aandoening.* FROM aandoening_cliënt 
        INNER JOIN aandoening ON aandoening.aandoening_id = aandoening_cliënt.aandoening_id WHERE cliënt_id=?';
        $aandoeningen = $this->execute($query, array($cliënt_id));
        foreach($aandoeningen as $aandoening){
            echo $aandoening['aandoening'];
        }
    }
}
?>