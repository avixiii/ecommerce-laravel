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



// Upload

$('#upload').change(function (e) {
    const form = new FormData();
    form.append('file', $(this)[0].files[0]);
    $.ajax({
        processData: false,
        contentType: false,
        type: 'POST',
        dataType: 'JSON',
        data: form,
        url: '/dashboard/upload/services',
        success: function (results) {
            if(results.error === false) {
                document.getElementById('image_show').innerHTML = '<a target="_blank"><img src="' + results.url + '" width="100px" alt=""></a>';
                $('#file').val(results.url)
            } else {
                alert('Upload File lỗi')
            }
        }
    })
})
