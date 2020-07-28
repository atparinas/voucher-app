import axios from 'axios';

export const baseUrl ="http://homestead.test"

const api = () => axios.create({
    baseURL: baseUrl,
})

export default api;
