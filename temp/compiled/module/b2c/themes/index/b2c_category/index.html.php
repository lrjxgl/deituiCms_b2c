<!DOCTYPE html>
<html>
	<?php echo $this->fetch('head.html'); ?>
	<link href="<?php echo $this->_var['skins']; ?>b2c_category/index.css" rel="stylesheet" />
	<body>
		<div class="header">
			<div class="header-back"></div>
			<div class="header-title">分类</div>
		</div>
		<div class="header-row"></div>
		<div class="main-body bg-white">
		<div class="list-side">
			<?php $_from = $this->_var['catList']; if (!is_array($_from) && !is_object($_from)) { $_from=array();}; $this->push_vars('', 'c');if (count($_from)):
    foreach ($_from AS $this->_var['c']):
?>
			<div class="list-side-item"><?php echo $this->_var['c']['title']; ?></div>
			<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
			 
		
		
		</div>
		<div class="list-main">
			<?php $_from = $this->_var['catList']; if (!is_array($_from) && !is_object($_from)) { $_from=array();}; $this->push_vars('', 'c');if (count($_from)):
    foreach ($_from AS $this->_var['c']):
?>
			<div class="list-cat-item">
				 
				<div gourl="/module.php?m=b2c_product&a=list&catid=<?php echo $this->_var['c']['catid']; ?>" class="list-cat-hd"><?php echo $this->_var['c']['title']; ?></div>
				<div class="list-child">
					<?php $_from = $this->_var['c']['child']; if (!is_array($_from) && !is_object($_from)) { $_from=array();}; $this->push_vars('', 'cc');if (count($_from)):
    foreach ($_from AS $this->_var['cc']):
?>
					<div gourl="/module.php?m=b2c_product&a=list&catid=<?php echo $this->_var['cc']['catid']; ?>" class="list-child-item">
						<img class="list-child-img" src="<?php echo $this->_var['cc']['imgurl']; ?>.100x100.jpg"
						    onerror="this.src='http://img.deitui.com/?w=50&amp;h=50&amp;text=logo&amp;fontsize=14&amp;textcolor=fff&amp;bgcolor=9FB6CD'">
						<div class="list-child-title"><?php echo $this->_var['cc']['title']; ?></div>
					</div>
					<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?> 
					<div class="clearfix"></div>
				</div>
			</div>
			<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
			
		</div>
		<?php $this->assign('ftnav','b2c_category'); ?>
		<?php echo $this->fetch('ftnav.html'); ?>
		<?php echo $this->fetch('footer.html'); ?>
		<script src="<?php echo $this->_var['skins']; ?>b2c_category/index.js"></script>
	</body>
</html>
