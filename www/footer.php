<?php include("const.php"); ?>
<div id="divFooter" class="footerArea">

    <div class="container">

        <div class="divPanel">

            <div class="row-fluid">
                <div class="span3" id="footerArea1">
                
                    <h3>Про підприемство</h3>

                    <p>Засновано відповідно до Законів України "Про місцеве самоврядування в Україні", "Про власність" та інших законодавчих актів України. ".</p>
                    
                    <p> 
                        <a href="contact.php" title="Terms of Use">Контакти</a><br />
                        <a href="about.php" title="Terms of Use">Про підприємство</a><br />
						<!--Прохання Саши 2014-12-10
                        <a href="#" title="Privacy Policy">График прийому</a>
						-->
                    </p>

                </div>
                <div class="span3" id="footerArea2">

                    <h3>Корисні посилання</h3> 
                    <p>
                        <a href="http://www.kmu.gov.ua/" title="" target="blank">Урядовий портал</a><br />
						<a href="http://www.nerc.gov.ua/" title="" target="blank">НКРЕКП</a><br />						
						<a href="http://www.minregion.gov.ua/" title="" target="blank">Міністерство регіонального розвитку</a><br />						
                        <span style="text-transform:none;">Офіційні веб-сайти Уряду</span>
                    </p>
                    <p>
                        <a href="http://www.berdychiv.com.ua/" title="" target="blank">Бердичівська міська рада</a><br />
                        <span style="text-transform:none;">Офіційний портал міста</span>
                    </p>
                </div>
                <div class="span3" id="footerArea3">

                    <h3>Для споживачів</h3> 
                    <p> 
						<a href="#" title=""><i class="general foundicon-phone icon"></i> Диспетчер (тільки в опалювальний період)<?php echo $K_TELDISP ?></a><br />
                        <a href="usersogl.php" title="">Угода з користувачем сайту</a><br />                        
						<a href="userdog.php" title="">Угода зi споживачем послуг</a><br />                        						
						<a href="http://<?php echo $A_VAHRAH ?>" target="_blank" title="">Сервіс "Ваш рахунок"</a>						
                    </p>

                </div>
                <div class="span3" id="footerArea4">

                    <h3>Контакти</h3>  
                                                               
                    <ul id="contact-info">
                    <li>                                    
                        <i class="general foundicon-phone icon"></i>
                        <span class="field">Приймальня:</span>
                        <br />
						<?php echo $K_TELEFON ?>                        
                    </li>
                    <li>
                        <i class="general foundicon-mail icon"></i>
                        <span class="field">Email:</span>
                        <br />
                        <a href="#<?php echo $A_EMAIL ?>" title="Email"><?php echo $A_EMAIL ?></a>
                    </li>
                    <li>
                        <i class="general foundicon-home icon" style="margin-bottom:50px"></i>
                        <span class="field">Адреса:</span>						
                        <br />
						13312 м.Бердичів <br />												
                        вул. Шевченка, 23<br />                        
                    </li>
                    </ul>

                </div>
            </div>

			<!-- Рішення адміністратора сайту 2014-12-10
            <br /><br />
            <div class="row-fluid">
                <div class="span12">
                    <p class="copyright">
                        Copyright © 2013 Your Company. All Rights Reserved.
                    </p>

                    <p class="social_bookmarks">
                        <a href="#"><i class="social foundicon-facebook"></i> Facebook</a>
						<a href=""><i class="social foundicon-twitter"></i> Twitter</a>
						<a href="#"><i class="social foundicon-pinterest"></i> Pinterest</a>
						<a href="#"><i class="social foundicon-rss"></i> Rss</a>
                    </p>
                </div>
            </div>
            <br />
			-->			

        </div>

    </div>
    
</div>

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-68573715-1', 'auto');
  ga('send', 'pageview');
</script>