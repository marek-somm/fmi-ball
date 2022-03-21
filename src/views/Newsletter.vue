<template>
	<div id="newsletter" class="base">
		<div class="inner">
			<div class="header">
				<h2 class="title">Newsletter</h2>
				<p class="subtitle">Um immer auf dem neusten Stand zu bleiben!</p>
			</div>
			<div class="form">
				<input
					v-model="data.email"
					class="input"
					placeholder="Email-Adresse"
					@keyup.enter="submit"
					:disabled="data.success"
					ref="input"
					type="email"
					name="email"
				/>
				<button
					@click="submit"
					:disabled="data.success"
					class="submit"
					:class="{ hover: !data.success }"
				>
					{{ data.label }}
				</button>
			</div>

			<div class="content">
				<p></p>
				<h3>Sie wollen keine neuen Infos verpassen?</h3>
				<p>
					Dann abonnieren Sie jetzt unseren Newsletter. Sie werden alle
					wichtigen Informationen den Ball betreffend als einer der Ersten erhalten. Unteranderem erfahren
					Sie dann auch sofort von der Öffnung der Karten-Reservierungen.<br />
					Sie können sich natürlich jederzeit wieder abmelden.
				</p>
			</div>
		</div>
		<Footer class="footer"/>
	</div>
</template>

<script>
import { reactive, ref } from "@vue/reactivity";
import rs from "@/services/RequestService.js";
import Footer from "@/views/Footer.vue";

export default {
	components: { Footer },
	setup() {
		const data = reactive({
			email: "",
			label: "Abonnieren",
			success: false,
		});
		const input = ref(0);

		function validateEmail() {
			let re =
				/^[a-zA-Z0-9.!#$%&’*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
			if (re.test(data.email)) {
				return true;
			}
			return false;
		}

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
				alert("Bitte Email korrigieren!");
			}
		}

		return {
			data,
			input,
			submit,
		};
	},
};
</script>

<style lang="scss" scoped>
#newsletter {
	height: max-content;
	min-height: 100vh;
	padding: 0;
	position: absolute;
	top: 0;
	left: 0;

	.footer {
		position: absolute;
		bottom: 0;
	}

	.inner {
		margin: 3rem 0;
		.header {
			padding: 3rem 0 1.5rem 0;
		}

		.form {
			display: flex;
			flex-direction: column;
			align-items: center;

			width: max-content;
			margin: auto;
			padding: 0 0 3rem 0;

			.input {
				border: 2px solid $black;
				padding: 0.5rem;
				border-radius: 10rem;
				text-align: center;
				width: 15rem;
				font-size: 1rem;

				margin: 1rem;
				outline: none;
				transition: box-shadow 0.1s;

				&:focus {
					box-shadow: 0 0 3px #fff;
				}

				&::placeholder {
					font-style: italic;
				}
			}

			.submit {
				border: 2px solid $black;
				padding: 0.5rem;
				border-radius: 10rem;
				text-align: center;
				width: max-content;
				font-size: 1rem;

				margin: 1rem;
				padding: 0.5rem 2rem;
				outline: none;
				transition: all 0.1s;

				&.hover:hover {
					box-shadow: 0 0 3px #fff;
				}

				&::placeholder {
					font-style: italic;
				}
			}
		}
	}
}
h3 {
	font-weight: bold !important;
}

.link {
	text-decoration: none;
	color: rgba(0, 0, 0, 0.7);
	font-style: italic;
	transition: color 0.2s ease;

	&:hover {
		color: rgb(100, 100, 100, 0.7);
	}
}
</style>