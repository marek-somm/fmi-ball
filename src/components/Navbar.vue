<template>
	<div id="nav">
		<ul class="menu">
			<li class="menu-item">
				<router-link :to="{ name: 'Home' }">Home</router-link>
			</li>
			<li class="menu-item">
				<router-link :to="{ name: 'About' }">Infos</router-link>
			</li>
			<li class="menu-item">
				<router-link :to="{ name: 'Tickets' }">Karten</router-link>
			</li>
			<li class="menu-item">
				<router-link :to="{ name: 'Sponsor' }">Sponsoren</router-link>
			</li>
		</ul>
	</div>
</template>

<script>
import { useRoute } from "vue-router";
import { computed } from "@vue/runtime-core";
import colors from "@/scss/_colors.scss?vue&type=style&index=0&lang=scss&module=1";

export default {
	setup() {
		const route = useRoute();

		const menuColor = computed(() =>
			route.name === "Home" ? colors.white : colors.black
		);
		const menuBorderColor = computed(() =>
			route.name === "Home" ? "#c0c0c059" : "#74747459"
		);
		const menuBackgroundColor = computed(() =>
			route.name === "Home" ? "transparent" : "#f2f2f2"
		);
		const menuBackgroundShadow = computed(() =>
			route.name === "Home" ? "transparent" : "#00000033"
		);

		return {
			menuColor,
			menuBorderColor,
			menuBackgroundColor,
			menuBackgroundShadow,
		};
	},
};
</script>

<style lang="scss" scoped>
$menu-transition-time: 0.7s;

#nav {
	display: block;

	position: absolute;
	top: 0;
	left: 0;

	width: 100%;
	padding: 1.5em 0 1.5em;
	overflow: hidden;

	z-index: 1;

	transition: background $menu-transition-time,
		box-shadow $menu-transition-time;
	background-color: v-bind(menuBackgroundColor);
	box-shadow: 0 0.5rem 2rem v-bind(menuBackgroundShadow);

	.menu {
		display: inline-block;
		//line-height: 0;

		position: relative;

		margin: 0;
		padding: 0 0.5rem;
		height: 1.25rem;

		transition: border $menu-transition-time;
		border-left: solid 1px v-bind(menuBorderColor);
		border-right: solid 1px v-bind(menuBorderColor);

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
			border-top: solid 1px v-bind(menuBorderColor);
			border-bottom: solid 1px v-bind(menuBorderColor);
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

	.menu-item {
		display: inline-block;

		margin: 0 0.5rem 0 0.5rem;
		padding: 0 1rem;

		//margin: -9px 0.5em 0 0.5em;

		a {
			text-decoration: none;
			font-weight: normal;
			white-space: nowrap;

			transition: color $menu-transition-time;
			color: v-bind(menuColor);

			&.router-link-exact-active {
				border-bottom: 1px v-bind(menuColor) solid;
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
				background-color: v-bind(menuColor);

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