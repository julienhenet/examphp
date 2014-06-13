

<!DOCTYPE html>
<!--[if lt IE 7 ]> <html class="ie ie6 no-js" lang="en"> <![endif]-->
<!--[if IE 7 ]>    <html class="ie ie7 no-js" lang="en"> <![endif]-->
<!--[if IE 8 ]>    <html class="ie ie8 no-js" lang="en"> <![endif]-->
<!--[if IE 9 ]>    <html class="ie ie9 no-js" lang="en"> <![endif]-->
<!--[if gt IE 9]><!--><html class="no-js" lang="en"><!--<![endif]-->
    <head>
        <meta charset="UTF-8" />
<!--         <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">  -->
        <title>WEASR | Connecte toi</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/> 
        <meta name="description" content="Fullscreen Background Image Slideshow with CSS3 - A Css-only fullscreen background image slideshow" />
        <meta name="keywords" content="css3, css-only, fullscreen, background, slideshow, images, content" />
        <meta name="author" content="Codrops" />
        <link rel="icon" type="image/png" href="../images/fav.png"/> 
        <link rel="stylesheet" type="text/css" href="css/style6.css" />
        <link rel="stylesheet" type="text/css" href="../css/style.css" />
        <link rel="stylesheet" type="text/css" href="css/global.css" />
        <link rel="stylesheet" type="text/css" href="css/reset.css" />
        <link rel="stylesheet" type="text/css" href="../font/font.css" />
        <link rel="stylesheet" type="text/css" href="css/slideshow.css" />
        <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
        <script type="text/javascript">

			
			
			
			
			//SELECT
			
			$(document).ready(function(){
			
			 $(".select").click(function(){
			    if ($(this).hasClass('on')) {
			            $(this).removeClass('on').addClass('off');
			            $('.content_anonymous').removeClass('content_on').addClass('content_off');
			            $('li').removeClass('li_on').addClass('li_off');
			             
			        } else{
			            $(this).addClass('on').removeClass('off');
			            $('.content_anonymous').removeClass('content_off').addClass('content_on');
			            $('li').removeClass('li_off').addClass('li_on');
			        }
			  });
			   
			  
			});
			
			$(document).ready(function(){
			
			 $(".nav_botton").click(function(){
			    if ($(this).hasClass('on')) {
			            $(this).removeClass('on').addClass('off');
			            $('.content_anonymous').removeClass('content_on').addClass('content_off');
			            $('nav').removeClass('nav_on').addClass('nav_off');
			             
			        } else{
			            $(this).addClass('on').removeClass('off');
			            $('.content_anonymous').removeClass('content_off').addClass('content_on');
			            $('nav').removeClass('nav_off').addClass('nav_on');
			        }
			  });
			  });
			
		
	 </script>
    </head>
    <body>
    <header>
			<nav class="nav_on">
				<div id="panier">
				<div class="nav_botton on navright">   
					<a href="#">
			      		<img src="../img/minibox.png" alt="MA BOX" />
			      		<p>MA BOX (3)</p>
		      		</a> 
	            </div>
	            <h3>Article(s) dans ma box</h3>
				<ul>
					<li><a href="#"><img src="../img/vedettes/t-shirt01.jpg" alt="T-shirt 01" /></a></li>
		    		<li><a href="#"><img src="../img/vedettes/t-shirt02.jpg" alt="T-shirt 02" /></a></li>
		    		<li><a href="#"><img src="../img/minicustombox.png" alt="T-shirt 02" /></a></li>
				</ul>
				<a href="resume.html" class="btnnav">Commander</a>
				</div>
			</nav>
		</header>    	
      	
      	<nav>
	      	<div id="contentnav">
	      		<div class="navleft">
			      	<h1><a href="../index.html"><img src="../img/logo.png" alt="Weasr" /></a></h1>
			      	<ul>
			      		<li><a href="../shop/index.html">SHOP</a></li>
			      		<li><a href="../lookbook/index.html">LOOKBOOK</a></li>
			      		<li><a href="../selfies/index.html">SELFIES</a></li>
			      	</ul>
	      		</div>
	      	</div>
      	</nav>
      	
      	
      	<ul class="cover">
            <li class="shop"><span>Image 01</span></li>
        </ul>
        
        
        
        <div id="container">
        
   
	        <p style="margin-top: 50px; margin-bottom: 50px;">
	        	<?php
				require_once("functions/functions.php");
				$email = $_POST['email']; // on recoit l'adresse mail
				
				
				if(empty($email)){
					$error = "Indique ton e-Mail.";
					reply(1, $error);
					die();
				}
				if (!preg_match('/^[a-z0-9]+([_\.-][a-z0-9]+)*@([a-z0-9]+([.-][a-z0-9]+)*)+\.[a-z]{2,}$/i', $email)) { // vérifier si le mail est valide
						$error = "e-Mail invalide";	 // message si ce n'est pas le cas
						reply(1, $error); // signaler qu'il y a erreur
						die(); // arreter le script
				}
				
				if( add_email_to_database($email) ){ //on ajoute le mail dans la DB
					reply(0, "Merci, tu es bien inscrit ! Vérifie tes mails pour la confirmation :-)"); // Si pas d'erreur
				}else{
					reply(1, "Tu es deja inscrit!"); // Sinon, c'est que l'email est déjà utilisé
				};
				
				?>
   
	        </p>
        		
      	</div>
      	
      	
        
				
				
				
				
				
				
				
	<footer id="footer">
      		<div id="minicontainer">
      			<section class="colonne">
						<h3>Suivez-nous</h3>
					<ul class="social">
						<li><a target="_blank" href="https://www.facebook.com/weasrbox"><img src="../img/facebook.png" alt="Facebook" /></a></li>
						<li><a target="_blank" href="https://twitter.com/weasrbox"><img src="../img/twitter.png" alt="Twitter" /></a></li>
						<li><a target="_blank" href="http://instagram.com/weasrbox"><img src="../img/insta.png" alt="Instagram" /></a></li>
						<li><a target="_blank" href="http://www.pinterest.com/weasrbox/"><img src="../img/pinterest.png" alt="Pinterst" /></a></li>
					</ul>
				</section>
				
      			<section class="colonne">
						<h3>Infos boutique</h3>
					<ul>
						<li><a href="#">Service après-vente</a></li>
						<li><a href="#">Paiement sécurisé</a></li>
						<li><a href="#">Livraisons</a></li>
						<li><a href="#">Retours</a></li>
					</ul>
				</section>
				
				<section class="colonne">
						<h3>En savoir plus</h3>
					<ul>
						<li><a href="#">Confidentialité</a></li>
						<li><a href="#">Mentions légales</a></li>
						<li><a href="#">Conditions générales</a></li>
						<li><a href="#">Contactez-nous</a></li>
					</ul>
				</section>
      		</div>
      		<div id="copyright">
	      		<p>&copy; 2014, weasr.com Tous droits résevés &hearts;</p>
      		</div>
      	</footer>
      	
      	
      	
      	
 
      	
  
        	
        
    </body>
</html>