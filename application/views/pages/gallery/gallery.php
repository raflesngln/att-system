<link href="<?php echo base_url();?>gallery/css/bootstrap.min.css" rel="stylesheet" />
		<link href="<?php echo base_url();?>gallery/css/bootstrap-responsive.min.css" rel="stylesheet" />
		<link rel="stylesheet" href="<?php echo base_url();?>gallery/css/font-awesome.min.css" />

		<!--[if IE 7]>
		  <link rel="stylesheet" href="<?php echo base_url();?>gallery/css/font-awesome-ie7.min.css" />
		<![endif]-->

		<!--page specific plugin styles-->

		<link rel="stylesheet" href="<?php echo base_url();?>gallery/css/colorbox.css" />

		<!--fonts-->


		<!--ace styles-->

		<link rel="stylesheet" href="<?php echo base_url();?>gallery/css/ace.min.css" />
		<link rel="stylesheet" href="<?php echo base_url();?>gallery/css/ace-responsive.min.css" />

<div class="row-fluid">
						<div class="span12">
							<!--PAGE CONTENT BEGINS-->

							<div class="row-fluid">
							  <ul class="ace-thumbnails">

								  <li>
									  <a href="<?php echo base_url();?>gallery/images/gallery/image-2.jpg" data-rel="colorbox">
										  <img alt="150x150" src="<?php echo base_url();?>gallery/images/gallery/thumb-2.jpg" />
										  <div class="text">
											  <div class="inner">Sample Caption on Hover</div>
										  </div>
									  </a>
								  </li>

								  <li>
									  <a href="<?php echo base_url();?>gallery/images/gallery/image-3.jpg" data-rel="colorbox">
										  <img alt="150x150" src="<?php echo base_url();?>gallery/images/gallery/thumb-3.jpg" />
										  <div class="text">
											  <div class="inner">Sample Caption on Hover</div>
										  </div>
									  </a>

									  <div class="tools tools-bottom">
										  <a href="#">
											  <i class="icon-link">Buy</i>
										  </a>

										  <a href="#">
											  <i class="icon-paper-clip">sell</i>
										  </a>

										  <a href="#">
											  <i class="icon-pencil"></i>
										  </a>

										  <a href="#">
											  <i class="icon-remove red"></i>
										  </a>
									  </div>
								  </li>
							  </ul>
						  nknnkknk
                     <div class="control-group">
															<label class="control-label" for="form-field-date">Birth Date</label>

															<div class="controls">
																<div class="input-append">
																	<input class="input-small date-picker" id="form-field-date" type="text" data-date-format="dd-mm-yyyy" placeholder="dd-mm-yyyy" />
																	<span class="add-on">
																		<i class="icon-calendar"></i>
																	</span>
																</div>
															</div>
														</div>

     
                          </div>
							<!--PAGE CONTENT ENDS-->
						</div><!--/.span-->
					</div>
<!--basic scripts-->

		<!--[if !IE]>-->

		<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>

		<!--<![endif]-->

		<!--[if IE]>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<![endif]-->

		<!--[if !IE]>-->

		<script type="text/javascript">
			window.jQuery || document.write("<script src='<?php echo base_url();?>gallery/js/jquery-2.0.3.min.js'>"+"<"+"/script>");
		</script>

		<!--<![endif]-->

		<!--[if IE]>
<script type="text/javascript">
 window.jQuery || document.write("<script src='<?php echo base_url();?>gallery/js/jquery-1.10.2.min.js'>"+"<"+"/script>");
</script>
<![endif]-->

		<script type="text/javascript">
			if("ontouchend" in document) document.write("<script src='<?php echo base_url();?>gallery/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
		</script>

		<!--page specific plugin scripts-->

<script src="<?php echo base_url();?>gallery/js/jquery.colorbox-min.js"></script>

		<!--ace scripts-->

<script src="<?php echo base_url();?>gallery/js/ace-elements.min.js"></script>

		<!--inline scripts related to this page-->

<script type="text/javascript">
			$(function() {
	var colorbox_params = {
		reposition:true,
		scalePhotos:true,
		scrolling:false,
		previous:'<i class="icon-arrow-left"></i>',
		next:'<i class="icon-arrow-right"></i>',
		close:'&times;',
		current:'{current} of {total}',
		maxWidth:'100%',
		maxHeight:'100%',
		onOpen:function(){
			document.body.style.overflow = 'hidden';
		},
		onClosed:function(){
			document.body.style.overflow = 'auto';
		},
		onComplete:function(){
			$.colorbox.resize();
		}
	};

	$('.ace-thumbnails [data-rel="colorbox"]').colorbox(colorbox_params);
	$("#cboxLoadingGraphic").append("<i class='icon-spinner orange'></i>");//let's add a custom loading icon

	/**$(window).on('resize.colorbox', function() {
		try {
			//this function has been changed in recent versions of colorbox, so it won't work
			$.fn.colorbox.load();//to redraw the current frame
		} catch(e){}
	});*/
})
		</script>
