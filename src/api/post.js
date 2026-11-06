import axios from 'axios';

//adjust ypur base URL if your laravel backend runs on a different port
const API = axios.create({
    baseURL: 'http://localhost:8000/api', 
    withCredentials: false,
});

export const getPost = () => API.get('/posts');
export const storePost = (data) => API.post('/posts', data);