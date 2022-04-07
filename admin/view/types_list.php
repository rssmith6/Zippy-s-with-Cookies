<?php include('view/header.php')?>
<div class = "table-wrapper">
    <table class="fl-table">
    <thead>
        <tr>
            <th>Name</th>
</tr>
<?php foreach($types as $type) { ?> 
<tr>
    <td><?= $type['Type']; ?> </td>
<td>
    <form action="." method="POST" class="delete_form">
        <input type="hidden" name="action" value="delete_type">
    <input type="hidden" name="type_id" value="<?= $type['ID']; ?> ">
<button>DELETE</button>
</form>
</td>
</tr>
<?php } ?>

</div>

<?php include('view/add_type_form.php'); ?>
</section>

<?php include('view/footer.php'); ?>