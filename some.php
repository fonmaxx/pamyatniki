<div class="big_photo">
   		<img src="<?php echo url_for($object->getIcon());?>" alt="<?php echo $object->getName();?>" />
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
		<div id='links' class="small_photo">
      	<?php foreach($object->Photo as $photo)
      	{ ?>
      		<a href="<?php echo url_for($photo->getPhoto());?>" data-gallery>
      		<img src="<?php echo url_for($photo->getIcon());?>" alt="<?php echo $object->getName();?>" />
      		</a>
      	<?php
     	 }?>
		</div>
<?php }?>