<!DOCTYPE >
<html>
<head>
	<title>deituiCMS</title>
	<link href="/static/admin/css/iframe.css?v34" rel="stylesheet" />
	<link href="//at.alicdn.com/t/font_902011_gf4ip479r5r.css" rel="stylesheet" />
</head>
<body>
	<div class="topBox">
		<div class="topa">
			<div class="top-item js-toggleSide" title="左侧">
				<i class="iconfont icon-goLeft"></i>
			</div>
			<div class="top-item js-back" title="后退">
				<i class="iconfont icon-back"></i>
			</div>
			
			<div onClick="goHome(this)" class="top-item-btn" title="后台主页">
				<i class="iconfont icon-home"></i> 主后台
			</div>
			<?php $_from = $this->_var['topNav']; if (!is_array($_from) && !is_object($_from)) { $_from=array();}; $this->push_vars('', 'c');if (count($_from)):
    foreach ($_from AS $this->_var['c']):
?>
			<div url="<?php echo $this->_var['c']['link_url']; ?>" title="<?php echo $this->_var['c']['title']; ?>" class="top-item-btn js-goPlugin">
				<i class="iconfont <?php echo $this->_var['c']['icon']; ?>"></i> <?php echo $this->_var['c']['title']; ?>
			</div>
			<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
			<a onclick="goModule(this)" class="top-item-btn">
				<i class="iconfont icon-repair"></i> 插件扩展
			</a>
			<div style="float: right;">
				<div class="top-item js-refresh" title="刷新">
					<i class="iconfont icon-refresh"></i>
				</div>
				<a href="/" target="_blank" class="top-item" title="前台首页">
					<i class="iconfont icon-global"></i>
				</a>
				<div class="top-item" id="nickname">
					老雷
					 
				</div>
				<div onclick="logout()" class="top-item" title="注销">
					<i class="iconfont icon-logout"></i>
				</div>
				<div  class="top-item" title="更多">
					<i class="iconfont icon-moreandroid"></i>
				</div>
			</div>
		</div>
		<div class="topb">
			<div class="topb-item"><i class="iconfont icon-goLeft"></i></div>
			<div class="topb-item">首页
				<i class="iconfont icon-close "></i>
			</div>
			<div class="topb-item">文章<i class="iconfont icon-close "></i></div>
			<div style="float: right; margin-right: 10px;">
				<div class="topb-item"><i class="iconfont icon-goRight"></i></div>
			</div>
		</div>
	</div>
	
	<div class="leftBox">
		<div class="sitename" id="sitename">deituiCMS</div>
		<div class="menu-bar" id="menuBar"></div>
		<!--基础后台管理-->
		 <div id="baseMenu">
			<?php $_from = $this->_var['navList']; if (!is_array($_from) && !is_object($_from)) { $_from=array();}; $this->push_vars('', 'c');if (count($_from)):
    foreach ($_from AS $this->_var['c']):
?>
			<div class="menu">
				<div class="menu-title" ><i class="iconfont <?php echo $this->_var['c']['icon']; ?>"></i> <?php echo $this->_var['c']['title']; ?></div>
				<?php if ($this->_var['c']['child']): ?>
				<div class="menu-box">
					<?php $_from = $this->_var['c']['child']; if (!is_array($_from) && !is_object($_from)) { $_from=array();}; $this->push_vars('', 'cc');if (count($_from)):
    foreach ($_from AS $this->_var['cc']):
?>
					<div gourl="<?php echo $this->_var['cc']['link_url']; ?>" class="menu-item"><?php echo $this->_var['cc']['title']; ?></div>
					 
					<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
				</div>
				<?php endif; ?>
			</div>
			<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
		</div>
		<!--插件后台管理-->
		<div id="pluginMenu">
			
		</div>
	</div>
	<div class="rightBox">
		<iframe id="mainFrame" class="mainFrame" name="mainFrame" src="/admin.php?m=index&a=main"></iframe>
	</div>
	
	<script src="/plugin/jquery/jquery-2.1.3.min.js"></script>
	 <script>
		 function goPluginMenu(url,title){
			$.get(url,function(res){
				$("#baseMenu").hide();
				$("#pluginMenu").html(res).show();
				$("#sitename").html(title);
			}) 
			
		 }
		 function logout(){
			 $.get("/admin.php?m=login&a=logout",function(){
				 window.location="/admin.php"
			 })
		 }
		 function goHome(obj){
			 $("#sitename").html("deituiCMS"); 
			 $("#baseMenu").show();
			 $("#pluginMenu").hide();
			 $("#mainFrame").attr("src","/admin.php?m=index&a=main");
			 $(".top-item-btn").removeClass("active");
			 $(obj).addClass("active");
			 window.location.reload();
		 }
		 function goModule(obj){
			 $(".top-item-btn").removeClass("active");
			 $(obj).addClass("active");
			$("#mainFrame").attr("src","/admin.php?m=module"); 
		 }
		 $(function(){
			 $(document).on("click",".js-toggleSide",function(){
				 $("body").toggleClass("miniSide");
			 })
			 
			 $(document).on("click",".js-goPlugin",function(){
				 var url=$(this).attr("url");
				 $(".top-item-btn").removeClass("active");
				 $(this).addClass("active");
				 var title=$(this).attr('title');
				 $.get(url,function(res){
				 	$("#baseMenu").hide();
				 	$("#pluginMenu").html(res).show();
					$("#sitename").html(title);
				 })
			 })
			 
			 $(document).on("click",".menu",function(){
				 $(this).addClass("menu-active").siblings().removeClass("menu-active");
				 var top=$(this).find(".menu-title").offset().top;
				 $("#menuBar").animate({top:top},100);
			 })
			 $(document).on("mouseenter",".menu",function(){
				 var top=$(this).find(".menu-title").offset().top;
				 $("#menuBar").animate({top:top},100);
			 })
			 $(document).on("click","[gourl]",function(){
				 var url=$(this).attr("gourl");
				 $("#mainFrame").attr("src",url);
				 $("[gourl]").removeClass("menu-item-active");
				 $(this).addClass("menu-item-active");
			 })
			 $(document).on("click",".js-refresh",function(){
				 mainFrame.window.location.reload();
			 })
			 $(document).on("click",".js-back",function(){
				 mainFrame.window.history.back();
			 })
		 })
	 </script>
</body>

</html>