<script>
    $(document).ready(function () {
        $(".course-details li").each(function () {
            $(this).addClass("flex items-center pl-5 mb-1 text-sm").prepend(`
                <svg class="w-3 h-3 shrink-0 fill-current text-green-500 mr-2" viewBox="0 0 12 12">
                    <path d="M10.28 1.28L3.989 7.575 1.695 5.28A1 1 0 00.28 6.695l3 3a1 1 0 001.414 0l7-7A1 1 0 0010.28 1.28z" />
                </svg>
            `);
        });
    });
</script>

<script>
    document.addEventListener('alpine:init', () => {
        Alpine.store('uploadCourseMaterials', {
            modalOpen: false,
            data: {
                id: ''
            },
            open(data) {
                this.data = { ...data };
                this.modalOpen = true;
            },
            close() {
                this.modalOpen = false;
                this.data = {
                    id: ''
                };
            },
        });

        Alpine.store('updateCourseDetails', {
            modalOpen: false,
            data: {
                id: '',
            },
            open(data) {
                this.data = { ...data };
                this.modalOpen = true;
            },
            close() {
                this.modalOpen = false;
                this.data = {
                    id: '',
                };
            },
        });

        Alpine.store('deleteModal', {
            modalOpen: false,
            curriculumId: null, // Track the ID of the curriculum to delete
            open(id) {
                this.curriculumId = id;
                this.modalOpen = true;
            },
            close() {
                this.modalOpen = false;
                this.curriculumId = null;
            }
        });

        Alpine.store('deleteMaterial', {
            modalOpen: false,
            materialId: null, // Track the ID of the curriculum to delete
            open(id) {
                this.materialId = id;
                this.modalOpen = true;
            },
            close() {
                this.modalOpen = false;
                this.materialId = null;
            }
        });
    });


    function fileUploadPreview() {
        return {
            files: [],
            handleFileSelection(event) {
                const selectedFiles = event.target.files;
                this.processFiles(selectedFiles);
            },
            handleDrop(event) {
                const droppedFiles = event.dataTransfer.files;
                this.processFiles(droppedFiles);
            },
            processFiles(fileList) {
                Array.from(fileList).forEach(file => {
                    const reader = new FileReader();
                    const extension = file.name.split('.').pop();

                    reader.onload = e => {
                        this.files.push({
                            name: file.name,
                            size: file.size,
                            type: file.type,
                            preview: e.target.result,
                            extension: extension
                        });
                    };

                    if (file.type.startsWith('image/')) {
                        reader.readAsDataURL(file); // Generate image preview
                    } else {
                        reader.readAsText(file); // Generate text preview or leave as a placeholder
                    }
                });
            },
            formatFileSize(size) {
                const i = Math.floor(Math.log(size) / Math.log(1024));
                return (size / Math.pow(1024, i)).toFixed(2) + ' ' + ['B', 'KB', 'MB', 'GB'][i];
            }
        };
    }
</script>