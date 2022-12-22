import { ref } from 'vue'

export const useCategories = () => {
    const categories = ref({})

    const getCategories = async () => {
        axios.get('/api/loadCategory')
        .then(res => {
            categories.value = res.data.data;
        })
    }

    return { categories, getCategories };
}