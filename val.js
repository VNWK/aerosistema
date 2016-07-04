$(document).ready(function(){

 var myLanguage = {
      errorTitle : 'Envio de formulario fallido!',
      requiredFields : 'No ha llenado los campos requeridos',
      badTime : 'No ha introducido una hora valida',
      badEmail : 'No ha introducido un email valido',
    badTelephone : 'You have not given a correct phone number',
      badSecurityAnswer : 'You have not given a correct answer to the security question',
      badDate : 'No ha introducido una fecha correcta',
      lengthBadStart : 'debe introducir una valor entre ',
      lengthBadEnd : ' caracteres',
      lengthTooLongStart : 'Ha introducido un valor mayor a  ',
      lengthTooShortStart : 'Ha introducido un valor menor a ',
      notConfirmed : 'Los valores no pudieron ser confirmados',
      badDomain : 'Dominio incorrecto',
      badUrl : 'URL no valida',
      badCustomVal : 'Valor incorrecto',
      badInt : 'Ha introducido un numero no valido',
            badSecurityNumber : 'Your social security number was incorrect',
      badUKVatAnswer : 'Incorrect UK VAT Number',
      badStrength : 'La contrasena es muy simple',
      badNumberOfSelectedOptionsStart : 'Debe elegir al menos ',
      badNumberOfSelectedOptionsEnd : ' respuestas',
      badAlphaNumeric : 'El valor solo puede contener caracteres alfanumericos ',
      badAlphaNumericExtra: ' y ',
            wrongFileSize : 'The file you are trying to upload is too large',
      wrongFileType : 'The file you are trying to upload is of wrong type',
      groupCheckedRangeStart : 'Por favor elija entre ',
      groupCheckedTooFewStart : 'Por favor elija al menos ',
      groupCheckedTooManyStart : 'Por favor elija maximo ',
      groupCheckedEnd : ' item(s)'
    };

$.validate({    
    language : myLanguage
});
});