export default {
    state: {
        notifications: []
    },
    getters: {
        NOTIFICATIONS: state => {
            return state.notifications;
        }
    },
    mutations: {
        GET_NOTIFICATIONS: (state, payload) => {
            state.loading = true;
            state.notifications = payload;
        },
    },
    actions: {
        
    }
}