<?php

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlentities($data);
  return $data;
}

$nom = $prenom = $email = $tel = $sujet = $message = "";

$nom = test_input($_POST["nom"]);
$prenom = test_input($_POST["prenom"]);
$email = test_input($_POST["email"]);
$tel = test_input($_POST["tel"]);
$sujet = test_input($_POST["sujet"]);
$message = test_input($_POST["message"]);

$errors = [];

if (empty($nom)) {
    $errors[] = 'Votre nom est requis';
 }

 if (empty($prenom)) {
    $errors[] = 'votre prénom est absent';
 }
  
 if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
   $errors[] = "L'adresse mail n'est pas valide";
  }
  
 if (empty($email)) {
    $errors[] = 'Mail obligatoire';
 }

 if (empty($tel)) {
    $errors[] = 'Vous n\'avez pas renseigné votre numéro de téléphone';
 }

 if (empty($message)) {
    $errors[] = 'Votre message est vide';
 }

 if (!empty($errors)) {
    var_dump($errors);
 }else {

echo "Merci " . $prenom . ' ' . $nom . " de nous avoir contacté à propos de " . $sujet .

" : Un de nos conseiller vous contactera soit à l’adresse " . $email . " ou par téléphone au " . $tel . " dans les plus brefs délais pour traiter votre demande : "
. $message . "." ;

 }
