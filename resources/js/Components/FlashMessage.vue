<template>
    <transition name="fade">
      <div
        v-if="visible && message"
        :class="alertClasses"
        class="alert alert-dismissible alert-label-icon rounded-label fade show material-shadow position-fixed top-0 end-0 m-4 z-50"
        role="alert"
        style="z-index: 9999"
      >
        <i :class="iconClass + ' label-icon'"></i>
        <strong class="me-1">{{ alertTitle }}</strong> {{ message }}
        <button type="button" class="btn-close" @click="visible = false" aria-label="Close"></button>
      </div>
    </transition>
  </template>

  <script setup>
  import { computed, ref, watch, onMounted } from 'vue'
  import { usePage } from '@inertiajs/vue3'

  const page = usePage()

  // Captura a primeira mensagem disponível
  const message = computed(() =>
    page.props.flash.success || page.props.flash.error || page.props.flash.warning || page.props.flash.info
  )

  const type = computed(() => {
    if (page.props.flash.success) return 'success'
    if (page.props.flash.error) return 'danger'
    if (page.props.flash.warning) return 'warning'
    if (page.props.flash.info) return 'info'
    return 'secondary'
  })

  const visible = ref(false)

  const alertTitle = computed(() => {
    switch (type.value) {
      case 'success':
        return 'Sucesso:'
      case 'danger':
        return 'Erro:'
      case 'warning':
        return 'Atenção:'
      case 'info':
        return 'Informação:'
      default:
        return ''
    }
  })

  const iconClass = computed(() => {
    switch (type.value) {
      case 'success':
        return 'ri-checkbox-circle-line'
      case 'danger':
        return 'ri-close-circle-line'
      case 'warning':
        return 'ri-alert-line'
      case 'info':
        return 'ri-information-line'
      default:
        return 'ri-information-line'
    }
  })

  const alertClasses = computed(() => {
    return [
      `alert-${type.value}`
    ]
  })

  onMounted(() => {
    if (message.value) {
      visible.value = true
      setTimeout(() => {
        visible.value = false
      }, 6000)
    }
  })
  </script>

  <style scoped>
  .fade-enter-active,
  .fade-leave-active {
    transition: opacity 0.3s ease;
  }
  .fade-enter-from,
  .fade-leave-to {
    opacity: 0;
  }
  </style>
