<template>
	<div id="tickets" class="base">
		<div class="inner">
			<div class="header">
				<h2 class="title">Kartenverkauf und Abholung</h2>
				<p class="subtitle">
					Momentan sind noch keine Karten erhältlich<br />Die
					Kartenreservierung öffnet bald
				</p>

				<FancyButton
					v-if="false"
					link=""
					text="Jetzt reservieren"
					@click=""
				/>
			</div>
			<div class="content">
				<p>
					Sie können Ihre Karten online reservieren. Diese müssen dann
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