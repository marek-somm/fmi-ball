<template>
	<div id="about" class="base bg-blur">
		<div class="inner">
			<div class="header">
				<h2 class="title">Safe the Date!</h2>
				<p class="subtitle">
					Der nächste Fmi-Ball findet am <u>16.06.2023</u> statt
				</p>

				<FancyButton href="#tickets" text="Karten kaufen" v-if="false" />
			</div>

			<div class="content">
				<p></p>
				<h3>Der Ball der Fakultät für Mathematik und Informatik</h3>
				<p>
					Der FMI-Ball wird von den Fachschaftsräten Mathematik, Informatik
					sowie Bioinformatik geplant und durchgeführt. Dieses Jahr steht
					er unter dem Thema <b><i>Ball to the future</i></b
					>. Nach dem Erfolgsschlager <i>Casino Binomial</i> im letzten
					Jahr ist er nun schon der zweite Ball seiner Art und baut so den
					Weg zur Tradition weiter aus.
				</p>
				<p>
					Der FMI-Ball soll einen klassischen Tanzabend mit den Vorzügen
					künstlerischer Unterhaltung im Stile von Theater, Kabarett und
					Tanz kombinieren und dadurch einen unvergesslichen Abend für
					Studierende, Lehrende sowie Mitarbeitende der Fakultät bieten.
					Natürlich sind auch Angehörige anderer Fakultäten willkommen.
				</p>
				<p>
					Der Abend selbst wird durch ein studentisch durchgeführtes
					Bühnenprogramm, das sich natürlich an unserem Thema orientiert
					und eine abschließende Tanzveranstaltung gestaltet.<br />
					Lassen Sie sich überraschen.
				</p>
				<p></p>
				<h3>Das Wichtigste in Kürze</h3>
				<p>
					Wann: 16.06.2023 <br />
					Wo:
					<a
						class="link"
						href="https://goo.gl/maps/SiDaDed88hqd3F5E9"
						target="_blank"
						>Volksbad Jena</a
					><br />
					Einlass: wahrscheinlich 19 Uhr
				</p>
				<p>
					Für Fragen und Anregungen zum FMI-Ball 2023 stehen wir Ihnen sehr
					gerne zu Verfügung. Senden Sie uns einfach eine E-Mail an:
					<a class="link" href="mailto:fmi-ball@uni-jena.de"
						>fmi-ball@uni-jena.de</a
					>
				</p>
				<p></p>
				<h3>Hygienekonzept</h3>
				<p>
					Wir werden den FMI Ball nach den aktuell geltenden
					Hygienebestimmungen ausrichten.
				</p>
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