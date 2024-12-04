<?php

$employes = [
    ["nom" => "amine", "poste" => "Développeur", "salaire" => 4000],
    ["nom" => "hiba", "poste" => "Designer", "salaire" => 3500],
    ["nom" => "mariya", "poste" => "Manager", "salaire" => 6000],
    ["nom" => "hajar", "poste" => "Secrétaire", "salaire" => 3000],
    ["nom" => "arwa", "poste" => "Technicien", "salaire" => 3200],
];
function calculerSalaireMoyen($employes) {
    $totalSalaire = 0;
    foreach ($employes as $employe) {
        $totalSalaire += $employe["salaire"];
    }
    return $totalSalaire / count($employes);
}
echo "<h3>Liste des employés :</h3>";
foreach ($employes as $employe) {
    echo "Nom : {$employe['nom']}, Poste : {$employe['poste']}, Salaire : {$employe['salaire']} MAD<br>";
}
echo "<h4>Salaire moyen : " . calculerSalaireMoyen($employes) . " MAD</h4>";
?>
<?php

$employes = [
    "TAHA" => ["poste" => "Développeur", "salaire" => 4000],
    "SALLMA" => ["poste" => "Designer", "salaire" => 3500],
    "REDA" => ["poste" => "Manager", "salaire" => 6000],
    "HEBA" => ["poste" => "Secrétaire", "salaire" => 3000],
    "OMAR" => ["poste" => "Technicien", "salaire" => 3200],
];
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recherche d'un employé</title>
</head>
<body>
    <form method="POST">
        <label for="nom">Entrez le nom de l'employé :</label>
        <input type="text" id="nom" name="nom" required>
        <button type="submit">Rechercher</button>
    </form>
    <?php
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $nom = $_POST["nom"];
        if (isset($employes[$nom])) {
            $employe = $employes[$nom];
            echo "<h3>Employé trouvé :</h3>";
            echo "Nom : $nom<br>";
            echo "Poste : {$employe['poste']}<br>";
            echo "Salaire : {$employe['salaire']} MAD<br>";
        } else {
            echo "<h3>Aucun employé trouvé avec le nom : $nom</h3>";
        }
    }
    ?>
</body>
</html>
<?php
//3
$utilisateurs = [
    ["email" => "TAHA@example.com", "mot_de_passe" => "12345"],
    ["email" => "SALLMA@example.com", "mot_de_passe" => "password"],
    ["email" => "REDA@example.com", "mot_de_passe" => "admin123"],
];
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
</head>
<body>
    <form method="POST">
        <label for="email">Email :</label>
        <input type="email" id="email" name="email" required><br><br>

        <label for="password">Mot de passe :</label>
        <input type="password" id="password" name="password" required><br><br>

        <button type="submit">Se connecter</button>
    </form>
    <?php
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        if (isset($_POST["email"]) && isset($_POST["password"])) {
            $email = $_POST["email"];
            $password = $_POST["password"];
            $utilisateur_trouve = false;
            foreach ($utilisateurs as $utilisateur) {
                if ($utilisateur["email"] === $email && $utilisateur["mot_de_passe"] === $password) {
                    $utilisateur_trouve = true;
                    break;
                }
            }

            if ($utilisateur_trouve) {
                echo "<h3>Connexion réussie. Bienvenue !</h3>";
            } else {
                echo "<h3>Erreur : Identifiants incorrects.</h3>";
            }
        } else {
            echo "<h3>Erreur : Veuillez remplir tous les champs.</h3>";
        }
    }
    ?>
</body>
</html>

<?php
session_start();

// 4
if (!isset($_SESSION['panier'])) {
    $_SESSION['panier'] = [];
}


if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["nom"]) && isset($_POST["prix"])) {
    $article = [
        "nom" => $_POST["nom"],
        "prix" => floatval($_POST["prix"]),
    ];
    $_SESSION['panier'][] = $article;
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panier d'achat</title>
</head>
<body>
    <h2>Ajouter un article au panier</h2>
    <form method="POST">
        <label for="nom">Nom de l'article :</label>
        <input type="text" id="nom" name="nom" required><br><br>

        <label for="prix">Prix :</label>
        <input type="number" step="0.01" id="prix" name="prix" required><br><br>

        <button type="submit">Ajouter au panier</button>
    </form>

    <h2>Contenu du panier</h2>
    <?php
    if (!empty($_SESSION['panier'])) {
        foreach ($_SESSION['panier'] as $index => $article) {
            echo "Article " . ($index + 1) . " : {$article['nom']}, Prix : {$article['prix']} MAD<br>";
        }
    } else {
        echo "Le panier est vide.";
    }
    ?>
</body>
</html>



<?php
