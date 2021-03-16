<?php
require_once JPATH_BASE . '/includes/defines.php';
require_once JPATH_BASE . '/includes/framework.php';

?>
<style>
#botones{
  background-color: #6d1c72;
  color: #ffffff;
  font-family: Lato;
}
.uk-link, a {
    color: #ffffff;
  }
.uk-link:hover, a:hover {
  color: #ffffff;
}
</style>

<div class="uk-container">
  <div class="uk-grid uk-grid-stack" uk-grid="">
    <div class="uk-width-expand@m uk-first-column">
      <div id="system-message-container"></div>
        <link rel="stylesheet" type="text/css" href="components/com_fotos/assets/css/common.css">
        <link rel="stylesheet" type="text/css" href="components/com_fotos/assets/css/style2.css">
        <ul class="ch-grid">
          <?php foreach ($results as $i => $item) : ?>
    					<li>
    						<div class="ch-item" style="background-image: url(<?php echo JURI::root() . $item->imagen; ?>); background-size: cover;">
    							<div class="ch-info"  style="vertical-align: middle;">
                    <br>
    								<p style="vertical-align: middle;">"<?php echo $item->cita; ?>".</p>
    							</div>
    						</div>
                <div style="font-size: 13px; color:#000000;" >
                    <?php echo $item->nombre; ?>
                </div>
                <div style="font-size: 13px;" >
                    <?php echo $item->cargo; ?>
              <!-- </div>
                <a href="mailto:<?php echo $item->correo; ?>" style="color: #00a0de;" ><?php echo $item->correo; ?></a>
                <div style="font-size: 13px;" >
                    Ext: <?php echo $item->ext; ?>
              </div> -->
    					</li>
    		  <?php endforeach; ?>
        </ul>
      </div>
    </div>
  </div>
<?php
$db->disconnect();

?>
