<!DOCTYPE html>
<html>
	<?php echo $this->fetch('head.html'); ?>
	<link href="<?php echo $this->_var['skins']; ?>b2c_user/index.css" rel="stylesheet" />
	<body>
		<div class="header">
			<a href="/module.php?m=b2c" class="header-back"></a>
			<div class="header-title">个人中心</div>
			 
		</div>
		<div class="header-row"></div>
		<div class="main-body">
			<div class="uhead" v-if="pageLoad">

				<image gourl="/index.php?m=user&a=user_head" class="uhead-img" src="<?php echo $this->_var['data']['user_head']; ?>.100x100.jpg"></image>

				<div class="uhead-box">
					<div class="mgb-10 f16 flex">
						<div><?php echo $this->_var['user']['nickname']; ?></div>
						<div class="flex-1"></div>
						<?php if ($this->_var['invitecode']): ?>
						<div class="cl2 mgr-5">邀请码</div>
						<div gourl="/index.php?m=invite&a=my" class="cl-num"><?php echo $this->_var['invitecode']; ?></div>
						<?php endif; ?>
					</div>
					<div class="uhead-rnum flex flex-ai-center">
						
						<text>余额 ￥</text>
						<text class="f14 cl-money mgl-5"><?php echo $this->_var['data']['money']; ?></text>
					</div>
					<div class="uhead-rnum flex  flex-ai-center">
						
						<text>金币</text>
						<text class="cl-money mgl-5 mgr-5"><?php echo $this->_var['data']['gold']; ?></text>
						<text>个</text>
						 

					</div>
				</div>
				<div gourl="/index.php?m=user&a=set" class="flex-center btn-small btn-link iconfont icon-settings"></div>
			</div>
			<div class="row-box mgb-5">
				<div class="row-box-hd">		
					<div class="flex-1">我的订单</div>
					<div gourl="/module.php?m=b2c_order&a=my&type=all" class="row-box-more">全部订单</div>
				</div>
			<div class="flex pdt-10 flex-center">
				<div gourl="/module.php?m=b2c_order&a=my&type=unpay" class="flex-1">
					<div class="f22 iconfont icon-moneybag cl-u"></div> 
					<div>待付款</div>
				</div>
				<div gourl="/module.php?m=b2c_order&a=my&type=unreceive" class="flex-1">
					<div class="f22 iconfont icon-deliver cl-u"></div> 
					<div>待收货</div>
				</div>
				<div gourl="/module.php?m=b2c_order&a=my&type=unraty" class="flex-1">
					<div class="f22 iconfont icon-comment cl-u"></div> 
					<div>待评价</div>	
				</div>
			</div>
		</div>
		<div class="row-box mgb-5">
			 
			<div gourl="/index.php?m=invite&a=my" class="row-item">
				<div class="row-item-icon icon-friend  cl-u"></div>
				<div class="row-item-title">邀请好友</div>
			</div>  
			<div gourl="/index.php?m=notice&a=my" class="row-item">
				<div class="row-item-icon icon-notice  cl-u"></div>
				<div class="row-item-title">我的消息</div>
			</div>
		
			<div gourl="/index.php?m=recharge&a=my" class="row-item">
				<div class="row-item-icon icon-moneybag  cl-u"></div>
				<div class="row-item-title">支付记录</div>
			</div>
		
		
			<div gourl="/index.php?m=user_address&a=my" class="row-item">
				<div class="row-item-icon icon-addressbook  cl-u"></div>
				<div class="row-item-title">收货地址</div>
			</div>
		
			<div gourl="/index.php?m=kefu" class="row-item">
				<div class="row-item-icon icon-service  cl-u"></div>
				<div class="row-item-title">联系客服</div>
			</div>
			<div gourl="/index.php?m=html&a=aboutus" class="row-item">
				<div class="row-item-icon icon-info  cl-u"></div>
				<div class="row-item-title">关于我们</div>
			</div>
		</div>
			
		</div>
		<?php $this->assign('ftnav','b2c_user'); ?>
		<?php echo $this->fetch('ftnav.html'); ?>
		<?php echo $this->fetch('footer.html'); ?>	
	</body>
</html>
