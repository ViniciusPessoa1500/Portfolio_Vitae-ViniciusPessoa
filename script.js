/* script.js */
/*  background-color: black;  cor da borada do icone principal 
document.querySelector('form').addEventListener('submit', function(event) {
    event.preventDefault();
    
    var nome = document.getElementById('nome').value;
    var email = document.getElementById('email').value;

    console.log('Nome:', nome);
    console.log('Email:', email);
});*/

const nodemailer = require('nodemailer');

const transporter = nodemailer.createTransport({
  service: 'gmail',
  auth: {
    user: 'viniciuspessoa150@gmail.com',
    pass: 'Pessoa43@',
  },
});

function enviarEmail(nome, email, assunto, mensagem) {
  const mailOptions = {
    from: 'viniciuspessoa150@gmail.com',
    to: 'viniciuspessoa150@gmail.com',
    subject: assunto,
    html: `Nome: ${nome}<br>Email: ${email}<br>Assunto: ${assunto}<br>Mensagem: ${mensagem}`,
  };

  transporter.sendMail(mailOptions, (error, info) => {
    if (error) {
      return console.log(error);
    }
    console.log('Email enviado: ' + info.response);
  });
}

module.exports = enviarEmail;
