<template>
	<div class="container">
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
				print(index)
				data.selected.add(index)
			}
		}

		function print(str) {
			console.log(str)
		}

		return {
			data,
			print,
			process
		}
	}
}
</script>

<style lang="scss" scoped>
.container {
	display: grid;
	grid-template-columns: auto auto auto auto auto;
}
</style>