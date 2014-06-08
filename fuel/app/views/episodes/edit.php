<h2>Editing episode</h2>
<br>

<?php echo render('episodes/_form'); ?>
<p>
    <?php echo Html::anchor('episodes/view/'.$rush->id, 'View'); ?> |
    <?php echo Html::anchor('episodes', 'Back'); ?></p>
