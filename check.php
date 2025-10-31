<?php
//ton code avait des problemes 
// 1. Définition de la fonction de validation
function validerMotDePasse($motsdepass) {
    // Liste des critères et de leurs messages d'erreur
    $erreurs = [];

    // Critère 1: Longueur minimale (>= 12 caractères)
    if (strlen($motsdepass) < 12) {
        $erreurs[] = "doit contenir au moins 12 caractères.";
    }

    // Critère 2: Lettre majuscule
    if (!preg_match('/[A-Z]/', $motsdepass)) {
        $erreurs[] = "doit contenir au moins une lettre majuscule.";
    }

    // Critère 3: Lettre minuscule
    if (!preg_match('/[a-z]/', $motsdepass)) {
        $erreurs[] = "doit contenir au moins une lettre minuscule.";
    }

    // Critère 4: Chiffre
    if (!preg_match('/[0-9]/', $motsdepass)) {
        $erreurs[] = "doit contenir au moins un chiffre.";
    }

    // Critère 5: Caractère spécial (non-alphanumérique, non-espace)
    if (!preg_match('/[^A-Za-z0-9\s]/', $motsdepass)) {
        $erreurs[] = "doit contenir au moins un caractère spécial (e.g., !, @, #).";
    }

    // Si le tableau $erreurs est vide, le mot de passe est valide
    return $erreurs;
}

// 2. Traitement du formulaire POST
if ($_SERVER["REQUEST_METHOD"] === 'POST') {
    
    // Assainir la donnée du mot de passe
    $motsdepass = trim($_POST["motsdepass"] ?? '');
    
    // Valider le mot de passe
    $erreurs = validerMotDePasse($motsdepass);

    if (empty($erreurs)) {
        // --- SUCCÈS ---
        
        // Optionnel : Hasher le mot de passe pour la base de données
        // $mdp_hash = password_hash($motsdepass, PASSWORD_DEFAULT);
        
        // 1. Redirection vers la page de succès
        header("Location: home.php");
        exit();

    } else {
        // --- ÉCHEC ---
        
        // 1. Concaténer les messages d'erreur en une seule chaîne
        $messageErreur = "Le mot de passe n'est pas fort : " . implode(", ", $erreurs);
        
        // 2. Préparer la chaîne d'erreur pour l'URL
        $messageEncode = urlencode($messageErreur);
        
        // 3. Redirection vers le formulaire avec le message d'erreur
        header("Location: register.php?error=$messageEncode");
        exit();
    }
}
?>