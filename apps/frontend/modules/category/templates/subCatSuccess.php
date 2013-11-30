<h2 class="cat"><l><?php echo Support::firstLetter($sub_cat->getName());?></l><?php echo Support::exceptFirstLetter($sub_cat->getName());?>:</h2>
		<ul class="list">
			<li>
        	<div class="sub_cat">
				<?php
				$objects=$pager->getResults();
				if($objects->getLast()->Prod->count())
				{
					include_partial('prod', array('objects' => $objects));
				}
				elseif($objects->getLast()->Inf->count())
				{
					include_partial('inf_full', array('objects' => $objects));
				}
				?>
        	</div>
        	</li>
	  	</ul>
			<div class="pagination_desc">
            <span>
            всего <strong><?php echo count($pager);?></strong> , страница
            <?php if ($pager->haveToPaginate())
            { ?>
            <strong><?php echo $pager->getPage().'/'.$pager->getLastPage();?></strong>
            <?php }
            else
            {?>
            1/1
            <?php }?>
            </span>
            <?php if ($pager->haveToPaginate())
            { ?>
            <div class="pagination">
            	<a href="<?php echo url_for('sub_category',array(
						'cat'=>$sub_cat->GranitCat->getTranslit(),
						'translit'=>$sub_cat->getTranslit()
						),true).'?page=1'; ?>">первая</a>
           	 	<a class ="nav" href="<?php echo url_for('sub_category',array(
						'cat'=>$sub_cat->GranitCat->getTranslit(),
						'translit'=>$sub_cat->getTranslit()
						),true).'?page='.$pager->getPreviousPage(); ?>">
						<?php echo image_tag('prev.gif','size=16x16');?>предыдущая
				</a>
             	 <?php echo $pager->getPage();?>
             	<a class="nav" href="<?php echo url_for('sub_category',array(
						'cat'=>$sub_cat->GranitCat->getTranslit(),
						'translit'=>$sub_cat->getTranslit()
						),true).'?page='.$pager->getNextPage(); ?>">
						<?php echo image_tag('next.gif','size=16x16');?>следующая
				</a>
             	<a href="<?php echo url_for('sub_category',array(
						'cat'=>$sub_cat->GranitCat->getTranslit(),
						'translit'=>$sub_cat->getTranslit()
						),true).'?page='.$pager->getLastPage(); ?>">последняя</a>
        	</div>
        	<?php }?>
        	</div>