<!doctype html>
<html class="no-js" lang="">

<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title></title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link rel="manifest" href="site.webmanifest">
  <link rel="apple-touch-icon" href="icon.png">
  <!-- Place favicon.ico in the root directory -->

  <link rel="stylesheet" href="css/normalize.css">
  <link rel="stylesheet" href="css/main.css">
</head>

<body>

<?php

  try{

    $bdd = new PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'root', 'soleil1993');

  }

  catch(Exception $e)

{

        die('Erreur : '.$e->getMessage());

}

// On récupère les 5 derniers billets

$req = $bdd->query('SELECT id, titre, contenu, DATE_FORMAT(date_creation, \'%d/%m/%Y à %Hh%imin%ss\') AS date_creation_fr FROM billets ORDER BY date_creation DESC LIMIT 0, 5');


while ($donnees = $req->fetch())

{

?>

<div class="news">
    <h3>

        <?php echo htmlspecialchars($donnees['titre']); ?>

        <em>le <?php echo $donnees['date_creation_fr']; ?></em>

    </h3>
    <p>

    <?php

    // On affiche le contenu du billet

    echo nl2br(htmlspecialchars($donnees['contenu']));

    ?>

    <br />

    <em><a href="commentaires.php?billet=<?php echo $donnees['id']; ?>">Commentaires</a></em>

    </p>

</div>

<?php

} // Fin de la boucle des billets

$req->closeCursor();

?>


  <script src="js/vendor/modernizr-3.6.0.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <script>window.jQuery || document.write('<script src="js/vendor/jquery-3.3.1.min.js"><\/script>')</script>
  <script src="js/plugins.js"></script>
  <script src="js/main.js"></script>

  <!-- Google Analytics: change UA-XXXXX-Y to be your site's ID. -->
  <script>
    window.ga = function () { ga.q.push(arguments) }; ga.q = []; ga.l = +new Date;
    ga('create', 'UA-XXXXX-Y', 'auto'); ga('send', 'pageview')
  </script>
  <script src="https://www.google-analytics.com/analytics.js" async defer></script>
</body>

</html>
