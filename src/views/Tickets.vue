<template>
	<div id="legend">
		<div class="important-wrapper">
			<div class="legend-wrapper">
				<div class="bar">
					<Seat :price="1" class="seat free"/>
					<div> Stuhlplatz: 10€</div>
				</div>
				<div class="bar">
					<Seat :price="2" class="seat free"/>
					<div> Tischplatz (Rand): 13€</div>
				</div>
				<div class="bar">
					<Seat :price="3" class="seat free"/>
					<div> Tischplatz: 15€</div>
				</div>
			</div>
			<div class="tip-wrapper">
				<p><b>Hinweis:</b>
					Die Position der Plätze ist beim Kauf der Karten nicht relevant. Es werden lediglich die Art der Karte und die Tischnummer reserviert.<br>
					Die Stuhlplätze werden nach dem Bühnenstück weggeräumt um Platz für die Tanzfläche zu machen.
				</p>
			</div>
		</div>
	</div>
	<div id="karten">
		<div id="map-ground" class="map">
			<h2>Untere Ebene</h2>
			<div class="stage"><p>Bühne</p></div>
			<div class="tables-side">
				<Seat class="pillar" />
				<empty />
				<empty />
				<Seat class="occupied pillar" />
				<Table class="top" :price="data.prices[11]" :occupied="data.seats.tables[11]" :layout="data.seats.layout[1]" :tableNumber="11" v-model="data.selected.tables[11]" />
				<Table class="top" :price="data.prices[12]" :occupied="data.seats.tables[12]" :layout="data.seats.layout[1]" :tableNumber="12" v-model="data.selected.tables[12]" />
				<Seat class="occupied pillar" />

				<Seat class="occupied pillar" />
				<Table class="bottom" :price="data.prices[13]" :occupied="data.seats.tables[13]" :layout="data.seats.layout[1]" :tableNumber="13" v-model="data.selected.tables[13]" />
				<Table class="bottom" :price="data.prices[14]" :occupied="data.seats.tables[14]" :layout="data.seats.layout[1]" :tableNumber="14" v-model="data.selected.tables[14]" />
				<Seat class="occupied pillar" />
				<Table class="bottom" :price="data.prices[15]" :occupied="data.seats.tables[15]" :layout="data.seats.layout[1]" :tableNumber="15" v-model="data.selected.tables[15]" />
				<empty />
				<Seat class="occupied pillar" />
			</div>
			<div class="tables">
				<Table class="" :price="data.prices[1]" :occupied="data.seats.tables[1]" :layout="data.seats.layout[0]" :tableNumber="1" v-model="data.selected.tables[1]" />
				<Table class="" :price="data.prices[2]" :occupied="data.seats.tables[2]" :layout="data.seats.layout[0]" :tableNumber="2" v-model="data.selected.tables[2]" />
				<Table class="" :price="data.prices[3]" :occupied="data.seats.tables[3]" :layout="data.seats.layout[0]" :tableNumber="3" v-model="data.selected.tables[3]" />

				<empty />
				<Table class="" :price="data.prices[4]" :occupied="data.seats.tables[4]" :layout="data.seats.layout[0]" :tableNumber="4" v-model="data.selected.tables[4]" />
				<Table class="" :price="data.prices[5]" :occupied="data.seats.tables[5]" :layout="data.seats.layout[0]" :tableNumber="5" v-model="data.selected.tables[5]" />

				<empty />
				<Table class="" :price="data.prices[6]" :occupied="data.seats.tables[6]" :layout="data.seats.layout[0]" :tableNumber="6" v-model="data.selected.tables[6]" />
				<Table class="" :price="data.prices[7]" :occupied="data.seats.tables[7]" :layout="data.seats.layout[0]" :tableNumber="7" v-model="data.selected.tables[7]" />
				
				<Table class="" :price="data.prices[8]" :occupied="data.seats.tables[8]" :layout="data.seats.layout[0]" :tableNumber="8" v-model="data.selected.tables[8]" />
				<Table class="" :price="data.prices[9]" :occupied="data.seats.tables[9]" :layout="data.seats.layout[0]" :tableNumber="9" v-model="data.selected.tables[9]" />
				<Table class="" :price="data.prices[10]" :occupied="data.seats.tables[10]" :layout="data.seats.layout[0]" :tableNumber="10" v-model="data.selected.tables[10]" />
			</div>
			<Seats class="seats" :seats="data.seats.tables[0]" v-model="data.selected.tables[0]"/>
		</div>
		<div id="map-gallery" class="map">
			<h2>Obere Ebene</h2>
			<div class="stage"><p>Bühne</p></div>
			<div class="tables-right">
				<Table class="side gallery" :price="3" :occupied="data.seats.tables[22]" :layout="data.seats.layout[2]" :tableNumber="22" v-model="data.selected.tables[22]" />
				<Table class="side gallery center" :price="3" :occupied="data.seats.tables[23]" :layout="data.seats.layout[2]" :tableNumber="23" v-model="data.selected.tables[23]" />
				<Table class="side gallery" :price="3" :occupied="data.seats.tables[24]" :layout="data.seats.layout[2]" :tableNumber="24" v-model="data.selected.tables[24]" />
			</div>
			<div class="tables-side">
				<Seat class="pillar" />
				<Table class="top gallery" :price="data.prices[16]" :occupied="data.seats.tables[16]" :layout="data.seats.layout[2]" :tableNumber="16" v-model="data.selected.tables[16]" />
				<Table class="top gallery" :price="data.prices[17]" :occupied="data.seats.tables[17]" :layout="data.seats.layout[2]" :tableNumber="17" v-model="data.selected.tables[17]" />
				<Seat class="occupied pillar" />
				<Table class="top gallery" :price="data.prices[18]" :occupied="data.seats.tables[18]" :layout="data.seats.layout[2]" :tableNumber="18" v-model="data.selected.tables[18]" />
				<Table class="top gallery" :price="data.prices[19]" :occupied="data.seats.tables[19]" :layout="data.seats.layout[2]" :tableNumber="19" v-model="data.selected.tables[19]" />
				<Seat class="occupied pillar" />
				<Table class="top gallery" :price="data.prices[20]" :occupied="data.seats.tables[20]" :layout="data.seats.layout[2]" :tableNumber="20" v-model="data.selected.tables[20]" />
				<Table class="top gallery" :price="data.prices[21]" :occupied="data.seats.tables[21]" :layout="data.seats.layout[2]" :tableNumber="21" v-model="data.selected.tables[21]" />
				
				<Seat class="pillar" />
				<Table class="bottom gallery" :price="data.prices[25]" :occupied="data.seats.tables[25]" :layout="data.seats.layout[2]" :tableNumber="25" v-model="data.selected.tables[25]" />
				<Table class="bottom gallery" :price="data.prices[26]" :occupied="data.seats.tables[26]" :layout="data.seats.layout[2]" :tableNumber="26" v-model="data.selected.tables[26]" />
				<Seat class="occupied pillar" />
				<Table class="bottom gallery" :price="data.prices[27]" :occupied="data.seats.tables[27]" :layout="data.seats.layout[2]" :tableNumber="27" v-model="data.selected.tables[27]" />
				<Table class="bottom gallery" :price="data.prices[28]" :occupied="data.seats.tables[28]" :layout="data.seats.layout[2]" :tableNumber="28" v-model="data.selected.tables[28]" />
				<Seat class="occupied pillar" />
				<Table class="bottom gallery" :price="data.prices[29]" :occupied="data.seats.tables[29]" :layout="data.seats.layout[2]" :tableNumber="29" v-model="data.selected.tables[29]" />
				<Table class="bottom gallery" :price="data.prices[30]" :occupied="data.seats.tables[30]" :layout="data.seats.layout[2]" :tableNumber="30" v-model="data.selected.tables[30]" />
			</div>
		</div>
	</div>
	<div id="bottom-bar">
		<div id="information">
			<h2>Persönliche Daten:</h2>
			<select class="input" :class="{ empty: !data.info.salutation }" required placeholder="Anrede" name="salutation" v-model="data.info.salutation">
				<option :disabled="index == 0" :selected="index == 0" v-for="(value, index) in data.info.salutationText" :key="index" :value="index">{{ value }}</option>
			</select>
			<input type="text" :class="{ empty: !data.info.forename }" class="input" placeholder="Vorname" v-model="data.info.forename">
			<input type="text" :class="{ empty: !data.info.surname }" class="input" placeholder="Nachname" v-model="data.info.surname">
			<input type="email" :class="{ empty: !data.info.email }" class="input" placeholder="Email" v-model="data.info.email">
			<p class="data-notice" v-if="isInfoEmpty()">Bitte geben Sie Ihre Daten an!</p>
		</div>
		<div id="selection">
			<h2>Ihre Auswahl:</h2>
			<div class="table-summary">
				<p v-show="data.selected.tables[0].size > 0"><b>Stuhlplätze:</b> {{ data.selected.tables[0].size }} {{ data.selected.tables[0].size == 1 ? "Platz" : "Plätze" }}</p>
				<p v-for="(table) in data.selected.tables.filter(m => m.size > 0 && data.selected.tables.indexOf(m) != 0)" :key="table"><b>Tisch {{ data.selected.tables.indexOf(table) }}:</b> {{ table.size }} {{ table.size == 1 ? "Platz" : "Plätze" }}</p>
			</div>
			<p>Summe: {{ calcPrice() }} €</p>
			<button class="submit" :disabled="!isSomethingSelected() || isInfoEmpty()" @click="data.confirm = true">
				Jetzt Reservieren
			</button>
		</div>
	</div>
	<Teleport to="#app">
		<div id="confirm" v-if="data.confirm">
			<div class="confirm-data">
				<div v-if="data.reserved" class="info">
					<h2 class="text">{{ data.infoText }}</h2>
					<button class="ok" @click="closeConfirm">Ok</button>
				</div>
				<h2>Bitte überprüfen Sie Ihre Angaben:</h2>
				<div class="confirm-container">
					<p class="item">Anrede: <b>{{ data.info.salutationText[data.info.salutation] }}</b></p>
					<p class="item">Name: <b>{{ data.info.forename }} {{ data.info.surname }}</b></p>
					<p class="item">Email: <b>{{ data.info.email }}</b></p>
					<br>
					<h2>Reservierungen:</h2>
					<div class="table-summary">
						<p v-show="data.selected.tables[0].size > 0"><b>Stuhlplätze:</b> {{ data.selected.tables[0].size }} {{ data.selected.tables[0].size == 1 ? "Platz" : "Plätze" }}</p>
						<p v-for="(table) in data.selected.tables.filter(m => m.size > 0 && data.selected.tables.indexOf(m) != 0)" :key="table"><b>Tisch {{ data.selected.tables.indexOf(table) }}:</b> {{ table.size }} {{ table.size == 1 ? "Platz" : "Plätze" }}</p>
					</div>
					<p>Summe: {{ calcPrice() }} €</p>
					<div class="button-bar">
						<button class="cancel" @click="data.confirm = false">Abbrechen</button>
						<button class="submit" @click="onClick">Bestätigen</button>
					</div>
				</div>
			</div>
		</div>
	</Teleport>
	<Footer />
