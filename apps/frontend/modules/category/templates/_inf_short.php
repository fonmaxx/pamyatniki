<?php foreach($objects as $object){?>
	<a class='inf_link' href="<?php echo url_for('object',array(
			'cat'=>$object->GranitSub_cat->GranitCat->getTranslit(),
			'sub_cat'=>$object->GranitSub_cat->getTranslit(),
			'obj_id'=>$object->getId()
			),true); ?>">
		<span><?php echo $object->Inf->getFirst()->getShortcart();?></span>
	</a>
<?php }?>