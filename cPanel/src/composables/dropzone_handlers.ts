// composables/useDropzoneHandlers.ts
import { ref, onMounted } from 'vue'
import type { DropzoneElement } from '@/components/Base/Dropzone'

export function useDropzoneHandlers() {
  const dropzones = ref<Record<string, DropzoneElement | null>>({})

  const bindDropzone = (key: string, el: DropzoneElement) => {
    dropzones.value[key] = el
  }

  onMounted(() => {
    for (const [key, dropEl] of Object.entries(dropzones.value)) {
      if (!dropEl) continue
      dropEl.dropzone.on('success', () => alert(`${key}: Added file.`))
      dropEl.dropzone.on('error', () => alert(`${key}: No more files please!`))
    }
  })

  return {
    dropzones,
    bindDropzone,
  }
}
