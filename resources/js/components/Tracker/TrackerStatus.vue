<template>
  <span class="inline-flex px-2 text-xs font-semibold leading-5 rounded-full" :class="`${color}`">
    &bull;&nbsp;{{ text }}
  </span>
</template>

<script setup>
import { computed } from 'vue';

const props = defineProps({ status: String});

const statuses = {
  'delivered': {
    'text': 'Delivered',
    'color': 'text-green-800 bg-green-100',
  },
  'in_transit': {
    'text': 'In Transit',
    'color': 'text-blue-800 bg-blue-100',
  },
  'pending': {
    'text': 'Pending',
    'color': 'text-gray-800 bg-gray-100'
  },
  'info_received': {
    'text': 'Info Received',
    'color': 'text-yellow-800 bg-yellow-100'
  },
  'out_for_delivery': {
    'text': 'Out For Delivery',
    'color': 'text-blue-800 bg-blue-100'
  },
  'failed_attempt': {
    'text': 'Failed Attempt',
    'color': 'text-red-800 bg-red-100'
  },
  'available_for_pickup': {
    'text': 'Available For Pickup',
    'color': 'text-green-800 bg-green-100'
  },
  'exception': {
    'text': 'Exception',
    'color': 'text-red-800 bg-red-100'
  },
};

const color = computed(() => statuses[props.status].color);
const text = computed(() => statuses[props.status].text);
</script>