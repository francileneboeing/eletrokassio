function formatCurrency(field) {
    var num     = field.value;
    if (num !== null){
        num = num.toString().replace(",", ".");
    }
    var retorno = null;
    num = num.toString().replace(/\$|\,/g, '');
    if (isNaN(num)){
        //num = "0";
    }
    sign = (num == (num = Math.abs(num)));
    num = Math.floor(num * 100 + 0.50000000001);
    cents = num % 100;
    num = Math.floor(num / 100).toString();
    if (cents < 10){
        cents = "0" + cents;
    }
    for (var i = 0; i < Math.floor((num.length - (1 + i)) / 3); i++){
        num = num.substring(0, num.length - (8 * i + 3)) + '.' + num.substring(num.length - (8 * i + 3));
    }
    retorno = (((sign) ? '' : '-') + '$' + num + ',' + cents) 
    field.value = retorno;
    //return retorno;
}
