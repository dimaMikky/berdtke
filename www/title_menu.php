<?php include("const.php"); ?>

<style type="text/css">
@media (max-width: 1200px) {        
    #divSiteTitle {font-size: 21px;}		// Чтобы не улетало меню
}
@media (max-width: 979px) {    
    #divHeaderLine1 {visibility: hidden;}	// Слоган1 на маленьких устройствах не показываем
	#divHeaderLine2 {visibility: hidden;}	// Слоган2 на маленьких устройствах не показываем
}	
</style>

<div id="decorative2">
    <div class="container">
        <div class="divPanel topArea notop nobottom">
            <div class="row-fluid">
                <div class="span12">

				<div id="divLogo" class="pull-left visible-desktop">					
					<a href="index.php" id="divSiteTitle"><?php echo $M_OWNERNAME1 ?></a><br />					
					<a href="index.php" id="divTagLine"><?php echo $M_OWNERNAME2 ?></a>
				</div>

				<div id="divMenuRight" class="pull-right">
				<div class="navbar">
					<button type="button" class="btn btn-navbar-highlight btn-large btn-primary" data-toggle="collapse" data-target=".nav-collapse">
					НАВІГАЦІЯ <span class="icon-chevron-down icon-white"></span>
					</button>
				<div class="nav-collapse collapse">
					<ul class="nav nav-pills ddmenu">
						<li class="dropdown active">
							<a href="#" class="dropdown-toggle"><?php echo $M_ITEM1 ?><b class="caret"></b></a> <!-- Інформація       -->
							<ul class="dropdown-menu">
								<li><a href="invest.php">Інвестпроект</a></li>
								<li><a href="publinf.php">Держзакупівлі</a></li>
								<li><a href="otheinf.php">Архів оголошень</a></li>
							</ul>							
						</li>		<!-- Інвестпроект -->
						<!--<li class="dropdown active"><a href="index.php"><?php echo $M_ITEM2 ?></a></li>-->	<!-- Новини       -->								
						<li class="dropdown active">
							<a href="#" class="dropdown-toggle"><?php echo $M_ITEM3 ?><b class="caret"></b></a> <!-- Тарифи       -->
							<ul class="dropdown-menu">
								<li><a href="tarifn.php">Населення</a></li>
								<li><a href="tarifp.php">Бюджет та інши споживачі</a></li>
							</ul>
						</li>								
						<li class="dropdown active"><a href="contact.php"><?php echo $M_ITEM4 ?></a></li>	<!-- Контакти  	  -->																								
						<li class="dropdown active"><a href="http://<?php echo $A_VAHRAH ?>" target="_blank"><?php echo $M_ITEM5 ?></a></li>	<!-- Ваш рахунок  -->
					</ul>
				</div>
				</div>
				</div>
				
                </div>
            </div>
        </div>
    </div>
</div>				

