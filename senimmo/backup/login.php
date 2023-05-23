<?php
    // inclure le script de connexion a la base de donnee
    require_once 'utils/db.php';

    
    if (isset($_POST['prenom'], $_POST['nom'], $_POST['email'], $_POST['password'])) {
        $prenom = $_POST['prenom'];
        $nom = $_POST['nom'];
        $email = $_POST['email'];
        $password = $_POST['password'];
    }
    
    if ($prenom != "" && $nom != "" && $email != "" && $password != "")
    {
        $connect = connexion();
        $query = "INSERT INTO users (prenom, nom, email, password) VALUES (?, ?, ?, ?)";
        $statement = $connect->prepare($query);
        $donnee = [$prenom,strtoupper($nom),$email,$password];
        // var_dump($donnee);
        // die;
        $statement->execute($donnee);
        header('Location: index.php');
        
    }
    else
    {
        // echo "Veuillez renseigner tous les champs". PHP_EOL ;
?>
        <div class="alert alert-danger" role="alert">
                    <strong>Veuillez renseigner tous les champs</strong> 
                </div>
<?php   }
