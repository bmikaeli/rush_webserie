<h2>Viewing #<?php echo $rush->id; ?></h2>

<p>
	<strong>Title:</strong>
	<?php echo $rush->title; ?></p>
<p>
	<strong>Body:</strong>
	<?php echo $rush->body; ?></p>


<?php echo Html::anchor('news/edit/'.$rush->id, 'Edit'); ?> |
<?php echo Html::anchor('news', 'Back'); ?>