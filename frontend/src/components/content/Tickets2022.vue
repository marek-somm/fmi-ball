<template>
	<div id="tickets" class="base">
		<div class="inner">
			<div class="header">
				<h2 class="title">Kartenverkauf und Abholung</h2>
				<p class="subtitle">
					Der Kartenverkauf ist noch nicht geöffnet
				</p>

				<FancyButton
					v-if="false"
					link="Tickets"
					text="Jetzt reservieren"
					@click=""
				/>
			</div>
			<div class="content">
				<p>
					Sie können Ihre reservierten Karten zu folgenden Terminen erwerben: 
					<ul>
						<li>Di 17.05. - 11-14 Uhr (Philomensa)</li>
						<li>Mi 18.05. - 17-19 Uhr (Abbemensa)</li>
						<li>Do 19.05. - 11-14 Uhr (Philomensa)</li>
					</ul>
				</p>
				<p>
					Nach dem 19.05. verfallen die Reservierungen.
					An folgenden Terminen sind dann Karten ohne Reservierung erwerbbar:
					<ul>
						<li>Di 24.05. - 17-19 Uhr (Abbemensa)</li>
						<li>Mi 25.05. - 11-14 Uhr (Philomensa)</li>
					</ul>
				</p>
				<p>Preise:</p>
				<ul class="list">
					<li>Stuhlplatz: 10€</li>
					<li>Tischplatz (Rand): 13€</li>
					<li>Tischplatz: 15€</li>
				</ul>
			</div>
		</div>
	</div>
</template>

<script>
import FancyButton from "../FancyButton.vue";
export default {
	components: { FancyButton },
	setup() {
		return {};
	},
};
</script>

<style lang="scss" scoped>
.list {
	list-style: none;
}
</style>