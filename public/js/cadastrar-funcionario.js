//validação de CPF
const avisoCpf = document.getElementById('cpf-aviso');
let cpfValue = document.getElementById('cpf').value;

const validaCPF = (cpf) => {
    cpfValue = document.getElementById('cpf').value;
    if (!cpf) {
        avisoCpf.innerHTML = '<p class="text-danger">CPF inválido.</p>';
        return false;
    }
  
    // Elimina possível máscara
    cpf = cpf.replace(/[^0-9]/g, '');
  
    if (cpf.length !== 11) {
        avisoCpf.innerHTML = '<p class="text-danger">CPF inválido.</p>';
        return false;
    }
    else if (
      cpf === '00000000000' ||
      cpf === '11111111111' ||
      cpf === '22222222222' ||
      cpf === '33333333333' ||
      cpf === '44444444444' ||
      cpf === '55555555555' ||
      cpf === '66666666666' ||
      cpf === '77777777777' ||
      cpf === '88888888888' ||
      cpf === '99999999999'
    ) {
        avisoCpf.innerHTML = '<span class="text-danger">CPF inválido.</span>';
        return false;
    } else {
        let d1 = 0;
        let d2 = 0;
        let i = 0;
        let j = 10;
        while (i < 9) {
            d1 += parseInt(cpf.charAt(i)) * j;
            i++;
            j--;
        }
        d1 = ((d1 * 10) % 11) % 10;
        if (cpf.charAt(9) !== d1.toString()) {
            avisoCpf.innerHTML = '<span class="text-danger">CPF inválido.</span>';
            return false;
        }
        i = 0;
        j = 11;
        while (i < 10) {
            d2 += parseInt(cpf.charAt(i)) * j;
            i++;
            j--;
        }
        d2 = ((d2 * 10) % 11) % 10;
        if (cpf.charAt(10) !== d2.toString()) {
            avisoCpf.innerHTML = '<span class="text-danger">CPF inválido.</span>';
            return false;
        }
        avisoCpf.innerHTML = '<span class="text-success">CPF válido.</span>';
        return true;
    }
}

//validação de e-mail
let avisoEmail = document.getElementById('email-aviso');
let emailValue = document.getElementById('email').value;

const validaEmail = (email) => {
    emailValue = document.getElementById('email').value;

    let usuario = email.substring(0, email.indexOf("@"));
    let dominio = email.substring(email.indexOf("@")+ 1, email.length);

    if ((usuario.length >=1) &&
        (dominio.length >=3) &&
        (usuario.search("@")==-1) &&
        (dominio.search("@")==-1) &&
        (usuario.search(" ")==-1) &&
        (dominio.search(" ")==-1) &&
        (dominio.search(".")!=-1) &&
        (dominio.indexOf(".") >=1) &&
        (dominio.lastIndexOf(".") < dominio.length - 1)) {
            avisoEmail.innerHTML = '<span class="text-success">E-mail válido.</span>';
            return true;
        }
    else{
        avisoEmail.innerHTML = '<span class="text-danger">E-mail inválido.</span>';
        return false;
    }
}

//preventDefault() para fazer as validações antes de salvar
const botaoSalvar = document.getElementById('botao-salvar');
const formCadastro = document.getElementById('form-cadastro');

const avisoValidacao = document.getElementById('aviso-validacao');

botaoSalvar.addEventListener('click', function(event) {
  event.preventDefault();
  if (
    validaCPF(cpfValue) == true &&
    validaEmail(emailValue) == true &&
    formCadastro.checkValidity() == true
  ) {
    console.log(cpfValue);
    formCadastro.submit();
  } else {
    avisoValidacao.innerHTML = "Por favor, preencha corretamente todos os dados.";
  }
});
