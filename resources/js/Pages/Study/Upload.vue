<template>
    <div>
        <h1 class="text-4xl pb-5">게시글 작성</h1>
        <div>
            <form name="createForm" @submit.prevent="submit">
                <div class="mb-6">
                    <label for="categories" class="block mb-2 text-sm font-medium text-gray-900">언어</label>
                    <select v-model="category" id="categories" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 w-32">
                        <option v-for="category in categories" v-bind:key="category.id"
                            :value="category.language" :disabled="category.state == 'disabled'">
                            {{category.language}}
                        </option>
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
                        <QuillEditor ref="quillEditor" contentType="html" v-model:content="someText" :modules="modules" toolbar="full"/>
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
import { QuillEditor } from "@vueup/vue-quill";
// import * as mykey from '../assets/js/mykey.js'
import { useCategories } from '@/Composables/categories.js';

export default {
    components: {
        QuillEditor, 
    },
    data() {
        return {
            someText:''
        }
    },
    computed: {
        editor() {
            return this.$refs.quillEditor;
        },
    },
    methods: {
        getSetText() {
            this.someText = this.editor.getHTML();
        },

        async store() {
            try {
                const post = await axios.post(
                    "/api/study/store", 
                    {
                        title: this.title,
                        content: this.someText,
                        category: this.category,
                    }
                );

                if(post.status == 200) {
                    window.location.href = "/study/view/" + post.data;
                }
                
            } catch (e) {
                console.log(e);
            }
        },
    },
    setup() {
        const { categories, getCategories } = useCategories();

        // mounted
        onMounted(() => {
			getCategories();
		});

        return {
            categories
        };
    },
}

const submit = () => {
    form.post(route('posts.store'));
};

</script>