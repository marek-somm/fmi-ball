import axios from 'axios';

const client = axios.create({
	baseURL: 'https://www.fmi-ball.de',
});

function handleError(error, errorMsg = null) {
	return {
		data: {
			message: error.response.message ? error.response.message : 'Unhandled Error - Please contact an Admin',
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
		return client
			.get('/api/' + url + ".php", makePayload(payload))
			.catch((error) => handleError(error, errorMsg));
	},

	async post(url, payload, errorMsg = null) {
		return client
			.post('/api/' + url + ".php", payload, {
				headers: {
					'content-type': 'application/json'
				}
			})
			.catch((error) => handleError(error, errorMsg));
	},

	async put(url, payload, errorMsg = null) {
		return client
			.put('/api/' + url + ".php", payload)
			.catch((error) => handleError(error, errorMsg));
	},
};
