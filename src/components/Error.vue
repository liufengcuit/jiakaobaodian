<template>
	<div class="error">
		<h4>用户名和密码验证错误</h4>
		<button class="btn  btn-danger" @click="backloginpage()">返回登录页面</button>
	</div>
</template>
<script>
	export default {
		name:'error',
		methods:{
			backloginpage : function(){
				this.$router.push({
					path:'/'
				})
			}
		}
	}
</script>