function order(){
    var button = event.target;
    var id=button.getAttribute('data-id');
    var name=button.getAttribute('data-name');
    var selling_price=button.getAttribute('data-selling_price');
    var qtyProduct=button.getAttribute('data-qty');
    var html=`
     <tr class='tr' id='tr-${id}'>
                <td>1.</td>
                <td>${name}</td>
                <td>
                    <div class="form-group">
                        <input type="number" class="form-control qty-selling" data-id=${id}   min=1  value='1' name='qty[${id}]'>
                        <input type="hidden"  name='product' value='${id}'>
                    </div>
                </td>
                <td>
                    <button type="button" class="btn btn-danger-m increace-qty"  data-id="${id}">
                   <i class="fas fa-plus"></i>
                    </button>
                    <button type="button" class="btn btn-danger-m decreace-qty"  data-id="${id}">
                     <i class="fas fa-minus"></i>
                    </button>
                </td>
                <td class='product-price'>
                    ${selling_price}LE
                </td>
                <td>
                    <button type="button" class="btn btn-danger delete-product"  data-id="${id}">
                    <i class="fas fa-trash"></i>
                    </button>
                </td>
            </tr>
    `;
    $('.orderList').append(html);
    calculateTotalBill();

    button.disabled =true;
    var deleteButtons = $('.delete-product[data-id="' + id + '"]');
    deleteButtons.click(function() {
        var deleteId = $(this).data('id');
        var rowToDelete = $('#tr-' + deleteId);
        rowToDelete.remove();
        button.disabled =false;
        calculateTotalBill();
    });


    var plusButtons = $('.increace-qty[data-id="' + id + '"]');
    plusButtons.click(function(){
        var productId = $(this).data('id');
        var qtyInput = $(this).closest('tr').find('.qty-selling'); // ابحث عن حقل الكمية داخل نفس الصف

        // احصل على القيمة الحالية للكمية (مع التعامل مع الأخطاء المحتملة)
        var currentQuantity = parseInt(qtyInput.val()) || 1; // إذا لم تكن قيمة حقل الإدخال عددًا صحيحًا، اجعلها 1 افتراضيًا
        if(currentQuantity < qtyProduct){
            // زد الكمية وحُدث قيمة حقل الإدخال
            var newQuantity = currentQuantity + 1;
            qtyInput.val(newQuantity);
            total=(selling_price*newQuantity);
            var productPriceElement = $(this).closest('tr').find('.product-price');
            if (productPriceElement.length) {
                var newPrice = parseFloat(selling_price) * newQuantity;
                productPriceElement.text(newPrice + 'LE');
                calculateTotalBill();
            }
        }
    });

    var minsButtons = $('.decreace-qty[data-id="' + id + '"]');
    minsButtons.click(function(){
        var productId = $(this).data('id');
        var qtyInput = $(this).closest('tr').find('.qty-selling'); // ابحث عن حقل الكمية داخل نفس الصف

        // احصل على القيمة الحالية للكمية (مع التعامل مع الأخطاء المحتملة)
        var currentQuantity = parseInt(qtyInput.val()) || 1; // إذا لم تكن قيمة حقل الإدخال عددًا صحيحًا، اجعلها 1 افتراضيًا
        if(currentQuantity > 1){
            // زد الكمية وحُدث قيمة حقل الإدخال
            var newQuantity = currentQuantity - 1;
            qtyInput.val(newQuantity);
            total=(selling_price*newQuantity);
            var productPriceElement = $(this).closest('tr').find('.product-price');
            if (productPriceElement.length) {
                var newPrice = parseFloat(selling_price) * newQuantity;
                productPriceElement.text(newPrice + 'LE');
                calculateTotalBill();

            }
        }
    });
}

function calculateTotalBill() {
    totalBill = 0;
    $('.tr').each(function() {
        var rowTotalPrice = parseFloat($(this).find('.product-price').text().replace('LE', ''));
        totalBill += rowTotalPrice;
    });

    // تحقق من قيمة totalBill وتفعيل/تعطيل الزر
    if (totalBill > 0) {
        $('.my-button').prop('disabled', false);
    } else {
        $('.my-button').prop('disabled', true);
    }
    updateTotalBill();
}

function updateTotalBill() {
    $('#total-bill').text(totalBill.toFixed(2) + ' LE'); // عرض الإجمالي بدقتين عشريتين
}

