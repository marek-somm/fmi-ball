<template>
	<div class="container">
		<div class="corner t l"></div>
		<div class="corner t r"></div>
		<div class="table"></div>
		<div class="corner b l"></div>
		<div class="corner b r"></div>
		<Seat v-for="(seat, index) in seats" @click="process(seat, index)" :class="{ selected: data.selected.has(index),free: seat == 0, occupied: seat == 1, disabled: seat == -1 }"></Seat>
	</div>
</template>

<script>
import { computed, reactive } from '@vue/runtime-core'
import Seat from './Seat.vue'

export default {
	components: { Seat },
	props: {
		seats: Array,
		modelValue: {
			default: new Set(),
			type: Set
		},
		price: {
			default: -1,
			type: Number
		}
	},
	setup (props) {
		const data = reactive({
			selected: props.modelValue
		})
		
		function process(seat, index) {
			if(data.selected.has(index)) {
				data.selected.delete(index)
			} else if(seat == 0 ) {
				data.selected.add(index)
			}
		}

		function print(str) {
			console.log(str)
		}

		const tableLength = computed(() => {
			return (props.seats.length/2)-1
		})

		const color = computed(() => {
			if (props.price == 3) {
				return "rgb(246, 255, 197)"
			} else {
				return "black"
			}
		})

		return {
			data,
			color,
			tableLength,
			print,
			process,
			color
		}
	}
}
</script>

<style lang="scss" scoped>
$tableLength: v-bind(tableLength);
$seatSize: 2rem;
$color: v-bind(color);

.container {
	display: grid;

	.table {
		grid-column: 2 / span $tableLength;
		grid-row: 2;
		background: $color;
		border: 1px black solid;
		margin: 0.1rem;
	}

	.t {
		grid-row: 1;
	}

	.b {
		grid-row: 3;
	}

	.l {
		grid-column: 1;
	}

	.r {
		grid-column: calc($tableLength + 2);
	}
}
</style>