<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>главная страница</title>
<?php include_javascripts() ?>
<?php include_stylesheets() ?>
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
  	<span class="top_menu"><a href="<?php echo url_for('homepage',array(),true)?>">Главная</a></span>
  <?php
  	foreach($cat_list as $cat){?>
  	<span class="top_menu"><a href="<?php echo url_for('category',$cat,true)?>"><?php echo $cat->getName();?></a></span>
    <?php }?>
    <span class="top_menu"><a href="#">Контакты</a></span>
  </div>
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
    		<li>ежедневно с 9 до 18</li>
			<li>без выходных</li>
			<li>праздники</li>
    	</ul>
    </div>
    <div class="footer">
  		<p><l>м</l>естоположение</p>
    	<ul id="right">
			<li>городское кладбище "дружба"(адрес)</li>
			<li>показать на карте(гугл мепс)</li>
    	</ul>
    </div>
  </div>
</div>
</div>
</body>
</html>
