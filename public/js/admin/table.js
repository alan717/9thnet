(function () {
    $(function () {
        packager('app.components.table');

        app.components.table = {
            init : function () {
                this.initDelete();
            },
            initDelete:initDelete
        };
    });

    function initDelete() {
        $('.btn-delete').on('click', function () {
            var $that = $(this);
            swal({
                    title: "是否删除?",
                    text: "此操作不可逆!",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonClass: "btn-danger",
                    confirmButtonText: "是,删除它!",
                    closeOnConfirm: false
                },
                function () {
                    $.ajax({
                        url: $that.attr('data-url'),
                        type: 'DELETE',
                        data: $that.serializeArray()
                    }).done(function () {
                        swal('删除成功', "", "success");
                        $that.closest('tr').remove();
                    }).fail(function () {
                        swal('删除失败', data, "error");
                    });
                });
        })
    }
})();