<?php
/**
 * @copyright	Copyright (c) 2018 laterales_jorge. All rights reserved.
 * @license		http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
 */

// no direct access
defined('_JEXEC') or die;

?>

<meta http-equiv="Expires" content="0">
<meta http-equiv="Last-Modified" content="0">
<meta http-equiv="Cache-Control" content="no-cache, mustrevalidate">
<meta http-equiv="Pragma" content="no-cache">


<script src='https://www.google.com/recaptcha/api.js'></script>
<script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=6LdCj24UAAAAABvVdw-PIHwPmOLBRitEkClo5pYb"
        async defer>
    </script>

<link rel="stylesheet" href="modules/mod_laterales_jorge/recursos/css/style.css">
<link rel="stylesheet" href="modules/mod_laterales_jorge/recursos/css/css.css">
<link rel="stylesheet" href="modules/mod_laterales_jorge/recursos/css/css-stars.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

<svg xmlns="http://www.w3.org/2000/svg" version="1.1" width="0" height="0">
  <defs>
    <filter id="goo">
      <feGaussianBlur in="SourceGraphic" stdDeviation="10" result="blur" />
      <feColorMatrix in="blur" mode="matrix" values="1 0 0 0 0  0 1 0 0 0  0 0 1 0 0  0 0 0 18 -7" result="goo" />
      <feBlend in="SourceGraphic" in2="goo" />
    </filter>
  </defs>
</svg>

<div class="demo__buttons">
	<div class="demo__social-btn-1 demo__social-btn" id="abrir_calificar"><i class="fa fa-star"></i></div>
	<div class="demo__social-btn-2 demo__social-btn" id="abrir_mensaje" ><i class="fa fa-comment"></i></div>
	<div class="demo__open-btn" style="padding-right: 10px;"><i class="fa fa-comments"></i></div>
</div>






<section id="contactme" style="position: fixed;" >



<form action="/modules/mod_laterales_jorge/correo.php" id="formulario_contacto" method="POST">
	<?php echo JHtml::_( 'form.token' ); ?>
	<h5 style="color: #736666;">CUÉNTANOS MÁS SOBRE TU EXPERIENCIA CON LA DSIT</h5>
	<div class="form-group">
      <input type="text" class="form-control" id="nombre" placeholder="Nombre"  name="nombre" required="">
    </div>
    <!--
    <div class="form-group">
      <input type="number" class="form-control" id="telefono" placeholder="Teléfono" name="telefono" required="">
    </div>
-->
    <div class="form-group">
      <input type="email" class="form-control" id="email" placeholder="Email" name="email" required="">
    </div>
    <div class="form-group inferior">
      <textarea class="form-control" rows="3" id="comentarios" placeholder="Escribe tus comentarios" name="comentarios"></textarea>
    </div>

    <div class="g-recaptcha" data-sitekey="6LdCj24UAAAAAI84KZacQwVXAWmPR_TE3V-GooZ2"></div>

  <button type="submit" class="btn btn-default" id="enviar">Enviar  <i class="arrow-circle-right iblue hoverOnParent"></i></button>

</form>

<!--
<p id="iconos_redes">
	<a href="#"><i class="fb-icon iconos_sociales"></i></a>
	<a href="#"><i class="yt-icon iconos_sociales"></i></a>
	<a href="#"><i class="lin-icon iconos_sociales"></i></a>
	<a href="#"><i class="insta-icon iconos_sociales"></i></a>
	<a href="#"><i class="rss-icon iconos_sociales"></i></a>
</p>
-->

 <!--<i class="icon mobile"><img src="modules/mod_laterales_jorge/recursos/img/contact-300x300.png" alt="contactme"></i>-->
 <i class="arrow-right iblue"></i>
</section>

<section id="aboutme" style="position: fixed;">
	<h1>J</h1>
	<div class="scrollme">
		<form action="/modules/mod_laterales_jorge/califica.php" id="califica" method="POST">
			<?php echo JHtml::_( 'form.token' ); ?>
			<div class="form-group inferior">
				<h3 style="color: #736666;">Califica tu experiencia con la DSIT:</h3>

			    <select class="form-control" id="example-css" name="rating" autocomplete="off">
				  <option value="1">1</option>
				  <option value="2">2</option>
				  <option value="3">3</option>
				  <option value="4">4</option>
				  <option value="5">5</option>
				</select>
			</div>
			<button type="submit" class="btn btn-default" id="enviar">Calificar  <i class="arrow-circle-right iblue hoverOnParent"></i></button>
		</form>
	</div>

	<i class="arrow-left iblue"></i>
</section>

<script src="modules/mod_laterales_jorge/recursos/js/scripts.js"></script>
<script>window.jQuery || document.write('<script src="modules/mod_laterales_jorge/recursos/js/vendor/jquery-1.11.2.min.js"><\/script>')</script>
<script src="modules/mod_laterales_jorge/recursos/js/jquery.barrating.js"></script>
<script src="modules/mod_laterales_jorge/recursos/js/examples.js"></script>
<script src="modules/mod_laterales_jorge/recursos/js/boton.js"></script>
