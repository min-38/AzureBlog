<template>
    <div>
        <h1 class="text-4xl pb-5">게시글 작성</h1>
        <div>
            <form name="createForm" @submit.prevent="submit">
                <div class="mb-6">
                    <label for="language" class="block mb-2 text-sm font-medium text-gray-900">언어</label>
                    <select v-model="language" id="language" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 w-32">
                        <option v-for="option in options" :key="option.id" :value="option.language" :disabled="option.state == 'disabled'">{{option.language}}</option>
                    </select>
                </div>
                <div class="mb-6">
                    <label for="title" class="block mb-2 text-sm font-medium text-gray-900">제목</label>
                    <input type="text" id="title" v-model="title" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                        placeholder="제목을 입력해주세요." required>
                </div>
                <div class="mb-6">
                    <label for="content" class="block mb-2 text-sm font-medium text-gray-900">본문</label>
                    <div id="content">
                        <QuillEditor v-model:content="content" :modules="modules" toolbar="full"/>
                    </div>
                </div>
                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" @click="store">
                    작성
                </button>
            </form>
        </div>
    </div>
</template>

<script>
import { onMounted, ref } from 'vue'

export default {
    data() {
        return {
            title: '',
            name: '',
        };
    },
    methods: {
        async store() {
            try {
                const study = await axios.post(
                    "/api/study/store", 
                    {
                        title: this.title,
                        content: this.content,
                        language: this.language,
                    }
                );
                console.log(study);
            } catch (e) {
                console.log(e);
            }
        },
    },
    setup() {
        // reactive state
        const options = ref([]);
        // mounted
        onMounted(() => {
            // get api from laravel backend
            axios.get('/api/loadLang')
                .then((res) => {
                    // assign state users with response data
                    // options.value = ;
                    options.value = res.data.data;
                    console.log(res.data.data);
                })
                .catch((error) => {
                    option.log(error.res.data);
                });
        });

        return {
            options
        };
    },
}

const submit = () => {
    form.post(route('posts.store'));
};

</script>