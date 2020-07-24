import axios from 'axios';

export const baseUrl ="http://homestead.test"

const api = () => axios.create({
    baseURL: baseUrl,
    withCredentials: true
})

export default api;
