<?php
$i=1; 
foreach($objects as $object){?>
	<div id="<?php echo 'inf_full'.$i; ?>" class="inf_full">
	<a class="inf_link" href="<?php echo url_for('object',array(
			'cat'=>$object->GranitSub_cat->GranitCat->getTranslit(),
			'sub_cat'=>$object->GranitSub_cat->getTranslit(),
			'obj_id'=>$object->getId()
			),true); ?>">
		<?php echo $object->Inf->getFirst()->getTitle();?>
	</a>
	<span class="plain_text">
		<img src="<?php echo url_for($object->getIcon());?>" alt="<?php echo $object->Inf->getFirst()->getTitle();?>" width="211" height="179" />
		<span><?php echo $object->Inf->getFirst()->getShortcart();?></span>
	</span>
	</div>
<?php 
$i++;
}?>
