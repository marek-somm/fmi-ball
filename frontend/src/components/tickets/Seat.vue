<template>
	<button class="seat"></button>
</template>

<script>
export default {
	setup() {
		return {};
	},
};
</script>

<style lang="scss" scoped>
$seat-size: 1.5rem;

.seat {
	border: 1px black solid;
	width: $seat-size;
	height: $seat-size;
	margin: 0.1rem;
}

.free {
	background: $white-second;
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