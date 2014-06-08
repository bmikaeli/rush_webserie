<?php echo Form::open(array("class"=>"form-horizontal col-md-4")); ?>

    <fieldset>
        <div class="form-group">
            <?php echo Form::label('Nom', 'nom', array('class'=>'control-label')); ?>

            <?php echo Form::input('nom', Input::post('nom', isset($rush) ? $rush->nom : ''), array('class' => 'col-md-1 form-control', 'placeholder'=>'Nom')); ?>

        </div>
        <div class="form-group">
            <?php echo Form::label('Prenom', 'prenom', array('class'=>'control-label')); ?>

            <?php echo Form::input('prenom', Input::post('prenom', isset($rush) ? $rush->prenom : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'prenom')); ?>

        </div>
        <div class="form-group">
            <?php echo Form::label('Age', 'age', array('class'=>'control-label')); ?>

            <?php echo Form::input('age', Input::post('age', isset($rush) ? $rush->age : ''), array('class' => 'col-md-8 form-control', 'rows' => 8, 'placeholder'=>'Age')); ?>

        </div>
        <div class="form-group">
            <?php echo Form::label('Biogrpahie', 'biographie', array('class'=>'control-label')); ?>

            <?php echo Form::textarea('biographie', Input::post('biographie', isset($rush) ? $rush->biographie : ''), array('class' => 'col-md-8 form-control', 'rows' => 8, 'placeholder'=>'biographie')); ?>

        </div>
        <div class="form-group">
            <?php echo Form::label('facebook', 'facebook', array('class'=>'control-label')); ?>

            <?php echo Form::input('facebook', Input::post('facebook', isset($rush) ? $rush->facebook : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'facebook')); ?>

        </div>
        <div class="form-group">
            <?php echo Form::label('picture', 'picture', array('class'=>'control-label')); ?>

            <?php echo Form::input('picture', Input::post('picture', isset($rush) ? $rush->picture : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'picture')); ?>

        </div>
        <div class="form-group">
            <label class='control-label'>&nbsp;</label>
            <?php echo Form::submit('submit', 'Save', array('class' => 'btn btn-primary')); ?>		</div>
    </fieldset>
<?php echo Form::close(); ?>