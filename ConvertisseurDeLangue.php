<?php
session_start();

// --- Toutes les langues dans un seul tableau ---
$langues = [
    "fr" => [
        "titre_page" => "Page de démonstration",
        "titre" => "Bonjour !",
        "texte" => "Bienvenue sur notre site web.",
        "bouton" => "Cliquez ici",
        "choisir_langue" => "Choisir la langue"
    ],
    "en" => [
        "titre_page" => "Demo Page",
        "titre" => "Hello!",
        "texte" => "Welcome to our website.",
        "bouton" => "Click here",
        "choisir_langue" => "Choose language"
    ],
    "es" => [
        "titre_page" => "Página de demostración",
        "titre" => "¡Hola!",
        "texte" => "Bienvenido a nuestro sitio web.",
        "bouton" => "Haz clic aquí",
        "choisir_langue" => "Elegir idioma"
    ]
];

// --- Détermination de la langue courante ---
$lang = 'fr';

if (isset($_GET['lang'])) {
    $lang = $_GET['lang'];
    $_SESSION['lang'] = $lang;
} elseif (isset($_SESSION['lang'])) {
    $lang = $_SESSION['lang'];
}

// Sécurité (ne garder que lettres minuscules)
$lang = preg_replace('/[^a-z]/', '', $lang);

// Si la langue demandée n'existe pas, revenir au français
if (!isset($langues[$lang])) {
    $lang = 'fr';
}

// Sélectionner les textes de la langue choisie
$texte = $langues[$lang];
?>
<!DOCTYPE html>
<html lang="<?= htmlspecialchars($lang) ?>">
<head>
    <meta charset="UTF-8">
    <title><?= $texte['titre_page'] ?></title>
    <style>
        body { font-family: Arial, sans-serif; padding: 20px; }
        select { padding: 5px; }
    </style>
</head>
<body>
    <h1><?= $texte['titre'] ?></h1>
    <p><?= $texte['texte'] ?></p>
    <button><?= $texte['bouton'] ?></button>

    <hr>
    <form method="get">
        <label for="lang"><?= $texte['choisir_langue'] ?> :</label>
        <select name="lang" id="lang" onchange="this.form.submit()">
            <?php foreach ($langues as $code => $info): ?>
                <option value="<?= htmlspecialchars($code) ?>" <?= $code === $lang ? 'selected' : '' ?>>
                    <?= htmlspecialchars($info['titre']) ?>
                </option>
            <?php endforeach; ?>
        </select>
    </form>
</body>
</html>
