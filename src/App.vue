<template>
	<div class="access" v-if="!access.access">
		<p>
			Sorry! This page is still under development. <br />
			If you have access to the site, please use your given password:
		</p>
		<input
			ref="input"
			type="password"
			v-model="access.input"
			@input="accessSubmit"
		/>
	</div>
	<Navbar v-if="access.access" />
	<div class="wrapper" v-if="access.access">
		<Background />
		<router-view v-slot="{ Component, route }">
			<transition
				:enter-active-class="route.meta.enterClass"
				:leave-active-class="route.meta.leaveClass"
			>
				<component :is="Component" class="component" />
			</transition>
		</router-view>
	</div>
</template>

<script>
import "animate.css";
import Navbar from "@/components/Navbar.vue";
import { onMounted, reactive, ref } from "@vue/runtime-core";
import { useRoute, useRouter } from "vue-router";
import { debounce } from "debounce";
import Background from "./components/Background.vue";

export default {
	components: { Navbar, Background },
	setup() {
		const access = reactive({
			access: false,
			input: null,
			password: "devball",
		});

		const data = reactive({
			shift: false,
		});
		const router = useRouter();
		const route = useRoute();

		const input = ref(null);

		onMounted(() => {
			if (access.access) {
				addListeners();
			} else {
				input.value.focus();
			}
		});

		function processKeyDownEvent(event) {
			if (event.key === "Shift") {
				data.shift = true;
			}

			if (event.key == "ArrowUp") {
				pageUp();
			} else if (event.key == "ArrowDown") {
				pageDown();
			}
		}

		function processKeyUpEvent(event) {
			if (event.key === "Shift") {
				data.shift = false;
			}
		}

		function processWheelEvent(event) {
			if (!data.shift) {
				if (event.deltaY < 0) {
					pageUp();
				} else if (event.deltaY > 0) {
					pageDown();
				}
			}
		}

		function pageUp() {
			router.push({
				name: route.meta.prev,
			});
		}

		function pageDown() {
			router.push({
				name: route.meta.next,
			});
		}

		function accessSubmit() {
			access.access = access.input === access.password;

			if (access.access) {
				addListeners()
			}
		}

		function addListeners() {
			window.addEventListener(
				"keydown",
				debounce(processKeyDownEvent, 400, true)
			);
			window.addEventListener("keyup", processKeyUpEvent);
			window.addEventListener(
				"wheel",
				debounce(processWheelEvent, 400, true)
			);
		}

		return {
			data,
			input,
			access,
			accessSubmit,
		};
	},
};
</script>

<style lang="scss">
body {
	margin: 0;
}

.access {
	display: inline-block;
	vertical-align: middle;
}

#app {
	font-family: "Source Sans Pro", sans-serif;
	-webkit-font-smoothing: antialiased;
	-moz-osx-font-smoothing: grayscale;
	text-align: center;
	color: $black;
	height: 100vh;

	display: flex;
	flex-direction: column;

	h1,
	h2,
	h3 {
		font-weight: normal;
		margin: 0;
	}

	.wrapper {
		flex-grow: 1;
		position: relative;
		overflow: hidden;
		height: 100vh;

		box-sizing: border-box;

		.component {
			position: absolute;
			top: 0;
			padding: 5rem 0;
			height: 100%;
			width: 100%;

			box-sizing: inherit;
		}
	}
}

.slide-up-enter-active,
.slide-up-leave-active,
.slide-down-enter-active,
.slide-down-leave-active {
	transition: all 0.2s;
}

.slide-up-enter-from,
.slide-down-leave-to {
	top: 0 !important;
	height: 0 !important;
}
.slide-up-enter-to,
.slide-down-leave-from {
	top: 0 !important;
	height: 100% !important;
}
.slide-up-leave-to,
.slide-down-enter-from {
	bottom: 0 !important;
	height: 0 !important;
}
.slide-up-leave-from,
.slide-down-enter-to {
	bottom: 0 !important;
	height: 100% !important;
}
</style>