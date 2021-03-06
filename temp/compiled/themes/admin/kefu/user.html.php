<!DOCTYPE html>
<html>
	<?php echo $this->fetch('head.html'); ?>
	<style>
		.w200{
			max-width: 200px;
		}
	</style>
	<body>
		<div class="tabs-border">
			<div class="item active">和<?php echo $this->_var['user']['nickname']; ?>对话</div>
		</div>
		<div class="main-body" >
			<div v-if="pageLoad" class="list" id="app">
				 
				<div v-for="(item,index) in pageData.list" :key="index" class="bg-white pd-10">
					 
					<div  v-if="item.tablename!='user'">
							<div class="flex cl2 mgr-5 flex-ai-center mgb-5">
								我 <div class="cl3 f12 mgl-20">{{item.createtime}}</div>
							</div>
							<div class="cl3">{{item.content}}</div>
						  
					</div>
					<div   v-else>
				 
						<div class="cl2 flex flex-ai-center mgb-5"> <?php echo $this->_var['user']['nickname']; ?> <div class="cl3 f12 mgl-5">{{item.createtime}}</div></div>
						<div class="cl3  flex">
							{{item.content}}
						</div>
						
					 
				 
				 
					</div>
				</div>
	 
			</div>
			<div class="footer-row"></div>
			<div style="position: fixed;bottom: 0;left: 0;right: 0;">
				<div class="input-flex">
					<input type="text" id="content" class="input-flex-text" />
					<div class="input-flex-btn" id="submit">发送</div>
				</div>
			</div>
		</div>
		<?php echo $this->fetch('footer.html'); ?>
		<script src="/plugin/vue/vue.min.js"></script>
		
		<script>
			var userid="<?php echo $this->_var['userid']; ?>";
			var app=new Vue({
				el:"#app",
				data:function(){
					return {
						pageLoad:false,
						pageData:[]
					}
				},
				created:function(){
					this.getPage();
				},
				methods:{
					getPage:function(){
						var that=this;
						$.ajax({
							url:"/admin.php?m=kefu&a=data&ajax=1",
							data:{
								userid:userid
							},
							dataType:"json",
							success:function(res){
								that.pageLoad=true;
								that.pageData=res.data
								console.log(res.data);
							}
						})
					},
					submit:function(){
						
					}
				}
			})
			$(function(){
				setInterval(function(){
					app.getPage();
				},20000)
				$(document).on("click","#submit",function(){
					var content=$("#content").val();
					$.post("/admin.php?m=kefu&a=save&ajax=1",{
						content:content,
						userid:userid
					},function(res){
						app.getPage();
						$("#content").val("");
					},"json")
				})
			})
		</script>
	</body>
</html>
