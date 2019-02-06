<!DOCTYPE html>
<!--[if lt IE 7]><html lang="ru" class="lt-ie9 lt-ie8 lt-ie7"><![endif]-->
<!--[if IE 7]><html lang="ru" class="lt-ie9 lt-ie8"><![endif]-->
<!--[if IE 8]><html lang="ru" class="lt-ie9"><![endif]-->
<!--[if gt IE 8]><!-->
<html lang="ru">
<!--<![endif]-->
<head>
	<meta charset="utf-8" />
	<title>Облік військовослужбовців</title>
	<meta name="description" content="службовий сайт" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link rel="shortcut icon" href="favicon.png" />
	<link rel="stylesheet" href="libs/bootstrap/bootstrap-grid-3.3.1.min.css" />
	<link rel="stylesheet" href="libs/font-awesome-4.7.0/css/font-awesome.min.css" />
	<link rel="stylesheet" href="libs/fancybox/jquery.fancybox.css" />
	<link rel="stylesheet" href="libs/owl-carousel/owl.carousel.css" />
	<link rel="stylesheet" href="libs/countdown/jquery.countdown.css" />
	<link rel="stylesheet" href="css/fonts.css" />
	<link rel="stylesheet" href="css/main.css" />
	<link rel="stylesheet" href="css/media.css" />
</head>
<body>
	<header class="top_header">
		<div class="header_topline ">
			<div class="container">
				<div class="col-md-12 grey_1">
					<div class="row">
						<div class="telef"><i class="fa fa-phone" aria-hidden="true"></i>
							+3800-800-40-37
						</div>
						<div class="simbol"><i class="fa fa-map-marker" aria-hidden="true"></i>
							м.Київ
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="container ">
		<div class="col-md-12 grey_1">
			<div class="row">
				<nav class="main_meny  "><button class="mobile_button hidden-md hidden-lg"><i class="fa fa-bars" aria-hidden="true"></i></button>
					<ul>
						<li>
							<a href="#">Довідкова інформація</a>
						</li>
						<li><a href="#">Довідкова інформація</a></li>
						<li><a href="#">Довідкова інформація</a></li>
						<li><a href="#">Довідкова інформація</a></li>
					</ul>

				</nav>
				<div class="logo">
					<i class="fa fa-free-code-camp" aria-hidden="true"></i>	
				</div>
			</header>
			<div  class="container">
				<div class="col-md-12">
					<div class="row">
						<div class="slider_container">
							<div class="next_button"><i class="fa fa-angle-right" aria-hidden="true"></i></div>
							<div class="prev_button"><i class="fa fa-angle-left" aria-hidden="true"></i></div>
							<div class="Carousel">
								<div class="slade_item"><img src="img/vision_12.jpg" alt></div>
								<div class="slade_item"><img src="img/vision_13.jpg" alt></div>
								<div class="slade_item"><img src="img/vision_14.jpg" alt></div>	
								<div class="slade_item"><img src="img/vision_11.jpg" alt></div>
							</div>	
						</div>
					</div>	
				</div>
			</div>
		</div>
	</div>

	<div class="container" id="grey_2">
		<div class="col-md-12 grey_1"  >
			<div class="row">
				<form id="callback_1" class="pop_form"  method="post" action="index.php">
					<div >
						<h3>Зареєструватися</h3>
						<div class="form_div">
							<input type="text" name="name" placeholder="Ваш логін" required="" >
							<input type="password" name="phone" placeholder="Ваш пароль">
							<button class="button_s" type="submit">Реєстрація</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="col-md-12">
			<div class="row">
				<div>
					
						<h3 class="like_botom">Зареєструватися</h3>
						<?php
						if (isset($_POST)) {
							$name = $_POST['name'];
							$phone = $_POST['phone'];
							unset($_POST['name']);
							unset($_POST['phone']);
							echo "<pre>";

						}

						?>
					
				</div>
				<script>var under_meny = document.querySelectorAll('.like_botom');
               console.log(under_meny)</script>
			</form>

		</div>
	</div>
</div>


<div class="pro_nas">
	<div class="container">
		<div class="row">
			<div class="col-md-8">
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Provident, laudantium rerum autem, quod deserunt sapiente consequatur quasi dignissimos, eius necessitatibus id magni inventore fuga doloremque praesentium nobis asperiores ducimus nostrum.</p>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima deleniti nisi deserunt in laborum, tenetur, fugit. Provident totam laborum quos porro libero deleniti, culpa vel excepturi odio, recusandae at a.</p>
			</div>
			<div class="col-md-4">
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Hic iste iusto commodi eos expedita, rerum, aliquid quas quidem neque labore consectetur dolorem, tempora qui magni ut laudantium quos, nulla maiores!</p>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Et laboriosam atque unde alias quaerat mollitia, doloremque sunt quas perferendis, minus dolorum veniam eos est error aperiam odio architecto repellat ex.</p>
			</div>
		</div>
	</div>
</div>

