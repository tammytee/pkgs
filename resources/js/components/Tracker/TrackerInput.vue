<template>
  <form @submit.prevent="form.post('/track', {onSuccess: () => form.reset()})">
    <div>
      <TextInput v-model="form.trackingNumber" type="text" class="block" />
      <div v-if="form.errors.trackingNumber">{{ form.errors.trackingNumber }}</div>
    </div>

    <div class="flex items-center gap-4">
      <PrimaryButton :disabled="form.processing || !form.trackingNumber">Track Package</PrimaryButton>
    </div>
  </form>
</template>

<script setup>
import PrimaryButton from '../PrimaryButton.vue';
import TextInput from '../TextInput.vue';
import { useForm } from '@inertiajs/vue3';

const form = useForm({trackingNumber: ''});
</script>