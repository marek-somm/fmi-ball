import rs from '@/services/RequestService.js'

export default {
	async sendTable0(data) {
		return rs.post("seats", data)
	},
}