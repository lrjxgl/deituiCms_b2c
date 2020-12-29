<!DOCTYPE html>
<html>
	<?php echo $this->fetch('head.html'); ?>
	<style>
		.video{
			width: 320px;
			height: auto;
		}
		.fnone{
			display: none;
		}
	</style>
	<body>
		<?php echo $this->fetch('b2c_product/nav.html'); ?>
		<div class="main-body">
			<form method="post" action="/moduleadmin.php?m=b2c_product&a=save">
				<input type="hidden" name="id" style="display:none;" value="<?php echo $this->_var['data']['id']; ?>">
				<table class="table-add">
					<tr>
						<td>名称：</td>
						<td><input type="text" name="title" id="title" value="<?php echo $this->_var['data']['title']; ?>"></td>
					</tr>
					<tr>
						<td>分类：</td>
						<td>
							<select id="catid" name="catid">
								<option value="0">请选择</option>
								<?php $_from = $this->_var['catlist']; if (!is_array($_from) && !is_object($_from)) { $_from=array();}; $this->push_vars('', 'c');if (count($_from)):
    foreach ($_from AS $this->_var['c']):
?>
									<option value="<?php echo $this->_var['c']['catid']; ?>" <?php if ($this->_var['data']['catid'] == $this->_var['c']['catid']): ?>selected<?php endif; ?>><?php echo $this->_var['c']['title']; ?></option>
									<?php if ($this->_var['c']['child']): ?>
									<?php $_from = $this->_var['c']['child']; if (!is_array($_from) && !is_object($_from)) { $_from=array();}; $this->push_vars('', 'cc');if (count($_from)):
    foreach ($_from AS $this->_var['cc']):
?>
									<option value="<?php echo $this->_var['cc']['catid']; ?>" <?php if ($this->_var['data']['catid'] == $this->_var['cc']['catid']): ?>selected<?php endif; ?>>|--<?php echo $this->_var['cc']['title']; ?></option>
									<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
									<?php endif; ?>
								<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
							</select>
						</td>
					</tr>
					
					<tr>
						<td>品牌：</td>
						<td>
							<select name="brandid">
								<option value="0">请选择</option>
								<?php $_from = $this->_var['brandList']; if (!is_array($_from) && !is_object($_from)) { $_from=array();}; $this->push_vars('', 'c');if (count($_from)):
    foreach ($_from AS $this->_var['c']):
