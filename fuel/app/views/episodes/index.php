<div class="col-md-12">
    <?php if ($current_user && $current_user->group == 100)
        echo Html::anchor('episodes/create', 'Ajouter un episode', array('class' => 'btn btn-success col-md-12')); ?>
</div>
<?php if ($rushes):
    rsort($rushes);
    ?>
<?php foreach ($rushes as $item): ?>
<div class="col-md-4 col-sm-6 col-lg-4 video">
    <h2><a href="episodes/view/<?= $item->id; ?> "><?php echo $item->title; ?></a></h2>
    <iframe width="100%" height="250" class="col-md-12" src="//www.youtube.com/embed/<?php echo substr($item->youtube, 32, 30); ?> "frameborder="0" allowfullscreen></iframe><br>
    <h5 class="written">Video ajouter le <?= date::forge($item->created_at)->format("%d/%m %Y"); ?></h5>
<!--    <div class="fb-like"  data-href="--><?php //echo $item->youtube; ?><!--" data-layout="standard" data-action="like" data-show-faces="true" data-share="true"></div>-->
    <?php if ($current_user && $current_user->group == 100)
        echo Html::anchor('episodes/view/'.$item->id, 'View', array('class' => 'btn btn-primary')); ?>
    <?php if ($current_user && $current_user->group == 100)
        echo Html::anchor('episodes/edit/'.$item->id, 'Edit', array('class' => 'btn btn-warning')); ?>
    <?php if ($current_user && $current_user->group == 100)
        echo Html::anchor('episodes/delete/'.$item->id, 'Delete', array('onclick' => "return confirm('Are you sure?')", 'class' => 'btn btn-danger')); ?>
</div>


<?php endforeach; ?>
<div class="clearfix"></div>
<?php else: ?>
<p>No Episodes.</p>

<?php endif; ?>

