<!DOCTYPE html>
<html>
	<?php echo $this->fetch('head.html'); ?>
	<body>
		<div class="tabs-border">
			<div class="item active">基本设置</div>
		</div>
		<div class="main-body">
			<form action="/moduleadmin.php?m=b2c_config&a=save&ajax=1">
				<table class="table-add">
				 
					 
					<tr>
						<td>商城模式</td>
						<td>
							<input type="radio" <?php if ($this->_var['data']['shoptype'] == 'b2c'): ?>checked<?php endif; ?> name="shoptype" value="b2c" /> 店铺模式  
							&nbsp;&nbsp;
							<input type="radio" <?php if ($this->_var['data']['shoptype'] == 'diancan'): ?>checked<?php endif; ?> name="shoptype" value="diancan" /> 点餐模式 
							 
						</td>
					</tr>
					<tr>
						<td>Vip卡支付</td>
						<td>
							<input <?php if ($this->_var['data']['vipcard'] == 1): ?>checked<?php endif; ?> type="radio" name="vipcard" value="1" />开启
							<input <?php if ($this->_var['data']['vipcard'] != 1): ?>checked<?php endif; ?>  type="radio" name="vipcard" value="1" /> 关闭
							(需要vipcard模块支持)
						</td>
					</tr>
					
				</table>
				<div class="btn-row-submit js-submit">保存设置</div>
			</form>
		</div>
		<?php echo $this->fetch('footer.html'); ?>
	</body>
</html>
