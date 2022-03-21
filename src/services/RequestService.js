import axios from 'axios';

const authClient = axios.create({
	baseURL: 'https://www.fmi-ball.de',
});

function handleError(error, errorMsg = null) {
	console.log(error.response)
	return {
		data: {
			message: error.response.message ? error.response.message : 'Unhandled Error',
		},
		status: error.response.status ? error.response.status : 400,
	};
}

function makePayload(params) {
	return {
		params: params
	};
}

export default {
	async get(url, payload, errorMsg = null) {
		return authClient
			.get('/api/' + url, makePayload(payload))
			.catch((error) => handleError(error, errorMsg));
	},

	async post(url, payload) {
		return authClient
			.post('/api/' + url, payload, {
				headers: {
					'content-type': 'application/json'
				}
			})
			.catch((error) => error.response);
	},
};
