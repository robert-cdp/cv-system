@if(session('success'))
<script>
document.addEventListener('DOMContentLoaded', function () {
    const notyf = new Notyf({
        position: { x: 'right', y: 'top' },
        duration: 3000,
        dismissible: true,
        ripple: true
    });

    notyf.success("{{ session('success') }}");
});
</script>
@endif