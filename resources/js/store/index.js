import {createStore} from 'vuex'
import {contactsModule} from "./contactsModule";
import {discoveryModule} from "./discoveryModule";

export default createStore({
    modules: {
        contacts: contactsModule,
        discovery: discoveryModule,
    }
})
