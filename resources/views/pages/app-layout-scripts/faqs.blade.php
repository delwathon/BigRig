<script>
    document.addEventListener('alpine:init', () => {
        Alpine.store('deleteModal', {
            modalOpen: false,
            faqId: null, // Track the ID of the objective to delete
            open(id) {
                this.faqId = id;
                this.modalOpen = true;
            },
            close() {
                this.modalOpen = false;
                this.faqId = null;
            }
        });
    });
</script>