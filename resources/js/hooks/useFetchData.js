import * as url from "url";
import {onMounted, ref, onBeforeMount, watch, onBeforeUpdate} from "vue";
import {onBeforeRouteUpdate, useRouter} from "vue-router";


export const useFetchData =  (url, dynamic = false) => {
    const data = ref(null)
    let isLoading = ref(true)
    let newUrl = ref(url)
    const router = useRouter()
    const route = useRouter()
    const fetchingData = async (url) => {
        try {
            const response = await fetch(newUrl.value);
            if (response.status === 404) await router.push('/');

            data.value = await response.json();
        } catch (e) {
            console.log(e)
           // await router.push('/rooms')
        } finally {
            isLoading.value = false;
        }
    }
    onBeforeMount(fetchingData)
    return {
        data, isLoading
    }
}
