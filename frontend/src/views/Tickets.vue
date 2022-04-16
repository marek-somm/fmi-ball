<template>
	<div id="karten">
		<div id="map">
			<div class="stage"><p>Bühne</p></div>
			<div class="tables-side">
				<Seat class="pillar" />
				<empty />
				<empty />
				<Seat class="occupied pillar" />
				<Table class="top" price="3" :seats="data.seats.side[0]" v-model="data.selected.table" />
				<Table class="top" price="3" :seats="data.seats.side[0]" v-model="data.selected.table" />
				<Seat class="occupied pillar" />

				<Seat class="occupied pillar" />
				<Table class="bottom" price="3" :seats="data.seats.side[0]" v-model="data.selected.table" />
				<Table class="bottom" price="3" :seats="data.seats.side[0]" v-model="data.selected.table" />
				<Seat class="occupied pillar" />
				<Table class="bottom" price="3" :seats="data.seats.side[0]" v-model="data.selected.table" />
				<empty />
				<Seat class="occupied pillar" />
			</div>
			<div class="tables">
				<Table class="" price="3" :seats="data.seats[0]" v-model="data.selected.table" />
				<Table class="" price="3" :seats="data.seats[0]" v-model="data.selected.table" />
				<Table class="" price="3" :seats="data.seats[0]" v-model="data.selected.table" />

				<empty />
				<Table class="" price="3" :seats="data.seats[0]" v-model="data.selected.table" />
				<Table class="" price="3" :seats="data.seats[0]" v-model="data.selected.table" />

				<empty />
				<Table class="" price="3" :seats="data.seats[0]" v-model="data.selected.table" />
				<Table class="" price="3" :seats="data.seats[0]" v-model="data.selected.table" />
				
				<Table class="" price="3" :seats="data.seats[0]" v-model="data.selected.table" />
				<Table class="" price="3" :seats="data.seats[0]" v-model="data.selected.table" />
				<Table class="" price="3" :seats="data.seats[0]" v-model="data.selected.table" />
			</div>
			<Seats class="seats" :seats="data.seats.seat" v-model="data.selected.seats"/>
		</div>
	</div>
</template>

<script>
import { reactive } from "@vue/reactivity";
import Table from "../components/tickets/Table.vue";
import Seats from '../components/tickets/Seats.vue';
import Seat from '../components/tickets/Seat.vue';
export default {
	components: { Table, Seats, Seat },
	setup() {
		const data = reactive({
			msg: "Test TEXT",
			seats: {
				seat: [0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,],
				side: [
					[0,0,0,0,0,0,0,0],
					[0,0,0,0,0,0,0,0],
				],
				0: [0, 0, 1, 0, 0, 0, 0,0,0, 0, 0, 1, 0, 0],
				1: [0, 0, 1, 0, 1, 0, 0, 0, 0, 1, 0, 0],
			},
			selected: {
				table: new Set([]),
				seats: new Set([])
			},
		});

		return {
			data,
		};
	},
};
</script>

<style lang="scss" scoped>
#map {
	height: 71rem;
	width: calc(15rem + (8 * 2rem + 5rem)*3);

	margin: auto;
	margin-top: 10rem;
	padding: 5rem;

	background: $white;
	position: relative;

	.two {
		.table {
			background: red;
		}
	}

	.stage {
		position: absolute;
		top: 50%;
		transform: translateY(-50%);

		width: 10rem;
		height: 28rem;
		border: 1px solid black;
		background: gray;

		& p {
			position: absolute;
			top: 50%;
			left: 50%;
			transform: translateX(-50%) translateY(-50%);
			margin: 0;
		}
	}

	.seats {
		position: absolute;
		top: 50%;
		left: 22.55rem;
		transform: translateY(-50%);
	}

	.tables {
		position: absolute;
		top: 50%;
		left: 20rem;
		transform: translateY(-50%);
		display: grid;
		grid-template-columns: auto auto auto;
		column-gap: 5rem;
		row-gap: 3rem;
	}

	.tables-side {
		$pillar-width: 5rem;
		position: absolute;
		top: 50%;
		left: 13rem;
		transform: translateY(-50%);

		display: grid;
		grid-template-columns: auto auto auto auto auto auto auto;
		row-gap: 42rem;

		align-items: center;

		& > .top {
			transform: rotate(-80deg);
		}

		& > .bottom {
			transform: rotate(80deg);
		}

		& > .pillar {
			transform: scale(1.2);
			margin: 0 1rem;
			background: gray;
			border-radius: 50%;
			border: 1px solid black;
		}
	}

}
</style>