<h2>Editing Rush</h2>
<br>

<?php echo render('news/_form'); ?>
<p>
    <?php echo Html::anchor('news/view/'.$rush->id, 'View'); ?> |
    <?php echo Html::anchor('news', 'Back'); ?>
</p>
