<template>
	<div id="sponsor" class="base">
		<div class="inner">
			<div class="header">
				<h2 class="title">Unsere Sponsoren</h2>
				<p class="subtitle">
					Wir bedanken uns herzlich bei allen Sponsoren für die
					Unterstüzung des FMI-Balls
				</p>
			</div>
			<div class="content">
				<div class="sponsor-wrapper">
					<article
						class="sponsor"
						v-for="(sponsor, index) in sponsors"
						:key="index"
					>
						<div class="image-wrapper">
							<a
								class="image-link"
								:href="sponsor.url"
								:target="sponsor.tab ? '_blank' : ''"
								draggable="false"
							>
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
					<article class="sponsor">
						<div class="image-wrapper">
							<transition mode="out-in" name="fade">
								<div class="image-link">
									<img
										class="image"
										:src="'/assets/sponsors/' + egg.image"
										draggable="false"
										@click="showEgg"
										:key="egg.image"
									/>
								</div>
							</transition>
						</div>
						<div class="footer">
							<h3 class="title">
								<a @click="showEgg">
									<transition mode="out-in" name="fade">
										<p style="margin: 0" :key="egg.name">
											{{ egg.name }}
										</p>
									</transition>
								</a>
							</h3>
							<transition mode="out-in" name="fade">
								<p class="text" :key="egg.text">
									{{ egg.text }}
								</p>
							</transition>
						</div>
					</article>
				</div>
			</div>
		</div>
	</div>
</template>

<script>
import { reactive } from "@vue/reactivity";

export default {
	setup() {
		const sponsors = reactive({
			/*google: {
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
			},*/
		});

		const egg = reactive({
			image: "sponsor01.png",
			name: "Max Mustermann",
			eggname: "Marek Sommerfeld",
			url: "greetings",
			tab: true,
			text: "",
		});

		const data = reactive({
			offset: 100,
		});

		function showEgg() {
			egg.name = egg.eggname;
			egg.text = "Schöne Grüße vom Entwickler 😜";
			egg.image = "egg.png";
		}

		return {
			data,
			sponsors,
			egg,
			showEgg,
		};
	},
};
</script>

<style lang="scss" scoped>
#sponsor {
	.inner {
		.content {
			display: inline-block;
			box-sizing: border-box;
			overflow: hidden;
			width: 100vw;

			.sponsor-wrapper {
				display: flex;
				overflow: auto;

				.sponsor {
					max-width: 13rem;
					min-width: 13rem;
					height: 25rem;
					background-color: $white;
					margin: 0 1rem;
					padding: 1.5rem;

					.image-wrapper {
						display: flex;

						width: 11rem;
						height: 11rem;
						overflow: hidden;
						padding: 1rem;
						//background-color: #e6ebeb;
						background-color: $white;

						.image-link {
							position: relative;
							width: 100%;
							height: 100%;
							text-align: center;
							vertical-align: middle;

							&:hover {
								cursor: pointer;
							}

							.image {
								position: absolute;
								top: 50%;
								left: 50%;
								transform: translateX(-50%) translateY(-50%);
								margin: auto;
								max-width: 100%;
								max-height: 100%;
							}
						}
					}

					.footer {
						display: block;
						height: 12rem;

						text-align: center;
						padding: 0.5rem;
						padding-bottom: 0;

						color: $black-second;

						.title {
							font-size: 1.3rem;

							a {
								text-decoration: none;
								color: $black-second;
								transition: color 0.3s;

								&:hover {
									cursor: pointer;
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

	.fade-enter-active {
		transition: opacity 100ms cubic-bezier(0.55, 0.085, 0.68, 0.53);
	}

	.fade-leave-active {
		transition: opacity 75ms cubic-bezier(0.25, 0.46, 0.45, 0.94);
	}

	.fade-enter-from,
	.fade-leave-to {
		opacity: 0;
	}
}
</style>