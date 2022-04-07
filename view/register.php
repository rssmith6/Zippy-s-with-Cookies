<?php include('view/header.php');?>

<?php if(!$name) { ?>
    <form action ="." method="GET" class="add_form">
        <input type="hidden" name="action" value="register">
        <label for="name">Enter your name:</label>
        <input type="text" name="name" id="name" required>
        <button>Register</button>
    </form> 
<?php } else { ?>
    <h2><?= "Thank you for registering, {$name}" ?> </h2>
    <p><a href="?action=vehicles_list">Click here</a> to view the vehicle list.</p>
    <?php } ?>

<?php include('view/footer.php');?>