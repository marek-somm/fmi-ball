<template>
	<div id="nav">
		<ul class="menu" >
			<li class="menu-item" v-show="route.name != 'Home'" >
				<router-link :to="{ name: 'Home'} ">Home</router-link>
			</li>
			<li class="menu-item" v-show="route.name == 'Home'" >
				<a href="#home">Home</a>
			</li>
			<li class="menu-item" v-show="route.name == 'Home'" >
				<a href="#about">Infos</a>
			</li>
			<li class="menu-item" v-show="route.name == 'Home'" >
				<a href="#tickets">Karten</a>
			</li>
			<li class="menu-item" v-if="false" v-show="route.name == 'Home'" >
				<a href="#sponsor">Sponsoren</a>
			</li>
			<li class="menu-item" v-show="route.name == 'Home'" >
				<a href="#newsletter">Newsletter</a>
			</li>
		</ul>
	</div>
</template>

<script>
import { computed } from "@vue/runtime-core";
import colors from "@/scss/_colors.scss?vue&type=style&index=0&lang=scss&module=1";
import { useRoute } from 'vue-router';

export default {
	props: {
		solid: Boolean,
	},
	setup(props) {
		let tablet = window.innerWidth <= 780 && window.innerWidth > 540;
		let mobile = window.innerWidth <= 540;

		const menuColor = computed(() =>
			!props.solid && !tablet && !mobile ? colors.white : colors.black
		);
		const menuTextShadow = computed(() =>
			!props.solid && !tablet && !mobile ? "1px 1px 3px black" : "none"
		)
		const menuBorderColor = computed(() =>
			!props.solid && !tablet && !mobile ? "#e4e4e459" : "#74747459"
		);
		const menuBackgroundColor = computed(() =>
			!props.solid && !tablet && !mobile ? "transparent" : "#f2f2f2"
		);
		const menuBackgroundShadow = computed(() =>
			!props.solid && !tablet && !mobile ? "transparent" : "#00000033"
		);

		return {
			menuColor,
			menuTextShadow,
			menuBorderColor,
			menuBackgroundColor,
			menuBackgroundShadow,
			route: useRoute()
		};
	},
};
</script>

<style lang="scss" scoped>
$menu-transition-time: 0.7s;

$menuColor: v-bind(menuColor);
$menuTextShadow: v-bind(menuTextShadow);
$menuBorderColor: v-bind(menuBorderColor);
$menuBackgroundColor: v-bind(menuBackgroundColor);
$menuBackgroundShadow: v-bind(menuBackgroundShadow);

#nav {
	display: block;

	position: sticky;
	top: 0;
	left: 0;

	width: 100%;
	padding: 1.5em 0 1.5em;
	overflow: hidden;

	z-index: 2;

	transition: background $menu-transition-time,
		box-shadow $menu-transition-time;
	background-color: $menuBackgroundColor;
	box-shadow: 0 0.5rem 2rem $menuBackgroundShadow;

	.menu {
		display: inline-block;
		//line-height: 0;

		position: relative;

		margin: 0;
		padding: 0 0.5rem;
		height: max-content;

		transition: border $menu-transition-time;

		@media screen and (min-width: 780px) {
			border-left: solid 1px $menuBorderColor;
			border-right: solid 1px $menuBorderColor;

			&::before,
			&::after {
				display: block;
				content: "";

				position: absolute;
				top: 50%;
				margin-top: -3px;

				height: 4px;
				width: 1000%;

				transition: border $menu-transition-time;
				border-top: solid 1px $menuBorderColor;
				border-bottom: solid 1px $menuBorderColor;
			}

			&::before {
				margin-left: 1px;
				left: 100%;
			}

			&::after {
				margin-right: 1px;
				right: 100%;
			}
		}
	}

	.menu-item {
		display: inline-block;

		margin: 0 0.5rem 0 0.5rem;
		padding: 0rem 1rem;

		@media screen and (max-width: 780px) {
			padding: 0.5rem 1rem;
			font-size: 1.25rem;
		}

		//margin: -9px 0.5em 0 0.5em;

		a {
			text-decoration: none;
			font-weight: normal;
			white-space: nowrap;

			transition: color $menu-transition-time, text-shadow 0.5s;
			color: $menuColor;
			text-shadow: $menuTextShadow;

			&.router-link-exact-active {
				border-bottom: 1px $menuColor solid;
			}

			position: relative;
			display: block;

			&:after {
				content: "";
				position: absolute;
				bottom: -1px;
				left: 0;
				right: 0;
				width: 100%;
				height: 1px;
				transform: scaleX(0);
				background-color: $menuColor;

				transition: transform 0.2s;
			}

			&:hover {
				&:after {
					transform: scaleX(1);
				}
			}
		}
	}
}
</style>