</template>

<script>
import { reactive } from "@vue/reactivity";
import Table from "../components/tickets/Table.vue";
import Seats from '../components/tickets/Seats.vue';
import Seat from '../components/tickets/Seat.vue';
import rs from "@/services/RequestService.js";
import { onMounted } from '@vue/runtime-core';
import Footer from '../components/Footer.vue';

export default {
	components: { Table, Seats, Seat, Footer },
	setup() {
		const data = reactive({
			confirm: false,
			reserved: false,
			infoText: "Leider gab es ein Problem. Bitte laden sie die Seite erneut. Sollte es zu weiteren Problemen kommen, kontaktieren Sie bitte den Administrator.",
			info: {
				salutation: 0,
				salutationText: [
					"Bitte Auswählen",
					"Divers",
					"Frau",
					"Herr",
				],
				forename: "",
				surname: "",
				email: ""
			},
			seats: {
				layout: [
					[1,1,1,1,1,1,1,1,1,1,1,1,1,1],
					[1,1,1,1,1,1,1,1],
					[1,1,1,0,1,1,1,1]
				],
				tables: []
			},
			prices: [1,
				3,3,3,
				  3,3,
				  3,3,
				3,3,3,
				3,3,3,3,3,
				2,2,2,2,
				  3,3,3,3,3,
				2,2,2,2,
				3,3],
			selected: {
				tables: [
					new Set([]), // Tisch 0 = Sitzplatz Block
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
			},
		});

		onMounted(() => {
			loadSeats()
		})

		async function loadSeats() {
			let res = await rs.get("seats");
			data.seats.tables = res.data.message;
		}

		async function submit(submitData) {
			let answer = await rs.post("seats", {
				reservation: submitData,
				information: data.info
			});

			data.reserved = true

			if (answer.status == 200) {
				data.infoText = "Ihre Karten wurden erfolgreich reserviert. Bitte überprüfen Sie Ihre Emails."
			}
		}

		const onClick = async () => {
			const submitData = {}

			for (let index = 0; index < data.selected.tables.length; index++) {
				const selectedSeats = data.selected.tables[index];
				if(selectedSeats.size > 0)
					submitData[index] = selectedSeats.size;
			}

			if(!isInfoEmpty() && isSomethingSelected()) {
				submit(submitData);
			}
		}

		function validate_email(email) {
			let validate = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
			return email.match(validate);
		}

		function isSomethingSelected() {
			return data.selected.tables.some(m => m.size > 0)
		}

		function isInfoEmpty() {
			if(data.info.salutation != 0 && data.info.forename.trim() != "" && data.info.surname.trim() != "" && validate_email(data.info.email)) {
				return false
			}
			return true
		}

		async function closeConfirm() {
			window.location.href = "/";
		}

		function calcPrice() {
			let tables = data.selected.tables.filter(m => m.size > 0)
			let sum = 0

			tables.forEach((table) => {
				let index = data.selected.tables.indexOf(table)
				let seats = table.size
				let price = data.prices[index]
				let cost = 10
				if(price == 2) {
					cost = 13
				} else if(price == 3) {
					cost = 15
				}
				
				sum += cost * seats
			})

			return sum
		}

		return {
			data,
			onClick,
			isInfoEmpty,
			isSomethingSelected,
			closeConfirm,
			calcPrice
		};
	},
};
</script>

<style lang="scss" scoped>
.wrapper {
	flex-grow: 1;
	position: relative;
	overflow-x: auto;
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
#legend {
	background-color: $white;
	width: calc(15rem + (8 * 2rem + 5rem)*3);

	padding: 3rem 5rem;
	margin: 5rem auto 0 auto;

	.important-wrapper {
		display: flex;

		margin: auto;
		width: max-content;
		
		.legend-wrapper {
			width: max-content;
			margin-right: 5rem;
	
			.bar {
				display: flex;
				width: max-content;
	
				div {
					margin: 0;
				}
			}
		}

		.tip-wrapper {
			width: 30rem;
			text-align: justify;

			p {
				margin: 0;
			}
		}
	}
}

#map-ground {
	.tables-side {
		grid-template-columns: auto auto auto auto auto auto auto;

		& > .top {
			transform: rotate(-80deg);
		}

		& > .bottom {
			transform: rotate(80deg);
		}
	}
}
#map-gallery {
	.tables-side {
		grid-template-columns: auto auto auto auto auto auto auto auto auto;

		& > .top {
			transform: rotate(-90deg);
		}

		& > .bottom {
			transform: rotate(90deg);
		}
	}

	.tables-right {
		position: absolute;
		top: 50%;
		right: 5rem;
		transform: translateY(-50%);

		display: grid;
		row-gap: 3rem;

		align-items: center;
		
		.side {
			margin: 0 2rem 0 0;
		}

		.center {
			margin: 0 0 0 2rem;
		}
	}
}
.map {
	height: 71rem;
	width: calc(15rem + (8 * 2rem + 5rem)*3);

	margin: 1rem auto;
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
		row-gap: 42rem;

		align-items: center;

		& > .pillar {
			transform: scale(1.2);
			margin: 0 1rem;
			background: gray;
			border-radius: 50%;
			border: 1px solid black;
		}
	}

}

