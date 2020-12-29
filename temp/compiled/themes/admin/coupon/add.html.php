<!DOCTYPE  html>
<html>
<?php echo $this->fetch('head.html'); ?>
<body>
<div class="tabs-border">
	<a class="item" href="<?php echo $this->_var['appadmin']; ?>?m=coupon">优惠券列表</a>
	<a class="item active" href="<?php echo $this->_var['appadmin']; ?>?m=coupon&a=add">添加优惠券</a>
	<a class="item" href="<?php echo $this->_var['appadmin']; ?>?m=coupon&a=user">优惠券用户</a>
</div>
<div class="main-body">
    <form method='post' action='<?php echo $this->_var['appadmin']; ?>?m=coupon&a=save'>
      <input type='hidden' name='id' style='display:none;' value='<?php echo $this->_var['data']['id']; ?>' >
      <table class='table-add'>
        <tr>
          <td width="100">名称：</td>
          <td><input type='text' name='title' id='title' value='<?php echo $this->_var['data']['title']; ?>' ></td>
        </tr>
        
        <tr>
        	<td>限制次数</td>
            <td>
            	<input class="w100" type="text" name="limit_num" value="<?php if (! $this->_var['data']['limit_num']): ?>1<?php else: ?><?php echo $this->_var['data']['limit_num']; ?><?php endif; ?>"> (用户可以领取次数)
            </td>
        </tr>
        
         
        <tr>
          <td>抵消价格：</td>
          <td><input type='text' name='money' id='money'    value='<?php echo $this->_var['data']['money']; ?>' ></td>
        </tr>
        
        <tr>
          <td>最低消费价格：</td>
          <td><input type='text' name='lower_money' id='lower_money'    value='<?php echo $this->_var['data']['lower_money']; ?>' ></td>
        </tr>
        
        <tr>
          <td>总数量：</td>
          <td><input type='text' name='amount' id='amount'   value='<?php echo $this->_var['data']['amount']; ?>' ></td>
        </tr>
        <tr>
          <td>领取数量：</td>
          <td><input type='text' name='get_num' id='get_num'   value='<?php echo $this->_var['data']['get_num']; ?>' ></td>
        </tr>
        
        <tr>
          <td>使用数量：</td>
          <td><input type='text' name='use_num' id='use_num'    value='<?php echo $this->_var['data']['use_num']; ?>' ></td>
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
          <td>截止日期：</td>
          <td><input type='text' name='etime' id='etime'   value='<?php echo $this->_var['data']['etime']; ?>'  ></td>
        </tr>
        <?php if ($this->_var['data']): ?>
        <tr>
          <td>创建时间：</td>
          <td><?php echo date("Y-m-d H:m",$this->_var['data']['dateline']); ?></td>
        </tr>
        <?php endif; ?>
        <tr>
          <td>状态：</td>
          <td><input type='radio' name='status' id='status' value='1' <?php if ($this->_var['data']['status'] == 1): ?> checked="checked" <?php endif; ?> >
            显示
            <input type='radio' name='status' id='status' value='0' <?php if ($this->_var['data']['status'] != 1): ?> checked="checked" <?php endif; ?>>
            隐藏 </td>
        </tr>

      </table>
			<div class="btn-row-submit js-submit">保存</div>
    </form>
  </div>
</div>
<?php echo $this->fetch('footer.html'); ?>
<script language="javascript" src="/static/admin/js/upload.js"></script>
<script src="/plugin/laydate/laydate.js"></script>
<script>

	laydate.render({
		elem:"#etime",
		type: 'datetime'
	})
</script>
<?php echo $this->fetch('footer.html'); ?>