<template>
  <div class="media-manager">
    <div class="mm-layout">
      <!-- Sidebar: папки -->
      <div class="mm-sidebar">
        <div class="mm-sidebar-header">
          <v-icon icon="mdi-folder-multiple" size="small"></v-icon>
          <span>Папки</span>
        </div>
        <div class="folder-tree">
          <div
            class="folder-item"
            :class="{ active: currentFolder === null }"
            @click="selectFolder(null)"
          >
            <v-icon icon="mdi-image-multiple" size="small"></v-icon>
            <span>Все файлы</span>
          </div>
          <div
            class="folder-item"
            :class="{ active: currentFolder === '' }"
            @click="selectFolder('')"
          >
            <v-icon icon="mdi-home" size="small"></v-icon>
            <span>Корневая папка</span>
          </div>
          <FolderTreeItem
            v-for="folder in folderTree"
            :key="folder.name"
            :folder="folder"
            :currentFolder="currentFolder"
            :depth="0"
            @select="selectFolder"
          />
        </div>
        <div class="mm-folder-actions">
          <v-btn
            prepend-icon="mdi-folder-plus"
            variant="outlined"
            color="primary"
            density="compact"
            size="small"
            class="mt-2"
            @click="showNewFolderDialog = true"
          >
            Новая папка
          </v-btn>
        </div>
      </div>

      <!-- Main: файлы -->
      <div class="mm-main">
        <div class="mm-toolbar">
          <div class="mm-toolbar-left">
            <span class="mm-folder-name">{{ currentFolderLabel }}</span>
            <span class="mm-count">{{ files.length }} файлов</span>
          </div>
          <div class="mm-toolbar-right">
            <div class="view-switcher">
              <button
                class="view-btn"
                :class="{ active: viewMode === 'grid' }"
                @click="viewMode = 'grid'"
                title="Сетка"
              >
                <v-icon icon="mdi-view-grid" size="small"></v-icon>
              </button>
              <button
                class="view-btn"
                :class="{ active: viewMode === 'list' }"
                @click="viewMode = 'list'"
                title="Список"
              >
                <v-icon icon="mdi-view-list" size="small"></v-icon>
              </button>
            </div>
            <label class="upload-btn">
              <v-icon icon="mdi-upload" size="small"></v-icon>
              Загрузить
              <input
                ref="fileInput"
                type="file"
                multiple
                accept="image/*"
                style="display: none"
                @change="onFileInputChange"
              />
            </label>
          </div>
        </div>

        <div v-if="uploading" class="mm-progress">
          <v-progress-linear indeterminate color="primary"></v-progress-linear>
          <span class="upload-status">Загрузка... {{ uploadProgress }}</span>
        </div>

        <div v-if="loading" class="mm-loading">
          <v-progress-circular indeterminate color="primary"></v-progress-circular>
        </div>

        <div v-else-if="files.length === 0" class="mm-empty">
          <v-icon icon="mdi-cloud-upload-outline" size="48" color="grey"></v-icon>
          <p>Нет файлов</p>
          <p class="mm-empty-hint">Загрузите изображения</p>
        </div>

        <!-- Grid view -->
        <div v-else-if="viewMode === 'grid'" class="mm-grid">
          <div
            v-for="file in files"
            :key="file.id"
            class="mm-file-card"
            :class="{ selected: selectedIds.has(file.id) }"
            @click="handleFileClick(file)"
          >
            <div class="mm-thumb">
              <img :src="file.thumbnail_url || file.url" :alt="file.alt || file.filename" loading="lazy" />
              <div v-if="isPicker" class="mm-picker-overlay">
                <v-btn
                  icon="mdi-check"
                  color="success"
                  variant="elevated"
                  size="small"
                  rounded
                  @click.stop="selectFile(file)"
                ></v-btn>
              </div>
              <div v-else class="mm-select-check" @click.stop="toggleSelect(file)">
                <input type="checkbox" :checked="selectedIds.has(file.id)" @change="toggleSelect(file)" />
              </div>
            </div>
            <div class="mm-file-info">
              <span class="mm-filename" :title="file.original_name">{{ file.original_name }}</span>
              <span class="mm-filesize">{{ formatSize(file.size) }}</span>
            </div>
          </div>
        </div>

        <!-- List view -->
        <table v-else class="mm-table">
          <thead>
            <tr>
              <th style="width: 40px"></th>
              <th style="width: 60px"></th>
              <th>Имя файла</th>
              <th>Alt текст</th>
              <th style="width: 100px">Размер</th>
              <th style="width: 60px"></th>
            </tr>
          </thead>
          <tbody>
            <tr
              v-for="file in files"
              :key="file.id"
              :class="{ 'row-selected': selectedIds.has(file.id) }"
              @click="handleFileClick(file)"
            >
              <td @click.stop>
                <input type="checkbox" :checked="selectedIds.has(file.id)" @change="toggleSelect(file)" />
              </td>
              <td>
                <img :src="file.thumbnail_url || file.url" :alt="file.alt" class="list-thumb" />
              </td>
              <td>
                <span class="list-filename">{{ file.original_name }}</span>
              </td>
              <td>
                <span class="list-alt">{{ file.alt || '—' }}</span>
              </td>
              <td>{{ formatSize(file.size) }}</td>
              <td @click.stop>
                <v-btn
                  v-if="isPicker"
                  icon="mdi-check"
                  variant="text"
                  density="compact"
                  color="success"
                  @click="selectFile(file)"
                ></v-btn>
                <v-btn
                  v-else
                  icon="mdi-pencil"
                  variant="text"
                  density="compact"
                  color="primary"
                  @click="openDetail(file)"
                ></v-btn>
              </td>
            </tr>
          </tbody>
        </table>

        <!-- Bulk actions -->
        <div v-if="selectedIds.size > 0 && !isPicker" class="mm-bulk-actions">
          <span>Выбрано: {{ selectedIds.size }}</span>
          <v-btn
            prepend-icon="mdi-trash-can"
            color="error"
            variant="outlined"
            density="compact"
            size="small"
            @click="bulkDelete"
          >
            Удалить выбранные
          </v-btn>
        </div>
      </div>
    </div>

    <!-- Detail drawer -->
    <div v-if="showDetail && detailFile" class="mm-drawer" @click.self="showDetail = false">
      <div class="mm-drawer-inner">
        <div class="mm-drawer-header">
          <span>Детали файла</span>
          <v-btn icon="mdi-close" variant="text" density="compact" @click="showDetail = false"></v-btn>
        </div>
        <div class="mm-drawer-body">
          <div class="detail-preview">
            <img :src="detailFile.url" :alt="detailFile.alt || detailFile.filename" />
          </div>
          <div class="detail-fields">
            <div class="detail-field">
              <label>Оригинальное имя</label>
              <input type="text" :value="detailFile.original_name" readonly class="detail-input" />
            </div>
            <div class="detail-field">
              <label>Alt текст</label>
              <input type="text" v-model="detailFile.alt" placeholder="Описание изображения" class="detail-input" />
            </div>
            <div class="detail-field">
              <label>URL</label>
              <div class="url-row">
                <input type="text" :value="detailFile.url" readonly class="detail-input" />
                <v-btn icon="mdi-content-copy" variant="text" density="compact" @click="copyUrl(detailFile.url)"></v-btn>
              </div>
            </div>
            <div class="detail-field detail-meta">
              <span>{{ formatSize(detailFile.size) }}</span>
              <span v-if="detailFile.width">{{ detailFile.width }}×{{ detailFile.height }}</span>
              <span>{{ detailFile.mime_type }}</span>
            </div>
          </div>
          <div class="detail-actions">
            <v-btn
              prepend-icon="mdi-content-save"
              color="primary"
              variant="elevated"
              class="w-full mb-2"
              @click="saveAlt"
            >
              Сохранить Alt
            </v-btn>
            <v-btn
              prepend-icon="mdi-trash-can"
              color="error"
              variant="outlined"
              class="w-full"
              @click="deleteFile(detailFile)"
            >
              Удалить файл
            </v-btn>
          </div>
        </div>
      </div>
    </div>

    <!-- New folder dialog -->
    <v-dialog v-model="showNewFolderDialog" max-width="400">
      <v-card>
        <v-card-title>Создать папку</v-card-title>
        <v-card-text>
          <v-text-field
            v-model="newFolderName"
            label="Имя папки"
            variant="outlined"
            density="compact"
            autofocus
            @keyup.enter="createFolder"
          ></v-text-field>
        </v-card-text>
        <v-card-actions>
          <v-spacer></v-spacer>
          <v-btn variant="text" @click="showNewFolderDialog = false">Отмена</v-btn>
          <v-btn color="primary" variant="elevated" :disabled="!newFolderName.trim()" @click="createFolder">Создать</v-btn>
        </v-card-actions>
      </v-card>
    </v-dialog>

    <!-- Snackbar -->
    <v-snackbar v-model="snackbar" :color="snackbarColor" location="top right" :timeout="3000">
      {{ snackbarText }}
    </v-snackbar>
  </div>
