<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script type="text/javascript" src="js/login.js"></script>     
    <script type="text/javascript" src="js/register.js"></script>           
    <link rel="stylesheet" href="css/style.css">
    <title>Home</title>
</head>
<body>
<div id="message" class="errorMessage">
</div>  
    <div class="container" id="container">
        <div class="form-container sign-up-container">
            <form action="pages/register.php" method="POST" class="aanvragenform">
                <h1>Account aanvragen</h1>
                <input type="text" name="voornaam" id="voornaam" placeholder="Voornaam">
                <input type="text" name="achternaam" id="achternaam" placeholder="Achternaam">
                <input type="text" name="woonplaats" id="woonplaats" placeholder="Woonplaats">
                <input type="text" name="straatnaam" id="straatnaam" placeholder="Straatnaam">
                <input type="text" name="huisnummer" id="huisnummer" placeholder="huisnummer">
                <input type="text" name="postcode" id="postcode" placeholder="Postcode">
                <input type="submit" name="aanvragen" id="aanvragen" value="Aanvragen">
            </form>
        </div>
        <div class="form-container sign-in-container">
            <form action="login.php" method="POST" class="inloggenform">
                <h1>Inloggen</h1>
                <input type="text" name="gebruikersnaam" id="gebruikersnaam" placeholder="Gebruikersnaam">
                <input type="password" name="wachtwoord" id="wachtwoord" placeholder="Wachtwoord">
                <a onclick="Toggle(this);" class="toonwachtwoord">Toon wachtwoord</a>
                <input type="submit" name="inloggen" id="inloggen" value="inloggen">
            </form>
        </div>
        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-left">
                    <h1>Welkom terug</h1>
                    <p>Heeft u al login gegevens klik dan hier om in te loggen</p>
                    <button class="ghost" id="signIn">inloggen</button>
                </div>
                <div class="overlay-panel overlay-right">
                    <h1>Nog geen account?</h1>
                    <p>Klik dan hier om een account aan te vragen.</p>
                    <button class="ghost" id="signUp">Account aanvragen</button>
                </div>
            </div>
        </div>
    </div>    
    <script>
        const signUpButton = document.getElementById("signUp");
        const signInButton = document.getElementById("signIn");
        const container = document.getElementById("container");

        signUpButton.addEventListener('click', () => container.classList.add("right-panel-active"));
        signInButton.addEventListener('click', ()=> container.classList.remove("right-panel-active"));

        function Toggle(button){
            var password = document.getElementById("wachtwoord");
            if(password.type == "password"){
                button.innerHTML = "Wachtwoord verbergen";
                password.type = "text";
            }else{
                button.innerHTML = "Toon wachtwoord";
                password.type = "password";
            }
        }
    </script>
</body>
</html>