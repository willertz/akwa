<template>
  <div class="gallery-editor">
    <div class="gallery-toolbar">
      <v-btn
        prepend-icon="mdi-plus"
        variant="outlined"
        color="primary"
        density="compact"
        size="small"
        @click="showAddDialog = true"
      >
        Добавить фото
      </v-btn>
      <span class="gallery-hint">Перетаскивайте фото для изменения порядка</span>
    </div>

    <div v-if="!items.length" class="gallery-empty">
      <v-icon icon="mdi-image-multiple-outline" size="40" color="grey"></v-icon>
      <p>Нет изображений</p>
    </div>

    <div v-else class="gallery-grid">
      <div
        v-for="(item, index) in items"
        :key="item.url + index"
        class="gallery-item"
        draggable="true"
        @dragstart="onDragStart(index, $event)"
        @dragover.prevent="onDragOver(index)"
        @drop="onDrop(index)"
        :class="{ 'drag-over': dragOverIndex === index }"
      >
        <div class="item-thumb">
          <img :src="item.url" :alt="item.alt || ''" loading="lazy" />
          <div class="item-overlay">
            <span class="item-order">{{ index + 1 }}</span>
            <div class="item-actions">
              <v-btn
                icon="mdi-pencil"
                color="primary"
                variant="elevated"
                size="x-small"
                @click="editItem(index)"
              ></v-btn>
              <v-btn
                icon="mdi-close"
                color="error"
                variant="elevated"
                size="x-small"
                @click="removeItem(index)"
              ></v-btn>
            </div>
          </div>
        </div>
        <div class="item-alt" v-if="item.alt">
          <span>{{ item.alt }}</span>
        </div>
      </div>
    </div>

    <!-- Add photo dialog -->
    <v-dialog v-model="showAddDialog" max-width="900" scrollable>
      <v-card style="height: 85vh">
        <v-card-title class="d-flex align-center">
          <span>Добавить фото</span>
          <v-spacer></v-spacer>
          <v-btn icon="mdi-close" variant="text" density="compact" @click="showAddDialog = false"></v-btn>
        </v-card-title>
        <v-card-text class="pa-0" style="overflow: hidden; height: calc(85vh - 120px)">
          <MediaManager
            :is-picker="true"
            @select="onMediaSelect"
          />
        </v-card-text>
        <v-divider></v-divider>
        <div v-if="selectedFromMedia" class="selected-preview px-4 py-3 d-flex align-center gap-3">
          <img :src="selectedFromMedia.thumbnail_url || selectedFromMedia.url" class="preview-thumb" />
          <div style="flex: 1">
            <p class="preview-name">{{ selectedFromMedia.original_name }}</p>
            <v-text-field
              v-model="newItem.alt"
              label="Alt текст"
              variant="outlined"
              density="compact"
              hide-details
              placeholder="Описание изображения"
              class="mt-2"
            ></v-text-field>
          </div>
        </div>
        <v-card-actions>
          <v-spacer></v-spacer>
          <v-btn variant="text" @click="showAddDialog = false">Отмена</v-btn>
          <v-btn
            color="primary"
            variant="elevated"
            prepend-icon="mdi-check"
            :disabled="!selectedFromMedia"
            @click="addItem"
          >
            Добавить в галерею
          </v-btn>
        </v-card-actions>
      </v-card>
    </v-dialog>

    <!-- Edit photo dialog -->
    <v-dialog v-model="showEditDialog" max-width="450">
      <v-card>
        <v-card-title>Редактировать фото</v-card-title>
        <v-card-text>
          <div class="edit-fields">
            <v-text-field
              v-model="editingItem.url"
              label="URL изображения"
              variant="outlined"
              density="compact"
            ></v-text-field>
            <v-text-field
              v-model="editingItem.alt"
              label="Alt текст"
              variant="outlined"
              density="compact"
              placeholder="Описание изображения"
            ></v-text-field>
            <div v-if="editingItem.url" class="edit-preview">
              <img :src="editingItem.url" alt="Preview" />
            </div>
          </div>
        </v-card-text>
        <v-card-actions>
          <v-spacer></v-spacer>
          <v-btn variant="text" @click="showEditDialog = false">Отмена</v-btn>
          <v-btn color="primary" variant="elevated" prepend-icon="mdi-check" @click="saveEdit">Сохранить</v-btn>
        </v-card-actions>
      </v-card>
    </v-dialog>
  </div>
</template>

<script setup>
import { ref, computed } from 'vue';
import MediaManager from './MediaManager.vue';

const props = defineProps({
  modelValue: { type: Array, default: () => [] },
  galleryType: { type: String, default: '' }
});

const emit = defineEmits(['update:modelValue']);

const items = computed({
  get: () => props.modelValue || [],
  set: (val) => emit('update:modelValue', val)
});

