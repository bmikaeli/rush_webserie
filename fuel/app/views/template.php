<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title><?php echo $title; ?></title>
    <?php echo Asset::css(array(
        'bootstrap.css',
        'class.css',
    )); ?>
    <link rel="icon" type="image/png" href="/assets/img/favicon/favicon.png" />
    <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Aldrich' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Fugaz+One' rel='stylesheet' type='text/css'>


    <style>

        body {
            margin: 50px;
            background-color: grey;
            color: white;
            background-size: 100%;
            background-image: url('/assets/img/background/background.jpg');
        }
    </style>
    <?php echo Asset::js(array(
        'http://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js',
        'bootstrap.js'
    )); ?>

</head>

<body>
<script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
    ga('create', 'UA-XXXXXX-XX', 'example.com');
    ga('require', 'displayfeatures');
    ga('send', 'pageview');

    $(function(){ $('.topbar').dropdown(); });

    (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.0";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
    var _qevents = _qevents || [];

    (function() {
        var elem = document.createElement('script');
        elem.src = (document.location.protocol == "https:" ? "https://secure" : "http://edge") + ".quantserve.com/quant.js";
        elem.async = true;
        elem.type = "text/javascript";
        var scpt = document.getElementsByTagName('script')[0];
        scpt.parentNode.insertBefore(elem, scpt);
    })();

    _qevents.push({
        qacct:"p-N6TSTBG99McgV"
    });
</script>
<div id="fb-root"></div>
<div class="navbar navbar-inverse navbar-fixed-top">

    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand header_buttun" href=""><i class="fa fa-film fa-1x"></i> Rush</a>
        </div>
        <div class="navbar-collapse collapse ">
            <ul class="nav navbar-nav header_buttun">
                <li class="  <?php echo Uri::segment(1) == 'news' ? 'active' : '' ?>">
                    <?php echo Html::anchor('news', "<i class=\"fa fa-list-ul 1px\"></i> News") ?>
                </li>
                <li class="<?php echo Uri::segment(1) == 'episodes' ? 'active' : '' ?>">
                    <?php echo Html::anchor('episodes', "<i class=\"fa fa-film 1px\"></i> Episodes") ?>
                </li>
                <li class="<?php echo Uri::segment(1) == 'equipe' ? 'active' : '' ?>">
                    <?php echo Html::anchor('equipe', "<i class=\"fa fa-users 1px\"></i> Equipe") ?>
                </li>
                <li class="<?php echo Uri::segment(1) == 'photos' ? 'active' : '' ?>">
                    <?php echo Html::anchor('photos', "<i class=\"fa fa-camera 1px\"></i> Photos") ?>
                </li>
                <li class="<?php echo Uri::segment(1) == 'contact' ? 'active' : '' ?>">
                    <?php echo Html::anchor('contact', "<i class=\"fa fa-envelope 1px\"></i> Contact") ?>
                </li>
                <li class="<?php echo Uri::segment(1) == 'autres' ? 'active' : '' ?>">
                    <?php echo Html::anchor('autres', "<i class=\"fa fa-beer 1px\"></i> Autres") ?>
                </li>
                <?php if ($current_user) { ?>
                    <li class="<?php echo Uri::segment(1) == 'admin' ? 'active' : '' ?>">
                        <?php echo Html::anchor('admin', "<i class=\"fa fa-gear 1px\"></i> Admin") ?>
                    </li>
                <?php } ?>

            </ul>
            <ul class="nav navbar-nav pull-right">
                <li class="dropdown">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#"><?php echo $current_user ? $current_user->username : 'Admin' ?> <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><?php if (!$current_user)  echo Html::anchor('admin/login', "<i class=\"fa fa-eject 1px\"></i> Login") ?></li>
                        <li><?php if ($current_user) echo Html::anchor('admin/logout', "<i class=\"fa fa-eject 1px\"></i> Logout") ?></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1><?php echo $title; ?></h1>
            <hr>
            <?php if (Session::get_flash('success')): ?>
                <div class="alert alert-success alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <p>
                        <?php echo implode('</p><p>', (array) Session::get_flash('success')); ?>
                    </p>
                </div>
            <?php endif; ?>
            <?php if (Session::get_flash('error')): ?>
                <div class="alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <p>
                        <?php echo implode('</p><p>', (array) Session::get_flash('error')); ?>
                    </p>
                </div>
            <?php endif; ?>
        </div>
        <div class="col-md-12" >
            <?php echo $content; ?>
        </div>
    </div>
    <hr/>
    <footer>
        <p class="pull-right"><a href="http://baptiste-mikaelian.fr">Baptiste Mikaelian</a></p>
        <p>
            Les isolants  & Barjoe production 2008-<?php echo Date::forge(time())->format("%Y"); ?>
        </p>
    </footer>
</div>
</body>
</html>
