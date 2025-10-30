<?php

$password="";
$error="";


$name=$_POST["nom"];
$prenom=$_POST["prenom"];
$date=$_POST["date"];

 if($server["REQUEST_METHOD"]==='POST'){

  $motsdepass=trim($_POST["motsdepass"]);

 function verify($motsdepass) {

$nombredecaractere=strlen($motsdepass)>=12;

$lettremajuscule=preg_match('/[A-Z]/',$motsdepass);

$lettreminuscule=preg_match('/[a-z]/',$motsdepass);

$chiffres=preg_match('/[0-9]/',$motsdepass);

$caracteres=preg_match('/[\w]/',$motsdepass);

if ($nombredecaractere && $lettremajuscule && $lettreminuscule  && $chiffres && $caracteres) {
 
  header("Location: homes.php");

  exit();

}  else {
  $error="ce mots de passe doit etre fort !";

   header("Location:formulaireprojet.php?error=$error");
}
 verify($motsdepass);
 }
 }







?>
