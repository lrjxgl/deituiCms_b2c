<!DOCTYPE html>
<html>
	<?php echo $this->fetch('head.html'); ?>
	<link href="<?php echo $this->_var['skins']; ?>/b2c_product/show.css?2" rel="stylesheet" />
	<link href="/plugin/swiper/css/swiper.min.css" rel="stylesheet" />
	<body>
		 
		<div class="d-fixTop">
			<div class="d-fixTop-back iconfont icon-back goBack"></div>
			<div class="flex-1"></div>
			<div gourl="/module.php?m=b2c_cart" class="d-fixTop-cart iconfont icon-cart"></div>
			<div></div>
		</div>
		
		
		<div class="main-body">
			<?php if ($this->_var['data']['videourl']): ?>
			<div class="flex flex-ai-center">
				<video src="<?php echo $this->_var['data']['videourl']; ?>" autoplay="autoplay"  x5-playsinline="" playsinline="" webkit-playsinline=""  controlsList="nodownload" controls style="width: 100%;"></video>
			</div>
			
			<?php elseif (! empty ( $this->_var['imgsdata'] )): ?>
			 
			<div class="scale-swiper-box" style="padding-bottom: 100%;">
				<div class="swiper-container scale-swiper-container" id="indexFlash">
					<div class="swiper-wrapper" >
						<?php $_from = $this->_var['imgsdata']; if (!is_array($_from) && !is_object($_from)) { $_from=array();}; $this->push_vars('', 'c');if (count($_from)):
    foreach ($_from AS $this->_var['c']):
?>
						<div class="swiper-slide scale-swiper-slide">
							<img class="wmax"src="<?php echo $this->_var['c']; ?>" /> 
							
						</div>
						<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
					</div>
					 
					<div class="swiper-pagination flex flex-jc-center"></div>
				 
				</div>
			</div> 
			<?php else: ?>
			<image src="<?php echo $this->_var['data']['imgurl']; ?>" class="d-img"></image>
			<?php endif; ?>
			<div class="row-box mgb-5">
				<div class="d-title mgb-10"><?php echo $this->_var['data']['title']; ?></div>
				<div class="flex mgb-5 flex-ai-center">
					<div class="cl-money mgr-10 f18">￥<?php echo $this->_var['data']['price']; ?></div>
					<div class="market-price f12">￥<?php echo $this->_var['data']['market_price']; ?></div>
				</div>
				<div class="flex">
					<div class="flex-1 cl3 f12">销量: <?php echo $this->_var['data']['buy_num']; ?></div>
					<div class="flex-1 cl3 f12">库存: <?php echo $this->_var['data']['total_num']; ?></div>
					<div class="flex-1 cl3 f12">人气: <?php echo $this->_var['data']['view_num']; ?></div>
				</div>
			</div>	
			<div class="row-box mgb-5 <?php if (! $this->_var['data']['isksid'] && ! $this->_var['fieldsList']): ?>none<?php endif; ?>">
				


				<?php if ($this->_var['data']['isksid']): ?>
				<div class="flex mgb-10 ppBox-Show pointer">
					<div class="mgr-5 cl3">选择</div>
					<div class="flex-1">
						<div class="cl2 mgb-5">选择  <?php echo $this->_var['data']['ks_label_name']; ?>,<?php echo $this->_var['data']['ks_label_size']; ?></div>
						<div class=" cl3  f12">
							<?php $_from = $this->_var['ksList']; if (!is_array($_from) && !is_object($_from)) { $_from=array();}; $this->push_vars('', 'c');if (count($_from)):
    foreach ($_from AS $this->_var['c']):
?>
							  <?php echo $this->_var['c']['title']; ?> &nbsp; 
							<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
						</div>
					</div>
					<div class="iconfont icon-right f14 cl3"></div>
				</div>
				<?php endif; ?>
				<?php if ($this->_var['fieldsList']): ?>
				<div class="flex flex-ai-center  pointer" id="attBox-show">
					<div class="mgr-5 cl3">参数</div>
					<div class="flex-1 f12">
					<?php $_from = $this->_var['fieldsList']; if (!is_array($_from) && !is_object($_from)) { $_from=array();}; $this->push_vars('', 'f');$this->_foreach['aa'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['aa']['total'] > 0):
    foreach ($_from AS $this->_var['f']):
        $this->_foreach['aa']['iteration']++;
