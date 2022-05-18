<template>
    <div>
        <vue-dropzone
            ref="myVueDropzone"
            id="dropzone"
            :options="dropzoneOptions"
            v-on:vdropzone-success="onSuccess"
            v-on:vdropzone-error="onError"
            v-on:vdropzone-file-added="onFileAdded"
            v-on:vdropzone-mounted="vmounted"
            v-on:vdropzone-removed-file="onFileRemoved"
            :vdropzone-drag-start="dragging"
            :useCustomSlot="true"
        >
            <div class="dropzone-custom-content">
                <h4 class="dropzone-custom-title">Drag and drop to upload</h4>
                <div class="subtitle">Maximum 1 MB size of File Upload</div>
            </div>
        </vue-dropzone
        >
    </div>
</template>
<script>
import vue2Dropzone from "vue2-dropzone";
import "vue2-dropzone/dist/vue2Dropzone.min.css";

export default {
    props: {
        uploadUrl: {
            type: String,
            required: true,
        },
        imageUrl: {
            type: String,
            required: false,
        },
        maxFileUpload: {
            type: Number,
            default: 1,
        },
        extensions: {
            type: String,
            required: true,
        },
    },
    components: {
        vueDropzone: vue2Dropzone,
    },

    data: function () {
        return {
            manualImageUrl: this.imageUrl,
            dropzoneOptions: {
                addRemoveLinks: true,
                url: this.uploadUrl,
                thumbnailWidth: 150,
                maxFilesize: 1,
                maxFiles: 1,
                acceptedFiles: this.extensions,
                headers: {
                    "X-CSRF-TOKEN": document.head.querySelector('meta[name="csrf-token"]')
                        .content,
                },
            },
        };
    },
    methods: {
        dragging() {
            console.log("here");
        },
        onFileRemoved(file) {
            // this line causes the method to be re-called
            //this.$refs.myVueDropzone.removeFile(file);
        },
        onFileAdded() {
            this.$emit('file-dropped')
        },
        onSuccess(file, response) {
            this.$emit("uploadFile", response);
            this.manualImageUrl = undefined;
        },
        onError(file) {
            const errorMessage = JSON.parse(file.xhr.response) ? JSON.parse(file.xhr.response).message : "Error";
            this.$refs.myVueDropzone.removeFile(file);
            this.$toastr.e(errorMessage);
        },
        vmounted() {
            if (this.manualImageUrl !== undefined) {
                const file = {size: 123, name: "Icon", type: "image/png"};
                const url = this.manualImageUrl;
                this.$refs.myVueDropzone.manuallyAddFile(file, url);
            }
        },
    },
};
</script>
<style>
.dropzone .dz-preview .dz-error-message{
    top:0px !important;
}
</style>