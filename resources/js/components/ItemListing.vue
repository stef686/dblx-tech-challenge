<script setup lang="ts">
import { BookOpen, Download, ExternalLink } from 'lucide-vue-next';
import { ItemData } from '@/types';
import { Link } from '@inertiajs/vue3';
import { Button } from '@/components/ui/button';

defineProps<{
    item: ItemData;
}>();

const iconMap = {
    'book-open': BookOpen,
    'download': Download,
    'external-link': ExternalLink,
};
</script>

<template>
    <div class="relative w-full">
        <div class="absolute left-0 top-0 bg-black p-4">
            <component :is="iconMap[item.type_icon]" class="h-5 w-5 text-white" />
        </div>
        <img class="h-80 w-full object-cover" :src="item.image_url" :alt="item.name" />
        <p class="p-4 font-bold">{{ item.name }}</p>
        <div class="bg-sidebar p-6">
            <div v-if="item.content_type === 'info'">
                <p class="px-4 font-bold">{{ item.content.header }}</p>
                <p class="p-4">{{ item.content.content }}</p>
            </div>
            <div v-else-if="item.content_type === 'WEBLINK' || item.content_type === 'download'">
                <Button :as="Link" :href="item.content.url"> {{ item.content.button_text }} </Button>
            </div>
        </div>
    </div>
</template>
