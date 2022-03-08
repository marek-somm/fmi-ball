<template>
	<div id="nav">
		<ul class="menu">
			<li class="menu-item">
				<a href="#home">Home</a>
			</li>
			<li class="menu-item">
				<a href="#about">Infos</a>
			</li>
			<li class="menu-item">
				<a href="#tickets">Karten</a>
			</li>
			<li class="menu-item">
				<a href="#sponsor">Sponsoren</a>
			</li>
		</ul>
	</div>
</template>

<script>
import { computed } from "@vue/runtime-core";
import colors from "@/scss/_colors.scss?vue&type=style&index=0&lang=scss&module=1";

export default {
	props: {
		solid: Boolean
	},
	setup(props) {
		const menuColor = computed(() =>
			!props.solid ? colors.white : colors.black
		);
		const menuBorderColor = computed(() =>
			!props.solid ? "#c0c0c059" : "#74747459"
		);
		const menuBackgroundColor = computed(() =>
			!props.solid ? "transparent" : "#f2f2f2"
		);
		const menuBackgroundShadow = computed(() =>
			!props.solid ? "transparent" : "#00000033"
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
$menuColor: $white;
$menuBorderColor: #c0c0c059;
$menuBackgroundColor: transparent;
$menuBackgroundShadow: transparent;

#nav {
	display: block;

	position: sticky;
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