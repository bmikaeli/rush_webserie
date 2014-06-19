<div class="clearfix"></div>
<div class="row news">
    <br>
    <div class="col-md-12 col-sm-12">
        <iframe class="col-md-12 col-sm-12" height="500" src="//www.youtube.com/embed/<?php echo substr($rush->youtube, 32, 30); ?> "frameborder="0" allowfullscreen></iframe>
    </div>
    <div class="col-md-12 col-sm-12">

        <div class="col-md-2 col-sm-2 pull-left">
            <?php if($tmp = Model_Episodes::find($rush->id - 1)): ?>
                <a href="/episodes/view/<?= $rush->id - 1; ?>">
                    <i class="fa fa-4x fa-angle-left "></i> Video Precedente : <?= $tmp->title; ?>
                </a>
            <?php endif; ?>
        </div>

        <div class="col-md-8 col-sm-8"></div>

        <div class="col-md-2 col-sm-2 pull-right">
            <?php if($tmp =  Model_Episodes::find($rush->id + 1)): ?>
                <a href="/episodes/view/<?= $rush->id + 1; ?>">
                    <i class="fa fa-4x fa-angle-right "></i> Video Suivante : <?= $tmp->title; ?>
                </a>
            <?php endif; ?>
        </div>
    </div>

    <div class="col-md-12 col-sm-12">
        <div class="fb-comments col-md-5 col-sm-12" width="100%" data-href="<?php echo $rush->youtube; ?>" data-numposts="20" data-colorscheme="light"></div>
        <div class="fb-like col-md-5 col-sm-12"  width="100%"  data-href="<?php echo $rush->youtube; ?>" data-layout="standard" data-action="like" data-show-faces="true" data-share="true"></div>
    </div>
</div>
