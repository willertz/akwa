<template>
  <div class="image-picker">
    <div v-if="modelValue" class="picker-thumb" :style="{ height: previewHeight }">
      <img :src="modelValue" :alt="altValue || ''" />
      <div class="picker-overlay">
        <div class="picker-actions">
          <v-btn
            icon="mdi-pencil"
            color="primary"
            variant="elevated"
            size="small"
            @click="showPicker = true"
            title="Изменить"
          ></v-btn>
          <v-btn
            icon="mdi-close"
            color="error"
            variant="elevated"
            size="small"
            @click="clearImage"
            title="Удалить"
          ></v-btn>
        </div>
      </div>
    </div>

    <div v-else class="picker-placeholder" :style="{ height: previewHeight }" @click="showPicker = true">
      <v-icon icon="mdi-image-plus" size="36" color="grey"></v-icon>
      <span>Выбрать изображение</span>
    </div>

    <div v-if="modelValue" class="picker-alt-field">
      <v-text-field
        :model-value="altValue"
        @update:model-value="$emit('update:altValue', $event)"
        label="Alt текст (описание изображения)"
        variant="outlined"
        density="compact"
        hide-details
        placeholder="Краткое описание для SEO и доступности"
        prepend-inner-icon="mdi-image-text"
        class="mt-2"
      ></v-text-field>
    </div>

    <v-dialog v-model="showPicker" max-width="900" scrollable>
      <v-card style="height: 80vh">
        <v-card-title class="d-flex align-center">
          <span>Выберите изображение</span>
          <v-spacer></v-spacer>
          <v-btn icon="mdi-close" variant="text" density="compact" @click="showPicker = false"></v-btn>
        </v-card-title>
        <v-card-text class="pa-0" style="overflow: hidden; height: calc(80vh - 56px)">
          <MediaManager
            :is-picker="true"
            @select="onImageSelect"
          />
        </v-card-text>
      </v-card>
    </v-dialog>
  </div>
</template>

<script setup>
import { ref } from 'vue';
import MediaManager from './MediaManager.vue';

const props = defineProps({
  modelValue: { type: String, default: '' },
  altValue: { type: String, default: '' },
  previewHeight: { type: String, default: '150px' }
});

const emit = defineEmits(['update:modelValue', 'update:altValue']);
const showPicker = ref(false);

const onImageSelect = (file) => {
  emit('update:modelValue', file.url);
  if (file.alt) {
    emit('update:altValue', file.alt);
  }
  showPicker.value = false;
};

const clearImage = () => {
  emit('update:modelValue', '');
  emit('update:altValue', '');
};
</script>

<style scoped>
.image-picker {
  width: 100%;
}

.picker-thumb {
  position: relative;
  border-radius: 10px;
  overflow: hidden;
  border: 1px solid #e2e8f0;
  background: #f8fafc;
  transition: all 0.2s ease;
}

.picker-thumb img {
  width: 100%;
  height: 100%;
  object-fit: cover;
}

.picker-overlay {
  position: absolute;
  inset: 0;
  background: rgba(0, 0, 0, 0.4);
  opacity: 0;
  transition: opacity 0.15s;
  display: flex;
  align-items: center;
  justify-content: center;
}

.picker-thumb:hover .picker-overlay {
  opacity: 1;
}

.picker-actions {
  display: flex;
  gap: 8px;
}

.picker-placeholder {
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  border: 2px dashed #e2e8f0;
  border-radius: 10px;
  background: #f8fafc;
  color: #94a3b8;
  cursor: pointer;
  transition: all 0.2s ease;
  gap: 8px;
}

.picker-placeholder:hover {
  background: #f1f5f9;
  border-color: #cbd5e1;
  color: #64748b;
}

.picker-placeholder span {
  font-size: 0.85rem;
  font-weight: 500;
}

.picker-alt-field {
  width: 100%;
}
</style>
