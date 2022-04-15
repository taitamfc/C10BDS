import { createStore } from 'vuex'
import Auth from './modules/auth';
import Notification from './modules/notification';
// Create a new store instance.
const store = createStore({
    modules: {
        Auth,
        Notification
    }
})
export default store;