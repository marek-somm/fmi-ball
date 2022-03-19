<template>
	<div id="fancy-button-container" @click="onClick">
		<router-link :to="{name: link}" :href="href" class="learn-more">
			<span class="circle" aria-hidden="true">
				<span class="icon arrow"></span>
			</span>
			<span class="button-text">{{ text }}</span>
		</router-link>
	</div>
</template>

<script>
export default {
	props: {
		text: String,
		href: String,
		link: String
	},
	emits: ["click"],
	setup(props, { emit }) {
		function onClick(event) {
			emit("click", event);
		}

		return {
			onClick,
		};
	},
};
</script>

<style lang="scss" scoped>
$tmp: $black;
$black: $white;
$white: $tmp;

#fancy-button-container {
	@mixin transition(
		$property: all,
		$duration: 0.45s,
		$ease: cubic-bezier(0.65, 0, 0.076, 1)
	) {
		transition: $property $duration $ease;
	}

	* {
		box-sizing: border-box;
		&::before,
		&::after {
			box-sizing: border-box;
		}
	}

	.learn-more {
		position: relative;
		display: inline-block;
		cursor: pointer;
		outline: none;
		border: 0;
		vertical-align: middle;
		text-decoration: none;
		background: transparent;
		padding: 0;
		font-size: inherit;
		font-family: inherit;
		width: max-content;
		max-width: calc(100vw - 2rem);
		height: 3rem;
		margin: 0 1rem;
		@media screen and (max-width: 780px) {
			height: auto;
		}

		.circle {
			@include transition;
			position: absolute;
			display: block;
			margin: 0;
			width: 3rem;
			height: 3rem;
			@media screen and (max-width: 780px) {
				height: 100%;
			}
			background: $black;
			border-radius: 1.625rem;
			.icon {
				@include transition;
				position: absolute;
				top: 0;
				bottom: 0;
				margin: auto;
				background: $white;
				&.arrow {
					@include transition;
					left: 0.625rem;
					width: 1.125rem;
					height: 0.125rem;
					background: none;
					&::before {
						position: absolute;
						content: "";
						top: -0.25rem;
						right: 0.0625rem;
						width: 0.625rem;
						height: 0.625rem;
						border-top: 0.125rem solid $white;
						border-right: 0.125rem solid $white;
						transform: rotate(45deg);
					}
				}
			}
		}
		.button-text {
			@include transition;
			display: flex;
			flex-direction: column;
			justify-content: center;
			position: relative;
			top: 0;
			left: 0;
			right: 0;
			bottom: 0;
			z-index: 1;
			padding: 0rem 2rem;
			margin: 0 0 0 1.75rem;
			color: $black;
			font-weight: 700;
			line-height: 1.6;
			text-align: right;
			text-transform: uppercase;
			font-size: 1.7rem;
			//width: max-content;
			max-width: calc(100vw - 2rem);
			height: 100%;
			text-align: center;
			@media screen and (min-width: 780px) {
				white-space: nowrap;
			}
			@media screen and (max-width: 780px) {
				white-space: pre-wrap;
			}
		}

		@media screen and (min-width: 780px) {
			&:hover {
				.circle {
					width: 100%;
					.icon {
						&.arrow {
							background: $white;
							transform: translate(1rem, 0);
						}

						&::before,
						&::after {
							box-sizing: border-box;
						}
					}
				}
				.button-text {
					color: $white;
				}
			}
		}

		@media screen and (max-width: 780px) {
			.circle {
				width: 100%;
				.icon {
					&.arrow {
						background: $white;
						transform: translate(1rem, 0);
					}

					&::before,
					&::after {
						box-sizing: border-box;
					}
				}
			}
			.button-text {
				color: $white;
			}
		}
	}

	@supports (display: grid) {
		body {
			display: grid;
			grid-template-columns: repeat(4, 1fr);
			grid-gap: 0.625rem;
			grid-template-areas: ". main main ." ". main main .";
		}

		#container {
			grid-area: main;
			align-self: center;
			justify-self: center;
		}
	}
}
</style>