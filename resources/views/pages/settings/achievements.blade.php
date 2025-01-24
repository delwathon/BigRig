@section('title', 'Settings')

<x-app-layout>
    <div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl mx-auto">

        <!-- Page header -->
        <div class="mb-8">

            <!-- Title -->
            <h1 class="text-2xl md:text-3xl text-gray-800 dark:text-gray-100 font-bold">Website Management</h1>

        </div>

        <div class="bg-white dark:bg-gray-800 shadow-sm rounded-xl mb-8">
            <div class="flex flex-col md:flex-row md:-mr-px">

                <!-- Sidebar -->
                <x-settings.settings-sidebar />

        
                <x-settings.achievements-panel :achievements="$achievements" />
            </div>
        </div>

        <!-- Pagination -->
        <div class="mt-8">
            {{$achievements->links()}}
        </div>
    </div>
</x-app-layout>



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
                title: '',
                year: '',
                description: ''
            },
            open(data) {
                this.data = { ...data };
                this.modalOpen = true;
            },
            close() {
                this.modalOpen = false;
                this.data = {
                    id: null,
                    title: '',
                    year: '',
                    description: ''
                };
            },
        });

        Alpine.store('deleteModal', {
            modalOpen: false,
            achievementId: null, // Track the ID of the objective to delete
            open(id) {
                this.achievementId = id;
                this.modalOpen = true;
            },
            close() {
                this.modalOpen = false;
                this.achievementId = null;
            }
        });
    });
</script>