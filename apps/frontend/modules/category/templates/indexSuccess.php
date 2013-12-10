<?php foreach($cats as $cat){?>
   	  <h2 class="cat"><l><?php echo $cat->getCat_f();?></l><?php echo $cat->getCat_b();?>:</h2>
        <span class="subscribe"><?php echo $cat->getShortcart();?></span>
		<ul class="list">

        	<?php
        	foreach($cat->Sub_cat as $sub_cat)
        	{?>
			<li>
        	<div class="sub_cat" id="<?php echo $sub_cat->getTranslit(); ?>">
				<?php
				$objects=$sub_cat->getObjects(sfConfig::get('app_max_objects_on_homepage'));
				if($objects->getLast()->Prod->count())
				{
					?>
				<a class="sub_cat_link" href="<?php echo url_for('sub_category',array(
						'cat'=>$cat->getTranslit(),
						'translit'=>$sub_cat->getTranslit()
						),true); ?>"><?php echo $sub_cat->getName();?></a>
					<?php
					include_partial('prod', array('objects' => $objects));
				}
				elseif($objects->getLast()->Inf->count())
				{
					include_partial('inf_short', array('objects' => $objects));
				}
				?>
				<?php
				if($objects->count()==sfConfig::get('app_max_objects_on_homepage'))
				{
				?>
				<a class="all" href="<?php echo url_for('sub_category',array(
						'cat'=>$cat->getTranslit(),
						'translit'=>$sub_cat->getTranslit()
						),true); ?>">показать все...</a>
				<?php
				}?>
        	</div>
        	</li>
			<?php
        	}?>
	  	</ul>
<?php }?>
	  <h2 class="cat"><l>К</l>онтакты:</h2>
	  <span class="subscribe">Мы находимся по следующему адресу: городское кладбище "Дружба"(контактная инфа)
      </span>
	  <p>контактные телефоны:</p>
      <ul>
    	<li>
		(097)529 08 90
    	</li>
		<li>
    	(063)327 71 38
    	</li>
		<li>
		(095)899 09 68
    	</li>
      </ul>
	  <p>электронный ящик</p>
	  <ul>
      	<li>
        ksmers@ukr.net
        </li>
      </ul>