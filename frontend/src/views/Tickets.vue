<template>
	<div id="karten">
		<div id="map">
			<div class="stage"><p>Bühne</p></div>
			<div class="tables-side">
				<Seat class="pillar" />
				<empty />
				<empty />
				<Seat class="occupied pillar" />
				<Table class="top" price="3" :seats="data.seats.tables[10]" :tableNumber="11" v-model="data.selected.tables[10]" />
				<Table class="top" price="3" :seats="data.seats.tables[11]" :tableNumber="12" v-model="data.selected.tables[11]" />
				<Seat class="occupied pillar" />

				<Seat class="occupied pillar" />
				<Table class="bottom" price="3" :seats="data.seats.tables[12]" :tableNumber="13" v-model="data.selected.tables[12]" />
				<Table class="bottom" price="3" :seats="data.seats.tables[13]" :tableNumber="14" v-model="data.selected.tables[13]" />
				<Seat class="occupied pillar" />
				<Table class="bottom" price="3" :seats="data.seats.tables[14]" :tableNumber="15" v-model="data.selected.tables[14]" />
				<empty />
				<Seat class="occupied pillar" />
			</div>
			<div class="tables">
				<Table class="" price="3" :seats="data.seats.tables[0]" :tableNumber="1" v-model="data.selected.tables[0]" />
				<Table class="" price="3" :seats="data.seats.tables[1]" :tableNumber="2" v-model="data.selected.tables[1]" />
				<Table class="" price="3" :seats="data.seats.tables[2]" :tableNumber="3" v-model="data.selected.tables[2]" />

				<empty />
				<Table class="" price="3" :seats="data.seats.tables[3]" :tableNumber="4" v-model="data.selected.tables[3]" />
				<Table class="" price="3" :seats="data.seats.tables[4]" :tableNumber="5" v-model="data.selected.tables[4]" />

				<empty />
				<Table class="" price="3" :seats="data.seats.tables[5]" :tableNumber="6" v-model="data.selected.tables[5]" />
				<Table class="" price="3" :seats="data.seats.tables[6]" :tableNumber="7" v-model="data.selected.tables[6]" />
				
				<Table class="" price="3" :seats="data.seats.tables[7]" :tableNumber="8" v-model="data.selected.tables[7]" />
				<Table class="" price="3" :seats="data.seats.tables[8]" :tableNumber="9" v-model="data.selected.tables[8]" />
				<Table class="" price="3" :seats="data.seats.tables[9]" :tableNumber="10" v-model="data.selected.tables[9]" />
			</div>
			<Seats class="seats" :seats="data.seats.seat" v-model="data.selected.seats"/>
		</div>
		<div id="selection">
			<h2>Ihre Auswahl:</h2>
			<div v-for="(table) in data.selected.tables.filter(m => m.size > 0)" :key="table" class="tableSummary">
				<p>Tisch {{ data.selected.tables.indexOf(table) + 1 }}:</p>
				<ul>
					<li v-for="(seatNumber) in table" v-bind:key="seatNumber">Sitzplatz {{ seatNumber + 1 }}</li>
				</ul>
			</div>
			<div class="tableSummary" v-if="data.selected.seats.size > 0">
			<p>Sitzplätze ohne Tisch:</p>
				<ul>
					<li v-for="(seatNumber) in data.selected.seats" v-bind:key="seatNumber">Sitzplatz {{ seatNumber + 1 }}</li>
				</ul>
			</div>

			<button class="submit" :disabled="!data.selected.tables.some(m => m.size > 0) && !data.selected.seats.size > 0" @click="onClick">
				Jetzt Reservieren
			</button>
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
				tables: {
					0: [0,0,0,0,0,0,0,0,0,0,0,0,0,0],
					1: [0,0,0,0,0,0,0,0,0,0,0,0,0,0], // Tisch-id = 1, mit 14 Plätzen sortiert nach Platz-id
					2: [0,0,0,0,0,0,0,0,0,0,0,0,0,0],
					3: [0,0,0,0,0,0,0,0,0,0,0,0,0,0],
					4: [0,0,0,0,0,0,0,0,0,0,0,0,0,0],
					5: [0,0,0,0,0,0,0,0,0,0,0,0,0,0],
					6: [0,0,0,0,0,0,0,0,0,0,0,0,0,0],
					7: [0,0,0,0,0,0,0,0,0,0,0,0,0,0],
					8: [0,0,0,0,0,0,0,0,0,0,0,0,0,0],
					9: [0,0,0,0,0,0,0,0,0,0,0,0,0,0],
					10: [0,0,0,0,0,0,0,0],
					11: [0,0,0,0,0,0,0,0],
					12: [0,0,0,0,0,0,0,0],
					13: [0,0,0,0,0,0,0,0],
					14: [0,0,0,0,0,0,0,0],
					15: [0,0,0,-1,0,0,0,0],
					16: [0,0,0,-1,0,0,0,0], // Tisch-id = 16, mit 8 Plätzen sortiert nach Platz-id, Platz-id = 3 ist -1 wird also nicht angezeigt
					17: [0,0,0,-1,0,0,0,0],
					18: [0,0,0,-1,0,0,0,0],
					19: [0,0,0,-1,0,0,0,0],
					20: [0,0,0,-1,0,0,0,0],
					21: [0,0,0,-1,0,0,0,0],
					22: [0,0,0,-1,0,0,0,0],
					23: [0,0,0,-1,0,0,0,0],
					24: [0,0,0,-1,0,0,0,0],
					25: [0,0,0,-1,0,0,0,0],
					26: [0,0,0,-1,0,0,0,0],
					27: [0,0,0,-1,0,0,0,0],
					28: [0,0,0,-1,0,0,0,0],
					29: [0,0,0,-1,0,0,0,0],
				},
				seat: [0,40], // 0 von 40 Stuhlplätzen sind belegt
			},
			selected: {
				tables: [
					new Set([]),
					new Set([]),
					new Set([]), // für Reservierung ausgewählte Plätze mit Platz-id an Tisch mit Tisch-id = 2
					new Set([]),
					new Set([]),
					new Set([]),
					new Set([]),
					new Set([]),
					new Set([]),
					new Set([]),
					new Set([]),
					new Set([]),
					new Set([]),
					new Set([]),
					new Set([]),
					new Set([]),
					new Set([]),
					new Set([]),
					new Set([]),
					new Set([]),
					new Set([]),
					new Set([]),
					new Set([]),
					new Set([]),
					new Set([]),
					new Set([]),
					new Set([]),
					new Set([]),
					new Set([]),
					new Set([]),
				],
				seats: new Set([])
			},
		});

		async function submit() {
			if (validateEmail()) {
				let answer = await rs.post("newsletter.php", {
					email: data.email,
				});
				if (answer.status == 200) {
					data.success = true;
					input.value.blur();
					data.label = "Erfolgreich! Prüfen Sie Ihre Emails";
				} else if (answer.status == 400) {
					alert(answer.data.message);
				}
			} else {
				alert("Es ist etwas schief gelaufen, bitte versuchen Sie es erneut.");
			}
		}

		const onClick = async () => {
			const result = {
				tables: {},
				seats: 0
			}

			for (let index = 0; index < data.selected.tables.length; index++) {
				const selectedSeats = data.selected.tables[index];
				if(selectedSeats.size > 0)
					result.tables[index] = Array.from(selectedSeats);
			}

			result.seats = data.selected.seats.size;
			submit();
		}

		const beispiel_anfrage_an_server = {
			tables: {
				3: [2,3,7], // ausgewählte Plätze an Tisch mit id = 3
				12: [0,1,2,6]
			},
			seats: 4 // nur die Anzahl der reservierten Plätze ist wichtig
		}

		return {
			data,
			onClick
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
	padding-bottom: 0;

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

#selection {	
	width: calc(15rem + (8 * 2rem + 5rem)*3);

	margin: auto;
	padding: 5rem;
	padding-top: 1rem;

	background: $white;

	.tableSummary {
		margin: auto;
		width: fit-content;
		text-align: start;
	}

	.submit {
		margin-top: 1rem;
	}
}
</style>