<div class="inf_full">
	<span class="plain_text">
		<?php if($object->Photo->count())
		{?>
		<a href="<?php echo url_for();?>"
			<img src="<?php echo url_for($object->getIcon());?>" alt="<?php echo $object->Inf->getFirst()->getTitle();?>" width="211" height="179" />
		</a>
		<?php  echo $object->Inf->getFirst()->getContent();?>
		</span>
		</div>
		<div class="small_photo">
      		<?php foreach($object->Photo as $photo)
      		{ ?>
      		<a href="<?php echo url_for();?>"
      			<img src="<?php echo url_for($photo->getIcon());?>" alt="<?php echo $object->getName();?>" />
      		</a>
      		<?php
      		}?>
	</div>
	<?php
		}
		else{?>
			<img src="<?php echo url_for($object->getIcon());?>" alt="<?php echo $object->Inf->getFirst()->getTitle();?>" width="211" height="179" />
			<?php  echo $object->Inf->getFirst()->getContent();?>
			</span>
			</div>
			<?php }?>