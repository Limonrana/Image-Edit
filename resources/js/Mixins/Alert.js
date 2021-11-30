export default {
    methods: {
        enableSweetAlert() {
            this.$swal({
                title: 'Are you sure?',
                text: 'You want to enable this one!',
                type: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, enable it!',
                cancelButtonText: 'No, Keep it!',
                showCloseButton: true,
                showLoaderOnConfirm: true
            }).then((result) => {
                if(result.value) {
                    return result.value;
                }
            });
        },
        deleteSweetAlert() {
            this.$swal({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, Delete it!',
                cancelButtonText: 'No, Keep it!',
                showCloseButton: true,
                showLoaderOnConfirm: true
            }).then((result) => {
                if(result.value) {
                    return true;
                }
            });
        }
    }
}
