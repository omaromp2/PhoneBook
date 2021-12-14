<template>
    <div>
    <div class="mb-2 border-solid border-blue-800 rounded border shadow-2xl ">
        <div class="bg-blue-500 px-2 py-3 border-solid border-blue-900 border-b text-white ">
            <div class="flex">
                {{ header }}
            </div>
        </div>
        <div class="p-3 bg-white overflow-hidden shadow-xl sm:rounded-lg text-black ">
            <slot />
        </div>
    </div>

</div>

</template>

<script>
export default {
    props:['header']
}
</script>

<style>

</style>
