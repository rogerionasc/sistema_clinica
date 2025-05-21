<template>
  <div>
    <div v-if="modelValue" class="modal-backdrop fade show"></div>
    <div id="myModal" class="modal zoomIn" :class="[showClass]" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true" :style="{ display: modelValue ? 'block' : 'none' }">
      <div class="modal-dialog  modal-dialog-centered modal-lg" ref="modalDialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="myModalLabel">{{ title }}</h5>
            <button type="button" class="btn-close" aria-label="Close" @click="$emit('update:modelValue', false)"> </button>
          </div>
          <div class="modal-body">
            <slot/>

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-light" @click="$emit('update:modelValue', false)">Close</button>
            <button type="button" class="btn btn-primary " @click="$emit('save')">Save Changes</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
import { ref, watch, nextTick } from 'vue'
const props = defineProps({
  modelValue: {
    type: Boolean,
    default: false
  },
  title: {
    type: String,
    default: 'Titulo Padrão'
  }
});
const showClass = ref('');
const modalDialog = ref(null);
watch(() => props.modelValue, async (val) => {
  if(val) {
    showClass.value = '';
    await nextTick();
    showClass.value = 'show';
    if (modalDialog.value) {
      modalDialog.value.style.animation = 'zoomIn 0.3s ease';
    }
  } else {
    showClass.value = '';
    if (modalDialog.value) {
      modalDialog.value.style.animation = '';
    }
  }
});
</script>

<style scoped>
.modal.zoomIn .modal-dialog {
  animation: zoomIn 0.3s ease;
}
.modal-backdrop {
  position: fixed;
  top: 0;
  left: 0;
  width: 100vw;
  height: 100vh;
  z-index: 1040;
}
</style>
