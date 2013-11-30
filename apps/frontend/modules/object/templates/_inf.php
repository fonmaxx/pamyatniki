<div class="inf_full">
	<span class="plain_text">
		<img src="<?php echo url_for($object->getIcon());?>" alt="<?php echo $object->Inf->getFirst()->getTitle();?>" width="211" height="179" />
		<?php  echo $object->Inf->getFirst()->getContent();?>
		</span>
		</div>
		<div id="links" class="small_photo">
      		<?php foreach($object->Photo as $photo)
      		{ ?>
      		<a href="<?php echo url_for($photo->getPhoto()); ?>" data-gallery>
      			<img src="<?php echo url_for($photo->getIcon());?>" alt="<?php echo $object->getName();?>" />
      		</a>
      		<?php
      		}?>
	</div>