</template>

<script setup>
import { ref, computed, onMounted, reactive } from 'vue';
import axios from 'axios';
import FolderTreeItem from './FolderTreeItem.vue';

const props = defineProps({
  isPicker: { type: Boolean, default: false }
});

const emit = defineEmits(['select']);

// State
const files = ref([]);
const folderNames = ref([]);
const currentFolder = ref(null);
const loading = ref(false);
const uploading = ref(false);
const uploadProgress = ref('');
const viewMode = ref('grid');
const selectedIds = reactive(new Set());
const showDetail = ref(false);
const detailFile = ref(null);
const showNewFolderDialog = ref(false);
const newFolderName = ref('');
const fileInput = ref(null);
const snackbar = ref(false);
const snackbarText = ref('');
const snackbarColor = ref('success');

// Folder tree (virtual structure from flat folder names)
const folderTree = computed(() => {
  const tree = [];
  for (const name of folderNames.value) {
    if (name) {
      tree.push({ name, children: [] });
    }
  }
  return tree;
});

const currentFolderLabel = computed(() => {
  if (currentFolder.value === null) return 'Все файлы';
  if (currentFolder.value === '') return 'Корневая папка';
  return currentFolder.value;
});

const selectFolder = (folder) => {
  currentFolder.value = folder;
  selectedIds.clear();
  loadFiles();
};

