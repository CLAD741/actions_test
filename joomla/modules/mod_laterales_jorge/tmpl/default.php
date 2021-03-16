<?php
/**
 * @copyright	Copyright (c) 2018 laterales_jorge. All rights reserved.
 * @license		http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
 */

// no direct access
defined('_JEXEC') or die;

?>
<script src="https://cdn.polyfill.io/v2/polyfill.min.js"></script>




<script src='https://www.google.com/recaptcha/api.js'></script>
<script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=6LdCj24UAAAAABvVdw-PIHwPmOLBRitEkClo5pYb"
        async defer>
    </script>

<link rel="stylesheet" href="modules/mod_laterales_jorge/recursos/css/style.css">
<link rel="stylesheet" href="modules/mod_laterales_jorge/recursos/css/css-stars.css">

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
<script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'></script>

<style>
	#enviar{
		background-color: #ffec00;
		color: black;
		padding-right: 26px;
		margin-top: 18px;
    font-family: lato;

	}
	.vl {
	    border-left: 2px solid #6d1c72;
	    height: 517px;
	    width: 1px;
	}
#logo_form{
  width: 126px;
    right: 0;
    position: absolute;
    margin-right: 21px;
  }

  input::placeholder {
    color: #908c8c!important;
  }
  textarea::placeholder {
    color: #908c8c!important;
  }

input::-webkit-input-placeholder { /* Chrome/Opera/Safari */
  color: #908c8c!important;
}
input::-moz-placeholder { /* Firefox 19+ */
  color: #908c8c!important;
}
input:-ms-input-placeholder { /* IE 10+ */
  color: #908c8c!important;
}
input:-moz-placeholder { /* Firefox 18- */
  color: #908c8c!important;
}

</style>

<div class="demo__buttons" uk-toggle="target: #modal-formulario" style="padding: 11px;" >
	<div class="demo__open-btn" style="padding-right: 10px;"><i class="fa fa-star"></i></div>
</div>

<div id="modal-formulario" uk-modal>
    <div class="uk-modal-dialog uk-modal-body">
        <button class="uk-modal-close-default" type="button" uk-close style="right: 19px; padding: 17px;" ></button>


            	<form  id="formulario_contacto" method="POST">
					<?php echo JHtml::_( 'form.token' ); ?>
					<h5 style="color: #000000; font-size: 30px; ">CALIFÍCANOS</h5>

            <div class="form-group inferior">
							<!-- <h5 style="color: #736666;">Califica tu experiencia con la DSIT:</h5> -->
						    <select class="form-control" id="example-css" name="nota" autocomplete="off">
							  <option value="1">1</option>
							  <option value="2">2</option>
							  <option value="3">3</option>
							  <option value="4">4</option>
							  <option value="5">5</option>
							</select>
						</div>
            <div class="form-group inferior">
				      <textarea class="form-control" rows="3" id="comentarios" placeholder="Agradecemos tus comentarios para seguir mejorando" name="comentarios"></textarea>
				    </div>
            <div class="form-group">
				      <input type="email" class="form-control" id="email" placeholder="Email*" name="email" required="">
				    </div>
            <div class="form-group">
  				      <input type="text" class="form-control" id="nombre" placeholder="Nombre"  name="nombre" required="">
  				  </div>


				    <div class="g-recaptcha" data-sitekey="6LdCj24UAAAAAI84KZacQwVXAWmPR_TE3V-GooZ2"></div>

				  <button type="submit" class="btn btn-default" id="enviar">Enviar </button>
          <!-- <img id="logo_form" src="/modules/mod_laterales_jorge/recursos/img/dsit_logo_color.png" > -->
				</form>


    </div>
</div>


<script src="modules/mod_laterales_jorge/recursos/js/validar.js"></script>
<script src="modules/mod_laterales_jorge/recursos/js/scripts.js"></script>
<script src="modules/mod_laterales_jorge/recursos/js/jquery.barrating.js"></script>
<script src="modules/mod_laterales_jorge/recursos/js/examples.js"></script>
