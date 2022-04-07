<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zippy's Used Autos</title>
    <link rel="stylesheet" href="view/css/main.css">
</head>
<body>
    <header>
    <?php if(!isset($_SESSION['name']) && 
        ($action != 'register' && $action != 'logout')) { ?>
        <p><a href="?action=register">Register</a></p>
    <?php } elseif (isset($_SESSION['name']) &&
        ($action != 'register'  && $action != 'logout')) { ?>
        <p><?= "Welcome {$_SESSION['name']}" ?>(<a href="?action=logout">Log out</a>)</p>
    <?php } else { ?>
    <div></div>
<?php } ?>
<h1> Zippy's Used Autos </h1>
    </header>
<main>