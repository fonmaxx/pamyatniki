<?php use_helper('Text', 'JavascriptBase') ?>
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
		?>
<!-- adding blueimp bootstrap gallery -->		
<?php slot('gallery')?>
<div id="blueimp-gallery" class="blueimp-gallery">
    <!-- The container for the modal slides -->
    <div class="slides"></div>
    <!-- Controls for the borderless lightbox -->
    <h3 class="title"></h3>
    <a class="prev">""</a>
    <a class="next">""</a>
    <a class="close">Г—</a>
    <a class="play-pause"></a>
    <ol class="indicator"></ol>
    <!-- The modal dialog, which will be used to wrap the lightbox content -->
    <div class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" aria-hidden="true">&times;</button>
                    <h4 class="modal-title"></h4>
                </div>
                <div class="modal-body next"></div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left prev">
                        <i class="glyphicon glyphicon-chevron-left"></i>
                        <
                    </button>
                    <button type="button" class="btn btn-primary next">
                        >
                        <i class="glyphicon glyphicon-chevron-right"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
<?php 
use_javascript("jquery-1.10.2.min.js");
use_javascript("jquery.blueimp-gallery.min.js");
use_javascript("bootstrap-image-gallery.min.js");
use_javascript("preload.js");
end_slot();
?>