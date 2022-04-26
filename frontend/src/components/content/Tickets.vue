<template>
	<div id="tickets" class="base">
		<div class="inner">
			<div class="header">
				<h2 class="title">Kartenverkauf und Abholung</h2>
				<p class="subtitle">
					Die Kartenreservierung ist geöffnet<br />
					Der Verkauf beginnt in Kürze
				</p>

				<FancyButton
					v-if="true"
					link="Tickets"
					text="Jetzt reservieren"
					@click=""
				/>
			</div>
			<div class="content">
				<p>
					Sie können Ihre Karten online reservieren. Diese müssen
					jedoch später in anderen Verkaufsstellen wie z.B. ausgewählten
					Mensen erworben werden.
				</p>
				<p>
					Nähere Informationen folgen in Kürze.
				</p>
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
</style>