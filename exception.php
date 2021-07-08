<?php include 'design.php'; ?>
<script>
    $(document).on('contextmenu', function(event) {
        event.preventDefault();
        Swal.fire({
            icon: 'error',
            title: 'Forbidden Click',
            text: "Sorry, No right click please",
        });
    });
</script>