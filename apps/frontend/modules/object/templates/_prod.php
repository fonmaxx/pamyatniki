<div class="big_photo">
   <?php if($object->Photo->count())
		{?>
   		<a href="<?php echo url_for('photo',array(
   				'cat'=>,
   				'sub_cat'=>,
   				'obj_id'=>
   				'photo'=>
   				); ?>">
   			<img src="<?php echo url_for($object->getIcon());?>" alt="<?php echo $object->getName();?>" />
   		</a>
   		<?php }
   		else {?>
   		<img src="<?php echo url_for($object->getIcon());?>" alt="<?php echo $object->getName();?>" />
   		<?php }?>
</div>
<table  class="fetures">
        <tr>
          <th colspan=2> Характеристики </th>
        </tr>
        <tr>
          <td> материал </td>
          <td> <?php echo $object->Prod->getFirst()->getMaterial();?> </td>
        </tr>
        <tr>
          <td> цена </td>
          <td> <?php echo $object->Prod->getFirst()->getPrice();?> </td>
        </tr>
        <tr>
          <th height="33" colspan=2> Комплектация </th>
        </tr>
        <tr>
          <td colspan=2>
          <span class="complect"><?php echo $object->Prod->getFirst()->getComplect();?></span>
          </td>
        </tr>
</table>
<?php if($object->Photo->count())
		{?>
		<div class="small_photo">
      	<?php foreach($object->Photo as $photo)
      	{ ?>
      		<a href="<?php echo url_for();?>"
      		<img src="<?php echo url_for($photo->getIcon());?>" alt="<?php echo $object->getName();?>" />
      		</a>
      	<?php
     	 }?>
		</div>
<?php }?>