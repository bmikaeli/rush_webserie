<br>
<p>
    <?php if ($current_user && $current_user->group == 100)
        echo Html::anchor('news/create', 'Add new news', array('class' => 'btn btn-success col-md-12'));
    ?>
</p>

<?php if ($rushes): ?>
    <?php foreach ($rushes as $item): ?>
        <div class="col-md-10 news">
            <h2><?php echo $item->title; ?></h2><br>
            <h4 class="col-md-8"><?php echo $item->body; ?></h4><br>
            <?php if ($item->picture && $item->picture != 'rien') { ?>
                <img class="col-md-4 pull-right" width="100%" src="assets/img/news/<?= $item->picture; ?>" >
            <?php } ?>
            <hr>

            <span class="written col-md-12 pull-right">Ecrit par <?php echo Model_User::find_by_id($item->user_id)['username']; ?> le <?php echo date::forge($item->created_at)->format("%d/%m %Y");?></span><br>
            <?php if ($current_user && $current_user->group == 100) echo Html::anchor('news/edit/'.$item->id, 'Edit', array('class' => 'btn btn-warning')); ?>
            <?php if ($current_user && $current_user->group == 100) echo Html::anchor('news/delete/'.$item->id, 'Delete', array('onclick' => "return confirm('Are you sure?')",'class' => 'btn btn-danger') ); ?>
        </div>

    <?php endforeach; ?>

<?php else: ?>
    <p>No News.</p>

<?php endif; ?>