const showAddDialog = ref(false);
const showEditDialog = ref(false);
const newItem = ref({ url: '', alt: '', media_id: null });
const selectedFromMedia = ref(null);
const editingItem = ref({ url: '', alt: '' });
const editingIndex = ref(-1);
const dragOverIndex = ref(-1);
let dragStartIndex = -1;

const onMediaSelect = (file) => {
  selectedFromMedia.value = file;
  newItem.value.url = file.url;
  newItem.value.media_id = file.id;
  newItem.value.alt = file.alt || '';
};

const addItem = () => {
  if (!selectedFromMedia.value) return;
  const updated = [...items.value, { ...newItem.value }];
  emit('update:modelValue', updated);
  newItem.value = { url: '', alt: '', media_id: null };
  selectedFromMedia.value = null;
  showAddDialog.value = false;
};

const editItem = (index) => {
  editingIndex.value = index;
  editingItem.value = { ...items.value[index] };
  showEditDialog.value = true;
};

const saveEdit = () => {
  const updated = [...items.value];
  updated[editingIndex.value] = { ...editingItem.value };
  emit('update:modelValue', updated);
  showEditDialog.value = false;
};

const removeItem = (index) => {
  const updated = [...items.value];
  updated.splice(index, 1);
  emit('update:modelValue', updated);
};

const onDragStart = (index, event) => {
  dragStartIndex = index;
  event.dataTransfer.effectAllowed = 'move';
};

const onDragOver = (index) => {
  dragOverIndex.value = index;
};

const onDrop = (index) => {
  dragOverIndex.value = -1;
  if (dragStartIndex === index) return;
  const updated = [...items.value];
  const [moved] = updated.splice(dragStartIndex, 1);
  updated.splice(index, 0, moved);
  emit('update:modelValue', updated);
};
</script>

<style scoped>
.gallery-editor {
  display: flex;
  flex-direction: column;
  gap: 16px;
}

.gallery-toolbar {
  display: flex;
  align-items: center;
  gap: 16px;
}

.gallery-hint {
  font-size: 0.8rem;
  color: #94a3b8;
}

.gallery-empty {
  text-align: center;
  padding: 40px;
  color: #94a3b8;
  border: 2px dashed #e2e8f0;
  border-radius: 12px;
}

.gallery-grid {
  display: grid;
  grid-template-columns: repeat(auto-fill, minmax(140px, 1fr));
  gap: 12px;
}

.gallery-item {
  border-radius: 10px;
  overflow: hidden;
  border: 2px solid transparent;
  transition: all 0.15s ease;
  cursor: grab;
}

.gallery-item:active {
  cursor: grabbing;
}

.gallery-item.drag-over {
  border-color: #1976d2;
  transform: scale(1.02);
}

.item-thumb {
  position: relative;
  aspect-ratio: 1;
  overflow: hidden;
  background: #f8fafc;
}

.item-thumb img {
  width: 100%;
  height: 100%;
  object-fit: cover;
}

.item-overlay {
  position: absolute;
  inset: 0;
  background: rgba(0, 0, 0, 0.4);
  opacity: 0;
  transition: opacity 0.15s;
  display: flex;
  flex-direction: column;
  justify-content: space-between;
  padding: 8px;
}

.gallery-item:hover .item-overlay {
  opacity: 1;
}

.item-order {
  background: rgba(255, 255, 255, 0.9);
  color: #1e293b;
  font-size: 0.75rem;
  font-weight: 700;
  width: 24px;
  height: 24px;
  border-radius: 6px;
  display: flex;
  align-items: center;
  justify-content: center;
}

.item-actions {
  display: flex;
  justify-content: flex-end;
  gap: 4px;
}

.item-alt {
  padding: 6px 8px;
  background: #f8fafc;
  border-top: 1px solid #e2e8f0;
}

.item-alt span {
  font-size: 0.7rem;
  color: #64748b;
  white-space: nowrap;
  overflow: hidden;
  text-overflow: ellipsis;
  display: block;
}

.selected-preview {
  border-top: 1px solid #e2e8f0;
  background: #f8fafc;
}

.preview-thumb {
  width: 72px;
  height: 72px;
  object-fit: cover;
  border-radius: 8px;
  border: 1px solid #e2e8f0;
  flex-shrink: 0;
}

.preview-name {
  font-size: 0.85rem;
  font-weight: 600;
  color: #1e293b;
  margin: 0;
  white-space: nowrap;
  overflow: hidden;
  text-overflow: ellipsis;
}

.edit-fields {
  display: flex;
  flex-direction: column;
  gap: 12px;
}

.edit-preview {
  border-radius: 8px;
  overflow: hidden;
  border: 1px solid #e2e8f0;
  max-height: 200px;
}

.edit-preview img {
  width: 100%;
  max-height: 200px;
  object-fit: contain;
}
</style>
