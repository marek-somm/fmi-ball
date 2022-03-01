<template>
	<div class="bg">
		<div class="img"></div>
	</div>
</template>

<script>
import { computed } from '@vue/runtime-core';
import { useRoute } from 'vue-router';
export default {
	setup() {
		const route = useRoute()
		const background = computed(() => {route.name === 'Home' ? 'url("~@/assets/faculty.jpg")' : 'white'})
		return {
			background
		};
	},
};
</script>

<style lang="scss" scoped>
.bg {
	height: 100%;
	width: 100%;

	background: url("~@/assets/faculty.jpg");
	background-repeat: no-repeat;
	background-size: cover;
	background-position: center center;
	background-attachment: fixed;
	filter: blur(3px) brightness(0.8);
	transform: scale(1.2);

	.img {
		height: 100%;
		width: 100%;

		//background: url('~@/assets/faculty.jpg') no-repeat right top;
		//background: #837960 url("~@/assets/faculty.jpg") 0 0 no-repeat;

		//background-image: radial-gradient(transparent 2%, white 70%), url("~@/assets/faculty.jpg");

		//box-shadow: inset 0 0 10rem white;
	}
}
</style>