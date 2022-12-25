<template>
    <div>
        <div class="flex justify-center">
            <nav aria-label="Page navigation example">
                <ul class="flex list-style-none">
                    <li class="page-item">
                        <a class="page-link relative block py-1.5 px-3 rounded border-0 bg-transparent outline-none transition-all
                            duration-300 rounded text-gray-800 hover:text-gray-800 hover:bg-gray-200 focus:shadow-none" @click="backPage">Previous</a>
                    </li>
                    <li v-for="link in Math.ceil(linkdata.total / perPage)" :key="link" @click="goToPage(link), passEvent(page)" class="page-item">
                        <a :style="{ color: activeColor}" class="page-link relative block py-1.5 px-3 rounded border-0 bg-transparent outline-none transition-all
                            duration-300 rounded text-gray-800 hover:text-gray-800 hover:bg-gray-200 focus:shadow-none">
                            <span v-if="page == link" style='color: red'>{{ link }}</span>
                            <span v-else>{{ link }}</span>
                        </a>
                    </li>
                    <li class="page-item">
                        <a class="page-link relative block py-1.5 px-3 rounded border-0 bg-transparent outline-none transition-all
                            duration-300 rounded text-gray-800 hover:text-gray-800 hover:bg-gray-200 focus:shadow-none" @click="nextPage(linkdata.total)">Next</a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</template>
<script>

import { watch, defineEmits } from 'vue'
import handlePagination from "@/Composables/pagination.js";

export default {
    name: 'Pagination',
    props: {
        linkdata: Object, // Required prop
    },
    methods:{
        passEvent(page) {
            this.$emit('ChangePage', page);
        }
    },
    setup(props) {
        const handlePaginationValue = handlePagination();
        watch(handlePaginationValue.page, (currentValue, oldValue) => {
            props.page = currentValue;
        });
        return { ...handlePaginationValue};
        
    },
}
</script>