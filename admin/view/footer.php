</main>
</body>
<?php if ($action != 'vehicles_list') { ?>
        <p><a href=".">View Full Vehicle List</a></p>
    <?php } ?>

    <?php if ($action != 'add_vehicles') { ?>
        <p><a href="?action=add_vehicles_form">Click here</a> to add a vehicle</p>
    <?php } ?>

    <?php if ($action != 'makes_list') { ?>
        <p><a href="?action=makes_list">View/Edit Vehicle Makes</a></p>
    <?php } ?>

    <?php if ($action != 'types_list') { ?>
        <p><a href="?action=types_list">View/Edit Vehicle Types</a></p>
    <?php } ?>

    <?php if ($action != 'classes_list') { ?>
        <p><a href="?action=classes_list">View/Edit Vehicle Classes</a></p>
    <?php } ?>


 </div>
</main>
<footer class="border-top border-1 border-secondary">
    <p class="text-end mt-2 copyright">&copy; <?= date("Y"); ?> Zippy Used Autos</p>
</footer>