const loadFiles = async () => {
  loading.value = true;
  try {
    const params = {};
    if (currentFolder.value !== null) {
      params.folder = currentFolder.value;
    }
    const res = await axios.get('/api/media', { params });
    files.value = res.data;
  } catch (e) {
    showNotify('Ошибка загрузки файлов', 'error');
  } finally {
    loading.value = false;
  }
};

const loadFolders = async () => {
  try {
    const res = await axios.get('/api/media/folders/list');
    folderNames.value = res.data;
  } catch (e) {
    // ignore
  }
};

const onFileInputChange = async (event) => {
  const filesArr = Array.from(event.target.files);
  if (!filesArr.length) return;
  await uploadFiles(filesArr);
  event.target.value = '';
};

const uploadFiles = async (filesArr) => {
  uploading.value = true;
  let done = 0;
  for (const file of filesArr) {
    uploadProgress.value = `${done + 1} / ${filesArr.length}`;
    try {
      const form = new FormData();
      form.append('file', file);
      if (currentFolder.value !== null && currentFolder.value !== '') {
        form.append('folder', currentFolder.value);
      }
      await axios.post('/api/media/upload', form, {
        headers: { 'Content-Type': 'multipart/form-data' }
      });
      done++;
    } catch (e) {
      showNotify(`Ошибка загрузки файла ${file.name}`, 'error');
    }
  }
  uploading.value = false;
  uploadProgress.value = '';
  showNotify(`Загружено файлов: ${done}`, 'success');
  await loadFiles();
  await loadFolders();
};