#bottom-bar {
	display: flex;
	margin: auto;

	width: max-content;
	margin-bottom: 2rem;

	#selection {	
		width: max-content;

		padding: 5rem;

		background: $white;

		display: flex;
		flex-direction: column;
		align-items: center;

		.table-summary {
			padding: 0;
		}

		.submit {
			border: 1px solid $black;
			border-radius: 10rem;
			text-align: center;
			width: max-content;
			font-size: 1rem;

			padding: 0.5rem 2rem;
			outline: none;
			transition: all 0.1s;

			&:hover {
				cursor: pointer;
			}

			&:disabled {
				cursor: default;
			}
		}

		* {
			margin: 0.5rem;
			padding: 0.3rem;
		}
	}

	#information {
		padding: 5rem;

		background: $white;

		display: flex;
		flex-direction: column;
		align-items: center;

		margin-right: 1rem;

		width: max-content;

		.input {
			border: 1px solid $black;
			padding: 0.5rem;
			border-radius: 10rem;
			text-align: center;
			width: 15rem;
			font-size: 1rem;

			outline: none;
			transition: box-shadow 0.1s;

			&:focus {
				box-shadow: 0 0 3px rgb(80, 80, 80);
			}

			&::placeholder {
				font-style: italic;
			}
		}

		select {
			width: 16rem !important;
		}

		.data-notice {
			font-style: italic;
			color: rgb(95, 95, 95);
		}

		* {
			margin: 0.5rem;
			padding: 0.3rem;
		}
	}
}

