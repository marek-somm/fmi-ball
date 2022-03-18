<template>
	<div id="about" class="base">
		<div class="inner">
			<div class="header">
				<h2 class="title">Der 1. FMI-Ball steht vor der Tür!</h2>
				<p class="subtitle">
					Reserviere dir jetzt deine Karten für den <b>27.05.2022</b>
				</p>

				<a href="#tickets"><FancyButton text="Karten reservieren" /></a>
			</div>

			<div class="content">
				<p>Physkier- und Chemikerball? Das können wir auch!</p>
				<p>
					Der <b>FMI-Ball</b> geht in die erste Runde. Bla Bla, dies und
					das... Lorem Impsum. Protokoll vom 08.02.2022: Siebte
					Sitzung.<br />
					Antonia fragt Helen, ob es Neuigkeiten von FiFi bezüglich
					unterschreiben gibt. Sie können das nicht übernehmen. Micha
					berichtet von den neuen Dingen. Es gibt eine Empore. Mit
					Bestuhlung unten und Oben sind es ca 180+105 Tischplätze. Es soll
					gefragt werden, ob vor der Bühne Einzelstuhlplätze gestellt
					werden können. Judith spricht Versicherungen an. Die Chemiker
					haben wohl keine Versicherungen (😲). Wir sind über den Stura
					versichert, sollte etwas passieren (😎). Antonia spricht über die
					aktuelle Situation. Momentan können nur 50 Personen an solchen
					Veranstaltungen teilnehmen.<br />
					Helen berichtet von Ihren Arbeiten. Antonia hat bereits an den
					Szenen gearbeitet. Sophie soll etwas zur Zaubershow ergänzen. Das
					Stück ist gerade zu 40-50% fertig geschrieben. Wir wollen Anfang
					April mit den Proben beginne.
				</p>
				<p>Haha das war lustig.</p>
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