<template>
    <div>
        <div v-if="modelValue" class="modal-backdrop fade show"></div>
        <!-- staticBackdrop Modal -->
        <div class="modal fade" :class="[showClass]" :style="{ display: modelValue ? 'block' : 'none' }"
            id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-body text-center p-5">
                        <div
                            style="display: flex; flex-direction: column; align-items: center; justify-content: center;">
                            <Lottie :options="lottieOptions" :height="120" :width="120" />

                            <div class="mt-4">
                                <h4 class="mb-3">{{ title }}</h4>
                                <p class="text-muted mt-3"> Esta ação não poderá ser desfeita. "<span class="text-danger fs-5">{{ itemDelete.nome }}</span>" será removido permanentemente do sistema.</p>
                                <div class="hstack gap-2 justify-content-center">
                                    <a href="javascript:void(0);" @click="$emit('update:modelValue', false)"
                                        class="btn btn-link link-close fw-medium material-shadow-none"
                                        data-bs-dismiss="modal"><i class="ri-close-line me-1 align-middle"></i>
                                        Cancelar</a>
                                    <a href="javascript:void(0);" @click="$emit('save')" class="btn btn-danger">Sim,
                                        desejo excluir!</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import { ref, watch, nextTick } from 'vue'
import Lottie from "@/Components/widgets/lottie.vue";
import animationData from "@/Components/widgets/gsqxdxog.json";
const props = defineProps({
    modelValue: {
        type: Boolean,
        default: false
    },
    title: {
        type: String,
        default: 'Deseja realmento excluir?'
    },
    itemDelete: {
        type: Object,
        default: () => ({})
    }
});
const showClass = ref('');
const modalDialog = ref(null);
const lottieOptions = {
    animationData: animationData,
    loop: true,
    autoplay: true
};
watch(() => props.modelValue, async (val) => {
    if (val) {
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
