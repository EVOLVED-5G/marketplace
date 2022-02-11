<template>
    <div id="app">
        <ckeditor
            :editor="editor"
            :config="editorConfig"
            :value="value"
            @input="onInput"
            @change="onChange"
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
        value: {
            type: String,
            required: true
        }
    },
    data() {
        return {
            editor: ClassicEditor,
            editorData: "<p>Content of the editor.</p>",
            editorConfig: {
                // The configuration of the editor.
            }
        };
    },
    methods: {
        onInput(event) {
            console.log(event);
            // Can add validation here
            this.$emit("input", event);
        },
        onChange(event) {
            // Supports .lazy
            // Can add validation here
            this.$emit("change", event);
        }
    }
};
</script>
<style>
.ck-editor__editable {
    min-height: 300px;
}
</style>
