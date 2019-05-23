<!DOCTYPE html>
<html lang="da/en">
<head>
    <meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="style/stylesheet.css">
    <link rel="stylesheet" type="text/css" href="style/profile.css">

	<title>2D game</title>
    <script src="js/functions.js" defer></script>
</head>
<body>

<?php
    /* Connect til server */
    $server = "localhost";
    $user = "root";
    $pw = "123456789";
    $db = "rhsf_members";

    $conn = new mysqli($server, $user, $pw, $db);
    
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    echo "<h1>Velkommen til H. C. Ørsted-spillet.</h1><br>";

    session_start();
?>
<ol>
<li>Brug piletasterne til at komme til højre eller venstre.</li>
<li>Tryk på karakteren, bygninger eller andre objekter og bliv informeret.</li>
<li>Registrér dig og log ind.</li>
</ol>

    <div class="gameCont">
        <div id="gameBox">
            <img id="city-1" src="images/bane1.jpg" />

            <div id="butterfly1-popup">
                <img src="images/white_arrow.png">
                <button class="exit" id="butterfly1" onclick="exitButterflies()">X</button>
                <h2>Sommerfugl fundet!</h2>
                <h3>Admiral</h3>
                <div id="admiral"></div>
                <p>"Admiralen er en sommerfugl i takvingefamilien."</p>
            </div>
            <div id="butterfly2-popup">
                <img src="images/white_arrow.png">
                <button class="exit" id="butterfly2" onclick="exitButterflies()">X</button>
                <h2>Sommerfugl fundet!</h2>
                <h3>Aurora</h3>
                <div id="aurora"></div>
                <p>"Aurora er en sommerfugl i hvidvingefamilien."</p>
            </div>
            <div id="butterfly3-popup">
                <img src="images/white_arrow.png">
                <button class="exit" id="butterfly3" onclick="exitButterflies()">X</button>
                <h2>Sommerfugl fundet!</h2>
                <h3>Dagpåfugleøje</h3>
                <div id="peacock"></div>
                <p>"Dagpåfugleøje er en sommerfugl i takvingefamilien."</p>
            </div>

            <div class="butterfly1" onclick="showButterflies(0)"></div>
            <div class="butterfly2" onclick="showButterflies(1)"></div>
            <div class="butterfly3" onclick="showButterflies(2)"></div>

            <div id="interaction2" onclick="showSpeech(1)"></div>
            <div id="interaction3" onclick="showSpeech(2)"></div>

        </div>

        <div id="notifications-box"></div>

            <?php include('ui.php'); ?>

        <button id="left"> < </button>
        <button id="right"> > </button>

        <div id="speech-bubble1">
            <img src="images/white_arrow.png">
            <button class="smallExit" onclick="exitSpeech()"> > </button>
            <p>Hej! Mit navn er <br><b>H. C. Ørsted</b>.</p>
        </div>
        <div id="speech-bubble2">
            <img src="images/white_arrow.png">
            <button class="smallExit" onclick="exitSpeech()"> > </button>
            <p>Dette er Rudkøbings rådhus.</p>
        </div>
        <div id="speech-bubble3">
            <img src="images/white_arrow.png">
            <button class="smallExit" onclick="exitSpeech()"> > </button>
            <p>Denne grønne fyr er en legeplads formet som en larve.</p>
        </div>

        <div id="character" onclick="showSpeech(0)">
            <div id="head"></div>
            <div id="left-arm"></div>
            <div id="right-arm"></div>
            <div id="body"></div>
            <div id="leg-1"></div>
            <div id="leg-2"></div>
        </div>
    </div>


</body>
</html>