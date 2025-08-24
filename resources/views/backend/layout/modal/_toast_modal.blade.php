<script>
    // Example: Custom error message
    function errorModal(message) {
        showToast({
            icon: 'error',
            title: message || 'Something went wrong!',
            background: '#FFF3CD'
        });
    }

    // Example: Custom success message
    function successModal(message) {
        showToast({
            icon: 'success',
            title: message || 'Operation successful!',
            background: '#D4EDDA'
        });
    }
</script>
