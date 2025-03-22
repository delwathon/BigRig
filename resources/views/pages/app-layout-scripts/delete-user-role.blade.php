<script>
    document.addEventListener('alpine:init', () => {
        Alpine.store('deleteModal', {
            modalOpen: false,
            roleId: null, // Track the ID of the objective to delete
            open(id) {
                this.roleId = id;
                this.modalOpen = true;
            },
            close() {
                this.modalOpen = false;
                this.roleId = null;
            }
        });
    });
</script>