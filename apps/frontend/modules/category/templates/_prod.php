<?php
$n=0;
foreach($objects as $object)
{
$n++;
?>
<div id="<?php echo "item".$n; ?>" class="item">
   <a href="<?php echo url_for('object', array(
			'cat'=>$object->GranitSub_cat->GranitCat->getTranslit(),
			'sub_cat'=>$object->GranitSub_cat->getTranslit(),
			'obj_id'=>$object->getId()
   			),true); ?>">
   	<img src="<?php echo url_for($object->getIcon());?>" alt="<?php echo $object->Prod->getFirst()->getName();?>" />
   </a>
</div>
<?php
}?>
<?php if(isset($cat)&&isset($sub_cat)){?>
<a class="all" href="<?php echo url_for('sub_category',array(
						'cat'=>$cat->getTranslit(),
						'translit'=>$sub_cat->getTranslit()
						),true); ?>">показать все...</a>
<?php }?>						