<?php foreach($objects as $object){?>
	<a href="<?php echo url_for('object',array(
			'cat'=>$object->GranitSub_cat->GranitCat->getTranslit(),
			'sub_cat'=>$object->GranitSub_cat->getTranslit(),
			'obj_id'=>$object->getId()
			),true); ?>">
		<p><?php echo $object->Inf->getFirst()->getShortcart();?></p>
	</a>
<?php }?>