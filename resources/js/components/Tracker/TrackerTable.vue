<template>
  <Table heading="Your Packages">
    <template #action>
      <TrackerInput />
    </template>
    <template #header>
      <tr>
        <th v-for="column in columns" scope="col" class="whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900">
          {{ column }}
        </th>
        <th scope="col" class="relative whitespace-nowrap py-3.5 pl-3 pr-4 sm:pr-0">
          <span class="sr-only">Edit</span>
        </th>
      </tr>
    </template>
    <template #rows>
      <tr v-for="pkg in packages" :key="pkg.number">
        <td class="px-2 py-2 text-sm text-gray-500 whitespace-nowrap">{{ pkg.number }}</td>
        <td class="px-2 py-2 text-sm font-medium text-gray-900 whitespace-nowrap">Courier</td>
        <td class="px-2 py-2 text-sm font-medium text-gray-900 whitespace-nowrap">{{ pkg.tracking_number }}</td>
        <td class="px-2 py-2 text-sm text-gray-500 whitespace-nowrap">
          <TrackerStatus :status="pkg.status" />
        </td>
        <td class="px-2 py-2 text-sm font-medium text-gray-900 whitespace-nowrap">{{ pkg.status_note }}</td>
        <td class="relative py-2 pl-3 pr-4 text-sm font-medium text-right whitespace-nowrap sm:pr-0">
          <a href="#" class="text-indigo-600 hover:text-indigo-900"
            >Edit<span class="sr-only">, {{ pkg.id }}</span></a
          >
        </td>
      </tr>
    </template>
  </Table>
</template>

<script setup>
import Table from '../DataTable/Table.vue';
import TrackerInput from './TrackerInput.vue';
import TrackerStatus from './TrackerStatus.vue';

defineProps({ packages: Array })

const columns = [
  'Package No.',
  'Courier',
  'Tracking Number',
  'Status',
  'Delivery Notes',
]
</script>