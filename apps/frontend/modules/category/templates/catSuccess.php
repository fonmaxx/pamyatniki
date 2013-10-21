   	  <h2 class="cat"><l><?php echo $cat->getCat_f();?></l><?php echo $cat->getCat_b();?>:</h2>
        <span class="subscribe"><?php echo $cat->getShortcart();?></span>
		<ul class="list">

        	<?php
        	foreach($cat->Sub_cat as $sub_cat)
        	{?>
			<li>
        	<div class="sub_cat">
				<?php
				$objects=$sub_cat->getObjects(sfConfig::get('app_objects_on_cat_sub_cat'));
				if($objects->getLast()->Prod->count())
				{
					?>
				<a class="" href="<?php echo url_for('sub_category',array(
						'cat'=>$cat->getTranslit(),
						'translit'=>$sub_cat->getTranslit()
						),true); ?>">
        			<p><?php echo $sub_cat->getName();?></p>
        		</a>
					<?php
					include_partial('prod', array('objects' => $objects));
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