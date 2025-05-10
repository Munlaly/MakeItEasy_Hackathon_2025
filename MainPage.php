<!DOCTYPE html>
<html lang="en">
<head>
    
    <link rel="stylesheet" href="MainPage.css">
    <link rel="stylesheet" href="css/MainPage.css">

    <link rel="stylesheet" href="css/animations.css">
    <!--<link rel="stylesheet" href="css/quest.css">-->
    <link rel="stylesheet" href="css/singnin_out.css">
    <link rel="stylesheet" href="css/fileUploader.css">
    <link rel="stylesheet" href="css/rating.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Sigmar&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bungee+Inline&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Cinzel+Decorative:wght@400;700;900&display=swap" rel="stylesheet">
    <script src="rating.js" defer="defer"></script>
    <script src="timer.js" defer="defer"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MainPage</title>
</head>
<body>
<nav>
    <div id="user" class="bung"></div>
    <img src="icons/bob.svg" class="slide" width="7%">  
    <div class="dropdown">
        <span id="account">Account</span>
        <div class="dropdown-content">
            <p id="signIn" class="bung">Sign in</p>
            <p id="logIn"  class="bung">Log in</p>
            
            <p onclick="signOut()" id="signOut" class="bung">signOut</p>
            <a  href="shop.html" id="shoptext" class="bung" >Shop</a>
        </div>
  </div>
  
</nav>  
<div class="moto_box">
<p>Érd el önmagad legjobb verzióját!</p>

</div>

<div id="signInPopup" class="popup">
    <form action="SignIn.php" method="post">
        <label for="name">Name:</label><br>
        <input type="text" id="Name" name="Name"><br>
        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email"><br>
        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password"><br>
        <input type="submit">
    </form>
    <button id="closeSignIn" class="close">Close</button>
</div>
<div id="LogInPopup" class="popup">
    <form action="login.php" method="post">
        <label for="name">Name:</label><br>
        <input type="text" id="Name" name="Name"><br>
        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password"><br>
        <input type="submit">
    </form>
    <button id="closeLogIn" class="close">Close</button>
</div>

    <button id="leaderboard" >
     <div class="leaderboard_buton_content">
        <img class="podium" src="icons/podium.png" width="80%" >
        <p class="tooltip">Leaderboard</p>
    </div>
    </button>
    <div id="topbox"><h2 id="topleaderbox">🏴Leaderboard🏴</h2>
    <div id="topbox-content" ></div>
    </div>
    
    

    <div class="box">
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        
    </div>


    <div class="quest_card">

        <a class="quest_titel" href="quest.html">
            Daily Quest
        </a>
    </div>

    <div id="uploadFile">
        
        <form class="upstuf" action="upload.php" method="post" enctype="multipart/form-data">
            <label for="fileToUpload">Válassz egy képet:</label>
            <input class="k" type="file" name="fileToUpload" id="fileToUpload">
            <input class="k" type="submit" value="Add" name="submit" >
            <img class="upload_ico" src="icons/upload.png">

        </form>
        </div>

        <div id="counter">
        00:00:00
      </div>

    <div id="pictures-grid">
        <?php
            $conn = new mysqli("localhost", "root", "", "images");

            $sql = "SELECT image_path FROM images";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $unique_id = uniqid("rating_"); 
        echo '<div class="picbox">
                <img src="' . $row['image_path'] . '" alt="Kép" style="width: 200px; height: auto; margin: 10px; border: 6px solid black">
                <br>
                <div id="' . $unique_id . '" class="rating">
                    <span data-value="1">★</span>
                    <span data-value="2">★</span>
                    <span data-value="3">★</span>
                    <span data-value="4">★</span>
                    <span data-value="5">★</span>
                </div>
                <br>
              </div>';
    }
}

            $conn->close();
            ?>
</div>
<img src="icons/holder.png" id="holder">
    <script src="main.js"></script>
    
</body>


</html>