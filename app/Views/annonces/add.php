<?= $this->extend('templates/default') ?>

<?= $this->section('content') ?>

<form class="formu" action="annonce/add" method="post">
    <label for="">Nom de l'annonce</label>
    <input type="text" name="nom_annonce">
    <br>
    <label for="">Description</label>
    <textarea name="description_annonce"></textarea>
    <br>
    <label for="">Prix de l'annonce</label>
    <input type="text" name="prix_annonce">
    <br>

    <select name="categorie" id="pet-select">
        <?php
        foreach ($categories as $categorie) { ?>
            <option value="<?= $categorie['id'] ?>"><?= $categorie['nom_cat'] ?></option>
        <?php } ?>
    </select>
    <input type="submit" value="Valider">
</form>

<?= $this->endSection() ?>