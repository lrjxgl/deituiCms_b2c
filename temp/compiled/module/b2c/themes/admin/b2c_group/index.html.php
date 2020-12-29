<!DOCTYPE html>
<html>
	<?php echo $this->fetch('head.html'); ?>
	<body>
		<?php echo $this->fetch('b2c_group/nav.html'); ?>
		<div class="main-body">
			<table class="tbs">
				<thead>
					<tr>
						<td>gid</td>
						<td>名称</td>
						<td>标签</td>
						<td>记录数</td>

						<td>操作</td>
					</tr>
					</tr>
				</thead> <?php $_from = $this->_var['list']; if (!is_array($_from) && !is_object($_from)) { $_from=array();}; $this->push_vars('', 'c');if (count($_from)):
    foreach ($_from AS $this->_var['c']):
?>
				<tr>
					<td><?php echo $this->_var['c']['gid']; ?></td>
					<td><?php echo $this->_var['c']['title']; ?></td>
					<td><?php echo $this->_var['c']['gkey']; ?></td>
					<td><?php echo $this->_var['c']['gnum']; ?></td>

					<td>
						<a href="/moduleadmin.php?m=b2c_group&a=add&gid=<?php echo $this->_var['c']['gid']; ?>">编辑</a>
						<a href="/moduleadmin.php?m=b2c_group_product&gid=<?php echo $this->_var['c']['gid']; ?>">产品管理</a>
						<a href="javascript:;" class="js-delete" url="/moduleadmin.php?m=b2c_group&a=delete&gid=<?php echo $this->_var['c']['gid']; ?>">删除</a>
						<a href="javascript:;" class="js-clear" url="/moduleadmin.php?m=b2c_group&a=clear&gid=<?php echo $this->_var['c']['gid']; ?>">清空</a>
					</td>
				</tr>
				<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
			</table>
			<div><?php echo $this->_var['pagelist']; ?></div>
		</div>
		<?php echo $this->fetch('footer.html'); ?>
		<script>
			$(function() {
				$(document).on("click", ".js-clear", function() {
					var that = $(this);
					if (confirm("确认清空商品吗？")) {
						$.get(that.attr("url"), function(res) {
							skyToast(res.message);
						}, "json")
					}
				})
			})
		</script>

	</body>
</html>
