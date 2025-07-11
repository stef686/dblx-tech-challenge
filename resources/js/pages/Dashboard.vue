<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import { type BreadcrumbItem } from '@/types';
import { Head, router } from '@inertiajs/vue3';
import Card from '@/components/Card.vue';
import { Input } from '@/components/ui/input';
import { Button } from '@/components/ui/button';
import { reactive } from 'vue';
import ItemListing from '@/components/ItemListing.vue';

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Dashboard',
        href: '/dashboard',
    },
];

const form = reactive({
    search: null,
})

function submit() {
    router.post(`/dashboard`, form)
}

defineProps<{
    context?: string;
    items: Array;
}>();
</script>

<template>
    <Head title="Dashboard" />

    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="flex h-full flex-1 flex-col gap-4 rounded-xl p-4">
            <div class="p-6 bg-white rounded-xl border border-sidebar-border/70 dark:border-sidebar-border dark:bg-card">
                <h3 class="text-2xl mb-3">Search</h3>
                <form @submit.prevent="submit" class="flex flex-row gap-6">
                    <div class="flex-1">
                        <Input type="text" name="search" id="search" v-model="form.search"
                               class="block w-full"
                               placeholder="Search by keywords..."/>
                    </div>

                    <Button type="submit">Search</Button>
                </form>
            </div>
            <div v-if="context === 'latest'" class="p-6 bg-white rounded-xl border border-sidebar-border/70 dark:border-sidebar-border dark:bg-card">
                <h3 class="text-2xl">Latest Items</h3>

                <div class="grid gap-4 grid-cols-6 mt-4">
                    <Card v-for="item in items" :key="item.id" :item="item" />
                </div>
            </div>
            <div v-if="context === 'search'" class="p-6 bg-white rounded-xl border border-sidebar-border/70 dark:border-sidebar-border dark:bg-card">
                <h3 class="text-2xl">Search Results</h3>

                <p v-if="items.length === 0" class="text-gray-500">No items found for your search.</p>

                <div class="grid gap-4 grid-cols-2 mt-4">
                    <ItemListing v-for="item in items" :key="item.id" :item="item" />
                </div>
            </div>
        </div>
    </AppLayout>
</template>
