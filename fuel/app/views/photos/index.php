<br>
<p>
    <?php if ($current_user && $current_user->group == 100)
        echo Html::anchor('photos/create', 'Add new photos', array('class' => 'btn btn-success col-md-12'));
    ?>
</p>
<?php if ($photos): ?>
<?php foreach ($photos as $item): ?>
            <?php if ($item->name && $item->name != 'rien') { ?>
              <div class="col-md-4 col-sm-12">
                  <img class="photos" width="100%" title="<?= $item->name; ?>" src="assets/img/photos/<?= $item->name; ?>" >
                  <?php if ($current_user && $current_user->group == 100) echo Html::anchor('photos/edit/'.$item->id, 'Edit', array('class' => 'btn btn-warning')); ?>
                  <?php if ($current_user && $current_user->group == 100) echo Html::anchor('photos/delete/'.$item->id, 'Delete', array('onclick' => "return confirm('Are you sure?')",'class' => 'btn btn-danger') ); ?>
              </div>
            <?php } ?>
       <?php endforeach; ?>
<?php else: ?>
<p>No photos.</p>

<?php endif; ?>

