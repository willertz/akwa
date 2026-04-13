<template>
  <div class="tiptap-editor" :class="{ focused: isFocused }">
    <div v-if="editor" class="editor-toolbar">
      <button
        class="tb-btn"
        :class="{ active: editor.isActive('bold') }"
        @click="editor.chain().focus().toggleBold().run()"
        title="Жирный"
      >
        <v-icon icon="mdi-format-bold" size="18"></v-icon>
      </button>
      <button
        class="tb-btn"
        :class="{ active: editor.isActive('italic') }"
        @click="editor.chain().focus().toggleItalic().run()"
        title="Курсив"
      >
        <v-icon icon="mdi-format-italic" size="18"></v-icon>
      </button>
      <button
        class="tb-btn"
        :class="{ active: editor.isActive('strike') }"
        @click="editor.chain().focus().toggleStrike().run()"
        title="Зачёркнутый"
      >
        <v-icon icon="mdi-format-strikethrough" size="18"></v-icon>
      </button>
      <span class="tb-divider"></span>
      <button
        class="tb-btn"
        :class="{ active: editor.isActive('heading', { level: 2 }) }"
        @click="editor.chain().focus().toggleHeading({ level: 2 }).run()"
        title="Заголовок H2"
      >
        <v-icon icon="mdi-format-header-2" size="18"></v-icon>
      </button>
      <button
        class="tb-btn"
        :class="{ active: editor.isActive('heading', { level: 3 }) }"
        @click="editor.chain().focus().toggleHeading({ level: 3 }).run()"
        title="Заголовок H3"
      >
        <v-icon icon="mdi-format-header-3" size="18"></v-icon>
      </button>
      <span class="tb-divider"></span>
      <button
        class="tb-btn"
        :class="{ active: editor.isActive('bulletList') }"
        @click="editor.chain().focus().toggleBulletList().run()"
        title="Маркированный список"
      >
        <v-icon icon="mdi-format-list-bulleted" size="18"></v-icon>
      </button>
      <button
        class="tb-btn"
        :class="{ active: editor.isActive('orderedList') }"
        @click="editor.chain().focus().toggleOrderedList().run()"
        title="Нумерованный список"
      >
        <v-icon icon="mdi-format-list-numbered" size="18"></v-icon>
      </button>
      <span class="tb-divider"></span>
      <button
        class="tb-btn"
        :class="{ active: editor.isActive('blockquote') }"
        @click="editor.chain().focus().toggleBlockquote().run()"
        title="Цитата"
      >
        <v-icon icon="mdi-format-quote-open" size="18"></v-icon>
      </button>
      <button
        class="tb-btn"
        :class="{ active: editor.isActive('codeBlock') }"
        @click="editor.chain().focus().toggleCodeBlock().run()"
        title="Блок кода"
      >
        <v-icon icon="mdi-code-tags" size="18"></v-icon>
      </button>
      <button
        class="tb-btn"
        @click="editor.chain().focus().setHorizontalRule().run()"
        title="Разделитель"
      >
        <v-icon icon="mdi-minus" size="18"></v-icon>
      </button>
      <span class="tb-divider"></span>
      <!-- Кнопка вставки изображения -->
      <button
        class="tb-btn tb-btn-image"
        @click="openImageDialog"
        title="Вставить изображение из медиагалереи"
      >
        <v-icon icon="mdi-image-plus" size="18"></v-icon>
      </button>
      <span class="tb-divider"></span>
      <button
        class="tb-btn"
        @click="editor.chain().focus().undo().run()"
        :disabled="!editor.can().undo()"
        title="Отменить"
      >
        <v-icon icon="mdi-undo" size="18"></v-icon>
      </button>
      <button
        class="tb-btn"
        @click="editor.chain().focus().redo().run()"
        :disabled="!editor.can().redo()"
        title="Повторить"
      >
        <v-icon icon="mdi-redo" size="18"></v-icon>
      </button>
    </div>
    <EditorContent :editor="editor" class="editor-content" />
  </div>

  <!-- Диалог выбора изображения из медиагалереи -->
  <v-dialog v-model="imageDialog" max-width="1000" scrollable>
    <v-card>
      <v-card-title class="d-flex align-center justify-space-between pa-4">
        <span class="text-h6">Выбрать изображение из медиагалереи</span>
        <v-btn icon="mdi-close" variant="text" @click="imageDialog = false"></v-btn>
      </v-card-title>
      <v-divider></v-divider>

      <!-- Поле alt для вставляемого изображения -->
      <div class="pa-4 pb-0">
        <v-text-field
          v-model="selectedAlt"
          label="Alt-текст изображения"
          prepend-inner-icon="mdi-image-text"
          density="compact"
          variant="outlined"
          hide-details
          placeholder="Описание изображения (для SEO и доступности)"
        ></v-text-field>
      </div>

      <v-card-text class="pa-4 pt-3" style="min-height: 400px;">
        <!-- Встроенный выбор из медиагалереи -->
        <div class="mm-inline-picker">
          <div class="mm-picker-toolbar">
            <div class="mm-picker-left">
              <v-text-field
                v-model="searchQuery"
                placeholder="Поиск..."
                density="compact"
                variant="outlined"
                prepend-inner-icon="mdi-magnify"
                hide-details
                class="mm-search"
                @input="filterFiles"
              ></v-text-field>
            </div>
            <div class="mm-picker-right">
              <label class="upload-inline-btn">
                <v-icon icon="mdi-upload" size="small"></v-icon>
                Загрузить новое
                <input
                  type="file"
                  multiple
                  accept="image/*"
                  style="display: none"
                  @change="onUploadNewFiles"
                />
              </label>
            </div>
          </div>

          <div v-if="mediaLoading" class="mm-picker-loading">
            <v-progress-circular indeterminate color="primary"></v-progress-circular>
          </div>
          <div v-else-if="filteredFiles.length === 0" class="mm-picker-empty">
            <v-icon icon="mdi-cloud-upload-outline" size="48" color="grey"></v-icon>
            <p>Нет изображений</p>
            <p class="hint">Загрузите изображения в медиагалерею</p>
          </div>
          <div v-else class="mm-picker-grid">
            <div
              v-for="file in filteredFiles"
              :key="file.id"
              class="mm-picker-card"
              :class="{ selected: selectedFile && selectedFile.id === file.id }"
              @click="selectMediaFile(file)"
              :title="file.original_name || file.filename"
            >
              <div class="mm-picker-thumb">
                <img
                  :src="file.thumb_url || file.url"
                  :alt="file.alt || file.original_name"
                  loading="lazy"
                />
                <div v-if="selectedFile && selectedFile.id === file.id" class="mm-picker-check">
                  <v-icon icon="mdi-check-circle" color="primary"></v-icon>
                </div>
              </div>
              <div class="mm-picker-info">
                <span class="mm-picker-name" :title="file.original_name || file.filename">
                  {{ file.original_name || file.filename }}
                </span>
              </div>
            </div>
          </div>
        </div>
      </v-card-text>

      <v-divider></v-divider>
      <v-card-actions class="pa-4">
        <div v-if="selectedFile" class="selected-preview">
          <img :src="selectedFile.thumb_url || selectedFile.url" :alt="selectedFile.alt" class="preview-thumb" />
          <span class="preview-name">{{ selectedFile.original_name || selectedFile.filename }}</span>
        </div>
        <v-spacer></v-spacer>
        <v-btn variant="text" @click="imageDialog = false">Отмена</v-btn>
        <v-btn
          color="primary"
          variant="flat"
          :disabled="!selectedFile"
          @click="insertSelectedImage"
        >
          <v-icon icon="mdi-check" class="mr-1"></v-icon>
          Вставить
        </v-btn>
      </v-card-actions>
    </v-card>
  </v-dialog>
