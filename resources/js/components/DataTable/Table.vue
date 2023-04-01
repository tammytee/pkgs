<template>
  <div class="p-6 overflow-hidden bg-white shadow-sm sm:px-6 lg:px-8 sm:rounded-lg">
    <div class="sm:flex sm:items-center">
      <div class="sm:flex-auto">
        <h1 v-if="heading" class="text-base font-semibold leading-6 text-gray-900">{{ heading }}</h1>
        <p v-if="summary" class="mt-2 text-sm text-gray-700">{{ summary }}</p>
      </div>
      <div class="mt-4 sm:ml-16 sm:mt-0 sm:flex-none">
        <slot name="action"></slot>
      </div>
    </div>
    <div class="flow-root mt-8">
      <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
          <table class="min-w-full divide-y divide-gray-300">
            <thead>
              <slot name="header"></slot>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
              <slot name="rows"></slot>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
defineProps({ heading: String , summary: String  });
</script>