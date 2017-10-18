<template>
	<div class="login">
		<form>
		  <div class="form-group">
		    <label for="exampleInputEmail1">用户名：</label>
		    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="username" v-model="username">
		  </div>
		  <div class="form-group">
		    <label for="exampleInputPassword1">密码：</label>
		    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" v-model="userpwd">
		  </div>
		  <div class="checkbox">
		    <label>
		      <input type="checkbox"> 记住我
		    </label>
		  </div>
		  <button type="button" class="btn btn-default" @click="login()">登录</button>
		  <span class="btn" @click="register()">注册</span>
		</form>
	</div>
</template>
<script>
	export default{
		name:'login',
		data(){
			return {
				username:"",
				userpwd:"",
				// url:'static/mock/user.json',
				url:'http://127.0.0.1:80/vue.php'
			}
		},
		methods:{
			login:function(){
				var flag = this.username!='' && this.userpwd!='';
				if(!flag){
					alert("用户名或密码为空");
					return false;
				}
				var self = this;
				//获取当前username和userpwd
				this.$axios.get(this.url,{params:{'username':this.username,'userpwd':this.userpwd,'type':'login'}}).then(function(response){
					
					var infostate = response.data;
					console.log(infostate);
					if(infostate){
						self.$store.commit('token_status');
						self.$store.state.token = 123;
						self.$router.push({
							path:'/success'
						})
					}else{
						self.$router.push({
							path:'/error'
						})
					}
				});
			},
			register:function(){
				this.$router.push({
					path:'/register'
				})
			},
		}
	}
</script>
<style scoped>
	
</style>