<h1>gestions des clients</h1>

<p>page en construction</p>

<?php $titlePage = "PN - gestion des clients"; ?>

<?php foreach($customers as $customer): ?>
    <h2><?= $customer['cus_pseudo'] ?></h2>
    <p><?= $customer['cus_points'] ?></p>
<?php endforeach; ?>
