import axios from 'axios';
import stores from './stores';
import router from './router/index.ts';


let axiosClient = axios.create({
    baseURL: `${import.meta.env.VITE_API_BASE_URL}/api/${import.meta.env.VITE_API_CURRENT_VERSION}`,
    // withCredentials: true,
});

axiosClient.interceptors.request.use(config => {
    config.headers.Authorization = `Bearer ${stores.state.auth.user.token}`;
    return config;
});


axiosClient.interceptors.response.use(response => {
    return response;
}, error => {
    if (error.response && (error.response.status === 401 || error.response.status === 400)) {
        localStorage.removeItem("TOKEN");
        localStorage.removeItem("USER");
        router.push({name: 'Login'});
        return Promise.reject();
    } else if (error.response && error.response.status === 404) {
        router.push({name: '/'})
        return Promise.reject();
    }
    throw error;
});

export default axiosClient;
