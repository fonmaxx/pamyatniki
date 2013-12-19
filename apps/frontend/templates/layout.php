<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<title>
<?php include_slot('title','главная страница'); ?>
</title>
<?php include_stylesheets() ?>
<?php if (has_slot('metas')){include_slot('metas');} ?>
<?php if (has_slot('kontakty')){include_slot('kontakty');} ?>
</head>

<body>
<div id="global">
<div id="header">
  <div id="top">ПП Кравченко</br>
  	изготовление и установка памятников, надгробных плит
  </div>
</div>
<div id="conteiner">
  <div id="banner">
    Памятники любой сложности из гранита, мрамора и других материалов, г Житомир
    ksmers@ukr.net (097)529 08 90   (063)327 71 38   (095)899 09 68
  </div>
  <?php
  $cat_list=Doctrine_Core::getTable('GranitCat')->getCats();?>
  <div id="top_menu">
  	<span class="top_menu">
  	<?php echo link_to("главная",url_for('homepage',array(),true));?>
  	</span>
  <?php
  	foreach($cat_list as $cat){?>
  	<span class="top_menu">
  	<a href="<?php echo url_for('category',$cat,true)?>"><?php echo $cat->getName();?></a>
  	</span>
    <?php }?>
    <span class="top_menu">
    <a href="<?php echo url_for('@contacts')?>">контакты</a>
    </span>
  </div>
  <div class="top_shadow"></div>
  <div id="main">
    <div class="content">
 	 	<?php echo $sf_content ?>
  	</div>
  </div>
</div>
<div id="footer">
  <div id="bot">
    <div class="footer">
    	<p><l>ч</l>асы работы</p>
		<ul id="left">
    		<li><span>ежедневно с 9 до 18</span></li>
			<li><span>без выходных</span></li>
			<li><span>праздники</span></li>
    	</ul>
    </div>
    <div class="footer">
  		<p><l>м</l>естоположение</p>
    	<ul id="right">
			<li>Житомир, Западное шоссе, городское кладбище "дружба"</li>
			<li><a class="map_link" href="<?php echo url_for('@contacts')?>">показать на карте</a></li>
    	</ul>
    </div>
  </div>
</div>
</div>
<?php if (has_slot('gallery')){ include_slot('gallery');} ?>
<?php include_javascripts();?>
</body>
</html>
