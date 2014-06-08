<?php echo Form::open(array("class"=>"form-horizontal", 'enctype' => 'multipart/form-data')); ?>

    <fieldset>
        <div class="form-group">
            <?php echo Form::label('Title', 'title', array('class'=>'control-label')); ?>

            <?php echo Form::input('title', Input::post('title', isset($rush) ? $rush->title : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Title')); ?>

        </div>
        <div class="form-group">
            <?php echo Form::label('Body', 'body', array('class'=>'control-label')); ?>

            <?php echo Form::textarea('body', Input::post('body', isset($rush) ? $rush->body : ''), array('class' => 'col-md-8 form-control', 'rows' => 8, 'placeholder'=>'Body')); ?>
        </div>

        <div class="form-group">
            <?php echo Form::label('(Optionnel) Ajouter une image a l\'article', '', array('class'=>'control-label')); ?>
            <?php echo Form::file('filename' , array('class' => 'col-md-8 form-control', 'rows' => 8)); ?>
        </div>


        <div class="form-group">
            <label class='control-label'>&nbsp;</label>
            <?php echo Form::submit('submit', 'Save', array('class' => 'btn btn-primary')); ?>		</div>
    </fieldset>
<?php echo Form::close(); ?>
