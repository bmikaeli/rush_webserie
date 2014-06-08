<?php echo Form::open(array("class"=>"form-horizontal")); ?>

	<fieldset>

		<div class="form-group">
			<?php echo Form::label('Title', 'title', array('class'=>'control-label')); ?>
			<?php echo Form::input('title', Input::post('title', isset($rush) ? $rush->title : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Title')); ?>
		</div>

		<div class="form-group">
			<?php echo Form::label('Youtube', 'youtube', array('class'=>'control-label')); ?>
			<?php echo Form::input('youtube', Input::post('youtube', isset($rush) ? $rush->youtube : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'lien Youtube')); ?>
		</div>

		<div class="form-group">
			<label class='control-label'>&nbsp;</label>
			<?php echo Form::submit('submit', 'Save', array('class' => 'btn btn-primary')); ?>
        </div>

	</fieldset>
<?php echo Form::close(); ?>