<?php echo Form::open(array("class"=>"form-horizontal", 'enctype' => 'multipart/form-data')); ?>

    <fieldset>
        <div class="form-group col-md-12 ">
            <?php echo Form::file('filename'); ?>
        </div>

        <div class="form-group">
            <label class='control-label'>&nbsp;</label>
            <?php echo Form::submit('submit', 'Save', array('class' => 'btn btn-primary col-md-3')); ?>
        </div>
    </fieldset>
<?php echo Form::close(); ?>