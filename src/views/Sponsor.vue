<template>
	<div id="sponsor">
		<div class="header">
			<h2 class="title">Unsere Sponsoren</h2>
			<p class="subtitle">
				Wir bedanken uns herzlich bei allen Sponsoren für die Unterstüzung
				des FMI-Balls
			</p>
		</div>
		<div class="content">
			<div class="navigator left" v-show="">
				<i class="fa-solid fa-chevron-left fa-2x"></i>
			</div>
			<div class="navigator right" v-show="">
				<i class="fa-solid fa-chevron-right fa-2x"></i>
			</div>
			<div class="sponsor-wrapper">
				<article
					class="sponsor"
					v-for="(sponsor, index) in sponsors"
					:key="index"
					:style="{ transform: 'translateX(calc(0rem))' }"
				>
					<div class="image-wrapper">
						<a :href="sponsor.url" :target="sponsor.tab ? '_blank' : ''" draggable="false">
							<img
								class="image"
								:src="'/assets/sponsors/' + sponsor.image"
								draggable="false"
							/>
						</a>
					</div>
					<div class="footer">
						<h3 class="title">
							<a
								:href="sponsor.url"
								:target="sponsor.tab ? '_blank' : ''"
								>{{ sponsor.name }}</a
							>
						</h3>
						<p class="text">
							{{ sponsor.text }}
						</p>
					</div>
				</article>
			</div>
		</div>
	</div>
</template>

<script>
import { reactive } from "@vue/reactivity";

export default {
	setup() {
		const sponsors = reactive({
			google: {
				image: "sponsor03.png",
				name: "Google LLC",
				url: "https://www.google.de",
				tab: true,
				text: "Kann man sich wohl nur erträumen...",
			},
			starbucks: {
				image: "sponsor02.png",
				name: "Starbucks",
				url: "https://www.starbucks.com",
				tab: true,
				text: "Hochqualifizierter Kaffee steht uns bei. Wir danken für eine Spende in Form von ermunterndem Wohlfühlgefühl",
			},
			anonymous: {
				image: "sponsor04.png",
				name: "Anonymous",
				url: "https://en.wikipedia.org/wiki/Anonymous_(hacker_group)",
				tab: true,
				text: "Ein anonymer Beitrag einer anonymen Gruppe in anonymer Höhe",
			},
			mm: {
				image: "sponsor01.png",
				name: "Max Mustermann",
				url: "greetings",
				tab: true,
				text: "",
			},
		});

		const data = reactive({
			offset: 100,
		});

		return {
			data,
			sponsors,
		};
	},
};
</script>

<style lang="scss" scoped>
#sponsor {
	height: 100vh;
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
		display: inline-block;
		box-sizing: border-box;
		background: $white-second;
		padding: 1rem 6rem 3rem 6rem;
		overflow: hidden;

		width: 100vw;

		transform: translateX(0);

		.navigator {
			display: flex;
			align-items: center;
			justify-content: center;

			position: absolute;
			background-color: #5b5b5b5b;
			height: calc(100% - 4rem);
			width: 3rem;
			z-index: 1;

			&.left {
				left: 5.5rem;
			}

			&.right {
				right: 5.5rem;
			}
		}

		.sponsor-wrapper {
			display: flex;
			overflow: auto;

			.sponsor {
				max-width: 22rem;
				min-width: 22rem;
				height: 32rem;
				background-color: $white;
				margin: 0 1rem;
				padding: 1.5rem;

				.image-wrapper {
					display: flex;

					width: 22rem;
					height: 16rem;
					overflow: hidden;
					//background-color: #e6ebeb;
					background-color: $white;

					.image {
						max-width: 100%;
						max-height: 100%;
						margin: auto;
						text-align: center;
						flex-grow: 0;
					}
				}

				.footer {
					display: block;
					height: 12rem;

					text-align: center;
					padding: 2rem;
					padding-bottom: 0;

					color: $black-second;

					.title {
						font-size: 1.3rem;

						a {
							text-decoration: none;
							color: $black-second;
							transition: color 0.3s;

							&:hover {
								color: #0099b4;
							}
						}
					}

					.text {
						font-weight: 300;
						font-size: 1.1rem;
						line-height: 1.8rem;
					}
				}
			}
		}
	}
}
</style>