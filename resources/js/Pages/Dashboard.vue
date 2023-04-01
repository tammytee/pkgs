<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import PrimaryButton from '@/components/PrimaryButton.vue';
import TrackerTable from '@/components/Tracker/TrackerTable.vue';
import { ArrowPathIcon } from '@heroicons/vue/24/outline';
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
                <div class="py-8">
                    <PrimaryButton class="py-3 inline-flex items-center gap-x-1.5">
                        <ArrowPathIcon class="-ml-0.5 h-5 w-5" aria-hidden="true" />
                        Sync Shipments
                    </PrimaryButton>
                </div>

                <TrackerTable :packages="packages" />
            </div>
        </div>
    </AuthenticatedLayout>
</template>
