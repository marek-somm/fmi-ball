<template>
	<div id="fancy-button-container" @click="onClick">
		<button class="learn-more">
			<span class="circle" aria-hidden="true">
				<span class="icon arrow"></span>
			</span>
			<span class="button-text">{{ text }}</span>
		</button>
	</div>
</template>

<script>
export default {
	props: {
		text: String
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
		width: 22rem;
		height: auto;
		.circle {
			@include transition;
			position: relative;
			display: block;
			margin: 0;
			width: 3rem;
			height: 3rem;
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
			position: absolute;
			top: 0;
			left: 0;
			right: 0;
			bottom: 0;
			padding: 0.75rem 0;
			margin: 0 0 0 1.75rem;
			color: $black;
			font-weight: 700;
			line-height: 1.6;
			text-align: right;
			text-transform: uppercase;
			font-size: 1.7rem;
			white-space: nowrap;

			display: flex;
			align-items: center;
			justify-content: center;
		}

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