?>
								<option value="<?php echo $this->_var['c']['brandid']; ?>" <?php if ($this->_var['c']['brandid'] == $this->_var['data']['brandid']): ?>selected<?php endif; ?>><?php echo $this->_var['c']['title']; ?></option>
								<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
							</select>
						</td>
					</tr>
					
					<tr>
						<td>描述：</td>
						<td><input type="text" name="description" id="description" value="<?php echo $this->_var['data']['description']; ?>"></td>
					</tr>
					<tr>
						<td>图片</td>
						<td>
							<div class="bg-fff mgb-5">
								<input type="hidden" name="imgsdata" id="imgsdata" value="<?php echo $this->_var['data']['imgsdata']; ?>" />
							<?php echo $this->fetch('inc/uploader-data.html'); ?>
							</div>
						</td>
					</tr>
					<tr>
						<td>价格：</td>
						<td><input type="text" class="w100" name="price" id="price" value="<?php echo $this->_var['data']['price']; ?>">元</td>
					</tr>
					<tr>
						<td>购物类型</td>
						<td>
							<div class="mgb-10">
								<input type="radio" <?php if ($this->_var['data']['otype'] == ''): ?>checked<?php endif; ?> class="otype" name="otype" value="" />正常
								<input type="radio" <?php if ($this->_var['data']['otype'] == 'ispin'): ?>checked<?php endif; ?>  class="otype"  name="otype" value="ispin" />拼团
								<input type="radio" <?php if ($this->_var['data']['otype'] == 'isflash'): ?>checked<?php endif; ?>  class="otype"  name="otype" value="isflash" />秒杀
							</div>
							<div id="pinBox" class="otypeBox <?php if (! $this->_var['data'] || $this->_var['data']['otype'] != 'ispin'): ?>fnone<?php endif; ?>">
								<div class="flex flex-ai-center mgb-5">
									<div class="w100">拼团价</div>
									<div>
										<input type="text" class="w100" name="pt_price" id="pt_price" value="<?php echo $this->_var['data']['pt_price']; ?>">元
									</div>
								</div>
								<div class="flex flex-ai-center">
									<div class="w100">拼团人数</div>
									<div>
										<input type="text" name="pt_min" value="<?php echo $this->_var['data']['pt_min']; ?>" />
									</div>
								</div>
							</div>
							
							<div id="flashBox" class="otypeBox <?php if (! $this->_var['data'] || $this->_var['data']['otype'] != 'isflash'): ?>fnone<?php endif; ?>">
								<div class="flex flex-ai-center mgb-5">
									<div class="w100">开始时间</div>
									<div>
										<input id="sTime" type="text" name="stime" value="<?php if (! $this->_var['data']): ?>2018-01-01:02:02:02<?php else: ?><?php echo date("Y-m-d H:i:s",$this->_var['data']['stime']); ?><?php endif; ?>" />
									</div>
								</div>
								<div class="flex flex-ai-center mgb-5">
									<div class="w100">结束时间</div>
									<div>
										<input id="eTime" type="text" name="etime" value="<?php if (! $this->_var['data']): ?>2028-01-01:02:02:02<?php else: ?><?php echo date("Y-m-d H:i:s",$this->_var['data']['etime']); ?><?php endif; ?>" />
									</div>
								</div>
							</div>	
						</td>
					</tr>
					 
					 
					<tr>
						<td>库存：</td>
						<td><input type="text" name="total_num" id="total_num" value="<?php echo $this->_var['data']['total_num']; ?>"></td>
					</tr>
					<tr>
						<td>销量：</td>
						<td><input type="text" name="buy_num" id="buy_num" value="<?php echo $this->_var['data']['buy_num']; ?>"></td>
					</tr>
					<tr>
						<td>促销价：</td>
						<td><input type="text" name="lower_price" id="lower_price" value="<?php echo $this->_var['data']['lower_price']; ?>"></td>
					</tr>
					<tr>
						<td>市场价：</td>
						<td><input type="text" name="market_price" id="market_price" value="<?php echo $this->_var['data']['market_price']; ?>"></td>
					</tr> 
					<tr>
						<td>重量：</td>
						<td><input class="w100" type="text" name="weight" id="weight" value="<?php echo $this->_var['data']['weight']; ?>">Kg</td>
					</tr>
					
					 
					<tr>
						<td>款式名称：</td>
						<td><input type="text" name="ks_label_name" id="ks_label_name" value="<?php echo $this->_var['data']['ks_label_name']; ?>"></td>
					</tr>
					<tr>
						<td>款式尺寸：</td>
						<td><input type="text" name="ks_label_size" id="ks_label_size" value="<?php echo $this->_var['data']['ks_label_size']; ?>"></td>
					</tr>
					<tr>
						<td>月销：</td>
						<td><input type="text" name="month_buy_num" id="month_buy_num" value="<?php echo $this->_var['data']['month_buy_num']; ?>"></td>
					</tr>
					<tr>
						<td>视频：</td>
						<td>
							<div id="upmp4-btn" class="btn mgb-10">上传视频</div>
							<span id="progress"></span>
							<div style="padding: 10px; color: #f60;">视频小于100M，只支持mp4格式</div>
							<div id="mp4box">
								<?php if ($this->_var['data']['videourl']): ?>
								<video controls="" src="<?php echo images_site($this->_var['data']['videourl']); ?>" class="video"></video>
								<?php endif; ?>
							</div>
							
							<input type="hidden" name="videourl" id="mp4url" value="<?php echo $this->_var['data']['videourl']; ?>" />
						 
							<div style="display: none;">
								<input type="file" id="upvideo" name="upfile" />
							</div>
							 
						
						</td>
					</tr>
					<tr>
						<td>最新：</td>
						<td>
							<input type="radio" name="isnew" <?php if ($this->_var['data']['isnew'] == 1): ?>checked<?php endif; ?> value="1">是
							<input type="radio" name="isnew" <?php if ($this->_var['data']['isnew'] != 1): ?>checked<?php endif; ?> value="0">否
						
						</td>
					</tr>
					<tr>
						<td>最热：</td>
						<td>
							<input type="radio" name="ishot" <?php if ($this->_var['data']['ishot'] == 1): ?>checked<?php endif; ?> value="1">是
							<input type="radio" name="ishot" <?php if ($this->_var['data']['ishot'] != 1): ?>checked<?php endif; ?> value="0">否
						</td>
					</tr>
					<tr>
						<td>推荐：</td>
						<td>
							<input type="radio" name="isrecommend" <?php if ($this->_var['data']['isrecommend'] == 1): ?>checked<?php endif; ?> value="1">是
							<input type="radio" name="isrecommend" <?php if ($this->_var['data']['isrecommend'] != 1): ?>checked<?php endif; ?> value="0">否
						</td>
					</tr>
					
					 
					<tr>
						<td>状态</td>
						<td>
							<input type="radio" name="status" <?php if ($this->_var['data']['status'] == 1): ?> checked<?php endif; ?> value="1" />显示
							
							<input type="radio" name="status" <?php if ($this->_var['data']['status'] != 1): ?> checked<?php endif; ?>  value="2" />隐藏
						</td>
					</tr>
					<tr>
						<td>创建时间：</td>
						<td><?php echo $this->_var['data']['createtime']; ?></td>
					</tr>
					<tr>
						<td>内容：</td>
						<td>
							<script type="text/plain" id="content" name="content"><?php echo $this->_var['data']['content']; ?></script>
						</td>
					</tr>
				</table>
				<div id="tableFieldBox">
					<?php echo $this->fetch('b2c_product/tablefields.html'); ?>
				</div>
				<div class="btn-row-submit js-submit">保存</div>
			</form>
		</div>
		<?php echo $this->fetch('footer.html'); ?>
		
		<script src="/static/admin/js/upload.js"></script>
		<script src="<?php echo $this->_var['skins']; ?>/b2c_product/upload-video.js"></script>
		<script src="/plugin/lrz/lrz.bundle.js"></script>
		<script src="<?php echo $this->_var['skins']; ?>inc/uploader-data.js"></script>
		<?php loadEditor();;?>
		<script>
			var editor = UE.getEditor('content', options);
		 
		</script>
		<script src="/plugin/laydate/laydate.js"></script>
		<script>
			$(document).on("change",".otype",function(){
				$(".otypeBox").hide();
				if($(this).val()=="ispin"){
					$("#pinBox").show();
				}else if($(this).val()=="isflash"){
					$("#flashBox").show();
				}
			})
			laydate.render({
				elem:"#sTime",
				type:"datetime"
			})
			laydate.render({
				elem:"#eTime",
				type:"datetime"
			})
			$(document).on("change","#catid",function(){
				$.get("/moduleadmin.php?m=b2c_product&a=table&catid="+$(this).val(),function(html){
					$("#tableFieldBox").html(html);
				})
			})
		</script>
	</body>
</html>
