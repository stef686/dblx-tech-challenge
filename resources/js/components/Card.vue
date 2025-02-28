<script setup lang="ts">
import { BookOpen, Download, ExternalLink } from 'lucide-vue-next';

defineProps<{
    item: object
}>()

const iconMap = {
    "book-open": BookOpen,
    "download": Download,
    "external-link": ExternalLink,
}
</script>

<template>
    <div class="relative w-full">
        <p class="absolute inset-x-0 bottom-0 bg-black text-white p-4">{{ item.name }}</p>
        <div class="bg-black p-4 absolute left-0 top-0">
            <component :is="iconMap[item.type_icon]" class="h-5 w-5 text-white"/>
        </div>
        <img class="w-full" :src="item.image_url" :alt="item.name" />
    </div>
</template>