const handleFileClick = (file) => {
  if (props.isPicker) {
    selectFile(file);
  } else {
    openDetail(file);
  }
};

const selectFile = (file) => {
  emit('select', file);
};

const toggleSelect = (file) => {
  if (selectedIds.has(file.id)) {
    selectedIds.delete(file.id);
  } else {
    selectedIds.add(file.id);
  }
};

const openDetail = (file) => {
  detailFile.value = { ...file };
  showDetail.value = true;
};

const saveAlt = async () => {
  try {
    await axios.patch(`/api/media/${detailFile.value.id}`, { alt: detailFile.value.alt });
    const idx = files.value.findIndex(f => f.id === detailFile.value.id);
    if (idx !== -1) files.value[idx].alt = detailFile.value.alt;
    showNotify('Alt текст сохранён', 'success');
  } catch (e) {
    showNotify('Ошибка сохранения', 'error');
  }
};

const deleteFile = async (file) => {
  if (!confirm(`Удалить файл "${file.original_name}"?`)) return;
  try {
    await axios.delete(`/api/media/${file.id}`);
    files.value = files.value.filter(f => f.id !== file.id);
    selectedIds.delete(file.id);
    showDetail.value = false;
    showNotify('Файл удалён', 'success');
  } catch (e) {
    showNotify('Ошибка удаления', 'error');
  }
};

const bulkDelete = async () => {
  if (!confirm(`Удалить ${selectedIds.size} файлов?`)) return;
  const ids = [...selectedIds];
  for (const id of ids) {
    try {
      await axios.delete(`/api/media/${id}`);
      selectedIds.delete(id);
    } catch (e) {
      // ignore individual errors
    }
  }
  await loadFiles();
  showNotify('Файлы удалены', 'success');
};

const createFolder = () => {
  const name = newFolderName.value.trim();
  if (!name) return;
  if (!folderNames.value.includes(name)) {
    folderNames.value.push(name);
  }
  currentFolder.value = name;
  newFolderName.value = '';
  showNewFolderDialog.value = false;
  loadFiles();
};

const copyUrl = async (url) => {
  try {
    await navigator.clipboard.writeText(url);
    showNotify('URL скопирован', 'success');
  } catch (e) {
    showNotify('Не удалось скопировать', 'error');
  }
};

const formatSize = (bytes) => {
  if (!bytes) return '0 Б';
  if (bytes < 1024) return bytes + ' Б';
  if (bytes < 1048576) return (bytes / 1024).toFixed(1) + ' КБ';
  return (bytes / 1048576).toFixed(1) + ' МБ';
};

const showNotify = (text, color = 'success') => {
  snackbarText.value = text;
  snackbarColor.value = color;
  snackbar.value = true;
};

onMounted(() => {
  loadFiles();
  loadFolders();
});
</script>

<style scoped>
.media-manager {
  font-family: inherit;
  display: flex;
  flex-direction: column;
  position: relative;
}
.mm-layout {
  display: flex;
  gap: 0;
  min-height: 500px;
  border: 1px solid #e2e8f0;
  border-radius: 12px;
  overflow: visible;
}

/* Sidebar */
.mm-sidebar {
  width: 200px;
  min-width: 180px;
  background: #f8fafc;
  border-right: 1px solid #e2e8f0;
  display: flex;
  flex-direction: column;
  padding: 12px 0 12px;
  border-radius: 12px 0 0 12px;
}

.mm-sidebar-header {
  display: flex;
  align-items: center;
  gap: 8px;
  padding: 0 12px 10px;
  font-size: 0.8rem;
  font-weight: 700;
  color: #64748b;
  text-transform: uppercase;
  letter-spacing: 0.05em;
}

.folder-tree {
  flex: 1;
  overflow-y: visible;
}

.folder-item {
  display: flex;
  align-items: center;
  gap: 8px;
  padding: 7px 12px;
  cursor: pointer;
  font-size: 0.875rem;
  color: #475569;
  transition: all 0.15s ease;
  user-select: none;
}

