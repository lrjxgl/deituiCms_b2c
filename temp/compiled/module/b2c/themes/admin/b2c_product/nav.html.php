<div class="tabs-border">
	<a class="item <?php if (get ( 'a' ) == 'default'): ?>active<?php endif; ?>" href="<?php echo $this->_var['appadmin']; ?>?m=b2c_product&pintuan=<?php echo $this->_var['pintuan']; ?>">产品列表</a>
	<a class="item <?php if (get ( 'a' ) == 'add'): ?>active<?php endif; ?>" href="<?php echo $this->_var['appadmin']; ?>?m=b2c_product&a=add&pintuan=<?php echo $this->_var['pintuan']; ?>">添加产品</a>
</div>