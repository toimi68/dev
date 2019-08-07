 
<?php echo '<pre>'; print_r($values); echo '</pre>';  ?>
 
<?php echo '<pre>'; print_r($fields); echo '</pre>';  ?>

<form method="post" class="col-md-6 offset-md-3 text-center">

    <?php foreach($fields as $value): ?>

        <div class="form-group">
            <label for="<?= $value['Field'] ?>"><?= $value['Field'] ?></label>

            <input type="text" class="form-control" id="<?= $value['Field'] ?>" name="<?= $value['Field'] ?>" placeholder="Enter <?= $value['Field'] ?>" value="<?= ($op == 'update') ? $values[$value['Field']] : '' ?>" > 
        </div>

<?php endforeach; ?>

    <input type="submit" class="col-md-12 btn btn-dark mb-2" value="enregistrer">
</form>
      