.folder-item:hover {
  background: #f1f5f9;
}

.folder-item.active {
  background: #eff6ff;
  color: #1976d2;
  font-weight: 600;
}

.mm-folder-actions {
  padding: 0 12px;
}

/* Main */
.mm-main {
  flex: 1;
  display: flex;
  flex-direction: column;
  overflow: visible;
  background: #fff;
  min-width: 0;
  border-radius: 0 12px 12px 0;
}

.mm-toolbar {
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 12px 16px;
  border-bottom: 1px solid #e2e8f0;
  background: #fff;
  flex-shrink: 0;
}

.mm-toolbar-left {
  display: flex;
  align-items: center;
  gap: 10px;
}

.mm-folder-name {
  font-size: 0.95rem;
  font-weight: 600;
  color: #1e293b;
}

.mm-count {
  font-size: 0.8rem;
  color: #94a3b8;
  background: #f1f5f9;
  padding: 2px 8px;
  border-radius: 12px;
}

.mm-toolbar-right {
  display: flex;
  align-items: center;
  gap: 8px;
}

.view-switcher {
  display: flex;
  background: #f1f5f9;
  border-radius: 8px;
  padding: 2px;
}

.view-btn {
  background: none;
  border: none;
  padding: 4px 8px;
  border-radius: 6px;
  cursor: pointer;
  color: #64748b;
  display: flex;
  align-items: center;
  transition: all 0.15s;
}

.view-btn.active {
  background: #fff;
  color: #1976d2;
  box-shadow: 0 1px 3px rgba(0,0,0,0.1);
}

.upload-btn {
  display: flex;
  align-items: center;
  gap: 6px;
  padding: 6px 14px;
  border-radius: 8px;
  background: #1976d2;
  color: #fff;
  font-size: 0.85rem;
  font-weight: 500;
  cursor: pointer;
  transition: background 0.15s;
}

.upload-btn:hover {
  background: #1565c0;
}

/* Loading & empty */
.mm-loading {
  display: flex;
  align-items: center;
  justify-content: center;
  flex: 1;
  padding: 40px;
}

.mm-empty {
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  flex: 1;
  padding: 40px;
  color: #94a3b8;
  text-align: center;
}

.mm-empty-hint {
  font-size: 0.85rem;
  margin-top: 4px;
}

.mm-progress {
  padding: 8px 16px;
  display: flex;
  align-items: center;
  gap: 12px;
  background: #f0f9ff;
  border-bottom: 1px solid #bae6fd;
}

.upload-status {
  font-size: 0.85rem;
  color: #0369a1;
  white-space: nowrap;
}

/* Grid */
.mm-grid {
  display: grid;
  grid-template-columns: repeat(auto-fill, minmax(140px, 1fr));
  gap: 16px;
  padding: 16px;
}

.mm-file-card {
  border-radius: 10px;
  overflow: hidden;
  border: 2px solid transparent;
  cursor: pointer;
  transition: all 0.15s ease;
  background: #f8fafc;
}

.mm-file-card:hover {
  border-color: #1976d2;
  box-shadow: 0 2px 8px rgba(25, 118, 210, 0.15);
}

.mm-file-card.selected {
  border-color: #1976d2;
  background: #eff6ff;
}

.mm-thumb {
  position: relative;
  aspect-ratio: 1;
  overflow: hidden;
  background: #e2e8f0;
}

.mm-thumb img {
  width: 100%;
  height: 100%;
  object-fit: cover;
}

.mm-picker-overlay {
  position: absolute;
  inset: 0;
  background: rgba(0, 0, 0, 0.4);
  display: flex;
  align-items: center;
  justify-content: center;
  opacity: 0;
  transition: opacity 0.15s;
}

.mm-file-card:hover .mm-picker-overlay {
  opacity: 1;
}

.mm-select-check {
  position: absolute;
  top: 6px;
  left: 6px;
  opacity: 0;
  transition: opacity 0.15s;
}

