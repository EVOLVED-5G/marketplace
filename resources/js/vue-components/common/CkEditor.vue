<template>
  <div id="app">
    <ckeditor
      :editor="editor"
      :config="editorConfig"
      :value="value"
      @input="onInput"
      @change="onChange"
      :disabled="editorDisabled"
    ></ckeditor>
  </div>
</template>

<script>
import ClassicEditor from "@ckeditor/ckeditor5-build-classic";
export default {
  name: "ckEditor",
  props: {
    // label: {
    //     type: String,
    //     required: true
    // },
    readOnly: {
      type: Boolean,
      default: false,
    },
    value: {
      type: String,
      required: true,
      default: "",
    },
  },
  data() {
    return {
      editorDisabled: this.readOnly,
      editor: ClassicEditor,
      editorConfig: {
        // The configuration of the editor.
      },
    };
  },
  methods: {
    onInput(event) {
      // Can add validation here
      this.$emit("input", event);
    },
    onChange(event) {
      // Supports .lazy
      // Can add validation here
      this.$emit("change", event);
    },
  },
};
</script>
<style>
.ck-editor__editable {
  min-height: 300px;
}
</style>