</template>

<script setup>
import { ref, computed, watch, onBeforeUnmount } from 'vue';
import { useEditor, EditorContent } from '@tiptap/vue-3';
import StarterKit from '@tiptap/starter-kit';
import Image from '@tiptap/extension-image';
import axios from 'axios';

const props = defineProps({
  modelValue: { type: String, default: '' }
});

const emit = defineEmits(['update:modelValue']);
const isFocused = ref(false);

const editor = useEditor({
  content: props.modelValue || '',
  extensions: [
    StarterKit,
    Image.configure({
      inline: false,
      allowBase64: false,
      HTMLAttributes: {
        class: 'editor-image',
      },
    }),
  ],
  onUpdate: ({ editor }) => {
    emit('update:modelValue', editor.getHTML());
  },
  onFocus: () => { isFocused.value = true; },
  onBlur: () => { isFocused.value = false; },
});

watch(() => props.modelValue, (value) => {
  if (!editor.value) return;
  const isSame = editor.value.getHTML() === value;
  if (isSame) return;
  if (editor.value.isFocused) return;
  editor.value.commands.setContent(value || '', false);
});

onBeforeUnmount(() => {
  editor.value?.destroy();
});

// --- Медиагалерея ---
const imageDialog = ref(false);
const mediaLoading = ref(false);
const mediaFiles = ref([]);
const searchQuery = ref('');
const selectedFile = ref(null);
const selectedAlt = ref('');

