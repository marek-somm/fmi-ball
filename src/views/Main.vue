<template>
	<Home />
	<About />
	<Tickets />
	<Sponsor />
</template>

<script>
import Home from "./Home.vue";
import About from "./About.vue";
import Tickets from "./Tickets.vue";
import Sponsor from "./Sponsor.vue";

export default {
	components: { Home, About, Tickets, Sponsor },
	setup() {
		return {};
	},
};
</script>

<style lang="scss" scoped>
</style>