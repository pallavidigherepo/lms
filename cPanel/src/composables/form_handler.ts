// composables/useFormHandler.ts
import { ref, computed } from 'vue'
import { useVuelidate } from '@vuelidate/core'

export function useFormHandler<T extends object>(initialForm: T, rulesFn: (form: T) => any, submitAction: (form: T) => Promise<any>) {
  const form = ref<T>({ ...initialForm }) as any
  const submitted = ref(false)
  const loading = ref(false)
  const message = ref('')
  const isErrored = ref(false)

  const rules = computed(() => rulesFn(form.value))
  const v$ = useVuelidate(rules, form)

  const submitForm = async (onSuccess?: () => void) => {
    submitted.value = true
    await v$.value.$validate()

    if (!v$.value.$error) {
      loading.value = true
      try {
        await submitAction(form.value)
        submitted.value = false
        onSuccess?.()
      } catch (err: any) {
        isErrored.value = true
        message.value = err.response?.data?.message || 'Submission failed.'
      } finally {
        loading.value = false
      }
    }
  }

  return {
    form,
    v$,
    submitted,
    loading,
    message,
    isErrored,
    submitForm,
  }
}