<section class="order">
	<div class="container">
		<div class="row">
			<div class="col-md-6"> 
				<div class="map"><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2550.7685232769663!2d28.67488031526402!3d50.258907409029675!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zNTDCsDE1JzMyLjAiTiAyOMKwNDAnMzcuNSJF!5e0!3m2!1sru!2sua!4v1489000671137" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe></div>
			</div>
			<div class="col-md-6"> 
				<div class="plan_1">
					<a href="img/plan_11.jpg" class="fancybox"><img src="img/plan_11.jpg" alt></a>
				</div>
			</div>
		</div>
	</div>

</div>
<div class="container">
	<div class="col-md-12 grey_1">
		<div class="row">
			<section class="news">
				<a href="page\index.html" class="button">Пройти реєстрацію</a>
			</section>
		</div>
	</div>
</div>

<div class="container">
	<div class="col-md-12">
		<div class="row">
			<div class="slider_container">
				<div class="next_button"><i class="fa fa-angle-right" aria-hidden="true"></i></div>
				<div class="prev_button"><i class="fa fa-angle-left" aria-hidden="true"></i></div>
				<div class="Carousel">
					<div class="slade_item"><img src="img/vision_12.jpg" alt></div>
					<div class="slade_item"><img src="img/vision_13.jpg" alt></div>
					<div class="slade_item"><img src="img/vision_14.jpg" alt></div>
					<div class="slade_item"><img src="img/vision_11.jpg" alt></div>			
				</div>
			</div>
		</div>
	</div>
</div>
<div class="container">
	<div class="col-md-12 grey_1">
		<div class="row">
			
			<section class="news">
				<a href="index_table.html" class="button">Зареєструватись в системі</a>
			</section>
		</div>
	</div>
</div>
</div>
<div class="akcii">
	<div class="container">
		<div class="row">
			<div class="col-md-8">
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Provident, laudantium rerum autem, quod deserunt sapiente consequatur quasi dignissimos, eius necessitatibus id magni inventore fuga doloremque praesentium nobis asperiores ducimus nostrum.</p>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima deleniti nisi deserunt in laborum, tenetur, fugit. Provident totam laborum quos porro libero deleniti, culpa vel excepturi odio, recusandae at a.</p>
			</div>
			<div class="col-md-4">
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Hic iste iusto commodi eos expedita, rerum, aliquid quas quidem neque labore consectetur dolorem, tempora qui magni ut laudantium quos, nulla maiores!</p>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Et laboriosam atque unde alias quaerat mollitia, doloremque sunt quas perferendis, minus dolorum veniam eos est error aperiam odio architecto repellat ex.</p>
			</div>
		</div>
	</div>
</div>

<div class="container">
	<div class="col-md-12 grey_1">
		<div class="row">
			<section class="news">
				<a href="#" class="button">Умови навчання</a>
			</section>
		</div>
	</div>
</div>

<div class="Umovi">
	<div class="container">
		<div class="row">
			<div class="col-md-8">
				<p>Lorem ipsum dolor sit amet, consectetur adipisici rovident totam laborum quos porro libero deleniti, culpa vel excepturi odio, recusandae at a.</p>
			</div>
			<div class="col-md-4">
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Hic iste iusto commodi eos expedita, rerum, aliquid quas quidem neque labore consectetur dolorem, tempora qui magni ut laudantium quos, nulla maiores!</p>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Et laboriosam atque unde alias quaerat mollitia, doloremque sunt quas perferendis, minus dolorum veniam eos est error aperiam odio architecto repel</p>
			</div>
		</div>
	</div>
</div>

<div class="hidden">
	<form id="callback" class="pop_form">
		<h3>Зареєструватися</h3>
		<input type="text" name="name" placeholder="Ваш логін" required="" >
		<input type="text" name="phone" placeholder="Ваш пароль">
		<button class="button" type="submit">Реєстрація</button>
	</form>
</div>


	<!--[if lt IE 9]>
	<script src="libs/html5shiv/es5-shim.min.js"></script>
	<script src="libs/html5shiv/html5shiv.min.js"></script>
	<script src="libs/html5shiv/html5shiv-printshiv.min.js"></script>
	<script src="libs/respond/respond.min.js"></script>
<![endif]-->
<script src="libs/jquery/jquery-1.11.1.min.js"></script>
<script src="libs/jquery-mousewheel/jquery.mousewheel.min.js"></script>
<script src="libs/fancybox/jquery.fancybox.pack.js"></script>
<script src="libs/waypoints/waypoints-1.6.2.min.js"></script>
<script src="libs/scrollto/jquery.scrollTo.min.js"></script>
<script src="libs/owl-carousel/owl.carousel.min.js"></script>
<script src="libs/countdown/jquery.plugin.js"></script>
<script src="libs/countdown/jquery.countdown.min.js"></script>
<script src="libs/countdown/jquery.countdown-ru.js"></script>
<script src="libs/landing-nav/navigation.js"></script>
<script src="js/common.js"></script>
<!-- Google Analytics counter --><!-- /Google Analytics counter -->
<script>document.write('<script src="http://' + (location.host || 'localhost').split(':')[0] + ':35729/livereload.js?snipver=1"></' + 'script>')</script>
</body>
</html>