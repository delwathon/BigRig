<script>
    $(document).ready(function () {
        $(".course-requirements li").each(function () {
            $(this).addClass("flex items-center pl-1 mb-1 text-sm").prepend(`
                <svg class="w-3 h-3 shrink-0 fill-current text-green-500 mr-2" viewBox="0 0 12 12">
                    <path d="M10.28 1.28L3.989 7.575 1.695 5.28A1 1 0 00.28 6.695l3 3a1 1 0 001.414 0l7-7A1 1 0 0010.28 1.28z" />
                </svg>
            `);
        });
    });
</script>

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
                objective: '',
                price: '',
                duration: '',
                theory_session: '',
                practical_session: '',
                examination: '',
                requirements: '',
                video_url: ''
            },
            open(data) {
                this.data = { ...data };
                this.modalOpen = true;

                // Wait for modal to open, then set CKEditor content
                setTimeout(() => {
                    if (CKEDITOR.instances.editor1) {
                        CKEDITOR.instances.editor1.setData(this.data.requirements);
                    }
                }, 300);
            },
            close() {
                this.modalOpen = false;
                this.data = {
                    id: null,
                    objective: '',
                    price: '',
                    duration: '',
                    theory_session: '',
                    practical_session: '',
                    examination: '',
                    requirements: '',
                    video_url: ''
                };

                // Clear CKEditor content when closing modal
                if (CKEDITOR.instances.editor1) {
                    CKEDITOR.instances.editor1.setData('');
                }
            },
        });

        Alpine.store('deleteModal', {
            modalOpen: false,
            objectiveId: null, // Track the ID of the objective to delete
            open(id) {
                this.objectiveId = id;
                this.modalOpen = true;
            },
            close() {
                this.modalOpen = false;
                this.objectiveId = null;
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