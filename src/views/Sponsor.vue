<template>
	<div id="sponsor-container">
		<div class="header">
			<h2 class="title">Unsere Sponsoren</h2>
			<p class="subtitle">
				Wir bedanken uns herzlich bei allen Sponsoren für die Unterstüzung
				des FMI-Balls
			</p>
		</div>
		<div class="content">
			<article class="sponsor">
				<div class="image-wrapper">
					<img class="image" src="@/assets/pic01.jpg" />
				</div>
				<div class="footer">
					<h3 class="title">Muster Sponsor</h3>
					<p class="description">
						Dies ist ein tolles Unternehmen, jawohl, gut gut.
					</p>
				</div>
			</article>
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
#sponsor-container {
	//background-color: $white;

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
		.sponsor {
			//display: inline-block;
			width: 23rem;
			background-color: $white;

			.image-wrapper {
				width: inherit;
				height: 16rem;
				overflow: hidden;

				.image {
					width: 100%;
					margin: auto;
					text-align: center;
					vertical-align: middle;
				}
			}

			.footer {
				display: block;
				height: 12rem;

				text-align: center;
				padding: 2rem;

				color: $black-second;

				.description {
					font-weight: 300;
				}
			}
		}
		font-size: 1.2rem;
		background: $white-second;
		padding: 1rem 5rem 3rem 5rem;
		text-align: left;
	}
}
</style>