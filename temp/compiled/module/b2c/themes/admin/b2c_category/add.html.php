<!DOCTYPE html>
<html>
	<?php echo $this->fetch('head.html'); ?>
	<body>
		<?php echo $this->fetch('b2c_category/nav.html'); ?>
		<div class="main-body">
		<form method="post" action="/moduleadmin.php?m=b2c_category&a=save">
			<input type="hidden" name="catid" style="display:none;" value="<?php echo $this->_var['data']['catid']; ?>">
			<table class="table-add">
				<tr>
					<td>分类名称：</td>
					<td><input type="text" name="title" id="title" value="<?php echo $this->_var['data']['title']; ?>"></td>
				</tr>
				<tr>
					<td>图片：</td>
					<td>
						<div class="js-upload-item">
							<input type="file" id="upa" class="js-upload-file" style="display: none;" />
							<div class="upimg-btn js-upload-btn">+</div>
							<input type="hidden" name="imgurl" class="js-imgurl" value="<?php echo $this->_var['data']['imgurl']; ?>" />
							<div class="js-imgbox">
								<?php if ($this->_var['data']['imgurl']): ?>
								<img src="<?php echo images_site($this->_var['data']['imgurl']); ?>.100x100.jpg">
								<?php endif; ?>
							</div>
						</div>
				
					</td>
				</tr>
				 
				<tr>
					<td>上级分类：</td>
					<td> 
						<select  name="pid">
							<option  value="0">请选择</option>
							<?php $_from = $this->_var['catlist']; if (!is_array($_from) && !is_object($_from)) { $_from=array();}; $this->push_vars('', 'c');if (count($_from)):
    foreach ($_from AS $this->_var['c']):
?>
							<option value="<?php echo $this->_var['c']['catid']; ?>" <?php if ($this->_var['c']['catid'] == $this->_var['data']['pid']): ?>selected<?php endif; ?>><?php echo $this->_var['c']['title']; ?></option>
							<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
						</select>
					</td>
				</tr>
				<tr>
					<td>排序：</td>
					<td><input type="text" name="orderindex" id="orderindex" value="<?php echo $this->_var['data']['orderindex']; ?>"></td>
				</tr>
				<tr>
					<td>状态</td>
					<td>
						<input type="radio" <?php if ($this->_var['data']['status'] != 1): ?> checked="" <?php endif; ?> name="status" value="2" /> 下线
						<input type="radio" <?php if ($this->_var['data']['status'] == 1): ?> checked="" <?php endif; ?> name="status" value="1" /> 上线
					</td>
				</tr>
				<tr>
					<td>表单扩展</td>
					<td>
						<select name="ex_table_id">
							<option value="0">请选择</option>
							<?php $_from = $this->_var['tableList']; if (!is_array($_from) && !is_object($_from)) { $_from=array();}; $this->push_vars('', 'c');if (count($_from)):
    foreach ($_from AS $this->_var['c']):
?>
							<option <?php if ($this->_var['c']['tableid'] == $this->_var['data']['ex_table_id']): ?>selected<?php endif; ?> value="<?php echo $this->_var['c']['tableid']; ?>"><?php echo $this->_var['c']['title']; ?></option>
							<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
						</select>
					</td>
				</tr> 
			</table>
			<div class="btn-row-submit js-submit">保存</div>
		</form>
		</div>
		<?php echo $this->fetch('footer.html'); ?>
		<script src="/static/admin/js/upload.js"></script>
	</body>
</html>
