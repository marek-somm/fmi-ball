<template>
	<div class="container">
		<div class="corner t l"></div>
		<div class="corner t r"></div>
		<div class="table">
			<div class="table-number">
				{{ data.tableNumber }}
			</div>
		</div>
		<div class="corner b l"></div>
		<div class="corner b r"></div>
		<template v-for="(seat, index) in layout" :key="index">
			<Seat
				@click="process(index >= occupied, index)"
				:price="price"
				:test="seat"
				:class="{
					selected: data.selected.has(index),
					free: seat == 1 && isFree(index, occupied, layout),
					occupied: !isFree(index, occupied, layout),
					disabled: seat == 0
				}"
			></Seat>
		</template>
	</div>
</template>

<script>
import { computed, reactive } from "@vue/runtime-core";
import Seat from "./Seat.vue";

export default {
	components: { Seat },
	props: {
		occupied: Array,
		layout: Array,
		modelValue: {
			default: new Set(),
			type: Set,
		},
		price: {
			default: 3,
			type: Number,
		},
		tableNumber: {
			default: 1,
			type: Number,
		},
	},
	setup(props) {
		const data = reactive({
			selected: props.modelValue,
			tableNumber: props.tableNumber,
		});

		function process(free, index) {
			if (data.selected.has(index)) {
				data.selected.delete(index);
			} else if (free) {
				data.selected.add(index);
			}
		}

		function print(str) {
			console.log(str);
		}

		const tableLength = computed(() => {
			return props.layout.length / 2 - 1;
		});

		function isFree(index, occupied, layout) {
			if(layout.slice(0,occupied + 1).includes(0)) {
				return index >= occupied + 1
			}
			return index >= occupied
		}

		return {
			data,
			tableLength,
			print,
			process,
			isFree
		};
	},
};
</script>

<style lang="scss" scoped>
$tableLength: v-bind(tableLength);
$seatSize: 2rem;
$color: $white-second;

.container {
	display: grid;

	.table {
		grid-column: 2 / span $tableLength;
		grid-row: 2;
		background: $color;
		border: 1px black solid;
		margin: 0.1rem;

		.table-number {
			position: relative;
			top: 50%;
			transform: translateY(-50%);
		}
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