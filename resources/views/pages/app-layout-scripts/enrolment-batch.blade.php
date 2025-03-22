<script>
    document.addEventListener('alpine:init', () => {
        Alpine.store('deleteModal', {
            modalOpen: false,
            batchId: null, // Track the ID of the objective to delete
            open(id) {
                this.batchId = id;
                this.modalOpen = true;
            },
            close() {
                this.modalOpen = false;
                this.batchId = null;
            }
        });

        Alpine.store('updateActiveBatchModal', {
            modalOpen: false,
            data: {
                id: null,
                active_batch: null
            },
            open(data) {
                this.data = { ...data };
                this.modalOpen = true;
            },
            close() {
                this.modalOpen = false;
                this.data = { // FIX: Correct object assignment
                    id: null,
                    active_batch: null
                };
            },
        });
    });
</script>