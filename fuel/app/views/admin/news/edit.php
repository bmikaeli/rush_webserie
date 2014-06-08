<h2>Editing Rush</h2>
<br>

<?php echo render('admin/news/_form'); ?>
<p>
    <?php echo Html::anchor('admin/news/view/'.$rush->id, 'View'); ?> |
    <?php echo Html::anchor('admin/news', 'Back'); ?></p>
