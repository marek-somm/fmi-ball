<template>
	<div id="home" class="base" ref="wrapper">
		<div class="inner">
			<div class="header">
				<a href="#about" class="arrow">
					<h1 class="title">Zu den Infos</h1>
					<i
						class="
							arrow-icon
							fa-solid fa-chevron-down fa-2x
							animate__animated
							animate__bounce
							animate__slow
							animate__infinite
						"
					></i>
				</a>
			</div>
		</div>
	</div>
</template>

<script>
import { onMounted, ref, watchEffect } from "@vue/runtime-core";
import { useRoute } from "vue-router";

export default {
	setup() {
		const route = useRoute();
		const wrapper = ref(0);

		onMounted(() => {
			watchEffect(() => {
				route.name;
				wrapper.value.scrollIntoView();
			});
		});

		return {
			wrapper,
		};
	},
};
</script>

<style lang="scss" scoped>
#home {
	height: 100vh;
	margin: 0;
	color: $white;
	transform: translateY(-4.4rem);

	.inner {
		width: auto;
		padding: 2rem;
		padding-top: 50vh;

		@media screen and (max-width: 780px) {
			padding-top: 2rem;
		}

		.header {
			padding: 0;

			.title {
				text-shadow: 1px 1px 6px black;
				padding-right: 1.5rem;

				font-size: 2rem;
				@media screen and (min-width: 780px) {
					font-size: 5vw;
				}
			}

			hr {
				height: 4px;
				border: 1px #c0c0c059 solid;
				border-right: none;
				border-left: none;
				box-shadow: 1px 1px 3px black;
				position: relative;

				&::before,
				&::after {
					content: "";
					display: block;
					position: absolute;
					top: -0.5rem;
					background-color: #c0c0c059;
					height: calc(1rem + 4px);
					width: 1px;
					box-shadow: 2px 2px 3px black;
				}

				&::before {
					left: -1px;
				}

				&::after {
					right: -1px;
				}
			}

			.subtitle {
				font-size: 1.25rem;
				color: $white-second;
				font-weight: 300;
				text-shadow: 2px 2px 3px black;
			}
		}

		.arrow {
			display: flex;
			padding: 1rem;
			text-decoration: none;
			color: $white;

			&:hover {
				cursor: pointer;
			}

			.fa-2x {
				font-size: 2rem;
				@media screen and (min-width: 780px) {
					font-size: 5vw;
				}
			}
		}
	}

	.content {
		font-size: 1.2rem;
		background: $white-second;
		padding: 1rem 5rem 3rem 5rem;
		text-align: left;
	}
}
</style>