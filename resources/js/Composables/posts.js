import { ref } from 'vue'

export const loadPosts = () => {
    const posts = ref({})
    const linkdata = ref({})

    const getPosts = async (page = 1) => {
        axios.get('/api/loadPosts')
        .then(res => {
            posts.value = res.data[0];
            linkdata.value = res.data[1];
        })
    }
    return { posts, linkdata, getPosts };
}