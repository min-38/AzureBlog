<template>
    <h1 class="text-4xl pb-5">Study</h1>
    <div class="h-fit">
        <div id='searchBox' class="mb-6">
            <div id='srchContent1' class="inline-flex">
                <label for="countries" class="text-lg mb-2 text-sm font-medium text-gray-900 my-auto mx-5">종류</label>
                <select id="countries" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5">
                    <option selected>종류 선택</option>
                    <option value="US">United States</option>
                </select>
            </div>
            <div id='srchContent2' class="inline-flex">
                <label for="countries" class="text-lg mb-2 text-sm font-medium text-gray-900 my-auto mx-5">날짜 선택</label>
                <div class="relative">
                    <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                        <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path></svg>
                    </div>
                </div>
                  <Datepicker v-model="date" />
            </div>
        </div>

        <div>
            <div class="mb-3">
                <h1 class="">총 게시글: {{ linkdata.total }}개</h1>
            </div>
            <div class="relative shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left text-gray-500">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                        <tr>
                            <th scope="col" class="py-3 px-6">
                                <div class="flex items-center">
                                    No
                                </div>
                            </th>
                            <th scope="col" class="py-3 px-6">
                                <div class="flex items-center">
                                    게시글 제목
                                </div>
                            </th>
                            <th scope="col" class="py-3 px-6">
                                <div class="flex items-center">
                                    카테고리
                                </div>
                            </th>
                            <th scope="col" class="py-3 px-6">
                                <div class="flex items-center">
                                    작성자
                                </div>
                            </th>
                            <th scope="col" class="py-3 px-6">
                                <div class="flex items-center">
                                    게시일
                                    <!-- <a href="#"><svg xmlns="http://www.w3.org/2000/svg" class="ml-1 w-3 h-3" aria-hidden="true" fill="currentColor" viewBox="0 0 320 512"><path d="M27.66 224h264.7c24.6 0 36.89-29.78 19.54-47.12l-132.3-136.8c-5.406-5.406-12.47-8.107-19.53-8.107c-7.055 0-14.09 2.701-19.45 8.107L8.119 176.9C-9.229 194.2 3.055 224 27.66 224zM292.3 288H27.66c-24.6 0-36.89 29.77-19.54 47.12l132.5 136.8C145.9 477.3 152.1 480 160 480c7.053 0 14.12-2.703 19.53-8.109l132.3-136.8C329.2 317.8 316.9 288 292.3 288z"/></svg></a> -->
                                </div>
                            </th>
                            <th scope="col" class="py-3 px-6">
                                <div class="flex items-center">
                                    조회수
                                </div>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="post in posts" :key="post.id" class="bg-white border-b">
                            <td class="py-4 px-6">
                                {{ linkdata.total - 1 }}
                            </td>
                            <td class="py-4 px-6">
                                <div class="flex items-center">
                                    {{ post.title }}
                                </div>
                            </td>
                            <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap">
                                {{ post.category }}
                            </th>
                            <td class="py-4 px-6">
                                {{ post.user }}
                            </td>
                            <td class="py-4 px-6">
                                {{ post.created_at }}
                            </td>
                            <td class="py-4 px-6">
                                -
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <pagination v-bind:linkdata="linkdata" @ChangePage="passEvent"/>
    </div>
</template>


<script>
import { ref, onMounted, watch } from 'vue'
import Datepicker from '@vuepic/vue-datepicker';
import '@vuepic/vue-datepicker/dist/main.css';
import Pagination from '@/Includes/Pagination.vue';

export default {
    data() {
        return {
            posts: ref({}),
            linkdata: ref({}),
            page: 1,
        }
    },
    components: {
        Pagination,
    },
    methods:{
        loadPosts(page = 1) {
            axios.post('/api/loadPosts', {
                page: this.page,
            })
            .then(res => {
                this.posts = res.data[0];
                this.linkdata = res.data[1];
            });
        },

        passEvent(page) {
            this.page = page;
        }
    },
    mounted() {
        this.loadPosts();
    },
    watch: {
        page: {
            handler: function(cur, prev) {
                console.log(cur);
                console.log(prev);
                this.loadPosts(cur);
                // this.foo(); // call it in the context of your component object
            }
        }
    },
    setup() {
        const date = ref();

        const { posts, linkdata, getPosts } = loadPosts();

        // For demo purposes assign range from the current date
        onMounted(() => {
            const startDate = new Date();
            const endDate = new Date(new Date().setDate(startDate.getDate() + 7));
            date.value = [startDate, endDate];

            getPosts();
            // console.log(posts);
        })

        return {
            date,
        }
    }
}
</script>