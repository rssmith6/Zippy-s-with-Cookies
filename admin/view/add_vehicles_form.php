<?php include('view/header.php'); ?>
<section>
    <h2>Add Vehicles</h2>
    <form action="." method="POST">
        <div>
            <input type = "hidden" name="action" value="add_vehicle">

            <div>
                <label>Make:</label>
                <select name="make_id" id="make_id">
                    <?php foreach($makes_list as $make) { ?>
                    <option value="<?= $make['ID']; ?>">
                <?= $make['Make']; ?>
                    </option>
                <?php } ?>
                    </select>
                    </div>
                    <div>
                        <label>Type:</label>
                        <select name="type_id" id="type_id">
                            <?php foreach($types_list as $type) { ?>
                            <option value="<?= $type['ID']; ?>">
                        <?= $type['Type']; ?>
                            </option>
                        <?php } ?>
                            </select>
                            </div>
                            <div>
                                <label>Class:</label>
                                <select name="class_id" id="class_id">
                                    <?php foreach($classes_list as $class) { ?>
                                    <option value="<?= $class['ID']; ?>">
                                <?= $class['Class']; ?>
                                    </option>
                                <?php } ?>
                                    </select>
                                    </div>

                                    <div>
                                        <label>Model:</label>
                                        <input type="text" name="model" id="model" required>
                                    </div>
                                    <div>
                                        <label>Year:</label>
                                        <input type="text" name="year" id="year" required>
                                    </div>
                                    <div>
                                        <label>Price:</label>
                                        <input type="text" name="price" id="price" required>
                                    </div>
                                    <div><button>ADD VEHICLE</button></div>
                                    </div>
                                    </form>
                                    </section>
                                    <?php include('view/footer.php'); ?>