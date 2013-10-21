<?php foreach($objects as $object){?>
	<div class="inf_full">
	<a href="<?php echo url_for('object',array(
			'cat'=>$object->GranitSub_cat->GranitCat->getTranslit(),
			'sub_cat'=>$object->GranitSub_cat->getTranslit(),
			'obj_id'=>$object->getId()
			),true); ?>">
		<p><?php echo $object->Inf->getFirst()->getTitle();?></p>
	</a>
	<span class="plain_text">
		<img src="<?php echo url_for($object->getIcon());?>" alt="<?php echo $object->Inf->getFirst()->getTitle();?>" width="211" height="179" />
		<?php echo $object->Inf->getFirst()->getShortcart();?>
	</span>
	</div>
<?php }?>