const filteredFiles = computed(() => {
  if (!searchQuery.value) return mediaFiles.value;
  const q = searchQuery.value.toLowerCase();
  return mediaFiles.value.filter(f =>
    (f.original_name || f.filename || '').toLowerCase().includes(q) ||
    (f.alt || '').toLowerCase().includes(q)
  );
});

async function loadMediaFiles() {
  mediaLoading.value = true;
  try {
    const resp = await axios.get('/api/media');
    mediaFiles.value = resp.data.data || resp.data || [];
  } catch (e) {
    mediaFiles.value = [];
  } finally {
    mediaLoading.value = false;
  }
}

function openImageDialog() {
  selectedFile.value = null;
  selectedAlt.value = '';
  searchQuery.value = '';
  imageDialog.value = true;
  loadMediaFiles();
}

function selectMediaFile(file) {
  selectedFile.value = file;
  // Подставляем alt из медиафайла, если не заполнен вручную
  if (!selectedAlt.value) {
    selectedAlt.value = file.alt || file.original_name || '';
  }
}

function filterFiles() {
  // computed уже обрабатывает фильтрацию
}

function insertSelectedImage() {
  if (!selectedFile.value || !editor.value) return;
  const src = selectedFile.value.url;
  const alt = selectedAlt.value || selectedFile.value.alt || selectedFile.value.original_name || '';
  editor.value.chain().focus().setImage({ src, alt }).run();
  imageDialog.value = false;
  selectedFile.value = null;
  selectedAlt.value = '';
}

async function onUploadNewFiles(event) {
  const files = event.target.files;
  if (!files || files.length === 0) return;
  mediaLoading.value = true;
  const formData = new FormData();
  for (const file of files) {
    formData.append('files[]', file);
  }
  try {
    await axios.post('/api/media/upload', formData, {
      headers: { 'Content-Type': 'multipart/form-data' }
    });
    await loadMediaFiles();
  } catch (e) {
    console.error('Upload error:', e);
  } finally {
    mediaLoading.value = false;
  }
  event.target.value = '';
}
</script>

<style scoped>
.tiptap-editor {
  border: 1px solid #d1d5db;
  border-radius: 8px;
  overflow: hidden;
  transition: border-color 0.15s ease, box-shadow 0.15s ease;
}

.tiptap-editor.focused {
  border-color: #1976d2;
  box-shadow: 0 0 0 3px rgba(25, 118, 210, 0.1);
}

.editor-toolbar {
  display: flex;
  align-items: center;
  gap: 2px;
  padding: 6px 8px;
  background: #f8fafc;
  border-bottom: 1px solid #e2e8f0;
  flex-wrap: wrap;
}

.tb-btn {
  background: none;
  border: none;
  padding: 5px 7px;
  border-radius: 5px;
  cursor: pointer;
  color: #475569;
  display: flex;
  align-items: center;
  justify-content: center;
  transition: all 0.15s;
  line-height: 1;
}

.tb-btn:hover:not(:disabled) {
  background: #e2e8f0;
  color: #1e293b;
}

.tb-btn.active {
  background: #1976d2;
  color: #fff;
}

.tb-btn:disabled {
  opacity: 0.4;
  cursor: not-allowed;
}

.tb-btn-image {
  color: #1976d2;
}

.tb-btn-image:hover:not(:disabled) {
  background: #e3f2fd;
  color: #1565c0;
}

.tb-divider {
  width: 1px;
  height: 20px;
  background: #e2e8f0;
  margin: 0 4px;
}

.editor-content {
  min-height: 120px;
}

.editor-content :deep(.ProseMirror) {
  padding: 12px 16px;
  min-height: 120px;
  outline: none;
  font-size: 0.9rem;
  line-height: 1.6;
  color: #1e293b;
}

.editor-content :deep(.ProseMirror p) {
  margin: 0 0 8px;
}

.editor-content :deep(.ProseMirror ul),
.editor-content :deep(.ProseMirror ol) {
  padding-left: 24px;
  margin: 0 0 8px;
}

.editor-content :deep(.ProseMirror h1) {
  font-size: 1.5rem;
  font-weight: 700;
  margin: 0 0 12px;
}

.editor-content :deep(.ProseMirror h2) {
  font-size: 1.25rem;
  font-weight: 600;
  margin: 0 0 10px;
}

