<?php
foreach($objects as $object)
{?>
<div class="item">
   <a href="<?php echo url_for('object', array(
			'cat'=>$object->GranitSub_cat->GranitCat->getTranslit(),
			'sub_cat'=>$object->GranitSub_cat->getTranslit(),
			'obj_id'=>$object->getId()
   			),true); ?>">
   	<img src="<?php echo url_for($object->getIcon());?>" alt="<?php echo $object->Prod->getFirst()->getName();?>" />
   </a>
   <div class="name"><?php echo $object->Prod->getFirst()->getName();?></div>
</div>
<?php
}?>