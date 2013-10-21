<div id="back"><span >
<a href="<?php echo url_for('sub_category',array(
		'cat'=>$object->GranitSub_cat->GranitCat->getTranslit(),
		'translit'=>$object->GranitSub_cat->getTranslit()
		));?>">вернуться</a>
</span></div>
      <?php
      if($object->Prod->count())
      	{
      		include_partial('prod', array('object' => $object));
      	}
		else
		{
			include_partial('inf', array('object' => $object));
		}