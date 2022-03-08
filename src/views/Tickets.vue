<template>
	<div id="tickets">
		<div class="inner">
			<div class="header">
				<h2 class="title">Kartenverkauf und Abholung</h2>
				<p class="subtitle">
					Momentan werden noch keine Karten verkauft<br />Der Kartenverkauf
					öffnet bald
				</p>

				<FancyButton text="Jetzt reservieren" @click="" />
			</div>
			<div class="content">
				<p>
					Trotz einer Online-Reservierung müssen die Karten abgeholt
					werden.
				</p>
				<p>
					Nähere Informationen dazu sind in der Bestätigungs-Email
					nachzulesen.
				</p>
			</div>
		</div>
	</div>
</template>

<script>
import FancyButton from "../components/FancyButton.vue";
export default {
	components: { FancyButton },
	setup() {
		return {};
	},
};
</script>

<style lang="scss" scoped>
#tickets {
	height: 100vh;
	//background-color: $white;

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
		width: 100%;

		.header {
			font-size: 2rem;
			padding: 3rem 0 4.5rem 0;
			color: $white;

			.subtitle {
				font-size: 1.5rem;
				color: $white-second;
				font-weight: 300;
				margin: 1.5rem 2rem;
			}
		}

		.content {
			font-size: 1.2rem;
			background: $white-second;
			padding: 1rem 5rem 3rem 5rem;
			text-align: left;
		}
	}
}
</style>