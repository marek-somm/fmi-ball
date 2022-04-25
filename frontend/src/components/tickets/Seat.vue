<template>
	<button class="seat"></button>
</template>

<script>
import { computed } from '@vue/runtime-core';
export default {
	props: {
		price: {
			default: 3,
			type: Number
		}
	},
	setup(props) {
		const color = computed(() => {
			if (props.price == 3) {
				return "rgb(255, 227, 174)"
			} else if(props.price == 2) {
				return "rgb(197, 236, 255)"
			} else if(props.price == 1) {
				return "rgb(189, 255, 187)"
			} else {
				return "black"
			}
		})

		return {
			color
		};
	},
};
</script>

<style lang="scss" scoped>
$seat-size: 1.5rem;
$color: v-bind(color);

.seat {
	border: 1px black solid;
	width: $seat-size;
	height: $seat-size;
	margin: 0.1rem;

	&:focus {
		outline: none;
	}

	&:hover {
		cursor: pointer;
	}
}

.free {
	background: $color;
}

.occupied {
	background: darkgray;

	&:focus {
		outline: none;
	}
}

.selected {
	background: green;
}

.disabled {
	background: transparent;
	border: 1px transparent solid;
}
</style>