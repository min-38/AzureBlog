import { ref } from "vue";

export default function handlePagination() {
    let page = ref(1);
    let perPage = 10;

    const nextPage = (total) => {
        if(page.value !== Math.ceil(total / perPage)) {
            page.value += 1;
        }
    };

    const backPage = () => {
        if(page.value !== 1) {
            page.value -= 1;
        }
    };

    const goToPage = (numPage) => {
        page.value = numPage;
    };

    return { perPage, page, nextPage, backPage, goToPage };
}