?>
						<?php if (($this->_foreach['aa']['iteration'] - 1) < 2): ?>
						<?php echo $this->_var['f']["title"]; ?>					
						<?php endif; ?>
					<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
					</div>
					<div class="iconfont icon-right f14 cl3"></div>
				</div> 
				<?php endif; ?>

			</div>
			
			<div class="row-box mgb-5 none" :class="'flex-col'" id="cmApp" v-if="pageData.rscount>0">
				<div class="flex mgb-10" gourl="/module.php?m=b2c_product&a=raty&id=<?php echo $this->_var['data']['id']; ?>">
					
					<div class="cl2">商品评价 ({{pageData.rscount}})</div>
					<div class="flex-1"></div>
					<div class="f12 cl-money">查看全部</div>
					<div class="iconfont cl-money icon-right f14 cl3"></div>
				</div>
				<div class="bd-mp-5" v-for="(item,index) in pageData.list" :key="index" >
					<div class="flex mgb-5 flex-ai-center">
						<img :src="item.user_head+'.100x100.jpg'" class="wh-30 mgr-5" />
						<div class="flex-1">
							<div class="f12 mgb-5 cl3">{{item.nickname}}</div>
							<sky-raty style="margin-left: -10px;margin-bottom: 5px;" readonly="1" len="10" :grade="item.raty_grade"></sky-raty>
						
							<div class="cl1 f12">
								
								{{item.raty_content}}
							</div>
						</div>
					</div>
					
				</div>
				
			</div>
			
			<div class="pd-10 bg-fff">



				<div class="d-content">

					<?php echo $this->_var['data']['content']; ?>

				</div>
			</div>
			<div class="flex pd-10 flex-center f16 fw-600">相关推荐</div>
			<div class="mtlist">
			 
				<?php $_from = $this->_var['recList']; if (!is_array($_from) && !is_object($_from)) { $_from=array();}; $this->push_vars('', 'c');if (count($_from)):
    foreach ($_from AS $this->_var['c']):
?>
				<a href="/module.php?m=b2c_product&a=show&id=<?php echo $this->_var['c']['id']; ?>" class="mtlist-item">
					<div class="mtlist-item-bd">
						<div class="mtlist-bgimg-box">
							<div class="mtlist-bgimg" style="background-image:url(<?php echo $this->_var['c']['imgurl']; ?>.small.jpg)" ></div>
						</div>
						<div class="mtlist-item-pd">
							<div class="mtlist-item-money">
								<div class="mtlist-item-money-flex">￥
									<text class="mtlist-item-money_money"><?php echo $this->_var['c']['price']; ?></text>
								</div>
								<div class="mtlist-item-money_num">月销<?php echo $this->_var['c']['buy_num']; ?>件</div>
							</div>
							<div class="mtlist-title"><?php echo $this->_var['c']['title']; ?></div>
							 
						</div>
					</div>
				</a>
				<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
			</div>
		</div>
		 
		<style>
			.btn-fav-active .iconfont,.btn-fav-active {
				color: red !important;
			}
			.fnone{
				display: none;
			}
		</style>
		<div class="h60"></div>
		<div class="flcart">
			<div gourl="/index.php?m=kefu" class="flcart-f1 cl2">
				<div class="flcart-icon iconfont icon-service_light cl2"></div>
				客服
			</div>
			<div  tablename="mod_b2c_product" objectid="<?php echo $this->_var['data']['id']; ?>" class="flcart-f1 <?php if ($this->_var['isfav']): ?>btn-fav-active<?php endif; ?> cl2 pointer js-fav-toggle">
				<div class="flcart-icon iconfont icon-likefill cl2"></div>
				收藏
			</div>
			<div class="flcart-f2 ppBox-Show">加入购物车</div>
			<div class="flcart-f2 flcart-f3 ppBox-Show" goBuy="1">立即购买</div>
		</div>
		
		<div id="ppBox" class="modal-group ">
			<div class="modal-mask"></div>
			 
			<div class="ppBox ani-bottom">
				<div id="ppBox-close" class="ppBox-close iconfont icon-close"></div>
				<div class="flex flex-jc-center mgb-10">
					<img class="wh-80 mgr-10" src="<?php echo $this->_var['data']['imgurl']; ?>.100x100.jpg" />
					<div class="flex-1 flex-jc-center">
						<div class="cl-money mgb-5">￥<?php echo $this->_var['data']['price']; ?></div>
						<div class="f12 cl2 mgb-5">库存<?php echo $this->_var['data']['total_num']; ?>件</div>
						<?php if ($this->_var['data']['isksid']): ?>
						<div class="f12">选择 <?php echo $this->_var['data']['ks_label_name']; ?>,<?php echo $this->_var['data']['ks_label_size']; ?></div>
						<?php endif; ?>
					</div>
				</div>
				<?php if ($this->_var['data']['isksid']): ?>
				<div class="kslist-label mgb-5"><?php echo $this->_var['data']['ks_label_name']; ?></div>
				<div id="ks1" class="kslist bd-mp-10 pdl0">
					
					<?php $_from = $this->_var['ksList']; if (!is_array($_from) && !is_object($_from)) { $_from=array();}; $this->push_vars('', 'c');if (count($_from)):
    foreach ($_from AS $this->_var['c']):
