<script>
    document.addEventListener('alpine:init', () => {
        Alpine.store('editModal', {
            modalOpen: false,
            data: {
                id: null,
                service_name: '',
                service_description: ''
            },
            open(data) {
                this.data = { ...data };
                this.modalOpen = true;
            },
            close() {
                this.modalOpen = false;
                this.data = {
                    id: null,
                    service_name: '',
                    service_description: ''
                };
            },
        });

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