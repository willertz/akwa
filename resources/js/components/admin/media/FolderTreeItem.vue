<template>
  <div>
    <div
      class="folder-item"
      :class="{ active: currentFolder === folder.name }"
      :style="{ paddingLeft: (depth * 16 + 12) + 'px' }"
      @click.stop="$emit('select', folder.name)"
    >
      <v-icon :icon="expanded ? 'mdi-folder-open' : 'mdi-folder'" size="small" class="folder-icon"></v-icon>
      <span class="folder-name">{{ folder.name }}</span>
      <v-btn
        v-if="folder.children && folder.children.length"
        :icon="expanded ? 'mdi-chevron-down' : 'mdi-chevron-right'"
        variant="text"
        density="compact"
        size="x-small"
        @click.stop="expanded = !expanded"
      ></v-btn>
    </div>

    <div v-if="expanded && folder.children && folder.children.length" class="folder-children">
      <FolderTreeItem
        v-for="child in folder.children"
        :key="child.name"
        :folder="child"
        :currentFolder="currentFolder"
        :depth="depth + 1"
        @select="$emit('select', $event)"
      />
    </div>
  </div>
</template>

<script setup>
import { ref } from 'vue';

const props = defineProps({
  folder: { type: Object, required: true },
  currentFolder: { type: String, default: null },
  depth: { type: Number, default: 0 }
});

defineEmits(['select']);

const expanded = ref(false);
</script>

<script>
export default {
  name: 'FolderTreeItem'
};
</script>

<style scoped>
.folder-item {
  display: flex;
  align-items: center;
  gap: 8px;
  padding: 7px 12px;
  border-radius: 8px;
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

.folder-icon {
  flex-shrink: 0;
}

.folder-name {
  flex: 1;
  white-space: nowrap;
  overflow: hidden;
  text-overflow: ellipsis;
}
</style>
