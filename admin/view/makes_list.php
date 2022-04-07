<?php include('view/header.php')?>
<div class = "table-wrapper">
    <table class="fl-table">
    <thead>
        <tr>
            <th>Name</th>
</tr>
<?php foreach($makes as $make) { ?> 
<tr>
    <td><?= $make['Make']; ?> </td>
<td>
    <form action="." method="POST" class="delete_form">
        <input type="hidden" name="action" value="delete_make">
    <input type="hidden" name="make_id" value="<?= $make['ID']; ?> ">
<button>DELETE</button>
</form>
</td>
</tr>
<?php } ?>

</div>

<?php include('view/add_make_form.php'); ?>
</section>

<?php include('view/footer.php'); ?>