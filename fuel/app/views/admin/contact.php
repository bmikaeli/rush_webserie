
<?php echo Form::open(array("class"=>" col-md-5 contact")); ?>

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
        <?php echo Form::label('Email', 'email', array('class'=>'control-label')); ?>

        <?php echo Form::input('email', Input::post('email', isset($rush) ? $rush->email : ''), array('class' => 'col-md-8 form-control', 'rows' => 8, 'placeholder'=>'email')); ?>

    </div>
    <div class="form-group">
        <?php echo Form::label('Message', 'message', array('class'=>'control-label')); ?>

        <?php echo Form::textarea('message', Input::post('message', isset($rush) ? $rush->message : ''), array('class' => 'col-md-8 form-control', 'rows' => 8, 'placeholder'=>'message')); ?>

    </div>
    <div class="form-group">
        <label class='control-label'>&nbsp;</label>
        <?php echo Form::submit('submit', 'Envoyer le message', array('class' => 'btn btn-primary col-md-12')); ?>		</div>
</fieldset>
<?php echo Form::close(); ?>


