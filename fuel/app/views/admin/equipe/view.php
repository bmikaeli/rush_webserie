<div class="col-md-6"><h1> <strong><?php echo $rush->prenom. " ". $rush->nom ."  ". $rush->age." ans";?></strong></h1></div>

<div class="col-md-7 news">
    <h2>
        <p>
            <strong>Biographie :</strong>
            <?= $rush->biographie; ?>
        </p>
         <p>
        <a  href=" <?= $rush->facebook; ?>" ><img src="http://a407.idata.over-blog.com/2/07/96/21/facebook_bouton.gif" ></a>

        </p>
    </h2>
</div>

<div class="pull-right col-md-5">
    <img class="col-md-7 picture" src="<?= isset($rush->picture) ? $rush->picture : "http://at-cdn-s01.audiotool.com/2013/05/11/users/guess_audiotool/avatar512x512-4e263bad6d0c46f2b12b82b614043589.jpg"; ?>"
</div>

</div>
<div class="col-md-12 pull-left">
    <?php if($current_user) echo Html::anchor('admin/equipe/edit/'.$rush->id, 'Edit'); ?>
    <?php if($current_user) echo Html::anchor('admin/equipe', 'Back'); ?>
</div>