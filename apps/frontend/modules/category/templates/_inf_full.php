<ul>
<?php
$i=1; 
foreach($objects as $object){?>
	<li>
	<div id="<?php echo 'inf_full'.$i; ?>" class="inf_full">
	
	<a class="inf_link" href="<?php echo url_for('object',array(
			'cat'=>$object->GranitSub_cat->GranitCat->getTranslit(),
			'sub_cat'=>$object->GranitSub_cat->getTranslit(),
			'obj_id'=>$object->getId()
			),true); ?>">
		<?php echo $object->Inf->getFirst()->getShortcart();?>
	</a>
	
	<div class="inf_item">
		<div class="item">
			<img src="<?php echo url_for($object->getIcon());?>" alt="<?php echo $object->Inf->getFirst()->getTitle();?>" />
		</div>
		<div class="plain_text">
			<?php echo $object->Inf->getFirst()->getContent();?>
		</div>
	</div>
	</div>
	</li>
<?php 
$i++;
}?>
</ul>