.editor-content :deep(.ProseMirror h3) {
  font-size: 1.1rem;
  font-weight: 600;
  margin: 0 0 8px;
}

.editor-content :deep(.ProseMirror code) {
  background: #f1f5f9;
  padding: 2px 6px;
  border-radius: 4px;
  font-size: 0.85em;
}

.editor-content :deep(.ProseMirror pre) {
  background: #1e293b;
  color: #e2e8f0;
  padding: 12px 16px;
  border-radius: 8px;
  margin: 0 0 8px;
  overflow-x: auto;
}

.editor-content :deep(.ProseMirror hr) {
  border: none;
  border-top: 1px solid #e2e8f0;
  margin: 16px 0;
}

.editor-content :deep(.ProseMirror blockquote) {
  border-left: 3px solid #1976d2;
  padding-left: 16px;
  margin: 0 0 8px;
  color: #64748b;
}

.editor-content :deep(.ProseMirror-focused) {
  outline: none;
}

/* Стили для изображений в редакторе */
.editor-content :deep(.ProseMirror .editor-image) {
  max-width: 100%;
  height: auto;
  border-radius: 6px;
  margin: 12px 0;
  display: block;
  box-shadow: 0 1px 4px rgba(0,0,0,0.10);
  cursor: pointer;
}

.editor-content :deep(.ProseMirror .editor-image.ProseMirror-selectednode) {
  outline: 3px solid #1976d2;
  border-radius: 6px;
}

/* Диалог медиагалереи */
.mm-inline-picker {
  display: flex;
  flex-direction: column;
  gap: 12px;
}

.mm-picker-toolbar {
  display: flex;
  align-items: center;
  justify-content: space-between;
  gap: 12px;
}

.mm-picker-left {
  flex: 1;
  min-width: 0;
}

.mm-search {
  width: 100%;
}

.upload-inline-btn {
  display: inline-flex;
  align-items: center;
  gap: 6px;
  padding: 6px 14px;
  background: #1976d2;
  color: #fff;
  border-radius: 6px;
  cursor: pointer;
  font-size: 0.85rem;
  font-weight: 500;
  transition: background 0.15s;
  white-space: nowrap;
}

.upload-inline-btn:hover {
  background: #1565c0;
}

.mm-picker-loading {
  display: flex;
  justify-content: center;
  padding: 60px 0;
}

.mm-picker-empty {
  display: flex;
  flex-direction: column;
  align-items: center;
  padding: 60px 0;
  color: #94a3b8;
  gap: 8px;
}

.mm-picker-empty .hint {
  font-size: 0.8rem;
  color: #cbd5e1;
  margin: 0;
}

.mm-picker-grid {
  display: grid;
  grid-template-columns: repeat(auto-fill, minmax(120px, 1fr));
  gap: 10px;
}

.mm-picker-card {
  border: 2px solid #e2e8f0;
  border-radius: 8px;
  overflow: hidden;
  cursor: pointer;
  transition: all 0.15s;
  background: #f8fafc;
}

.mm-picker-card:hover {
  border-color: #93c5fd;
  box-shadow: 0 2px 8px rgba(25, 118, 210, 0.12);
  transform: translateY(-1px);
}

.mm-picker-card.selected {
  border-color: #1976d2;
  box-shadow: 0 0 0 3px rgba(25, 118, 210, 0.15);
}

.mm-picker-thumb {
  position: relative;
  aspect-ratio: 1;
  overflow: hidden;
  background: #e2e8f0;
}

.mm-picker-thumb img {
  width: 100%;
  height: 100%;
  object-fit: cover;
  display: block;
}

.mm-picker-check {
  position: absolute;
  top: 4px;
  right: 4px;
  background: rgba(255,255,255,0.9);
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
  width: 28px;
  height: 28px;
}

.mm-picker-info {
  padding: 4px 6px 5px;
}

.mm-picker-name {
  font-size: 0.72rem;
  color: #475569;
  display: block;
  white-space: nowrap;
  overflow: hidden;
  text-overflow: ellipsis;
}

.selected-preview {
  display: flex;
  align-items: center;
  gap: 10px;
}

.preview-thumb {
  width: 40px;
  height: 40px;
  object-fit: cover;
  border-radius: 5px;
  border: 1px solid #e2e8f0;
}

.preview-name {
  font-size: 0.85rem;
  color: #475569;
  max-width: 200px;
  overflow: hidden;
  text-overflow: ellipsis;
  white-space: nowrap;
}
</style>
