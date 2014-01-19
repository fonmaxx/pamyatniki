<?php 
/*id:		name:    
 * 1		адрес	
 * 2		телефоны
 * 3		электронный адрес
 * */?>
	  <h2 class="cat"><l>К</l>онтакты:</h2>
	  <span class="subscribe">Мы находимся по следующему адресу: <?php echo $kont->get(0)->Kontakty->getFirst()->getContent();?>
      </span>
      <div class="sub_cat">
      <ul>
	  <li>контактные телефоны: <?php 
	  $s="";
	  foreach($kont->get(1)->Kontakty as $tel)
	  {
	  	$s.=$tel->getContent().";  ";
	  }
	  echo $s;	  
	  ?></li>
	  <li>
		электронный ящик: <?php 
	  $s="";
	  foreach($kont->get(2)->Kontakty as $el)
	  {
	  	$s.=$el->getContent();
	  }
	  echo $s;	  
	  ?>
      </li>
      </ul>
      </div>
      <div id="map">
       
      </div>
<?php slot('title')?>
контакты
<?php end_slot();?>
<?php slot('kontakty')?>
<meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
<script type="text/javascript"
      src="http://maps.googleapis.com/maps/api/js?key=AIzaSyAekS0_NGuoWb8Lw4bvJ59NoujYk-2_0bs&sensor=false">
</script>
<?php use_javascript("jquery-1.10.2.min.js");?>
<?php use_javascript("map.js");?>
<?php end_slot();?>      