<div class="col-md-4 contact" style="color: black; height: 600px; overflow: auto" >
<table class="table">
    <thead>
    <tr>
        <th>Pseudo</th>
        <th>Message</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($messages as $item): ?>
            <tr>
               <td><?= $item->sender; ?></td>
               <td><?= $item->message; ?></td>
            </tr>
    <?php endforeach; ?>
    <?php echo Form::open(array("class"=>"form-horizontal col-md-5", 'enctype' => 'multipart/form-data')); ?>
    <fieldset>
    <td><?php echo Form::input('sender', isset($login) ? $login : '', array('class' => 'col-md-4 form-control', 'placeholder'=>'Votre Login')); ?> </td>
    <td><?php echo Form::input('message', '', array('class' => 'col-md-4 form-control', 'placeholder'=>'Votre Login')); ?></td>
    <td><?php echo Form::submit('submit', 'Envoyer', array('class' => 'btn btn-primary col-md-12')); ?></div></td>

    </fieldset>
        <?php echo Form::close(); ?>
    </tbody>
</table>
</div>