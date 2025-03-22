<script>
    document.addEventListener('alpine:init', () => {
        Alpine.store('deleteModal', {
            modalOpen: false,
            clientId: null, // Track the ID of the objective to delete
            open(id) {
                this.clientId = id;
                this.modalOpen = true;
            },
            close() {
                this.modalOpen = false;
                this.clientId = null;
            }
        });
    });
</script>