?>
					<div class="kslist-item" v="<?php echo $this->_var['c']['id']; ?>"><?php echo $this->_var['c']['title']; ?></div>
					<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
				
				</div>
				<div class="kslist-label mgb-5"><?php echo $this->_var['data']['ks_label_size']; ?></div>
				<div id="ks2" class="kslist bd-mp-10 pdl0">
					
					<div class="flex kslist-list ">
						<?php $_from = $this->_var['ksList2']; if (!is_array($_from) && !is_object($_from)) { $_from=array();}; $this->push_vars('', 'c');if (count($_from)):
    foreach ($_from AS $this->_var['c']):
?>
						<div class="kslist-item" v="<?php echo $this->_var['c']['id']; ?>"><?php echo $this->_var['c']['size']; ?></div>
						<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
					</div>
				</div>
				<?php endif; ?>
				<div class="flex flex-ai-center bd-mp-10">
					<div class="f14">购买数量</div>
					<div class="flex-1"></div>
					<div class="numbox">
						<div class="numbox-minus">-</div>
						<input class="numbox-num" id="cart-amount" readonly="" value="<?php echo $this->_var['cart_amount']; ?>" />
						<div class="numbox-plus">+</div>
					</div>
				
				</div>
				<div class="btn-row-submit" id="addCart">确定</div>
			</div>
		</div>
		
		<div id="attBox" class="modal-group">
			<div class="modal-mask"></div>
			<div class="ppBox ani-bottom">
				<div class="text-center mgb-10">产品参数</div>
				<?php echo $this->fetch('b2c_product/tablefields.html'); ?>
				<div class="btn-row-submit" id="attBox-close">关闭</div>
			</div>	
		</div>
		
		
		<?php echo $this->fetch('footer.html'); ?>
		<script src="/plugin/swiper/js/swiper.min.js"></script>
		<script>
			$(function(){
				if($("#indexFlash .swiper-slide").length>0){
					var flash = new Swiper("#indexFlash", {
						pagination: {
							el: '.swiper-pagination',
						}
					});
				}else{
					$("#indexFlash").hide();
				}
				
			})
			
		</script>
		<script>
			var ksid = "<?php echo $this->_var['ksid']; ?>";
			var productid = "<?php echo $this->_var['data']['id']; ?>";
			
		</script>
		<script src="<?php echo $this->_var['skins']; ?>/b2c_product/show.js"></script>
		<script src="/plugin/vue/vue.min.js"></script>
		<script src="/plugin/dt-ui/raty.vue.js"></script>
		<script src="<?php echo $this->_var['skins']; ?>b2c_product/show.comment.js"></script>
	</body>
</html>
