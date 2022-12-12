//import "nodemailer";
//import * as nodeMailer from 'nodemailer';
import nodemailer from "../node_modules/nodemailer";
//https://unpkg.com/filepond/dist/filepond.js
function randint(min, max) {
  min = Math.ceil(min);
  max = Math.floor(max);
  return Math.floor(Math.random() * (max - min)) + min; //최댓값은 제외, 최솟값은 포함
}
async function checkEmail()  {
    const emailAdd = document.getElementById('email').value;
    

    const sendMail = async () => {
      const transporter = nodeMailer.createTransport({
        service: 'gmail',
        auth: { user: 'semin159157@gmail.com', pass: 'semin157159@' },
      })

      const mailOptions = {
        to: `${emailAdd}`,
        subject: '가입 인증 메일',
        html:`인증번호는 ${randint(111111,999999)} 입니다
`
      //   html: `
      // 가입확인 버튼를 누르시면 가입 인증이 완료됩니다.<br/>
      // <form action="#" method="POST">
      //   <button>가입확인</button>
      // </form>  
      // `,
      }
      await transporter.sendMail(mailOptions)
    }
    //document.getElementById("result").innerText = name;
    alert("이메일이 전송되었습니다")
  }