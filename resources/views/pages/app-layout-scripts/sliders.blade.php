<script>
    document.addEventListener('alpine:init', () => {
        Alpine.store('deleteModal', {
            modalOpen: false,
            sliderId: null, // Track the ID of the objective to delete
            open(id) {
                this.sliderId = id;
                this.modalOpen = true;
            },
            close() {
                this.modalOpen = false;
                this.sliderId = null;
            }
        });
    });
</script>