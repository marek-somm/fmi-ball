<template>
	<div id="impressum" class="base">
		<div class="inner">
			<div class="header">
				<h2 class="title">Impressum</h2>
			</div>
			<div class="content">
				<p>
					Siehe Impressum des <a class="link" href="https://meinfsr.de/impressum/" target="_blank">FSR Informatik</a> 
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
#impressum {
	height: 100vh;
	width: 100%;
	padding: 0;
	position: absolute;
	top: 0;
	left: 0;

	.inner {
		margin: 3rem 0;

		.header {
			padding: 3rem 0 1.5rem 0;
		}

		.content {
			text-align: center;
		}
	}
}
</style>