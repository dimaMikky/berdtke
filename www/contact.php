<?php include("const.php"); ?>
<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <title>Контакти-<?php echo $T_OWNERNAME ?></title>
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
	<script src="email/validation.js" type="text/javascript"></script>	
</head>
<body id="pageBody">

<?php include("title_menu.php"); ?>		

<div id="contentOuterSeparator"></div>

<div class="container">

    <div class="divPanel page-content">

        <div class="breadcrumbs">
			<a href="index.php">Головна</a> &nbsp;/&nbsp; <span>Контакти</span>
        </div> 

        <div class="row-fluid">				
		
			<!--Edit Sidebar Content here-->	
                <div class="span4 sidebar">

                    <div class="sidebox">
                        <h3 class="sidebox-title">Контакти</h3>
                    <p>
                        <address><strong><?php echo $T_OWNERNAME ?></strong><br />
						13312 м.Бердичів<br />
                        вул. Шевченко, 23<br />                        
                        <!-- <abbr title="Phone">Тел:</abbr> <?php echo $K_TELEFON ?></address> -->
                        <address>  <strong>Email</strong><br />
                        <a href="#<?php echo $A_EMAIL ?>"><?php echo $A_EMAIL ?></a></address>  
                    </p>     
                     
					 <!-- Start Side Categories -->
					<h4 class="sidebox-title">Телефони</h4>
					<ul>
					<li><a href="#"><?php echo $K_TELDISP ?> - Диспетчер (в опалювальний період)</a></li>							
					<hr style="background-color:rgb(176, 42, 154);height:1px;">
					<li><a href="#"><?php echo $K_TELEFON ?> - Приймальня</a></li>							
					<li><a href="#">(04143)&nbsp;4-23-96 - Головний інженер</a></li>
					<li><a href="#">(04143)&nbsp;4-23-56 - Головний бухгалтер</a></li>
					<li><a href="#">(04143)&nbsp;2-03-77 - Бухгалтерія</a></li>
					<li><a href="#">(04143)&nbsp;2-51-99 - Планово-економічний відділ</a></li>
					<li><a href="#">(04143)&nbsp;4-23-54 - Виробничий відділ </a></li>					
					<li><a href="#">(04143)&nbsp;2-13-04 - Відділ маркетінгу (збуту)</a></li>
					<li><a href="#">(04143)&nbsp;2-71-49 - Юридична служба</a></li>					
					<li><a href="#">(04143)&nbsp;2-11-65 - Абонентська група</a></li>
					<li><a href="#">(04143)&nbsp;4-31-54</a></li>		  		  
					</ul>				
					<!-- End Side Categories -->
                    					
                    </div>
					
					
                    
                </div>
			<!--/End Sidebar Content-->

                <div class="span8" id="divMain">	
					<div class="sidebox">
					<!--
					<script type="text/javascript" charset="utf-8" src="//api-maps.yandex.ru/services/constructor/1.0/js/?sid=UuKxisdsLqziVUO0UzTlGtAu22wC88K1&width=600&height=450"></script>									
					-->
					<iframe src="https://www.google.com/maps/embed?pb=!1m27!1m12!1m3!1d10281.383602439604!2d28.58815573853893!3d49.89230901881726!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m12!3e0!4m4!1s0x0%3A0x4dd51ce7efa13f22!3m2!1d49.8892363!2d28.6139327!4m5!1s0x472cf978d867e3dd%3A0x755ffc56d5e94950!2z0KjQtdCy0YfQtdC90LrQsCDQstGD0LvQuNGG0Y8sIDIzLCDQkdC10YDQtNC40YfRltCyLCDQltC40YLQvtC80LjRgNGB0YzQutCwINC-0LHQu9Cw0YHRgtGM!3m2!1d49.898326499999996!2d28.584370999999997!5e0!3m2!1sru!2sua!4v1499577027635" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
					</div>
                </div>				
			
				
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