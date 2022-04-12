<template>
	<Home />
	<About />
	<Tickets />
	<Sponsor />
</template>

<script>
import Home from "../components/content/Home.vue";
import About from "../components/content/About.vue";
import Tickets from "../components/content/Tickets.vue";
import Sponsor from "../components/content/Sponsor.vue";

export default {
	components: { Home, About, Tickets, Sponsor },
	setup() {
		return {};
	},
};
</script>

<style lang="scss" scoped>
</style>