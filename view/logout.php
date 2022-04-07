<?php include('view/header.php'); ?>

<h2><?= "You are now logged out, {$name}." ?></h2>
<p><a href="?action = vehicles_list">Click here</a> to view the vehicles list.</p>

<?php unset($name); ?>
<?php include('view/footer.php'); ?>