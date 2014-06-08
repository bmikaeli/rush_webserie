<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title><?php echo $title; ?></title>
	<?php echo Asset::css('bootstrap.css'); ?>
	<?php echo Asset::css('class.css'); ?>
    <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Aldrich' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Fugaz+One' rel='stylesheet' type='text/css'>


    <style>

		body {
            margin: 50px;
            background-size: cover;
            background-size: auto;
            /*background-repeat: no-repeat;*/
            /*background-image: url('https://fbcdn-sphotos-f-a.akamaihd.net/hphotos-ak-frc1/t31.0-8/903473_10200929852718220_720418451_o.jpg');*/
            background-image: url('http://www.allfons.ru/pic/201201/1920x1080/allfons.ru-4196.jpg');

        }
	</style>
	<?php echo Asset::js(array(
		'http://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js',
		'bootstrap.js'
	)); ?>
	<script>
		$(function(){ $('.topbar').dropdown(); });
	</script>
    <div id="fb-root"></div>
    <script>(function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s); js.id = id;
            js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.0";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));</script>
</head>
<body>
<!--	--><?php //if ($current_user): ?>
	<div class="navbar navbar-inverse navbar-fixed-top">

        <div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="/admin"><i class="fa fa-film fa-1x"></i> Rush - Webserie</a>
			</div>
			<div class="navbar-collapse collapse ">
				<ul class="nav navbar-nav header_buttun">
                    <li class="  <?php echo Uri::segment(2) == 'news' ? 'active' : '' ?>">
                        <?php echo Html::anchor('admin/news', "<i class=\"fa fa-list-ul 1px\"></i> News") ?>
                    </li>
                    <li class="<?php echo Uri::segment(2) == 'episodes' ? 'active' : '' ?>">
                        <?php echo Html::anchor('admin/episodes', "<i class=\"fa fa-film 1px\"></i> Episodes") ?>
                    </li>
                    <li class="<?php echo Uri::segment(2) == 'equipe' ? 'active' : '' ?>">
                        <?php echo Html::anchor('admin/equipe', "<i class=\"fa fa-users 1px\"></i> Equipe") ?>
                    </li>
                    <li class="<?php echo Uri::segment(2) == 'contact' ? 'active' : '' ?>">
                        <?php echo Html::anchor('admin/contact', "<i class=\"fa fa-envelope 1px\"></i> Contact") ?>
                    </li>
					<li class="<?php echo Uri::segment(2) == 'autres' ? 'active' : '' ?>">
                        <?php echo Html::anchor('admin/autres', "<i class=\"fa fa-beer 1px\"></i> Autres") ?>
                    </li>
<!--					--><?php
//
//						$files = new GlobIterator(APPPATH.'classes/controller/admin/*.php');
//						foreach($files as $file)
//						{
//							$section_segment = $file->getBasename('.php');
//							$section_title = Inflector::humanize($section_segment);
//							?>
<!--							<li class="--><?php //echo Uri::segment(2) == $section_segment ? 'active' : '' ?><!--">-->
<!--                            --><?php //echo Html::anchor('admin/'.$section_segment, "<i class=\"fa fa-film 1px\"></i> ".$section_title) ?>
<!--                        </li>-->
<!--							--><?php
//						}
////					?>
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
<!--	--><?php //endif; ?>
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
