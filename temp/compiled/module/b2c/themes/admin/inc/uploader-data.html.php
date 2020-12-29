<div class="upimg-box uploader-imgsdata-imgslist js-zzimg-album">
	<input  type="file"  multiple="" class="none uploader-imgsdata-file" />
	<div class="upimg-btn">
		<div class="upimg-btn-icon"></div>
		
	</div>
	<?php $_from = $this->_var['imgsdata']; if (!is_array($_from) && !is_object($_from)) { $_from=array();}; $this->push_vars('', 'c');if (count($_from)):
    foreach ($_from AS $this->_var['c']):
?>
	<div class="upimg-item uploader-imgsdata-img js-zzimg" data-src="<?php echo $this->_var['c']['trueimgurl']; ?>" v="<?php echo $this->_var['c']['imgurl']; ?>" trueimg="<?php echo $this->_var['c']['trueimgurl']; ?>">
		<img class="upimg-img" src="<?php echo $this->_var['c']['trueimgurl']; ?>.100x100.jpg"/>
		<i class="upimg-del   js-imgdel"></i>
		<div class="flex flex-center">
			<div class="upimg-goleft">&lt;</div>
			&nbsp;
			<div class="upimg-goright">&gt;</div>
		</div>
		
	</div>
	<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
	 
</div>
<style>
	.upimg-goleft,.upimg-goright{
		display: block;
		cursor: pointer;
		width: 30px;
		height: 20px;
		color: #f40;
	}
</style>