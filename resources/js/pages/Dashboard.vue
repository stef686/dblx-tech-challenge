<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import { type BreadcrumbItem } from '@/types';
import { Head } from '@inertiajs/vue3';
import PlaceholderPattern from '../components/PlaceholderPattern.vue';
import Card from '@/components/Card.vue';

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Dashboard',
        href: '/dashboard',
    },
];

defineProps<{
    name?: string;
    items: Array;
}>();
</script>

<template>
    <Head title="Dashboard" />

    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="flex h-full flex-1 flex-col gap-4 rounded-xl p-4">
            <div class="p-6 bg-white rounded-xl border border-sidebar-border/70 dark:border-sidebar-border">
                <h3 class="text-2xl">Search</h3>
            </div>
                <div class="p-6 bg-white rounded-xl border border-sidebar-border/70 dark:border-sidebar-border">
                <h3 class="text-2xl">Latest Items</h3>

                <div class="grid gap-4 grid-cols-6 mt-4">
                    <Card v-for="item in items" :key="item.id" :item="item" />
                </div>
            </div>
        </div>
    </AppLayout>
</template>
