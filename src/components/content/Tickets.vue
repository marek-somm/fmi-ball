<template>
	<div id="tickets" class="base bg-blur">
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
					Der Kartenverkauf wird etwa 2 Wochen vor dem Ball geöffnet.
				</p>
				<p>
					Vorher wird es allerdings wieder die Möglichkeit zur Reservierung geben.
				</p>
				<div class="space"></div>
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

.space {
	height: 20rem;
}
</style>