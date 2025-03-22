<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Attach event listener to all checkboxes
        document.querySelectorAll('.table-item').forEach(function (checkbox) {
            checkbox.addEventListener('change', function () {
                const roleId = {{ $roleId }}; // Pass the role ID dynamically
                const [permissionId, action] = this.value.split('_');
                const checked = this.checked;

                // Prepare the body data
                const requestBody = {
                    role_id: roleId,
                    permission_id: permissionId,
                    action: action,
                    checked: checked,
                };

                // Log the request body to the console
                console.log('Request Body:', requestBody);

                // AJAX request
                fetch('{{ route('update-role-permission') }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                    },
                    body: JSON.stringify(requestBody),
                })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            // Trigger success notification
                            document.getElementById('success-notification').__x.$data.open = true;
                            document.getElementById('success-notification').__x.$data.message = 'Permission updated successfully!';
                        } else {
                            // Trigger error notification
                            document.getElementById('error-notification').__x.$data.open = true;
                            document.getElementById('error-notification').__x.$data.message = 'Failed to update permission.';
                        }
                    })
                    .catch(error => console.error('Error:', error));
            });
        });
    });
</script>

<script>

    document.addEventListener('alpine:init', () => {
        Alpine.store('editModal', {
            modalOpen: false,
            open(data) {
                this.modalOpen = true;
            },
            close() {
                this.modalOpen = false;
            },
        });
    });
</script>
