<?= $this->extend('templates/default') ?>

<?= $this->section('content') ?>


<?php var_dump($annonces) ?>
<div class="single">
    <div class="singleTitle">
        <h1><?= $annonces[0]['nom_annonce'] ?></h1>
        <br><br>
        <p><?= $annonces[0]['description_annonce'] ?></p>
        <br>
        <h2><?= str_replace('.', ',', $annonces[0]['prix_annonce'])  ?> €</h2>
        <h2><?= $annonces[0]['nom_cat']  ?></h2>
    </div>
    <div class="singleView">
        <a href="/annonces/modify/<?php echo $annonces[0]["id"]; ?>">Modifier</a>
        <a href="/annonce/delete/<?php echo $annonces[0]["id"]; ?>">Supprimer</a>
    </div>
</div>

<?= $this->endSection() ?>