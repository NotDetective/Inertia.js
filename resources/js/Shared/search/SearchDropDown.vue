<script setup>
import {ref, watch} from "vue";

const props = defineProps({
    showData: {
        type: Object,
        required: true,
    },
    modelValue: {
        type: String,
        required: true,
    },
    selectedData: {
        type: Object,
        required: true,
    },
    name: {
        type: String,
        required: true,
    },
    max: Number,
})
let maxAmount = ref(props.max ?? 9999);
let show = ref(false);
let dropdown = ref(null);

let emit = defineEmits(['update:selectedData', 'update:modelValue']);

watch(props.selectedData, (value) => {
    emit('update:selectedData', value);
})

const updateValue = (e) => {
    emit('update:modelValue', e.target.value);
}

</script>

<template>
    <div class="w-[300px]">
        <label for="search" class="block text-sm font-medium leading-6 text-gray-900">{{ name }}</label>
        <button
            ref="openButton"
            class="text-black bg-white drop-shadow border-black px-1.5 py-2 rounded-md text-sm font-medium flex relative"
            @click="show = !show"
        >
            {{ name }} {{ selectedData[0] === undefined ? '' : ': ' + selectedData[0] }} <span
            v-show="selectedData.length > 1"
            class="bg-blue-600 w-fit text-white ml-2 text-md px-1.5 py-0.5 rounded-full">{{
                props.selectedData.length > maxAmount ? `${maxAmount}+` : `+${selectedData.length - 1 }`
            }}</span>
            <span class="ml-2 text-xs">
                 <svg
                     class="fill-current"
                     :class="{ 'rotate-180': !show }"
                     xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24">
                        <path d="M480-345 240-585l56-56 184 184 184-184 56 56-240 240Z"/>
                 </svg>
            </span>
        </button>
        <div
            :id="`dropdown${name}`"
            ref="dropdown"
            v-show="show"
            class="bg-white text-black absolute w-[300px] drop-shadow-lg mt-0.5 h-68 rounded-md"
        >
            <div class="w-full h-full flex flex-col">
                <header
                    class="flex justify-between w-full rounded-md border-0 text-gray-900 placeholder:text-gray-400">
                    <input
                        @keyup="updateValue"
                        @change="updateValue"
                        :value="modelValue"
                        name="search"
                        type="text"
                        placeholder="search..."
                        class="bg-white flex-1 p-1.5 w-full relative border-0 ring-0 rounded-t-md placeholder:text-gray-400 focus:outline-none hover:bg-gray-50"
                    >
                    <span class="absolute right-0.5 top-1.5 text-xs text-gray-500">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960"
                                         width="24"
                                         class="fill-current text-gray-500"
                                    >
                                        <path
                                            d="M784-120 532-372q-30 24-69 38t-83 14q-109 0-184.5-75.5T120-580q0-109 75.5-184.5T380-840q109 0 184.5 75.5T640-580q0 44-14 83t-38 69l252 252-56 56ZM380-400q75 0 127.5-52.5T560-580q0-75-52.5-127.5T380-760q-75 0-127.5 52.5T200-580q0 75 52.5 127.5T380-400Z"/>
                                    </svg>
                                </span>
                </header>
                <div>
                    <div class="p-1">
                        <button
                            v-for="data in showData"
                            @click="selectedData.includes(data.name) ? selectedData.splice(selectedData.indexOf(data.name), 1) : selectedData.push(data.name);"
                            class="w-full flex items-center p-1.5 rounded-sm hover:bg-gray-200 focus:outline-none"
                        >
                            <input
                                type="checkbox"
                                class="mr-1.5 w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500 focus:ring-2"
                                :checked="selectedData.includes(data.name)">
                            {{ data.name }}
                        </button>
                    </div>
                </div>
                <footer class="w-full h-full flex">
                    <div class="px-1 w-full flex justify-between mb-0.5">
                        <button
                            :disabled="selectedData.length === 0"
                            @click="selectedData.splice(0, selectedData.length); "
                            class="bg-white flex-1 p-1.5 w-full border-0 ring-0 rounded-t-md placeholder:text-gray-400 focus:outline-none hover:bg-gray-50 disabled:opacity-50 disabled:cursor-not-allowed"
                        >
                            clear all selected
                        </button>
                        <button
                            :disabled="selectedData.length === 0"
                            @click="selectedData.pop()"
                            class="bg-white flex-1 p-1.5 border-0 ring-0 rounded-t-md placeholder:text-gray-400 focus:outline-none hover:bg-gray-50 disabled:opacity-50 disabled:cursor-not-allowed"
                        >
                            clear last selected
                        </button>
                    </div>
                </footer>
            </div>
        </div>
    </div>
</template>
