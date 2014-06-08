<h2>Editing Member</h2>
<br>

<?php echo render('equipe/_form'); ?>

<div class="col-md-5"><p>
        <?php echo Html::anchor('equipe/view/'.$rush->id, 'View', array('class' => 'btn btn-primary')); ?>
        <?php echo Html::anchor('equipe', 'Back', array('class' => 'btn btn-primary')); ?>
    </p></div>

<div class="col-md-8 btn btn-danger"><a href="/equipe/photodel/<?= $rush->id; ?>">Supprimer la photo
</div>