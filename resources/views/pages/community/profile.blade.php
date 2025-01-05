<x-app-layout background="bg-white dark:bg-gray-900" headerVariant="v2" sidebarVariant="v2">
    <div class="relative flex" x-data="{ profileSidebarOpen: false }">

        <!-- Profile sidebar -->
        <x-community.profile-sidebar />

        <!-- Profile body -->
        <x-community.profile-body />

    </div>
</x-app-layout>
