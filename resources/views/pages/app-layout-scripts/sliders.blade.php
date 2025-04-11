<script>
    document.addEventListener('alpine:init', () => {
        Alpine.store('editModal', {
            modalOpen: false,
            data: {
                id: null,
                slider_title: '',
                slider_text: '',
                button_name: '',
                button_url: ''
            },
            open(data) {
                this.data = { ...data };
                this.modalOpen = true;
            },
            close() {
                this.modalOpen = false;
                this.data = {
                    id: null,
                    slider_title: '',
                    slider_text: '',
                    button_name: '',
                    button_url: ''
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