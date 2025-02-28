<script setup lang="ts">
import { Head, router } from '@inertiajs/vue3';
import { reactive } from "vue";
import AppLayout from '@/layouts/AppLayout.vue';
import { Label } from '@/components/ui/label';
import { Input } from '@/components/ui/input';
import { Textarea } from '@/components/ui/textarea';
import { Button } from '@/components/ui/button';

const form = reactive({
    name: null,
    description: null,
    content_type: 'info',
    content: {
        header: null,
        content: null,
        url: null
    }
})

function submit() {
    router.post(`/admin/items`, form)
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
                                <Textarea name="name" id="name" v-model="form.description"
                                          class="mt-1 block w-full"
                                          placeholder="Item Description"/>
                            </div>

                            <div class="grid gap-2">
                                <Label for="content_type">Type</Label>
                                <select id="content_type" name="content_type" v-model="form.content_type"
                                        class="mt-1 block h-10 w-full rounded-md border border-input bg-background px-3 py-2 text-base ring-offset-background file:border-0 file:bg-transparent file:text-sm file:font-medium file:text-foreground placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50 md:text-sm"
                                >
                                    <option value="info">Info</option>
                                    <option value="download">Download</option>
                                    <option value="WEBLINK">Weblink</option>
                                </select>
                            </div>

                            <template v-if="form.content_type === 'info'">

                                <div class="grid gap-2">
                                    <Label for="header">Header</Label>
                                    <Input type="text" name="header" id="header" v-model="form.content.header"
                                           class="mt-1 block w-full"
                                           placeholder="Item Header"/>
                                </div>

                                <div class="grid gap-2">
                                    <Label for="content">Content</Label>
                                    <Textarea name="name" id="content" v-model="form.content.content" rows="10"
                                              class="mt-1 block w-full"
                                              placeholder="Item Content"/>
                                </div>

                            </template>

                            <template v-else>

                                <div class="mt-3">
                                    <label for="name">URL</label>
                                    <div class="mt-1">
                                        <input type="text" name="url" id="url" v-model="form.content.url"
                                               class="mt-1 block w-full"
                                               placeholder="Item URL"/>
                                    </div>
                                </div>

                            </template>

                            <Button type="submit">Save</Button>

                        </form>
                    </div>

                </div>
            </div>

    </AppLayout>
</template>
