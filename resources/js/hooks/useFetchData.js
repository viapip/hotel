import * as url from "url";
import {onMounted, ref} from "vue";


export const useFetchData = (url) => {
    const data = ref([])
    let isLoading = ref(false)
    const fetchingData = async () => {
        try {
            isLoading.value = true;
            const response = await fetch(process.env.MIX_HOST_API + url);
            data.value = await response.json();
            console.log(data.value)
        } catch (e) {
            console.log(e)
        } finally {
            isLoading.value = false;
        }
    }

    onMounted(fetchingData)
    return {
        data, isLoading
    }
}
