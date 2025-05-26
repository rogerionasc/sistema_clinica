<template>
    <!-- Componente de Modal reutilizável -->
    <div>
      <div id="myModal" class="modal zoomIn" :class="[showClass]" tabindex="9999"
          aria-labelledby="myModalLabel" aria-hidden="true"
          :style="{ display: modelValue ? 'block' : 'none' }">

          <!-- Backdrop (fundo escurecido) vem primeiro DENTRO do modal -->
          <div v-show="modelValue" class="modal-backdrop"></div>

          <!-- Conteúdo principal do modal -->
          <div class="modal-dialog modal-dialog-centered modal-lg" ref="modalDialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">{{ title }}</h5>
                <!-- Botão para fechar o modal -->
                <button type="button" class="btn-close" @click="$emit('update:modelValue', false)"></button>
              </div>
              <div class="modal-body">
                <!-- Espaço para inserir conteúdo personalizado -->
                <slot></slot>
              </div>
              <div class="modal-footer">
                <!-- Botão de cancelar -->
                <button type="button" class="btn btn-light" @click="$emit('update:modelValue', false)">Cancelar</button>
                <!-- Botão de ação principal -->
                <button type="button" class="btn btn-success" @click="$emit('save')">{{ nameButton }}</button>
              </div>
            </div>
          </div>
      </div>
    </div>
</template>

<script setup>
// Importação de funções do Vue
import { ref, watch, nextTick } from 'vue'

// Definição das propriedades recebidas pelo componente
const props = defineProps({
    // Controla a visibilidade do modal
    modelValue: {
        type: Boolean,
        default: false
    },
    // Título exibido no cabeçalho do modal
    title: {
        type: String,
        default: 'Título Padrão'
    },
    // Texto do botão de ação principal
    nameButton: {
        type: String,
        default: 'Salvar'
    }
});

// Classe para animação de exibição
const showClass = ref('');
// Referência ao elemento do dialog
const modalDialog = ref(null);

// Observa mudanças na propriedade modelValue para controlar animações
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
/* Estilização do dialog do modal */
.modal-dialog {
    z-index: 1060; /* opcional, se quiser animar o conteúdo separadamente */
}

.modal.zoomIn .modal-dialog {
    animation: zoomIn 0.3s ease;
}

/* Fundo escurecido do modal */
.modal-backdrop {
  position: absolute; /* dentro da modal */
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  z-index: 1040;
  background-color: rgba(0, 0, 0, 0.1);
}

.modal-content {
    background-color: #fff;
    opacity: 1 !important;
}

.modal {
    position: fixed;
    top: 0;
    left: 0;
    z-index: 1050; /* acima do backdrop */
    width: 100%;
    height: 100%;
    overflow: auto;
}


</style>