.mm-file-card:hover .mm-select-check,
.mm-file-card.selected .mm-select-check {
  opacity: 1;
}

.mm-file-info {
  padding: 6px 8px;
}

.mm-filename {
  display: block;
  font-size: 0.72rem;
  color: #475569;
  white-space: nowrap;
  overflow: hidden;
  text-overflow: ellipsis;
  margin-bottom: 2px;
}

.mm-filesize {
  font-size: 0.68rem;
  color: #94a3b8;
}

/* List table */
.mm-table {
  width: 100%;
  border-collapse: collapse;
  font-size: 0.875rem;
}

.mm-table th {
  text-align: left;
  padding: 8px 12px;
  background: #f8fafc;
  color: #64748b;
  font-size: 0.78rem;
  font-weight: 600;
  border-bottom: 1px solid #e2e8f0;
  position: sticky;
  top: 0;
}

.mm-table td {
  padding: 8px 12px;
  border-bottom: 1px solid #f1f5f9;
  vertical-align: middle;
}

.mm-table tr:hover td {
  background: #f8fafc;
}

.row-selected td {
  background: #eff6ff !important;
}

.list-thumb {
  width: 44px;
  height: 44px;
  object-fit: cover;
  border-radius: 6px;
}

.list-filename {
  font-weight: 500;
  color: #1e293b;
}

.list-alt {
  color: #64748b;
  font-size: 0.8rem;
}

/* Bulk actions */
.mm-bulk-actions {
  display: flex;
  align-items: center;
  gap: 12px;
  padding: 10px 16px;
  border-top: 1px solid #e2e8f0;
  background: #fef3c7;
  font-size: 0.875rem;
  color: #92400e;
}

/* Detail drawer */
.mm-drawer {
  position: fixed;
  inset: 0;
  background: rgba(0, 0, 0, 0.3);
  z-index: 1000;
  display: flex;
  justify-content: flex-end;
}

.mm-drawer-inner {
  width: 380px;
  background: #fff;
  height: 100%;
  display: flex;
  flex-direction: column;
  box-shadow: -4px 0 24px rgba(0,0,0,0.12);
  overflow-y: auto;
}

.mm-drawer-header {
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 16px 20px;
  border-bottom: 1px solid #e2e8f0;
  font-size: 1rem;
  font-weight: 600;
  color: #1e293b;
}

.mm-drawer-body {
  padding: 20px;
  display: flex;
  flex-direction: column;
  gap: 16px;
}

.detail-preview {
  border-radius: 10px;
  overflow: hidden;
  border: 1px solid #e2e8f0;
  max-height: 220px;
  background: #f8fafc;
}

.detail-preview img {
  width: 100%;
  max-height: 220px;
  object-fit: contain;
}

.detail-fields {
  display: flex;
  flex-direction: column;
  gap: 12px;
}

.detail-field {
  display: flex;
  flex-direction: column;
  gap: 4px;
}

.detail-field label {
  font-size: 0.78rem;
  font-weight: 600;
  color: #64748b;
  text-transform: uppercase;
  letter-spacing: 0.05em;
}

.detail-input {
  width: 100%;
  padding: 8px 10px;
  border: 1px solid #d1d5db;
  border-radius: 6px;
  font-size: 0.875rem;
  background: #fff;
  box-sizing: border-box;
  outline: none;
  transition: border-color 0.15s;
}

.detail-input:focus {
  border-color: #1976d2;
  box-shadow: 0 0 0 3px rgba(25, 118, 210, 0.1);
}

.detail-input[readonly] {
  background: #f8fafc;
  color: #64748b;
}

.url-row {
  display: flex;
  gap: 4px;
  align-items: center;
}

.detail-meta {
  flex-direction: row;
  gap: 12px;
  font-size: 0.8rem;
  color: #64748b;
}

.detail-actions {
  display: flex;
  flex-direction: column;
  gap: 8px;
}

.w-full { width: 100%; }
.mb-2 { margin-bottom: 8px; }
</style>
