// $(document).ready(function(){
//     $(document).on('click', '.del_member', function(){
//         var id =$(this).val();
//         alert(id);
//     })
// })

$(document).ready(function(){
    $(document).on('click', '.del_member', function(){
        var cartId = $(this).val();
        var url = $(this).data('url');
    
        $.ajax({
            type: 'POST', // Sử dụng phương thức POST
            url: url,
            data: {
                _method: 'DELETE', // Thêm phương thức DELETE vào dữ liệu gửi đi
                _token: $('meta[name="csrf-token"]').attr('content') // Đính kèm token CSRF
            },
            success: function(response){
                // Xử lý sau khi thành công
                alert('Quantity decreased successfully!');
            },
            error: function(xhr, status, error){
                // Xử lý lỗi
                console.error(error);
            }
        });
    });
});





// function updateQuantity(cartId, newQuantity) {
//     $.ajax({
//         type: 'POST',
//         url: '/update-quantity',
//         data: {
//             _token: '{{ csrf_token() }}',
//             cart_id: cartId,
//             quantity: newQuantity
//         },
//         success: function(response) {
//             // Xử lý kết quả thành công (nếu cần)
//             console.log(response.message);
//         },
//         error: function(xhr, status, error) {
//             // Xử lý lỗi (nếu cần)
//             console.error('An error occurred while updating quantity');
//         }
//     });
// }