<!DOCTYPE html>
<html>
	<?php echo $this->fetch('head.html'); ?>
	<body>
		<?php echo $this->fetch('b2c_product/nav.html'); ?>
		<div class="main-body">
			<form class="search-form" action="/moduleadmin.php" autocomplete="off">
				<input type="hidden" name="m" value="b2c_product">
				<input type="hidden" name="pintuan" value="<?php echo $this->_var['pintuan']; ?>" />
				<div class="mgb-10">
				ID <input type="text"  class="w50" name="id" value="<?php echo intval($_GET['id']); ?>" />
				名称 <input type="text" class="w150" name="title" value="<?php echo $_GET['title']; ?>" />
				类型 
				<select class="w100" name="otype">
					<option <?php if (get ( "otype" ) == ''): ?>selected<?php endif; ?> value="">全部</option>
					<option <?php if (get ( "otype" ) == 'ispin'): ?>selected<?php endif; ?>  value="ispin">拼团</option>
					<option <?php if (get ( "otype" ) == 'isflash'): ?>selected<?php endif; ?>  value="isflash">秒杀</option>
				</select>
				分类 
				<select name="catid" class="w100">
					<option value="0">请选择</option>
					<?php $_from = $this->_var['catList']; if (!is_array($_from) && !is_object($_from)) { $_from=array();}; $this->push_vars('', 'c');if (count($_from)):
    foreach ($_from AS $this->_var['c']):
?>
						<option value="<?php echo $this->_var['c']['catid']; ?>" <?php if (get ( "catid" ) == $this->_var['c']['catid']): ?>selected<?php endif; ?>><?php echo $this->_var['c']['title']; ?></option>
						<?php if ($this->_var['c']['child']): ?>
						<?php $_from = $this->_var['c']['child']; if (!is_array($_from) && !is_object($_from)) { $_from=array();}; $this->push_vars('', 'cc');if (count($_from)):
    foreach ($_from AS $this->_var['cc']):
?>
						<option value="<?php echo $this->_var['cc']['catid']; ?>" <?php if (get ( "catid" ) == $this->_var['cc']['catid']): ?>selected<?php endif; ?>>|--<?php echo $this->_var['cc']['title']; ?></option>
						<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
						<?php endif; ?>
					<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
				</select>
				价格 从<input type="text" class="w60" name="sprice" value="<?php echo html($_GET['sprice']); ?>" /> 到
				<input type="text"  class="w60"  name="eprice" value="<?php echo html($_GET['eprice']); ?>" />
				状态：
				<select  class="w100" name="type">
					<option value="">请选择</option>
					<option <?php if (get ( "type" ) == 'online'): ?>selected<?php endif; ?> value="online">上架</option>
					<option <?php if (get ( "type" ) == 'offline'): ?>selected<?php endif; ?>  value="offline">下架</option>
				</select>
				</div>
				<div class="mgb-5">
				
				推荐 <input <?php if (get ( "isrecommend" )): ?>checked<?php endif; ?> type="checkbox" name="isrecommend" value="1" />
				最热 <input <?php if (get ( "ishot" )): ?>checked<?php endif; ?>  type="checkbox" name="ishot" value="1" />
				<button type="submit" class="btn" >搜索</button>
				</div> 
			</form>
			<form id="cForm">
			<table class="tbs mgb-10">
				<thead>
					<tr>
						<td>id <input type="checkbox" class="chkall"  /></td>
						<td>名称</td>
						<td>分类</td>
						 
						<td>图片</td>
						<td>类型</td>
						<td>价格</td>
						<td>促销价</td>
					 
						<td>月销</td>
						<td>状态</td> 
						<td>最新</td>
						<td>最热</td>
						<td>推荐</td>
						<td>库存</td>
						<td>销量</td>
						
						 
						
						<td>操作</td>
					</tr>
					</tr>
				</thead> <?php $_from = $this->_var['list']; if (!is_array($_from) && !is_object($_from)) { $_from=array();}; $this->push_vars('', 'c');if (count($_from)):
    foreach ($_from AS $this->_var['c']):
