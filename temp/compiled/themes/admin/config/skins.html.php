<style>
.skins-item{
	display: inline-block;
	line-height: 30px;
	width: 60px;
	height:30px;
	margin-bottom: 5px;
	margin-right: 10px;
	text-align: center;
	color: #fff;
	background-color: #FF4600;
	cursor: pointer;
}
 
 			
</style>
 
<table class="table">
	<tr>
		<td>主颜色</td>
		<td>
			<input type="text" style="width: 60px; float: left; margin-right: 10px;" id="skinscolor" name="skinscolor" value="<?php echo $this->_var['data']['skinscolor']; ?>"> 
			 
			<span id="picker" class="skins-item">选择颜色</span>
			<a target="_blank" href="https://www.deituicms.com/skinscolor/skinscolor.php">常用风格</a> 
		</td>
	</tr>
	<tr>
		<td>底部导航</td>
		<td>
			<input name="skins_fttype" type="radio" <?php if ($this->_var['data']['skins_fttype'] == 'color'): ?>checked <?php endif; ?> value="color" />字体颜色
			<input name="skins_fttype"  type="radio" <?php if ($this->_var['data']['skins_fttype'] == 'bg'): ?>checked <?php endif; ?> value="bg" />背景颜色
		</td>
	</tr> 
</table>
