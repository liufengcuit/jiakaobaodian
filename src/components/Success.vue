<template>
	<div class="success">
		<h3>驾考宝典</h3>
		<weather></weather>
		<!--笑话列表-->
		<ul>
			<li v-for="(list,$index) in lists" type="1">
				<h6>{{ list['question'] }}</h6>
				<img :src="list['url']" alt="">
				<ul>
					<li type="A">{{ list['item1'] }}</li>
					<li type="A">{{ list['item2'] }}</li>
					<li type="A">{{ list['item3'] }}</li>
					<li type="A">{{ list['item4'] }}</li>
				</ul>
				<h6><strong>答案：{{ list['answer'] | numToLetter }}</strong><br></h6>
				<h5 style="background-color: #e0d7c6"><em style='font-weight: bolder;'>分析：</em>{{ list['explains'] }}</h5>
			</li>
		</ul>
		<p><button @click="backloginpage()" class="btn btn-primary">返回登录页面</button><a href="" class="btn" @click="zhuxiao()">注销</a></p>
	</div>
</template>
<script>
	import weather from './Weather';
	export default {
		name:'success',
		data(){
			return {
				url:"http://127.0.0.1/vue.php",
				lists:null
			}
		},
		beforeCreate(){
			this.$store.commit('token_status');
			// if(this.state.token);
			// console.log();
			if(this.$store.state.token==null){
				alert("对不起，您还未登录，请登录！即将跳转到登录页面...");
				this.$router.push({
					path:"/"
				})
			}
		},
		mounted() {
			var self = this;
			this.$axios.get(this.url,{params:{'type':'car'}}).then(function(response){
				console.log(response.data.result);
				self.lists = response.data.result;
			});
		},
		methods:{
			backloginpage:function(){
				this.$router.push({
					path:'/'
				})
			},
			zhuxiao:function(){
				this.$store.commit('token_status');
				this.$store.state.token=null;
				this.$router.push({
					path:'/'
				})
			}
		},
		filters:{
			numToLetter:function(value){
				if(value==1){
					return 'A';
				}else if(value==2){
					return 'B';
				}else if(value == 3){
					return 'C';
				}else if(value == 4){
					return 'D';
				}else{
					return '无';
				}
			}
		},
		components:{ weather }
	}
</script>
<style scoped>
	h3{
		padding: 50px 0 10px;
		border-bottom: 1px solid #ccc;
	}
</style>