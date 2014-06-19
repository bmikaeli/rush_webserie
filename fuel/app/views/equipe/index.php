<div class="col-md-12">
    <?php if ($current_user && $current_user->group == 100)
        echo Html::anchor('equipe/create', 'Ajouter un membre', array('class' => 'btn btn-success col-md-12')); ?>
</div>

<?php if ($rushes): ?>

    <?php foreach ($rushes as $item): ?>
        <div class="col-md-3 equipe">
            <a href="/equipe/view/<?php echo $item->prenom;?>">
                <img class="picture img-responsive"  src="<?php $picture = "http://at-cdn-s01.audiotool.com/2013/05/11/users/guess_audiotool/avatar512x512-4e263bad6d0c46f2b12b82b614043589.jpg";
                echo (file_exists('assets/img/equipe/'.$item->prenom.'.jpg')) ? "assets/img/equipe/".$item->picture : $picture; ?> ">
                <h2>
                    <?php echo $item->prenom."  ".$item->nom; ; ?>
                </h2>
                <?php if ($current_user && $current_user->group == 100) echo Html::anchor('equipe/view/'.$item->prenom, 'View', array('class' => 'btn btn-primary')); ?>
                <?php if ($current_user && $current_user->group == 100) echo Html::anchor('equipe/edit/'.$item->id, 'Edit', array('class' => 'btn btn-warning'));; ?>
                <?php if ($current_user && $current_user->group == 100) echo Html::anchor('equipe/delete/'.$item->id, 'Delete', array('onclick' => "return confirm('Are you sure?')", 'class' => 'btn btn-danger')); ?>
            </a>
        </div>
    <?php endforeach; ?>

<?php else: ?>
    <p>No staff.</p>

<?php endif; ?>
