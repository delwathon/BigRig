<script>
    // A basic demo function to handle "select all" functionality
    document.addEventListener('alpine:init', () => {
        Alpine.data('handleSelect', () => ({
            selectall: false,
            selectAction() {
                countEl = document.querySelector('.table-items-action');
                if (!countEl) return;
                checkboxes = document.querySelectorAll('input.table-item:checked');
                document.querySelector('.table-items-count').innerHTML = checkboxes.length;
                if (checkboxes.length > 0) {
                    countEl.classList.remove('hidden');
                } else {
                    countEl.classList.add('hidden');
                }
            },
            toggleAll() {
                this.selectall = !this.selectall;
                checkboxes = document.querySelectorAll('input.table-item');
                [...checkboxes].map((el) => {
                    el.checked = this.selectall;
                });
                this.selectAction();
            },
            uncheckParent() {
                this.selectall = false;
                document.getElementById('parent-checkbox').checked = false;
                this.selectAction();
            },
        }))
    })    
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
                full_name: '',
                rating: '',
                testimony: ''
            },
            open(data) {
                this.data = { ...data };
                this.modalOpen = true;

                // Wait for modal to open, then set CKEditor content
                setTimeout(() => {
                    if (CKEDITOR.instances.editor1) {
                        CKEDITOR.instances.editor1.setData(this.data.testimony);
                    }
                }, 300);
            },
            close() {
                this.modalOpen = false;
                this.data = {
                    id: null,
                    full_name: '',
                    rating: '',
                    testimony: ''
                };

                // Clear CKEditor content when closing modal
                if (CKEDITOR.instances.editor1) {
                    CKEDITOR.instances.editor1.setData('');
                }
            },
        });

        Alpine.store('deleteModal', {
            modalOpen: false,
            testimonyId: null, // Track the ID of the objective to delete
            open(id) {
                this.testimonyId = id;
                this.modalOpen = true;
            },
            close() {
                this.modalOpen = false;
                this.testimonyId = null;
            }
        });
    });
</script>

<script>
    document.addEventListener("DOMContentLoaded", function () {

        // Sync CKEditor content with Alpine store
        CKEDITOR.instances.editor1.on("change", function () {
            Alpine.store("editModal").data.testimony = this.getData();
        });

        CKEDITOR.instances.editor1.on("input", function () {
            Alpine.store("editModal").data.testimony = this.getData();
        });
    });
</script>