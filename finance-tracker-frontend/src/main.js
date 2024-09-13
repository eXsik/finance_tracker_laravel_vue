import { createApp } from "vue";
import "./style.css";
import App from "./App.vue";

axios.defaults.baseURL = "http;//localhost";
axios.defaults.withCredentials = true;
axios.defaults.withXSRFToken = true;

createApp(App).mount("#app");
