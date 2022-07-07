import {createStore} from 'vuex'
import {contactsModule} from "./contactsModule";
import {discoveryModule} from "./discoveryModule";
import {specialModule} from "./specialModule";

export default createStore({
    modules: {
        contacts: contactsModule,
        discovery: discoveryModule,
        special: specialModule,
    }
})
