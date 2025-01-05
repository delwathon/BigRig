<x-app-layout headerVariant="v2" sidebarVariant="v2">
    <div class="relative flex h-full" x-data="{ inboxSidebarOpen: true }">

        <!-- Inbox sidebar -->
        <x-inbox.inbox-sidebar />

        <!-- Inbox body -->
        <x-inbox.inbox-body />

    </div>
</x-app-layout>
