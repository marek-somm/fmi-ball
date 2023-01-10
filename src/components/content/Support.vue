<template>
	<div id="support" class="base bg-blur">
		<div class="inner">
			<div class="header">
				<h2 class="title">Du willst mitmachen?</h2>
				<p class="subtitle">Cool! Das ist großartig!</p>

				<FancyButton href="#tickets" text="Karten kaufen" v-if="false" />
			</div>

			<div class="content">
				<p></p>
				<h3>Mitorganisieren</h3>
				<p>
					Du willst bei der Organisation zukünftiger FMI-Bälle dabei sein?
					Das ist super, wir freuen uns riesig! Menschen kommen und gehen,
					das ist leider eine Tatsache. Daher braucht es immer neue
					motivierte Menschen, die Spaß daran haben, tolle Traditionen
					aufrecht zu erhalten.
				</p>
				<p>
					Du kannst dich einfach an uns per Mail (<a
						class="link"
						href="mailto:fmi-ball@uni-jena.de"
						>fmi-ball@uni-jena.de</a
					>) wenden, oder auch gerne an einer Sitzung deines favorisierten
					Fachschaftsrates teilnehmen. Da bist du sowieso immer sehr
					willkommen.
				</p>
				<p>Wir freuen uns auf dich, bis bald!</p>
				<p></p>
				<h3>Schauspiel</h3>
				<p>
					Du magst es dich auf der Bühne vor einem großen Publikum zu
					beweisen? Oder suchst eine neue Herausforderung? Oder vielleicht
					hast du auch nur eine Wette verloren? <br />
					Ganz egal was deine Motivation sein mag, wir suchen noch
					engagierte und motivierte Schauspiel-Begeisterte. Du brauchst
					keinerlei Erfahrungen mitzubringen, wir sind alle nur Amateure!
					Das einzige was du mitbringen solltest ist Spaß und Motivaition,
					denn gerade in den Wochen vor dem Ball steht uns eine Zeit mit
					vielen Proben befor.
				</p>
				<p>
					Wende dich gerne per Mail (<a
						class="link"
						href="mailto:fmi-ball@uni-jena.de"
						>fmi-ball@uni-jena.de</a
					>) an uns oder schau bei einer Sitzung deines Fachschaftsrates
					vorbei.
				</p>
				<p>Wir freuen uns von dir zu hören!</p>
			</div>
		</div>
	</div>
</template>

<script>
import { useRouter } from "vue-router";
import FancyButton from "../FancyButton.vue";
export default {
	components: { FancyButton },
	setup() {
		const router = useRouter();

		function gotoTickets() {
			router.push({ name: "Tickets" });
		}

		return {
			gotoTickets,
		};
	},
};
</script>

<style lang="scss" scoped>
</style>