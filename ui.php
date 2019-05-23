<div id="login-content">
    <button class="exit" onclick="exitUIcont()">X</button>

<?php
    if(isset($_POST['Logout'])) {
        session_destroy();
    }
    /* Log ind */
    if(isset($_POST['login'])) {
        $userlogin = $_POST['user'];
        $passlogin = $_POST['pass'];

        $_SESSION['loggedin'] = true;

        $sql = "SELECT email FROM medlemmer WHERE email = '$userlogin' 
        AND kodeord = '$passlogin'";

        $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()){
                    $_SESSION['user'] = $row['email'];
                }
            }
        else { ?>
            <script> 
                document.getElementById('notifications-box').innerHTML = "<button class='exitNotifications' onclick='exitNot()'>X</button> Der er gået noget galt! Prøv igen.";
                document.getElementById('notifications-box').style.backgroundColor = "#F2F2F2";
            </script> 
        <?php }
        
        $conn->close();
    }


?>

<form method="post">
        <h2>Log ind</h2>
        <div class="two-columns" style="width: 120px;">
            <label for="userlogin">E-mail</label><br />
            <label for="userpass">Kodeord</label><br />
        </div>
        <div class="two-columns" style="width: 349px;">
            <input type="text" id="userlogin" name="user" size="40" placeholder="Din e-mail" required/><br />
            <input type="password" id="passlogin" name="pass" size="40" placeholder="Dit kodeord" required><br />
        </div>
        <input type="submit" value="Send" name="login" />
    </form>

</div>

<div id="reg-content">
    <button class="exit" onclick="exitUIcont()">X</button>

<?php

    /* Opret data til database via form */
    if(isset($_POST['register'])) {
        $newuser = $_POST['newuser'];
        $newpass = $_POST['newpass'];
        $newmail = $_POST['newmail'];
        $newmobile = $_POST['newmobile'];

        $sql = "INSERT INTO medlemmer ( brugernavn, kodeord, email, tel ) VALUES ('$newuser', '$newpass', '$newmail', '$newmobile')";
        if($conn->query($sql) == TRUE) {
            ?>
            <script> 
                document.getElementById('notifications-box').innerHTML = "Din bruger er nu oprettet. Log ind i højre hjørne.";
                document.getElementById('notifications-box').style.backgroundColor = "#F2F2F2";
            </script> 
        <?php 
        }
        else { ?>
            <script> 
                document.getElementById('notifications-box').innerHTML = "Din bruger kunne ikke registreres. Prøv igen.";
                document.getElementById('notifications-box').style.backgroundColor = "#F2F2F2";
            </script> 
        <?php }
        $conn->close();
    }
    //echo $username . " er blevet oprettet";
?>

<form method="post" action="index.php">
        <h2>Registrér dig som bruger</h2>
        <div class="two-columns" style="width: 120px;">
            <label for="newuser">Brugernavn</label><br />
            <label for="newpass">Kodeord</label><br />
            <label for="newmail">E-mail</label><br />
            <label for="newmobile">Telefon</label><br />
        </div>
        <div class="two-columns" style="width: 349px;">
            <input type="text" id="newuser" name="newuser" size="40" placeholder="Alias, fx. Karl29" required/><br />
            <input type="password" id="newpass" name="newpass" size="40" placeholder="Kodeord, fx. sommerfugle2009" required><br />
            <input type="text" id="newmail" name="newmail" size="40" placeholder="E-mail, fx. karlemil@hotmail.com" required><br />
            <input type="text" id="newmobile" name="newmobile" size="40" placeholder="Telefon eller mobilnummer"required><br />
        </div>
        <input type="submit" value="Send" name="register" />
    </form>

</div>
            
<!--<div id="profile-content">
    <button class="exit" onclick="exitUIcont()">X</button>
        <div class="avatar-content">
            <div class="profile-avatar"></div>
            <h3>Brugernavn</h3>
            <p> <?php echo $row['username'];?></p>
        </div>
        <div class="user-content">
            <div class="achievements">
                Opnå milepæle for at få dem fremvist hér. 
            </div>
            <div class="achievements">
                <img src="images/lock.png">
            </div>
            <div class="achievements"></div>
            <div class="achievements"></div>
            <div class="more-achievements"></div>
        </div>
</div>-->

<?php 
    if (!isset($_SESSION['user'])){
?>
    <button id="login" onclick="showUIcont(0)">Login</button>
    <button id="reg" onclick="showUIcont(1)">Registrering</button>
    <button id="profile" onclick="showUIcont(2)" disabled style="display: none;">Profil</button>
<?php 
    }else{
?>
    <button id="login" onclick="showUIcont(0)" disabled style="display: none;">Login</button>
    <button id="reg" onclick="showUIcont(1)" disabled style="display: none;">Registrering</button>
    <button id="profile" onclick="showUIcont(2)" style="display: none;">Profil</button>

    <form method="post" action="index.php">
        <input id="logout" type="submit" value="Log ud" name="Logout" />
    </form>
<?php 
    }
?>
    <!--<button id="news" onclick="showUIcont(3)">Nyheder</button>
    <button id="settings" onclick="showUIcont(4)">Indstillinger</button>-->