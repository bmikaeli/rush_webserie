<div class="col-md-6"><h1> <strong><?php echo $rush->prenom. " ". $rush->nom ."  ". $rush->age." ans";?></strong></h1></div>

<div class="col-md-7 news">
    <h2>
        <p>
            <strong>Biographie :</strong><br>
            <h4><?= $rush->biographie; ?></h4>
        </p>
        <p>
            <a  href="<?= $rush->facebook; ?>" ><img src="http://a407.idata.over-blog.com/2/07/96/21/facebook_bouton.gif" ></a>
        </p>
    </h2>
</div>

<div class="pull-right col-md-5">
    <img class="col-sm-12 picture" width="100%" src="<?php $picture = "http://at-cdn-s01.audiotool.com/2013/05/11/users/guess_audiotool/avatar512x512-4e263bad6d0c46f2b12b82b614043589.jpg";
    echo (file_exists('assets/img/equipe/'.$rush->prenom.'.jpg')) ? "/assets/img/equipe/".$rush->picture.".jpg" : $picture; ?>">
</div>

</div>
<div class="col-md-12 pull-left">
    <?php if($current_user) echo Html::anchor('equipe/edit/'.$rush->id, 'Edit'); ?>
    <?php if($current_user) echo Html::anchor('equipe', 'Back'); ?>
</div>