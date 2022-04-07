<?php include('view/header.php')?>
<div class = "table-wrapper">
    <table class="fl-table">
    <thead>
        <tr>
            <th>Name</th>
</tr>
<?php foreach($classes as $class) { ?> 
<tr>
    <td><?= $class['Class']; ?> </td>
<td>
    <form action="." method="POST" class="delete_form">
        <input type="hidden" name="action" value="delete_class">
    <input type="hidden" name="class_id" value="<?= $class['ID']; ?> ">
<button>DELETE</button>
</form>
</td>
</tr>
<?php } ?>

</div>

<?php include('view/add_class_form.php'); ?>
</section>

<?php include('view/footer.php'); ?>