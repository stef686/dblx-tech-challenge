<script setup lang="ts">
import { Head, Link, router } from '@inertiajs/vue3';
import { defineProps, reactive } from "vue";
import AppLayout from '@/layouts/AppLayout.vue';
import { Input } from '@/components/ui/input/index.js';
import { Button } from '@/components/ui/button/index.js';
import { Label } from '@/components/ui/label/index.js';
import { Textarea } from '@/components/ui/textarea/index.js';

const props = defineProps({
    item: Object
})

const form = reactive({
    name: props.item.name,
    description: props.item.description,
    content: props.item.content
})

function submit() {
    router.patch(`/admin/items/${props.item.id}`, form)
}

function deleteItem() {
    if (!confirm('Are you sure you want to delete this item?')) {
        return;
    }

    router.delete(`/admin/items/${props.item.id}`)
}

</script>

<template>
    <Head title="Dashboard"/>

    <AppLayout>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="flex flex-col space-y-6">
                        <form @submit.prevent="submit" class="space-y-6">

                            <div class="grid gap-2">
                                <Label for="name">Name</Label>
                                <Input type="text" name="name" id="name" v-model="form.name"
                                       class="mt-1 block w-full"
                                       placeholder="Item Name"/>
                            </div>

                            <div class="grid gap-2">
                                <Label for="name">Description</Label>
                                <div class="mt-1">
                                    <Textarea name="name" id="name" v-model="form.description"
                                              class="mt-1 block w-full"
                                              placeholder="Item Description"/>
                                </div>
                            </div>

                            <template v-if="item.content_type === 'info'">

                                <div class="grid gap-2">
                                    <Label for="header">Header</Label>
                                    <div class="mt-1">
                                        <Input type="text" name="header" id="header" v-model="form.content.header"
                                               class="mt-1 block w-full"
                                               placeholder="Item Header"/>
                                    </div>
                                </div>

                                <div class="grid gap-2">
                                    <Label for="content">Content</Label>
                                    <div class="mt-1">
                                        <Textarea name="name" id="content" v-model="form.content.content" rows="10"
                                                  class="mt-1 block w-full"
                                                  placeholder="Item Content"/>
                                    </div>
                                </div>

                            </template>

                            <template v-else>

                                <div class="grid gap-2">
                                    <Label for="name">URL</Label>
                                    <div class="mt-1">
                                        <Input type="text" name="url" id="url" v-model="form.content.url"
                                               class="mt-1 block w-full"
                                               placeholder="Item URL"/>
                                    </div>
                                </div>

                            </template>

                            <Button type="submit">Update</Button>

                            <Button :as="Link" class="bg-red-600 text-white ms-4" v-on:click="deleteItem">Delete</Button>
                        </form>
                    </div>

                </div>
            </div>

    </AppLayout>
</template>
