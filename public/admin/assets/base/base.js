$(document).ready(function() {

    function comfirmDelete() {
        return new Promise((resolve, reject) => {
            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!"
            }).then((result) => {
                if (result.isConfirmed) {
                    resolve(true)
                } else {
                    reject(false)
                }
            });
        })
    }

    $(document).on('click', '.btn-delete', function(e) {
        e.preventDefault();
        let id = $(this).data('id');
        comfirmDelete().then(function() {
            $(`#form-delete${id}`).submit();
        }).catch();
    });

});
