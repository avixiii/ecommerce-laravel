$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

function deleteRow(r) {
    let i = r.parentNode.parentNode.rowIndex;
    document.getElementById("table-category").deleteRow(i);
}

function removeRow(id, url, r) {
    if (confirm("Bạn có muốn xoá danh mục này không?")) {
        $.ajax({
            type: 'DELETE',
            datatype: 'JSON',
            data: {id},
            url: url,
            success: function (result) {
                if (result.error === false) {
                    deleteRow(r)
                } else {
                    alert('Xoá thất bại')
                }
            }
        })
    }
}




