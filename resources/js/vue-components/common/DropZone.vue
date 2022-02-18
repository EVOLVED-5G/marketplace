<template>
    <div>
        <vue-dropzone
            ref="myVueDropzone"
            id="dropzone"
            :options="dropzoneOptions"
            v-on:vdropzone-success="success"
            v-on:vdropzone-error="error"
        ></vue-dropzone>
    </div>
</template>
<script>
import vue2Dropzone from "vue2-dropzone";
import "vue2-dropzone/dist/vue2Dropzone.min.css";
export default {
    props: {
        uploadUrl: {
            type: String,
            required: true
        },

        extensions: {
            type: String,
            required: true
        }
    },
    components: {
        vueDropzone: vue2Dropzone
    },

    data: function() {
        return {
            dropzoneOptions: {
                url: this.uploadUrl,
                thumbnailWidth: 150,
                maxFilesize: 1,
                maxFiles: 1,
                acceptedFiles: this.extensions,
                headers: {
                    "X-CSRF-TOKEN": document.head.querySelector(
                        'meta[name="csrf-token"]'
                    ).content
                }
            }
        };
    },

    methods: {
        success(file, response) {
            this.$emit("uploadFile", response);
        },
        error(file) {
            console.info(file, "error");
        }
    }
};
</script>
