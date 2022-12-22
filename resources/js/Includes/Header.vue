<template>
    <header class="fixed mb-4 flex justify-between items-center bg-white w-full z-50">
        <nav class="px-2 sm:px-4 py-2.5 w-full z-20 top-0 left-0 border-b border-gray-200">
            <div class="container flex flex-wrap items-center justify-between mx-auto">
                <router-link to="/home" class="self-center text-xl font-semibold whitespace-nowrap">KMS Blog</router-link>
                <div class="flex md:order-2">
                    <button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-3 md:mr-0">Sign In</button>
                </div>
                <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-sticky">
                    <ul class="flex flex-col p-4 mt-4 border border-gray-100 rounded-lg md:flex-row md:space-x-8 md:mt-0 md:text-medium md:font-medium md:border-0">
                        <li>
                            <a href="/home" class="block py-2 pl-3 pr-4 rounded md:hover:bg-transparent md:hover:text-gray-200 md:p-0 ">Home</a>
                        </li>
                        <li>
                            <a href="#" class="block py-2 pl-3 pr-4 rounded md:hover:bg-transparent md:hover:text-gray-200 md:p-0 ">About</a>
                        </li>
                        <li>
                            <a href="#" class="block py-2 pl-3 pr-4 rounded md:hover:bg-transparent md:hover:text-gray-200 md:p-0">Skill</a>
                        </li>
                        <li>
                            <a href="#" class="block py-2 pl-3 pr-4 rounded md:hover:bg-transparent md:hover:text-gray-200 md:p-0">Project</a>
                        </li>
                        <li>
                            <router-link to="/study/list" class="block py-2 pl-3 pr-4 rounded md:hover:bg-transparent md:hover:text-gray-200 md:p-0">Study</router-link>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
</template>

<script>
export default {
};
</script>