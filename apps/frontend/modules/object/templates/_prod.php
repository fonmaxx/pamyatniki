<div>
	<div class="item prod_item">
		<img src="<?php echo url_for($object->getIcon());?>" alt="<?php echo $object->getName();?>" />
	</div>
	<div class="item fetures">
		<div class="fet_cont">
			<div class="cat"><l>Х</l>арактеристики</div>
			<ul class="fet_text">
				<li>
					Материал: <?php echo $object->Prod->getFirst()->getMaterial();?>
				</li>
				<li>
					Цена: <?php echo $object->Prod->getFirst()->getPrice();?>
				</li>
			</ul>
			<div class="cat"><l>К</l>омплектация</div>
			<ul class="fet_text">
			<?php foreach($object->Prod->getFirst()->Complect as $complect){?>	
				<li>
					<?php echo $complect->getName();?>
				</li>
			<?php }?>	
			</ul>
		</div>
	</div>
</div>
<?php if($object->Photo->count())
		{?>
<div class="gall_feed">
      	<?php foreach($object->Photo as $photo)
      	{ ?>	
	<div id="links" class="item small_photo">
		<a href="<?php echo url_for($photo->getPhoto());?>" data-gallery>
      		<img src="<?php echo url_for($photo->getIcon());?>" alt="<?php echo $object->getName();?>" />
      	</a>
	</div>
		<?php
		 }?>
</div>
<?php }?>
<?php slot('title')?>
<?php echo $object->getName();?>
<?php end_slot();?>