?>
				<tr>
					<td><input type="checkbox" class="ids"  name="ids[]" value="<?php echo $this->_var['c']['id']; ?>" /> <?php echo $this->_var['c']['id']; ?></td>
					<td><?php echo $this->_var['c']['title']; ?></td>
					<td><?php echo $this->_var['c']['catid_name']; ?></td>
				 
					<td><img src="<?php echo $this->_var['c']['imgurl']; ?>.100x100.jpg" width="60" /> </td>
					<td><?php echo $this->_var['c']['otype']; ?></td>
					<td><?php echo $this->_var['c']['price']; ?></td>
					<td><?php echo $this->_var['c']['lower_price']; ?></td>
					 
					 
					<td><?php echo $this->_var['c']['month_buy_num']; ?></td>
					<td><div class="<?php if ($this->_var['c']['status'] == 1): ?>yes<?php else: ?>no<?php endif; ?> js-toggle-status" url="/moduleadmin.php?m=b2c_product&a=status&id=<?php echo $this->_var['c']['id']; ?>&ajax=1" ></div></td>
					<td><div class="<?php if ($this->_var['c']['isnew'] == 1): ?>yes<?php else: ?>no<?php endif; ?> js-toggle-status" url="/moduleadmin.php?m=b2c_product&a=new&id=<?php echo $this->_var['c']['id']; ?>&ajax=1" ></div></td>
					<td><div class="<?php if ($this->_var['c']['ishot'] == 1): ?>yes<?php else: ?>no<?php endif; ?> js-toggle-status" url="/moduleadmin.php?m=b2c_product&a=hot&id=<?php echo $this->_var['c']['id']; ?>&ajax=1" ></div></td>
					<td><div class="<?php if ($this->_var['c']['isrecommend'] == 1): ?>yes<?php else: ?>no<?php endif; ?> js-toggle-status" url="/moduleadmin.php?m=b2c_product&a=recommend&id=<?php echo $this->_var['c']['id']; ?>&ajax=1" ></div></td>
					<td><?php echo $this->_var['c']['total_num']; ?></td>
					<td><?php echo $this->_var['c']['buy_num']; ?></td>
					
					 
			 
					 
					<td>
						<a href="/moduleadmin.php?m=b2c_product_ks&productid=<?php echo $this->_var['c']['id']; ?>">款式</a>
						<a href="/moduleadmin.php?m=b2c_product&a=add&id=<?php echo $this->_var['c']['id']; ?>">编辑</a> <br />
					<a target="_blank" href="/module.php?m=b2c_product&a=show&id=<?php echo $this->_var['c']['id']; ?>">查看</a>
					<a href="javascript:;" class="js-delete" url="/moduleadmin.php?m=b2c_product&a=delete&id=<?php echo $this->_var['c']['id']; ?>">删除</a></td>
				</tr>
				<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
			</table>
			<div class="flex flex-ai-center">
				<input type="checkbox" class="chkall"  />&nbsp;
				分类：    <select name="catid" class="w100 mgr-5">
				<option value="0">请选择</option>
				<?php $_from = $this->_var['catList']; if (!is_array($_from) && !is_object($_from)) { $_from=array();}; $this->push_vars('', 'c');if (count($_from)):
    foreach ($_from AS $this->_var['c']):
?>
					<option value="<?php echo $this->_var['c']['catid']; ?>" <?php if (get ( "catid" ) == $this->_var['c']['catid']): ?>selected<?php endif; ?>><?php echo $this->_var['c']['title']; ?></option>
					<?php if ($this->_var['c']['child']): ?>
					<?php $_from = $this->_var['c']['child']; if (!is_array($_from) && !is_object($_from)) { $_from=array();}; $this->push_vars('', 'cc');if (count($_from)):
    foreach ($_from AS $this->_var['cc']):
?>
					<option value="<?php echo $this->_var['cc']['catid']; ?>" <?php if (get ( "catid" ) == $this->_var['cc']['catid']): ?>selected<?php endif; ?>>|--<?php echo $this->_var['cc']['title']; ?></option>
					<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
					<?php endif; ?>
				<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
				</select>
				
				<div  class="btn mgr-10"  id="changeCategory">修改分类</div>
				聚合：
				<select name="gid" class="w100 mgr-5">
					<option value="0">请选择</option>
					<?php $_from = $this->_var['groupList']; if (!is_array($_from) && !is_object($_from)) { $_from=array();}; $this->push_vars('', 'c');if (count($_from)):
    foreach ($_from AS $this->_var['c']):
?>
					<option value="<?php echo $this->_var['c']['gid']; ?>"><?php echo $this->_var['c']['title']; ?></option>
					<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
				</select>
				<div  class="btn"  id="changeGroup">聚合产品</div>
			</div>
			</form>
			<div><?php echo $this->_var['pagelist']; ?></div>
		</div>
		<?php echo $this->fetch('footer.html'); ?>
		<script src="/plugin/laydate/laydate.js"></script>
		<script>
			laydate.render({
				elem:"#stime"
			})
			laydate.render({
				elem:"#etime"
			});
		</script>
		<script>
		$(".chkall").click(function(){
			if($(this).prop("checked")==true){
				$(".ids").prop("checked",true);
			}else{
				$(".ids").prop("checked",false);
			}
		});
		$(document).on("click","#changeCategory",function(){
			$.post("/moduleadmin.php?m=b2c_product&a=category&ajax=1",$("#cForm").serialize(),function(res){
				skyToast(res.message);
				if(!res.error){
					window.location.reload();
				}
			},"json");
		})
		$(document).on("click","#changeGroup",function(){
			$.post("/moduleadmin.php?m=b2c_product&a=group&ajax=1",$("#cForm").serialize(),function(res){
				skyToast(res.message);
				if(!res.error){
					window.location.reload();
				}
			},"json");
		})
		</script>
	</body>
</html>
