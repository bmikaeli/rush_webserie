<br>
<?php if ($rushes): ?>

<?php foreach ($rushes as $item): ?>
        <a href="/admin/equipe/view/<?php echo $item->prenom;?>">
        <div class="col-md-3 equipe news">
        <img class="col-md-12 picture" src="<?php $picture = "http://at-cdn-s01.audiotool.com/2013/05/11/users/guess_audiotool/avatar512x512-4e263bad6d0c46f2b12b82b614043589.jpg"; echo ($item->picture) ? $item->picture : $picture; ?> ">
        <h2><?php echo $item->prenom."  ".$item->nom; ; ?></h2>

       <?php if ($current_user && $current_user->group == 100) echo Html::anchor('admin/equipe/view/'.$item->id, 'View', array('class' => 'btn btn-primary')); ?>
       <?php if ($current_user && $current_user->group == 100) echo Html::anchor('admin/equipe/edit/'.$item->id, 'Edit', array('class' => 'btn btn-warning'));; ?>
       <?php if ($current_user && $current_user->group == 100) echo Html::anchor('admin/equipe/delete/'.$item->id, 'Delete', array('onclick' => "return confirm('Are you sure?')", 'class' => 'btn btn-danger')); ?>
       </div></a>
<?php endforeach; ?>

<?php else: ?>
<p>No staff.</p>

<?php endif; ?><p>
	<?php if ($current_user && $current_user->group == 100)
        echo Html::anchor('admin/equipe/create', 'Ajouter une nouvelle personne a l\'equipe', array('class' => 'btn btn-success')); ?>
</p>
