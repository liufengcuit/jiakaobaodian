<template>
	<div class="weather">
		<span v-text="time"></span>
		<span v-text="weekend"></span>
	</div>
</template>
<script>
	import { time } from '../js/time'
	export default {
		name:"weather",
		data() {
			return {
				time:time().year+time().month+time().date,
				weekend:time().week,
			}
		}
	}
</script>
<style scoped>
	.weather{
		position: absolute;
		right: 10%;
		top: 24px
	}
</style>