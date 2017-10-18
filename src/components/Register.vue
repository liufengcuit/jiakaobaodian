<template>
	<div class="register">
		<form>
		  <div class="form-group">
		    <label for="exampleInputEmail1">用户名：</label>
		    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="username" v-model="username" autocomplete="off">
		  </div>
		  <div class="form-group">
		    <label for="exampleInputPassword1">密码：</label>
		    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" v-model="userpwd" autocomplete="off">
		  </div>
		  <button type="button" class="btn btn-default" @click="register()">注册</button>
		</form>
	</div>
</template>
<script>
	export default {
		name:"Register",
		data(){
			return {
				username:"",
				userpwd:"",
				url:'http://127.0.0.1:80/vue.php'
			}
		},
		methods:{
			register:function(){
				this.$axios.get(this.url,{params:{'type':'register','username':this.username,'userpwd':this.userpwd}}).then(function(res){
					console.log(res);
				});
			}
		}
	}
</script>