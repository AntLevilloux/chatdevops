<?php

    $bdd = new PDO("mysql:host=127.0.0.1;dbname=chatdevops;charset=utf8", "root", "");
    
    if(isset($_POST['pseudo']) && isset($_POST['message']) && !empty($_POST['pseudo']) && !empty($_POST['message']))
    {
        $pseudo = htmlspecialchars($_POST['pseudo']);
        $message = htmlspecialchars($_POST['message']);
        $insertmsg = $bdd->prepare('INSERT INTO chat(pseudo, message) VALUES(?, ?)');
        $insertmsg->execute(array($pseudo, $message));
    }

?>

<!DOCTYPE>

<html>

    <head>
        <title>ChatDevOps</title>
        <meta charset="utf-8">
        <link href="style.css" rel="stylesheet" type="text/css" media="all">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js">
            src="https://code.jquery.com/jquery-3.7.1.js"
            integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
            crossorigin="anonymous">
        </script>
        <html lang="fr">
        
    </head>

    <body>

        <div class="zone">

            <form method="post" action="">

                <input type="text" name="pseudo" placeholder="PSEUDO" value="<?php if(isset($pseudo)) { echo $pseudo; } ?>"/>
                <br>
                <textarea type="text" name="message" placeholder="MESSAGE"></textarea>
                <br>
                <input type="submit" value="envoyer" />


            </form>

            <div id="messages">

                <?php

                $allmsg = $bdd->query('SELECT * FROM chat ORDER BY id DESC');
                while($msg = $allmsg->fetch())
                {
                ?>
                <b> <?php echo $msg['pseudo'] ?> : </b> <?php echo $msg['message'] ?><br />
                <?php
                }
                ?>

            </div>

            <script>

                function load_messages() {
                    $('#messages').load('load_messages.php');
                }
                setInterval('load_messages()', 1000);

            </script>

        </div>

    </body>

</html>