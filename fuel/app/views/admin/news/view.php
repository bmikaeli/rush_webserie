<h2>Viewing #<?php echo $rush->id; ?></h2>

<p>
	<strong>Title:</strong>
	<?php echo $rush->title; ?></p>
<p>
	<strong>Slug:</strong>
	<?php echo $rush->slug; ?></p>
<p>
	<strong>Summary:</strong>
	<?php echo $rush->summary; ?></p>
<p>
	<strong>Body:</strong>
	<?php echo $rush->body; ?></p>
<p>
	<strong>User id:</strong>
	<?php echo $rush->user_id; ?></p>

<?php echo Html::anchor('admin/news/edit/'.$rush->id, 'Edit'); ?> |
<?php echo Html::anchor('admin/news', 'Back'); ?>