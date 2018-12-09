$(document).ready(function(){
    $.ajax({
        url: 'http://172.16.7.17:8000/api/transaction',
         success: function(data,err) {
            var somaTotal = 0;
            data.donation.forEach(e => {
                somaTotal = somaTotal + e.value;
                $('.feedback__totalArrecadado').text(`R$ ${somaTotal},00`);
            });
            data.donation.forEach((e) => {
                $("table tbody").append(`
                    <tr>
                        <td>${moment((e.created_at)).format("DD/MM/YYYY")}</td>
                        <td>${e.name}</td>
                        <td>${e.document}</td>
                        <td>R$ ${(e.value)},00</td>
                    </tr>`
                )
            });
        },
        complete : function(){
        },
        beforeSend : function(){
            $('table tbody').empty();
        }
    });
    validateCpf();
    datePicker();
});

function validateCpf() {
    var options =  {
        onKeyPress: function(cep, e, field, options) {
          var masks = ['000.000.000/000', '00.000.000/0000-00'];
          var mask = (cep.length > 14) ? masks[1] : masks[0];
          $('.input__cpf').mask(mask, options);
    }};
      
    $('.input__cpf').mask('000.000.000/00', options);

    $('.relacoes .btn-pesquisar').on('click', function(){
        var input = $('.input__cpf');

        $.ajax({
            url: 'http://172.16.7.17:8000/api/transaction/user',
            body: {document: input.val()},
            method: 'POST',
             success: function(data,err) {
                var somaTotal = 0;
                data.donation.forEach(e => {
                    somaTotal = somaTotal + e.value;
                    $('.feedback__totalArrecadado').text(`R$ ${somaTotal},00`);
                });
                data.donation.forEach((e) => {
                    $("table tbody").append(`
                        <tr>
                            <td>${moment((e.created_at)).format("DD/MM/YYYY")}</td>
                            <td>${e.name}</td>
                            <td>${e.document}</td>
                            <td>R$ ${(e.value)},00</td>
                        </tr>`
                    )
                });
            },
            complete : function(){
            },
            beforeSend : function(){
                $('table tbody').empty();
            }
        });
    });
}

function datePicker() {
    $('.input__data').daterangepicker({
        opens: 'left',
        locale: {
            format: 'YYYY/MM/DD'
        },
        minDate: '2018/01/01',  
        startDate: '2018/01/01'
    });
}