<!DOCTYPE html>
<html>
  <head>
    <p>Utilisateur connecté : <?php echo ucfirst($_SESSION['prenom']) ?> <?php echo ucfirst($_SESSION['nom']) ?> (<a href="index.php?action=deconnexion">Se deconnecter</a>)</p>
  </head>