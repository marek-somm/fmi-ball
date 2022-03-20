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
				<h3><b>Der Ball der Fakultät für Mathematik und Informatik</b></h3>
				<p>
					Dieses Jahr wird der FMI Ball von den Fachschaftsräten
					Mathematik, Informatik sowie Bioinformatik geplant und
					durchgeführt. Es ist der erste Ball seiner Art an der Fakultät
					für Mathematik und Informatik und soll einen Grundstein für eine
					schöne, traditionelle Fortführung legen.
				</p>
				<p>
					Der FMI Ball soll einen klassischen Tanzabend mit den Vorzügen
					künstlerischer Unterhaltung im Stile von Theater, Kabarett und
					Tanz kombinieren und dadurch einen unvergesslichen Abend für
					Studierende, Lehrende sowie Mitarbeitende der Fakultät bieten.
				</p>
				<p>
					Am Abend selbst wird durch ein studentisch durchgeführtes
					Bühnenprogramm und eine abschließende Tanzveranstaltung das
					Rahmenprogramm bestimmt. Lassen Sie sich überraschen.
				</p>
				<p></p>
				<h3><b>Das Wichtigste in Kürze:</b></h3>
				<p>
					Wann: 27.05.2022 <br />
					Wo:
					<a href="https://goo.gl/maps/SiDaDed88hqd3F5E9" target="_blank"
						>Volksbad Jena</a
					><br />
					Einlass: 19 Uhr
				</p>
				<p>
					Für Fragen und Anregungen zum FMI Ball 2022 stehen wir Ihnen sehr
					gerne zu Verfügung. Senden Sie uns einfach eine E-Mail an:
					fmi-ball@uni-jena.de
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