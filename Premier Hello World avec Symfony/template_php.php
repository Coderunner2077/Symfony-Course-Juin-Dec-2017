<!DOCTYPE html>
<html>
  <head>
    <title>Bienvenue dans Symfony2 !</title>
  </head>
  <body>
    <h1><?php echo $titre_page; ?></h1>

    <ul id="navigation">
      <?php foreach ($navigation as $item) { ?>
        <li>
          <a href="<?php echo $item->getHref(); ?>"><?php echo $item->getTitre(); ?></a>
        </li>
      <?php } ?>
    </ul>
  </body>
</html>