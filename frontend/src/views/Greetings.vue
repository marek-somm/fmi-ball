<template>
	<div id="greetings-container">
		<div class="inner">
			<div class="header">
				<h1 class="title">Schöne Grüße vom Entwickler 😜</h1>
				<p class="subtitle">
				</p>
			</div>
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
#greetings-container {
	//background-color: $white;
	color: $white;

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