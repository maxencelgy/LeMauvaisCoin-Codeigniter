<?= $this->extend('templates/default') ?>

<?= $this->section('content') ?>
<h1>Modifier</h1>

<form class="formu" action="modified" method="post">
    <input type="text" name="nom_annonce" value="<?= $annonce["nom_annonce"]; ?>">
    <br>
    <textarea name="description_annonce"><?= $annonce["description_annonce"]; ?></textarea>
    <br>
    <input type="text" name="prix_annonce" value="<?= $annonce["prix_annonce"]; ?>">€
    <br>

    <input type="hidden" name="id" value="<?= $annonce["id"]; ?>">
    <input type="submit" value="Valider">
</form>



<?= $this->endSection() ?>