<!DOCTYPE html>
<html>
	<?php echo $this->fetch('head.html'); ?>
	<body>
<?php echo $this->fetch('b2c_group/nav.html'); ?>
<div class="main-body">
<form method="post" action="/moduleadmin.php?m=b2c_group&a=save">
<input type="hidden" name="gid" style="display:none;" value="<?php echo $this->_var['data']['gid']; ?>" >
 <table class="table-add">  <tr>
				<td>名称：</td>		
				<td><input type="text" name="title" id="title" value="<?php echo $this->_var['data']['title']; ?>" ></td>
				</tr>
  <tr>
				<td>标签：</td>		
				<td><input type="text" name="gkey" id="gkey" value="<?php echo $this->_var['data']['gkey']; ?>" ></td>
				</tr>
  <tr>
				<td>记录数：</td>		
				<td><input type="text" name="gnum" id="gnum" value="<?php echo $this->_var['data']['gnum']; ?>" ></td>
				</tr>
 
</table> <div class="btn-row-submit js-submit">保存</div> 
</form>
</div> 
<?php echo $this->fetch('footer.html'); ?>
</body>
</html>