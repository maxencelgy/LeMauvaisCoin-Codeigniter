<?= $this->extend('templates/default') ?>

<?= $this->section('content') ?>
<div class="wrap">
    <h2>Des millions de petites annonces et autant d’occasions de se faire plaisir</h2>
    <div class="filtre">
        <div class="radio">
            <label for="offre">Offre</label>
            <input type="radio" name="offre">
            <label for="offre">Demande</label>
            <input type="radio" name="demande">
        </div>
        <form action="">
            <div class="search">
                <select name="pets" id="pet-select">
                    <option value="">Catégories</option>
                </select>
                <input type="search" value=" Que recherchez vous ?">
                <input type="search" value="Saisissez une ville et un rayon">
                <input type="submit">
            </div>
        </form>

        <a href="" class="rechercher">
            Rechercher (<?= count($annonces) ?> résultats)
        </a>
    </div>

    <div class="depot">
        <a href="/create-annonce">Déposer une annonce</a>
    </div>

    <section id="topCat">
        <h2>Top catégories</h2>
        <div class="cards">
            <div class="card">Voitures</div>
            <div class="card">Vaccances</div>
            <div class="card">Vêtments</div>
        </div>
    </section>
    <section id="topAnnonces">
        <h2>Annonces : Toutes les annonces</h2>
        <div class="cardsAnn">

            <?php foreach ($annonces as $annonce) { ?>
                <div class="cardAnn">
                    <div class="title">
                        <h2><?= $annonce['nom_annonce'] ?></h2>
                        <h3><?= str_replace('.', ',', $annonce['prix_annonce'])  ?>€</h3>
                    </div>

                    <div class="view">
                        <a href="annonces/single/<?php echo $annonce["id"]; ?>">Voir</a>
                    </div>
                </div>

            <?php } ?>


        </div>
    </section>
</div>
<?= $this->endSection() ?>