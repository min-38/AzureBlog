<template>
    <h1 class="text-4xl pb-5">Study</h1>
    <div class="h-fit">
        <div id='searchBox'>
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
    </div>
</template>


<script>
import { ref, onMounted } from 'vue'
import Datepicker from '@vuepic/vue-datepicker';
import '@vuepic/vue-datepicker/dist/main.css';

export default {
    setup() {
        const date = ref();

        // For demo purposes assign range from the current date
        onMounted(() => {
            const startDate = new Date();
            const endDate = new Date(new Date().setDate(startDate.getDate() + 7));
            date.value = [startDate, endDate];
        })
        
        return {
            date,
        }
    }
}
</script>