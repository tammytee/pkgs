<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import TrackerInput from '@/components/Tracker/TrackerInput.vue';
import { Head } from '@inertiajs/vue3';

defineProps({ packages: Array });
</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">Dashboard</h2>
        </template>

        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <TrackerInput />

                <div v-for="pkg in packages" class="mb-2">
                    <p>{{ pkg.number }}</p>
                    <p>{{ pkg.tracking_number }}</p>
                    <p>{{ pkg.tracking_id }}</p>
                    <p>{{ pkg.status }}</p>
                    <p>{{ pkg.status_note }}</p>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
