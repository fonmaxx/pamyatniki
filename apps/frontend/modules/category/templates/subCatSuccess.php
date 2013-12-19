<div>
	<a class="back" alt="назад к продукции" href="<?php
	echo url_for('category',array('translit'=>$sub_cat->GranitCat->getTranslit()));	
	?>" >назад</a>
</div>
<div class="sub_cat full_sub">
	<h2 class="cat"><l><?php echo Support::firstLetter($sub_cat->getName());?></l><?php echo Support::exceptFirstLetter($sub_cat->getName());?>:</h2>	
		<div>
		<ul class="list">
			<li>
				<?php
				if($objects->getLast()->Prod->count())
				{
					include_partial('prod', array('objects' => $objects));
				}
				elseif($objects->getLast()->Inf->count())
				{
					include_partial('inf_full', array('objects' => $objects));
				}
				?>
        	</li>
	  	</ul>
	  	</div>
			<div class="pagination">
				<a id="left_href" class ="nav_href" href="<?php echo url_for('sub_category',array(
						'cat'=>$sub_cat->GranitCat->getTranslit(),
						'translit'=>$sub_cat->getTranslit()
						),true).'?page='.$pager->getPreviousPage(); ?>">
					<div class="nav_left">
					</div>
				</a>
				<div class="nav_body">
					<div class="nav_set1">
						<div class="nav_set2"><?php
						$page=$pager->getPage();
						if($l_num)
						{
							while($l_num)
							{
								$curr_page=$page-$l_num;
								$l_num--;
								?>
								<a id="<?php echo "pag_btn".$curr_page; ?>" class ="nav_href" href="<?php echo url_for('sub_category',array(
						'cat'=>$sub_cat->GranitCat->getTranslit(),
						'translit'=>$sub_cat->getTranslit()
						),true).'?page='.$curr_page; ?>">
						<div class="nav_button"><?php echo $curr_page;?></div>
						</a>
								<?php
							}
						}
						?>
							<div class="nav_button nav_active"><?php echo $page;?></div>
							<?php 
							if($r_num)
							{
								$curr_page=$page;
								while($r_num)
								{
									$curr_page++;
									$r_num--;
									?>
								<a id="<?php echo "pag_btn".$curr_page; ?>" class ="nav_href" href="<?php echo url_for('sub_category',array(
						'cat'=>$sub_cat->GranitCat->getTranslit(),
						'translit'=>$sub_cat->getTranslit()
						),true).'?page='.$curr_page; ?>">
						<div class="nav_button"><?php echo $curr_page;?></div>
						</a>
								<?php
								}
							}
							?>
						</div>
					</div>	
				</div>
				<a id="right_href" class ="nav_href" href="<?php echo url_for('sub_category',array(
						'cat'=>$sub_cat->GranitCat->getTranslit(),
						'translit'=>$sub_cat->getTranslit()
						),true).'?page='.$pager->getNextPage(); ?>">
					<div class="nav_right">				
					</div>
				</a>	
			</div>	
        </div>
<?php slot('title')?>
<?php echo $sub_cat->getName();?>
<?php end_slot();?>        