<template>
	<p><slot></slot></p>
	<table class="postal">
		<tr v-if="info.name1">
			<td colspan="2">{{ info.name1 }}</td>
		</tr>
		<tr v-if="info.name2">
			<td colspan="2" v-if="info.name2">{{ info.name2 }}</td>
		</tr>
		<tr v-if="info.anschrift.straße">
			<td>Postanschrift:</td>
			<td>{{ info.anschrift.straße }}</td>
		</tr>
		<tr v-if="info.anschrift.ort">
			<td></td>
			<td>{{ info.anschrift.ort }}</td>
		</tr>
		<tr v-if="info.telefon">
			<td>Telefon:</td>
			<td>{{ info.telefon }}</td>
		</tr>
		<tr v-if="info.email">
			<td>Email:</td>
			<td>
				<a class="link" href="mailto:fmi-ball@uni-jena.de">{{
					info.email
				}}</a>
			</td>
		</tr>
	</table>
</template>

<script>
import { reactive } from '@vue/reactivity';

export default {
	setup() {
		const info_org = reactive({
			verantwortlicher:
				"der FSR Informatik der Studierendenschaft der Universität Jena",
			name1: "Friedrich-Schiller-Universität Jena",
			name2: "Fachschaftsrat für Informatik",
			anschrift: {
				straße: "Ernst-Abbe-Platz 2",
				ort: "07743 Jena",
			},
			telefon: "03641 9 46411",
			email: "fsrinfo@uni-jena.de",
		});

		const info = reactive({
			verantwortlicher:
				"Marek Sommerfeld",
			name1: "Marek Sommerfeld",
			name2: "",
			anschrift: {
				straße: "Leipziger Str. 72",
				ort: "07743 Jena",
			},
			telefon: "03641 9 46411",
			email: "fmi-ball@uni-jena.de",
		});
		
		return {
			info
		};
	},
};
</script>

<style lang="scss" scoped>
p,
	td,
	li {
		font-size: 1.15rem;
		line-height: 1.7rem;
	}
</style>