<!-- Pour faire une redirection vers la page chat.php, on peut utiliser header(Location: chat.php) -->
<?php

    // $chaineEnBinaire = "10";

    // printf("$chaineEnBinaire en binaire s'ecrit %b <br>", $chaineEnBinaire);

    // $caractereASCII = "119";
    // printf("Le code ASCII de $caractereASCII est %c <br>", $caractereASCII);

    // $chaineHexa = "410";
    // printf("$chaineHexa en Hexadecimal equivaut a %X <br>", $chaineHexa);
    // echo ucfirst("bonjour ici <br>");
    // echo ucwords("bonjour la li2 promo 20-21");
    
    // echo "<br>representation des caracteres ascii des lettres de l'alphabet en majuscule et minuscule" . PHP_EOL;

    // $str = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
    // echo "<br>";
    // for ($i=0; $i < strlen($str); $i++) { 
    //     echo substr($str,$i,1) . " : " . ord(substr($str,$i,1)) . "<br>";
    // }
    // echo str_repeat("#",20),"<br>";

    // $str = strtolower($str);
    // for ($i=0; $i < strlen($str); $i++) { 
    //     echo substr($str,$i,1) . " : " . ord(substr($str,$i,1)) . "<br>";
    // }    

    // die;

    // Inclure le script de connexion a la base de donnees
    require_once 'utils/db.php';
    
    // $connect = connexion();

    // $query = "SELECT pseudo, message FROM chat ORDER BY id DESC LIMIT 2";
    // $statement = $connect->prepare($query);
    // $statement->execute();

    // $resultat = $statement->fetchAll(PDO::FETCH_ASSOC);

    if(filter_has_var(INPUT_POST,"submit"))
    {
        // echo "envoye";
        if (isset($_POST['prenom'], $_POST['nom'], $_POST['email'], $_POST['password'])) 
        {
            // $prenom = htmlspecialchars($_POST['prenom']);
            // $nom = htmlspecialchars($_POST['nom']);
            // $email = htmlspecialchars($_POST['email']);
            // $password = htmlspecialchars($_POST['password']);
            $prenom = verifierInput($_POST['prenom']);
            $nom = verifierInput($_POST['nom']);
            $email = verifierInput($_POST['email']);
            $password = verifierInput($_POST['password']);
            
            if (!empty($prenom) && !empty($nom) && !empty($email) && !empty($password))
            {
                // Pour verifier si l'email est valide

                if(filter_var($email, FILTER_VALIDATE_EMAIL) === false)
                {
                    $message = "Veuillez saisir un email valide";
                    $messageClass = "alert-danger";
                }
                else
                {
                    $connect = connexion();
                    $query = "INSERT INTO users (prenom, nom, email, password) VALUES (?, ?, ?, ?)";
                    $statement = $connect->prepare($query);
                    $donnee = [$prenom,strtoupper($nom),$email,$password];
                    // var_dump($donnee);
                    // die;
                    $statement->execute($donnee);
                    // 
                    $message = "Inscription reussie";
                    $messageClass = "alert-success";
                    // header('Location: index.php');
                }
        
            }
            else {
                $message = "Veuillez renseigner tous les champs";
                $messageClass = "alert-danger";
            }
        }
    }

    function verifierInput($input)
    {
        // Pour supprimer les caracteres inutiles(espace supplémentaire, tabulation, saut de ligne) des donnees d'entrees de l'utilisateur
        $input = trim($input);
        // Pour supprimer le antislash des donnees d'entrees de l'utilisateur
        $input = stripslashes($input);
        // cette fonction convertie les carateres speciaux en entites HTML
        $input = htmlspecialchars($input);

        return $input;
    }

    
?>




<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Bootstrap CSS -->
    <!-- https://cdnjs.com/libraries/twitter-bootstrap/5.0.0-beta1 -->
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.0-beta1/css/bootstrap.min.css"
    />

    <!-- Icons: https://getbootstrap.com/docs/5.0/extend/icons/ -->
    <!-- https://cdnjs.com/libraries/font-awesome -->
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"
    />

    <title>Système d'inscription | Mon blog</title>

    </head>
    <!-- <body class="d-flex vw-100 vh-100 align-items-center justify-content-center"> -->
    <body class="container mt-5 position-relative">
            <!-- <button class="btn btn-primary">
            <i class="fab fa-accessible-icon me-1"></i>Hello, world!
            </button> -->

        <!-- <?php include_once "layouts/header.php" ?> -->
        <?php include_once "layouts/menu.php" ?>

        
        <div class="mt-3 d-grid gap-3 col-4 position-absolute top-50 start-50 translate-middle">
        <!-- <div class="col-4 align-self-center"> -->
            <?php if($message != "") : ?>
                <div class="alert <?=$messageClass?>"><?=$message?></div>
                <?php endif;?>
                <!-- <form action="<?= htmlspecialchars($_SERVER['PHP_SELF'])?>" method="post"> -->
                <form class="shadow w-450 p-4" action="" method="post">
                    <h3 class="text-decoration-underline" style="text-align : center">INSCRIPTION</h3>
                <div class="mb-3">
                    <label for="prenom" class="form-label">Prénom</label>
                    <input type="text" class="form-control" name="prenom" id="prenom" aria-describedby="prenom" placeholder="Prénom" value="<?=isset($_POST['prenom']) ? $prenom : "" ?>">
                </div>

                <div class="mb-3">
                    <label for="nom" class="form-label">Nom</label>
                    <input type="text" class="form-control" name="nom" id="nom" aria-describedby="nom" placeholder="Nom" value="<?=isset($_POST['nom']) ? $nom : "" ?>">
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" name="email" id="email" aria-describedby="email" placeholder="example@gmail.com" value="<?=isset($_POST['email']) ? $email : "" ?>">
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Mot de passe</label>
                    <input type="password" class="form-control" name="password" id="password" aria-describedby="password" placeholder="Mot de passe" value="<?=isset($_POST['password']) ? $password : "" ?>">
                </div>

                <!-- <button type="submit" name="submit" class="btn btn-primary">S'inscrire</button> -->
                <div class="mt-5">
                    <button class="btn btn-primary shadow w-20" name="submit" type="submit">S'inscrire</button>
                    <!-- <div>
                        <small class="text-body-secondary">Si vous ne possedez pas de compter, merci de cliquer sur ce lien</small>
                    </div> -->
                    <button class="btn btn-success shadow w-20" name="loginBtn"><a href="./layouts/login.php">Se connecter</a></button>
                    <!-- <button class="btn btn-primary" type="button">Button</button> -->
                </div>
            </form>
            <!-- <?php if ($prenom == "" || $nom == "" || $email == "" || $password == ""): ?>
                <div class="alert alert-danger" role="alert">
                    <strong>Veuillez renseigner tous les champs</strong> 
                </div>
            <?php endif; ?> -->
        </div>
        
                



    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.0-beta1/js/bootstrap.bundle.min.js"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->

    <!-- https://cdnjs.com/libraries/popper.js/2.5.4 -->
    <!-- <script
        src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.5.4/umd/popper.min.js"
        ></script>
        <script
        src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.0-beta1/js/bootstrap.min.js"
        ></script> -->

        <!-- More: https://getbootstrap.com/docs/5.0/getting-started/introduction/ -->
    </body>
</html>
