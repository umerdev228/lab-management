import { createStore } from 'vuex'
import createPersistedState from 'vuex-persistedstate'
import auth from "@/store/auth";

const store = createStore({
    state:{
        authenticated:false,
        user:{}
    },
    plugins:[
        createPersistedState()
    ],
    modules:{
        auth
    },
    mutations:{
        SET_AUTHENTICATED (state, value) {
            console.log(value)
            state.authenticated = value
        },
        SET_USER (state, value) {
            state.user = value
        }
    },
})

export default store
