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
            <h5 class="fs-15">
              Overflowing text to show scroll behavior
            </h5>
            <p class="text-muted">One morning, when Gregor Samsa woke from troubled dreams, he found himself transformed in his bed into a horrible vermin. He lay on his armour-like back, and if he lifted his head a little he could see his brown belly, slightly domed and divided by arches into stiff sections.</p>
            <p class="text-muted">The bedding was hardly able to cover it and seemed ready to slide off any moment. His many legs, pitifully thin compared with the size of the rest of him, waved about helplessly as he looked. "What's happened to me?" he thought.</p>
            <p class="text-muted">It wasn't a dream. His room, a proper human room although a little too small, lay peacefully between its four familiar walls.</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-light" @click="$emit('update:modelValue', false)">Close</button>
            <button type="button" class="btn btn-primary " @click="$emit('save')">Save Changes</button>
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
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
