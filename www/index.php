<?php include("const.php"); ?>
<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <title><?php echo $T_OWNERNAME ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
	<META NAME="ROBOTS" CONTENT="NOINDEX, NOFOLLOW"> <!-- Remove this Robots Meta Tag, to allow indexing of site -->

    <link href="scripts/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="scripts/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
    <!-- Icons -->
    <link href="scripts/icons/general/stylesheets/general_foundicons.css" media="screen" rel="stylesheet" type="text/css" />
    <link href="scripts/icons/social/stylesheets/social_foundicons.css" media="screen" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="scripts/fontawesome/css/font-awesome.min.css">
    <!--<link href="scripts/carousel/style.css" rel="stylesheet" type="text/css" />-->

    <link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Palatino+Linotype" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet" type="text/css">

    <link href="styles/custom.css" rel="stylesheet" type="text/css" />
    <link href="styles/blink_me.css" rel="stylesheet" type="text/css" />
</head>

<body id="pageBody">
  <?php include("title_menu.php"); ?>
  <!-- Фото -->
  <div id="decorative1" style="position:relative">
    <div class="container">
      <div class="divPanel headerArea">
        <div class="row-fluid">
          <div class="span12">
            <div id="headerSeparator"></div>
              <div id="divHeaderText" class="page-content">
                <!--<div id="divHeaderLine1"><?php echo $J_SLOGAN1 ?></div><br />-->
                <!--<div id="divHeaderLine1" style="opacity:0.5;"><?php echo $J_SLOGAN1 ?></div><br />-->
                <!--<div id="divHeaderLine1" style="background: rgba(176, 42, 154,0.5); color: rgb(176, 42, 154);"><?php echo $J_SLOGAN1 ?></div><br />-->
                <!--<div id="divHeaderLine1" style="background: rgba(0, 170, 238,0.1); color: rgb(250, 250, 250);"><?php echo $J_SLOGAN1 ?></div><br />-->
                <!--<div id="divHeaderLine1" style="background: rgba(255, 255, 255,0.7); color: #000000;"><?php echo $J_SLOGAN1 ?></div><br />-->
                <!--<?php if ($J_SLOGAN2<>"") { echo '<div id="divHeaderLine2">'.$J_SLOGAN2.'</div><br />'; };?>-->
                <!-- <div id="divHeaderLine2"><?php echo $J_SLOGAN2 ?></div><br /> -->
                <!-- <div id="divHeaderLine3"><a class="btn btn-large btn-primary" href="#">Read More</a></div> -->
              </div>
            <div id="headerSeparator2"></div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!--Колонки-->
  <div class="container">
    <div class="divPanel page-content">
      <div class="span12" id="divMain">
				<div class="row-fluid">
          <!--Левая колонка -->
          <div class="span8"><?php  $lenta = 5; $typeLenta='main-left'; include("show_news.php"); ?></div>
          <!--Правая колонка -->
					<div class="span4">
            <?php  $lenta = 8; $typeLenta = 'main-right'; include("show_news.php"); ?>
            <div class="sidebox-fixed">
            <a href="//teplo.gov.ua" target="_blank">
              <img src="../images/teplogovua.png">
             </a> 
            </div>     
            <div class ="sidebox-fixed">
              <iframe width="335" height="235" src="https://www.youtube.com/embed/ySG21maeBnI" frameborder="0" gesture="media" allowfullscreen></iframe>
            </div>       
					</div>
        </div>
      </div>
    </div>
  </div>

  <?php include("footer.php") ?>

  <script src="scripts/jquery.min.js" type="text/javascript"></script>
  <script src="scripts/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
  <script src="scripts/default.js" type="text/javascript"></script>
  <!--<script src="scripts/carousel/jquery.carouFredSel-6.2.0-packed.js" type="text/javascript"></script><script type="text/javascript">$('#list_photos').carouFredSel({ responsive: true, width: '100%', scroll: 2, items: {width: 320,visible: {min: 2, max: 6}} });</script>-->

</body>
</html>
