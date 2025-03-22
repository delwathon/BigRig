<script>
    document.addEventListener('alpine:init', () => {
        Alpine.store('createModal', {
            modalOpen: false,
            open() {
                this.modalOpen = true;
            },
            close() {
                this.modalOpen = false;
            },
        });

        Alpine.store('editModal', {
            modalOpen: false,
            data: {
                id: null,
                title: '',
                year: '',
                description: ''
            },
            open(data) {
                this.data = { ...data };
                this.modalOpen = true;

                // Wait for modal to open, then set CKEditor content
                setTimeout(() => {
                    if (CKEDITOR.instances.editor1) {
                        CKEDITOR.instances.editor1.setData(this.data.description);
                    }
                }, 300);
            },
            close() {
                this.modalOpen = false;
                this.data = {
                    id: null,
                    title: '',
                    year: '',
                    description: ''
                };

                // Clear CKEditor content when closing modal
                if (CKEDITOR.instances.editor1) {
                    CKEDITOR.instances.editor1.setData('');
                }
            },
        });

        Alpine.store('deleteModal', {
            modalOpen: false,
            achievementId: null, // Track the ID of the objective to delete
            open(id) {
                this.achievementId = id;
                this.modalOpen = true;
            },
            close() {
                this.modalOpen = false;
                this.achievementId = null;
            }
        });
    });
</script>

<script>
    document.addEventListener("DOMContentLoaded", function () {

        // Sync CKEditor content with Alpine store
        CKEDITOR.instances.editor1.on("change", function () {
            Alpine.store("editModal").data.requirements = this.getData();
        });

        CKEDITOR.instances.editor1.on("input", function () {
            Alpine.store("editModal").data.requirements = this.getData();
        });
    });
</script>