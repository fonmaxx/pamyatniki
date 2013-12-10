   	  <h2 class="cat"><l><?php echo $cat->getCat_f();?></l><?php echo $cat->getCat_b();?>:</h2>
        <span class="subscribe"><?php echo $cat->getShortcart();?></span>
		<ul class="list">

        	<?php
        	foreach($cat->Sub_cat as $sub_cat)
        	{?>
			<li>
        	<div class="sub_cat" id="<?php echo $sub_cat->getTranslit(); ?>">
				<?php
				$objects=$sub_cat->getObjects(sfConfig::get('app_objects_on_cat_sub_cat'));
				if($objects->getLast()->Prod->count())
				{
					?>
				<a class="sub_cat_link" href="<?php echo url_for('sub_category',array(
						'cat'=>$cat->getTranslit(),
						'translit'=>$sub_cat->getTranslit()
						),true); ?>"><?php echo $sub_cat->getName();?></a>
<?php
					include_partial('prod', array('objects' => $objects,'cat'=>$cat,'sub_cat'=>$sub_cat));
				}
				elseif($objects->getLast()->Inf->count())
				{
					include_partial('inf_full', array('objects' => $objects));
				}
				?>
				<?php
				if($objects->count()==sfConfig::get('app_objects_on_cat_sub_cat'))
				{
				?>
				<?php
				}?>
        	</div>
        	</li>
			<?php
        	}?>
	  	</ul>