#confirm {
	display: flex;
	
	position: absolute;
	width: 100%;
	height: 100%;
	background: rgba(0, 0, 0, 0.314);

	.confirm-data {
		margin: auto;
		padding: 5rem;

		background: $white;

		display: flex;
		flex-direction: column;
		align-items: center;

		position: relative;

		width: max-content;

		box-shadow: 5px 5px 10px rgba(0, 0, 0, 0.3);

		.info {
			position: absolute;
			top: 0;
			left: 0;

			width: calc(100% - 10rem);
			height: calc(100% - 10rem);

			padding: 5rem;

			background: white;

			.text {
				text-align: left;
			}

			.ok {
				padding: 0.5rem 3rem;
				margin: 3rem 0;
				
				border: 2px solid $black;
				border-radius: 10rem;
				text-align: center;
				width: max-content;
				font-size: 1.2rem;

				outline: none;
				transition: all 0.15s;

				color: rgb(54, 54, 54);

				&:hover {
					cursor: pointer;
				}
			}
		}

		.confirm-container {
			text-align: left;
			margin-top: 2rem;

			.button-bar {
				width: 100%;
				margin-top: 3rem;

				button {
					width: calc(50% - 1rem);
					padding: 0.5rem 2rem;
					margin: 0 0.5rem;
					
					border: 2px solid $black;
					border-radius: 10rem;
					text-align: center;
					width: max-content;
					font-size: 1rem;

					outline: none;
					transition: all 0.15s;

					font-style: italic;
					color: rgb(54, 54, 54);
				}

				.cancel {
					background-color: rgb(255, 160, 160);

					&:hover {
						background-color: rgb(255, 100, 100);
						cursor: pointer;
					}
				}

				.submit {
					background-color: rgb(160, 253, 160);

					&:hover {
						background-color: rgb(100, 253, 100);
						cursor: pointer;
					}
				}
			}
		}
	}
}
</style>