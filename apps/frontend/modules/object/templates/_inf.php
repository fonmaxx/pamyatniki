<div class="information">
	<div class="item inf_img">
		<img src="<?php echo url_for($object->getMainPhoto());?>" alt="<?php echo $object->Inf->getFirst()->getTitle();?>" />
	</div>
	<span class="plain_text">
		<span><?php  echo $object->Inf->getFirst()->getContent();?></span>
	</span>
</div>
<?php if($object->Photo->count())
		{?>
<div class="gall_feed">
      	<?php foreach($object->Photo as $photo)
      	{ ?>	
	<div class="item small_photo">
		<a href="<?php echo url_for($photo->getPhoto());?>" data-gallery>
      		<img src="<?php echo url_for($photo->getIcon());?>" alt="<?php echo $object->Inf->getFirst()->getTitle();?>" />
      	</a>
	</div>
		<?php
		 }?>
</div>
<?php }?>
<?php slot('title')?>
<?php echo $object->Inf->getFirst()->getTitle();?>
<?php end_slot();?>