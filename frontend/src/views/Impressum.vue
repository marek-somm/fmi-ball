<template>
	<div id="impressum" class="base bg-blur" ref="wrapper">
		<div class="inner">
			<div class="header">
				<h1 class="title">Impressum</h1>
			</div>
			<div class="content">
				
				<h2 class="subtitle">Angaben gemäß § 5 TMG:</h2>
				<Postal>Verantwortlich für den Inhalt dieser Seite ist:</Postal>
				<p v-if="false">
					Der Fachschaftsrat Informatik ist Organ der Studierendenschaft
					der Universität Jena und wird vertreten durch den Vorstand des
					Studierendenrates
					<a
						class="link"
						href="https://www.stura.uni-jena.de/kontakt.php"
						target="_blank"
						>(Kontakt)</a
					>.
				</p>

				<h2 class="subtitle">Haftungsausschluss (Disclaimer)</h2>
				<h3>Haftung für Inhalte</h3>
				<p>
					Die Inhalte unserer Seiten wurden mit größter Sorgfalt erstellt.
					Für die Richtigkeit, Vollständigkeit und Aktualität der Inhalte
					können wir jedoch keine Gewähr übernehmen. Als Diensteanbieter
					sind wir gemäß § 7 Abs.1 TMG für eigene Inhalte auf diesen Seiten
					nach den allgemeinen Gesetzen verantwortlich. Nach §§ 8 bis 10
					TMG sind wir als Diensteanbieter jedoch nicht verpflichtet,
					übermittelte oder gespeicherte fremde Informationen zu überwachen
					oder nach Umständen zu forschen, die auf eine rechtswidrige
					Tätigkeit hinweisen. Verpflichtungen zur Entfernung oder Sperrung
					der Nutzung von Informationen nach den allgemeinen Gesetzen
					bleiben hiervon unberührt. Eine diesbezügliche Haftung ist jedoch
					erst ab dem Zeitpunkt der Kenntnis einer konkreten
					Rechtsverletzung möglich. Bei Bekanntwerden von entsprechenden
					Rechtsverletzungen werden wir diese Inhalte umgehend entfernen.
				</p>

				<h3>Haftung für Links</h3>
				<p>
					Unser Angebot enthält Links zu externen Webseiten Dritter, auf
					deren Inhalte wir keinen Einfluss haben. Deshalb können wir für
					diese fremden Inhalte auch keine Gewähr übernehmen. Für die
					Inhalte der verlinkten Seiten ist stets der jeweilige Anbieter
					oder Betreiber der Seiten verantwortlich. Die verlinkten Seiten
					wurden zum Zeitpunkt der Verlinkung auf mögliche Rechtsverstöße
					überprüft. Rechtswidrige Inhalte waren zum Zeitpunkt der
					Verlinkung nicht erkennbar. Eine permanente inhaltliche Kontrolle
					der verlinkten Seiten ist jedoch ohne konkrete Anhaltspunkte
					einer Rechtsverletzung nicht zumutbar. Bei Bekanntwerden von
					Rechtsverletzungen werden wir derartige Links umgehend entfernen.
				</p>

				<h3>Urheberrecht</h3>
				<p>
					Die durch die Seitenbetreiber erstellten Inhalte und Werke auf
					diesen Seiten unterliegen dem deutschen Urheberrecht. Die
					Vervielfältigung, Bearbeitung, Verbreitung und jede Art der
					Verwertung außerhalb der Grenzen des Urheberrechtes bedürfen der
					schriftlichen Zustimmung des jeweiligen Autors bzw. Erstellers.
					Downloads und Kopien dieser Seite sind nur für den privaten,
					nicht kommerziellen Gebrauch gestattet. Soweit die Inhalte auf
					dieser Seite nicht vom Betreiber erstellt wurden, werden die
					Urheberrechte Dritter beachtet. Insbesondere werden Inhalte
					Dritter als solche gekennzeichnet. Sollten Sie trotzdem auf eine
					Urheberrechtsverletzung aufmerksam werden, bitten wir um einen
					entsprechenden Hinweis. Bei Bekanntwerden von Rechtsverletzungen
					werden wir derartige Inhalte umgehend entfernen.
				</p>
				<br />
				<p>
					Quelle:
					<a class="link" href="https://www.e-recht24.de/" target="_blank"
						>eRecht24</a
					>
				</p>
			</div>
		</div>
	</div>
</template>

<script>
import { onMounted, ref } from "@vue/runtime-core";
import Postal from "@/components/Postal.vue";

export default {
	components: { Postal },
	setup() {
		const wrapper = ref(0);

		return {
			wrapper,
		};
	},
};
</script>

<style lang="scss" scoped>
#impressum {
	position: absolute;
	top: 0;
	left: 0;
	height: max-content;
	min-height: calc(100vh - 8rem);
	
	padding-top: 4rem;

	text-align: left;

	.subtitle {
		font-style: italic;
		text-decoration: underline;
	}
}
</style>