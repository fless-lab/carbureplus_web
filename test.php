<?php
include("connection.php");
//Ta requete...
?>
<select>
    <?php
    //tu me ta logique au niveau de true
    while (true) {
    ?>
        <option value="<?= id ?>"><?= nom ?></option>
    <?php
    }
    ?>
</select>
