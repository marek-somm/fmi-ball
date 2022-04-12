<template>
	<div id="about" class="base">
		<div class="inner">
			<div class="header">
				<h2 class="title">Der 1. FMI-Ball steht vor der Tür!</h2>
				<p class="subtitle">
					Reserviere dir jetzt deine Karten für den <b>27.05.2022</b>
				</p>

				<FancyButton href="#tickets" text="Karten reservieren" />
			</div>

			<div class="content">
				<p></p>
				<h3>Der Ball der Fakultät für Mathematik und Informatik</h3>
				<p>
					Dieses Jahr wird der FMI-Ball von den Fachschaftsräten
					Mathematik, Informatik sowie Bioinformatik geplant und
					durchgeführt. Er steht unter dem Thema „Casino Binomial“. Er ist
					der erste Ball seiner Art an der Fakultät für Mathematik und
					Informatik und soll einen Grundstein für eine schöne,
					traditionelle Fortführung legen.
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
					Wann: 27.05.2022 <br />
					Wo:
					<a
						class="link"
						href="https://goo.gl/maps/SiDaDed88hqd3F5E9"
						target="_blank"
						>Volksbad Jena</a
					><br />
					Einlass: 19 Uhr
				</p>
				<p>
					Für Fragen und Anregungen zum FMI-Ball 2022 stehen wir Ihnen sehr
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
import FancyButton from "../components/FancyButton.vue";
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