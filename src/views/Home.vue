<template>
	<div id="home">
		<div class="inner">
			<div class="header">
				<h1 class="title">FMI-Ball 2022</h1>
				<hr />
				<p class="subtitle">
					Tanzball der Fakultät für Mathematik und Informatik
				</p>
			</div>
			<a href="#about" class="arrow animate__animated animate__bounce animate__slow animate__infinite">
				<i class="fa-solid fa-chevron-down fa-2x"></i>
			</a>
		</div>
	</div>
</template>

<script>
export default {
	setup() {
		return {};
	},
};
</script>

<style lang="scss" scoped>
#home {
	height: 100vh;
	//background-color: $white;
	color: $white;
	transform: translateY(-4.4rem);

	&::before {
		content: "";
		display: inline-block;
		vertical-align: middle;
		height: 100%;
		box-sizing: border-box;
	}

	.inner {
		display: inline-block;
		vertical-align: middle;
		box-sizing: inherit;

		.header {
			.title {
				font-size: 4rem;
				text-shadow: 1px 1px 6px black;
			}

			hr {
				height: 4px;
				border: 1px #c0c0c059 solid;
				border-right: none;
				border-left: none;
				box-shadow: 1px 1px 3px black;
				position: relative;

				&::before, &::after {
					content: '';
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
			display: inline-block;
			padding: 1rem;
			text-decoration: none;
			color: $white;

			&:hover {
				cursor: pointer;
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