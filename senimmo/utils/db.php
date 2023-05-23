<?php

    function connexion($server_name="localhost", $dbname="LI", $username="root", $password=""){
        // On supprime toutes les connexions existantes
        $connexion = null;

        $dsn = "mysql:host=$server_name;dbname=$dbname";
        try {
            $connexion = new PDO($dsn,$username,$password);
            $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            // echo "connected successfully";
        } catch (PDOException $e) {
            // die('Erreur ' . $e->getMessage());
            echo "Erreur : " . $e->getMessage();
        }


        return $connexion;
    }
