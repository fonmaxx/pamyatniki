<div>
	<div class="item prod_item">
		<img src="<?php echo url_for($object->getMainPhoto());?>" alt="<?php echo $object->getName();?>" />
	</div>
	<div class="item fetures">
		<div class="fet_cont">
			<div class="cat"><l>Х</l>арактеристики</div>
			<ul class="fet_text">
				<li>
					Материал: <span><?php echo $object->Prod->getFirst()->getMaterial();?></span>
				</li>
				<li>
					Цена: <span><?php echo $object->Prod->getFirst()->getPrice();?></span>
				</li>
			</ul>
			<div class="cat"><l>К</l>омплектация</div>
			<ul id="complect" class="fet_text">
			<?php foreach($object->Prod->getFirst()->GranitProd_complect as $complect){?>	
				<li>
					<span><?php echo $complect->getName();?></span>
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
	<div class="item small_photo">
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