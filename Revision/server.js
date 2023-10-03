const http = require('http');

const hostname = '127.0.0.1';
const port = 3000;

const server = http.createServer((req, res) => {
  res.statusCode = 200;
  res.setHeader('Content-Type', 'text/html');
  res.end(`<!DOCTYPE html>
  <html lang="en">
  
  <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Document</title>
      <style>
          header {
              margin: auto;
              border: 3px solid yellow;
              width: 1200px;
  
          }
  
          header p {
              text-align: center;
          }
  
          img {
              margin: auto;
              width: 34px;
              display: block;
          }
  
          h3 {
              margin: 0px;
              text-align: center;
          }
  
          div.container p,
          h4,
          h3 {
              margin: auto;
              text-align: center;
              /* width: 50%; */
              display: block;
          }
  
          .box {
              border: 4px solid black;
              background-color: grey;
              margin: 4px;
              padding: 23px;
              display: inline-block;
              box-sizing: border-box;
              width: 30%;
          }
  
          .container {
              margin: auto;
              width: 1200px;
          }
          /* sari property 1 hi line me likh skte hai
          animation:name duration timing-function delay iteration-count fill-mode */
          h2{
              /* animation-name: heading ; */
              animation-name: hed2;
              animation-duration: 1s;
              animation: iteration count 2px; 
              animation-delay: 1s;
              /* animation-direction: reverse; */
              /* transition property same as animation almost */
          }
          @keyframes hed2 {0%{margin-top: 55px;}
          100%{margin-bottom: 55pxS;}
              
          }
          @keyframes heading {
              from{color:red;
                  font-size: 2em;
              }
              to{
                  color: black;
                  font-size: 1.5em;
              }
              
          }
      </style>
  </head>
  
  <body>
      <h2> 11)CSS Display property</h2>
      <header class="top">
          <img src="https://yt3.googleusercontent.com/ytc/AGIKgqPmVT6_YQd7RIhhoy9So5Jk9Iqw8pzivKCfLPm_Yg=s176-c-k-c0x00ffffff-no-rj"
              alt="">
          <h3>welcome to my website</h3>
          <p>Display block krne se element puri jgh lega aur inline krne se required jgh lega bs "" aap uski width ko set
              kr skte hai aur margin auto krk usko center kr skte hai"</p>
  
  
  
      </header>
      <div class="container">
          <div class="box">
  
              <h4 class="heading">Heading</h4>
              <p>Display inline-block krne se width bhi set kr skte hai. boxsizing border box krne se jo total width hoti
                  hai jitni aapne di hai wo raheti hai including margin or padding wrna width change hojayegi agr aap
                  chahte hai jo width de rakhi hai wahi rahe to boxsizing property use krskte hai.
              </p>
          </div>
  
          <div class="box">
  
              <h4 class="heading">Heading</h4>
              <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quos omnis rem tenetur quasi ea obcaecati culpa
                  illo accusamus unde cumque nostrum corporis nisi impedit blanditiis, sed, mollitia nulla asperiores
                  natus.</p>
          </div>
          <div class="box">
  
              <h4 class="heading">Heading</h4>
              <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quos omnis rem tenetur quasi ea obcaecati culpa
                  illo accusamus unde cumque nostrum corporis nisi impedit blanditiis, sed, mollitia nulla asperiores
                  natus.</p>
          </div>
  
      </div>
  </body>
  
  </html>
  <!DOCTYPE html>
  <html lang="en">
  
  <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Document</title>
      <style>
          .poscont {
              width: auto;
              border: 3px solid blue;
              /* GRID */
              display: grid;
              grid-template-columns: repeat(2,auto);
              grid-gap: 2rem;
              
              /* box-sizing: border-box; */
          }
          
          .poss {
              box-shadow: 7px 7px green;
              border: 2px solid red;
              margin: auto;
              padding: 2px 2px;
              display: inline-block;
              width: 150px;
              height: 150px
          }
          #box1{
              box-shadow: -7px -5px yellow;
          }
          #box3{
              box-shadow: 7px 7px 20px 20px red;
              
          }
          #box2{
              text-shadow: 2px 2px yellow;
          }
      </style>
  </head>
  
  <body>
      <h2>12)possitioning</h2>
      <div class="poscont">
          <div class="poss" id="box1">1) absolute means parent k relative position</div>
          <div class="poss" id="box2">2) relative means khud ki position k relative</div>
          <div class="poss" id="box3">3) fixed means scroll krne pr hilega nhi sala</div>
          <div class="poss" id="box4">3)<h6>box shadow and text shadow</h6> ofset X,ofset Y,blurradious,spread radious</div>
      </div>
      <h2>13) visiblity & ze-index</h2>
      <p>visiblity position suspect k sath kam krti hai position static k alawa jo bhi ho visiblty kam krti hai ze-index
          jis item k bada hoga wo overlaping k cace me uper hoga</p>
  
      <h2>14) Flex box</h2>
      <p>flex property container ki aur item ki saperatly add krskte hai apply krne k liye container ki display flex krna
          hoga 1) IN CONTAINER: flex-direction, flex-wrap, justify-content, aling-item</p>
      <p>2) IN ITEM flex-grow, flex-shrink, align-self, flex-basis</p>
  
  
      <h2>15) Responsive Designs</h2>
      <span>1)settings up the view port <br>
          2)use max-width max-height <br>
          3)using CSS media queries <br>
          4)using em (parent ka 10 guna)/rem()/vh(viewport height"mtlb container ki puri height")/vw units over pixels
      </span>
  
  
      <span>
          <h2>media query</h2>
          <span>method"@media (min-weith:xxxpx) & ,(max-weith:xxxpx)"</span>
      </span>
      <span>
          <h2> 16)selectors</h2>
          <p> div li p{} <br> div > p {}"wo para select hoga jiska parent div ho" <br> div + p{} "wo para select hoga
              jiska sibling div ho yani para se actual pahele div ho" <br> li:nth-child(3n+3){color: red}"specific li k
              leye apply krskte hai & odd even bhi krskte hai " <br>
          <h2>before & after selectors</h2> <br> header::before/after{
              background: url();<br>
              content:"";<br>
              position:absolute;<br>
              top: ;<br>
      left: ;<br>
      width: ;<br>
      height: ;<br>
      z-index:-1;<br>
      opacity:0.5;"for the clearity of the text"
  
          } <br>
          <h2>variables and custom property</h2> <br>
          box{ --box-color: red; <br>
          box-shadow: var(--box-color); }
  
      </p>
  
      </span>
      <span>
          
  
  
      </span>
  
  </body>
  
  </html>`);
});

server.listen(port, hostname, () => {
  console.log(`Server running at http://${hostname}:${port}/`);
});