<template>
  <form @submit.prevent="form.post('/track', {onSuccess: () => form.reset()})">
    <div class="flex items-center gap-4 mb-2">
      <div>
        <TextInput v-model="form.trackingNumber" type="text" placeholder="ex. EB783005170CN" class="block w-60" />
      </div>
      <div>
        <PrimaryButton :disabled="form.processing || !form.trackingNumber" class="py-3">
          Track Shipment
        </PrimaryButton>
      </div>
    </div>
    <div v-if="form.errors.trackingNumber" class="text-xs text-red-600">{{ form.errors.trackingNumber }}</div>
  </form>
</template>

<script setup>
import PrimaryButton from '../PrimaryButton.vue';
import TextInput from '../TextInput.vue';
import { useForm } from '@inertiajs/vue3';

const form = useForm({trackingNumber: ''});
</script>