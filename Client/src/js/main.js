validateCpf();

function changeData() {
    const submit = document.querySelector('.info__btn-pesquisar');

    submit.addEventListener('click', e => {
        e.preventDefault();
    });
}

function validateCpf() {
    var options =  {
        onKeyPress: function(cep, e, field, options) {
          var masks = ['000.000.000/000', '00.000.000/0000-00'];
          var mask = (cep.length>14) ? masks[1] : masks[0];
          $('#cpf').mask(mask, options);
    }};
      
    $('#cpf').mask('000.000.000/00', options);
}

$('.info__input').daterangepicker({
    opens: 'left',
    locale: {
        format: 'YYYY/MM/DD'
    },
    minDate: '2018/01/01',  
    startDate: '2018/01/01'
});

$('.info__input').on('apply.daterangepicker', function(ev, picker) {
    console.log(picker.startDate.format('YYYY-MM-DD'));
    console.log(picker.endDate.format('YYYY-MM-DD'));
  });