<?php echo Form::open(array("class"=>"form-horizontal col-md-5", 'enctype' => 'multipart/form-data')); ?>

	<fieldset>
		<div class="form-group">
			<?php echo Form::label('name', 'name', array('class'=>'control-label')); ?>

				<?php echo Form::input('name', Input::post('name', isset($rush) ? $rush->name : ''), array('class' => 'col-md-8 form-control', 'rows' => 8, 'placeholder'=>'Name')); ?>
		</div>

		<div class="form-group">
            <?php echo Form::label('Image', '', array('class'=>'control-label')); ?>
				<?php echo Form::file('filename' , array('class' => 'col-md-8 form-control btn btn-primary', 'rows' => 8)); ?>
		</div>

		<div class="form-group">
			<label class='control-label'>&nbsp;</label>
			<?php echo Form::submit('submit', 'Save', array('class' => 'btn btn-primary')); ?>		</div>
	</fieldset>
<?php echo Form::close(); ?>