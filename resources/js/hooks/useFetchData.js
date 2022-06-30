import * as url from "url";
import {onMounted, ref, onBeforeMount} from "vue";
import {useRouter} from "vue-router";


export const useFetchData =  (url) => {
    const data = ref(null)
    let isLoading = ref(true)
    const router = useRouter()
    const fetchingData = async () => {
        try {
            const response = await fetch(url);
            if (response.status === 404) await router.push('/rooms');

            data.value = await response.json();
            console.log(data.value)
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
