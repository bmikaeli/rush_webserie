<br>
<p>
    <?php if ($current_user && $current_user->group == 100)
        echo Html::anchor('admin/news/create', 'Add new news', array('class' => 'btn btn-success col-md-12'));
    ?>
</p>

<?php if ($rushes): ?>

<?php foreach ($rushes as $item): ?>
        <div class="col-md-10 news">
       <h2><?php echo $item->title; ?></h2><br>
       <h4><?php echo $item->body; ?></h4><br>
       <hr>

       <span class="written">Ecrit par <?php echo Model_User::find_by_id($item->user_id)['username']; ?> le <?php echo date::forge($item->created_at)->format("%d/%m %Y");?></span><br>
       <?php if ($current_user && $current_user->group == 100) echo Html::anchor('admin/news/view/'.$item->id, 'View', array('class' => 'btn btn-primary')); ?>
       <?php if ($current_user && $current_user->group == 100) echo Html::anchor('admin/news/edit/'.$item->id, 'Edit', array('class' => 'btn btn-warning')); ?>
       <?php if ($current_user && $current_user->group == 100) echo Html::anchor('admin/news/delete/'.$item->id, 'Delete', array('onclick' => "return confirm('Are you sure?')",'class' => 'btn btn-danger') ); ?>
       </div></center>
<?php endforeach; ?>

<?php else: ?>
<p>No News.</p>

<?php endif; ?>