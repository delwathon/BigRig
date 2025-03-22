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
            serviceIid: null, // Track the ID of the objective to delete
            open(id) {
                this.serviceIid = id;
                this.modalOpen = true;
            },
            close() {
                this.modalOpen = false;
                this.serviceIid = null;
            }
        });
    });
</script>