<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import type { BreadcrumbItem } from '@/types';
import { Head } from '@inertiajs/vue3';
import { defineProps } from 'vue';

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Dashboard',
        href: '/admin/dashboard',
    },
];

defineProps<{
    info: number;
    download: number;
    weblink: number;
}>();
</script>

<template>
    <Head title="Dashboard" />

    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="flex h-full flex-1 flex-col gap-4 rounded-xl p-4">
            <dl class="grid grid-cols-1 gap-5 sm:grid-cols-3">
                <div class="overflow-hidden rounded-xl bg-white px-4 py-5 border border-sidebar-border/70 dark:border-sidebar-border sm:p-6">
                    <dt class="truncate text-sm font-medium text-gray-500">Info Items</dt>
                    <dd class="mt-1 text-3xl font-semibold text-gray-900">
                        {{ info }}
                    </dd>
                </div>
                <div class="overflow-hidden rounded-xl bg-white px-4 py-5 border border-sidebar-border/70 dark:border-sidebar-border sm:p-6">
                    <dt class="truncate text-sm font-medium text-gray-500">Download Items</dt>
                    <dd class="mt-1 text-3xl font-semibold text-gray-900">
                        {{ download }}
                    </dd>
                </div>
                <div class="overflow-hidden rounded-xl bg-white px-4 py-5 border border-sidebar-border/70 dark:border-sidebar-border sm:p-6">
                    <dt class="truncate text-sm font-medium text-gray-500">Weblink Items</dt>
                    <dd class="mt-1 text-3xl font-semibold text-gray-900">
                        {{ weblink }}
                    </dd>
                </div>
            </dl>
        </div>
    </AppLayout>
</template>
