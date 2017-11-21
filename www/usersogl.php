<?php include("const.php"); ?>
<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <title>Угода-<?php echo $T_OWNERNAME ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <link href="scripts/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="scripts/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- Icons -->
    <link href="scripts/icons/general/stylesheets/general_foundicons.css" media="screen" rel="stylesheet" type="text/css" />  
    <link href="scripts/icons/social/stylesheets/social_foundicons.css" media="screen" rel="stylesheet" type="text/css" />
    <!--[if lt IE 8]>
        <link href="scripts/icons/general/stylesheets/general_foundicons_ie7.css" media="screen" rel="stylesheet" type="text/css" />
        <link href="scripts/icons/social/stylesheets/social_foundicons_ie7.css" media="screen" rel="stylesheet" type="text/css" />
    <![endif]-->
    <link rel="stylesheet" href="scripts/fontawesome/css/font-awesome.min.css">
    <!--[if IE 7]>
        <link rel="stylesheet" href="scripts/fontawesome/css/font-awesome-ie7.min.css">
    <![endif]-->



    <link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Palatino+Linotype" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Abel" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet" type="text/css">

    <link href="styles/custom.css" rel="stylesheet" type="text/css" />
</head>
<body id="pageBody">

<?php include("title_menu.php"); ?>	

<div id="contentOuterSeparator"></div>

<div class="container">

    <div class="divPanel page-content">

        <div class="breadcrumbs">
                <a href="index.php">Головна</a> &nbsp;/&nbsp; <span>Угода з користувачем</span>
        </div> 

        <div class="row-fluid">
            <!--Edit Main Content Area here-->
                <div class="span12" id="divMain">

                    <h1>Угода</h1>
                    <hr>
					<!--<img src=images/sign.jpg width=50 height=200 hspace=10 vspace=10 align=left>-->
					
                    <h3 class="text-success">1. Загальні умови</h3>					
					<p>1.1. Використання сайту означає, що користувач приймає і зобов'язується дотримуватися всіх нижченаведених умов цієї Угоди.<br>
					   1.2. Ця Угода повністю або в будь-якій її частині може бути змінена власником ресурсу в будь-який час. Нова редакція Угоди вступає в силу з моменту її опублікування на сайті.</p>
								
                    <h3 class="text-success">2. Взаємодія з сайтом, реєстрація</h3>
					<p>2.1. Не допускаються підбір пароля, злом або інші дії з метою отримання доступу до чужих логінів і паролів сервісу <span class="maincolor">Ваш рахунок</span>.<br>
					   2.2. При використанні Сайту та інформації з Сайту заборонені наступні дії:<br>
					   -використовувати автоматизовані програми взаємодії з Сайтом і його сервісами;<br>
					   -використовувати Сайт будь-яким способом, який може перешкоджати нормальному функціонуванню Сайту і його сервісів;<br>
					   -використовувати посилання на сторінки Сайту або на сам Сайт в спам-розсилках (масова розсилка реклами без згоди одержувача).</p>
				
                    <h3 class="text-success">3. Умови використання матеріалів</h3>
					<p>3.1. Сайт містить матеріали, товарні знаки та інші охоронювані законом матеріали, втому числі тексти, фотографії, відеоматеріали, графічні зображення, аудіофайли.<br>
					   3.2. Усі права на використання змісту сайту, крім випадків, зазначених у змісті опублікованих на сайті матеріалів, належать <span class="maincolor"><?php echo $T_OWNERNAME ?></span>.<br>
					   3.3. Користувач може завантажувати («скачувати») з сайту матеріали тільки для особистого використання.<br>
					   3.4. Дозволено використання інформації засобами масової інформації за умови дотримання умов цієї Угоди а також умов, які передбачені на сторінках, де розміщений контент. При цьому посилання на <span class="maincolor"><?php echo $T_OWNERNAME ?></span>, а для інтернет ЗМІ – гіперпосилання на <span class="maincolor">www.<?php echo $A_SITE ?></span> обов'язкове.</p>					
                </div>
            <!--End Main Content Area-->
            </div>

        <div id="footerInnerSeparator"></div>
    </div>

</div>

<div id="footerOuterSeparator"></div>

<?php include("footer.php") ?>

<script src="scripts/jquery.min.js" type="text/javascript"></script> 
<script src="scripts/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="scripts/default.js" type="text/javascript"></script>

</body>
</html>

