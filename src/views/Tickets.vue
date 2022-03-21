<template>
	<div id="tickets" class="base">
		<div class="inner">
			<div class="header">
				<h2 class="title">Kartenverkauf und Abholung</h2>
				<p class="subtitle">
					Momentan werden noch keine Karten verkauft<br />Der Kartenverkauf
					öffnet bald
				</p>

				<FancyButton v-if="false" link="" text="Jetzt reservieren" @click="" />
			</div>
			<div class="content">
				<p>
					Trotz einer Online-Reservierung müssen die Karten abgeholt
					werden.
				</p>
				<p>
					Nähere Informationen dazu sind in der Bestätigungs-Email
					nachzulesen.
				</p>
			</div>
		</div>
	</div>
</template>

<script>
import FancyButton from "../components/FancyButton.vue";
export default {
	components: { FancyButton },
	setup() {
		return {};
	},
};
</script>

<style lang="scss" scoped>
</style>