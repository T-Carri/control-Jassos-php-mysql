<?php ob_start(); ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <title>Iniciar Sesión</title>

    <style>
    
  body {
            background-color: #e4f0ff;
           
            margin: 0;
            padding: 0;
    overflow: hidden;
        }

        .svg-container {
    position: fixed;
    top: 0;
    left: 0;
    width: 100vw;
    height: 100vh;
    z-index: -1;
    pointer-events: none; /* Para que el SVG no intercepte eventos de ratón */
}

.svg-container svg {
  width: 100%;
    height: 100%;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    z-index: 0;
   
}

.form-container {
    border-radius: 20px;
    position: fixed;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    z-index: 2;
    width: 20%;
    background-color: white;
    padding: 20px;
}

@media screen and (max-width: 375px) and (min-height: 667px) {
    .form-container {
        width: 70%;
    }
}

.form {
    margin: 3%;
    z-index: 3;
    display: flex;
    flex-direction: column;
    gap: 10px;
    background-color: #ffffff;
    padding: 30px;
    border-radius: 20px;
    font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;

    /* Centrar contenido verticalmente */
    align-items: center;
}

::placeholder {
  font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
}

.form button {
  align-self: flex-end;
  z-index: 3;
}

.flex-column > label {
  color: #151717;
  font-weight: 600;
  z-index: 3;
}

.inputForm {
  z-index: 3;
  border: 1.5px solid #ecedec;
  border-radius: 10px;
  height: 50px;
  display: flex;
  align-items: center;
  padding-left: 10px;
  transition: 0.2s ease-in-out;
}

.input {
  margin-left: 10px;
  border-radius: 10px;
  border: none;
  width: 85%;
  height: 100%;
  z-index: 3;
}

.input:focus {
  outline: none;
}

.inputForm:focus-within {
  border: 1.5px solid #2d79f3;
}

.flex-row {
  z-index: 3;
  display: flex;
  flex-direction: row;
  align-items: center;
  gap: 10px;
  justify-content: space-between;
}

.flex-row > div > label {
  z-index: 3;
  font-size: 14px;
  color: black;
  font-weight: 400;
}

.span {
  font-size: 14px;
  margin-left: 5px;
  color: #2d79f3;
  font-weight: 500;
  cursor: pointer;
  z-index: 3;
}

.button-submit {
  margin: 20px 0 10px 0;
  background-color: #151717;
  border: none;
  color: white;
  font-size: 15px;
  font-weight: 500;
  border-radius: 10px;
  height: 50px;
  width: 100%;
  cursor: pointer;
  z-index: 3;
}

.button-submit:hover {
  background-color: #252727;
  z-index: 3;
}

.p {
  text-align: center;
  color: black;
  font-size: 14px;
  margin: 5px 0;
  z-index: 3;
}

.btn {
  margin-top: 10px;
  width: 100%;
  height: 50px;
  border-radius: 10px;
  display: flex;
  justify-content: center;
  align-items: center;
  font-weight: 500;
  gap: 10px;
  border: 1px solid #ededef;
  background-color: white;
  cursor: pointer;
  transition: 0.2s ease-in-out;
  z-index: 3;
}

.btn:hover {
  border: 1px solid #2d79f3;
  ;
}

    
    </style>
</head>
<body>








<div class="svg-container">
<svg   viewBox="0 0 400 300"
  version="1.1"
  xmlns="http://www.w3.org/2000/svg"
  xmlns:xlink="http://www.w3.org/1999/xlink">

  <g id="leftToRight"
    fill="none"
    stroke="#fff"
    stroke-linejoin="butt"
    stroke-linecap="butt"
    stroke-width="4">
    <path d="M 25,300 -275,0"
      stroke-dasharray="37, 37, 0"
      stroke-dashoffset="0" />
    <path d="M 50,300 -250,0"
      stroke-dasharray="72, 72, 0"
      stroke-dashoffset="0" />
    <path d="M 75,300 -225,0"
      stroke-dasharray="108, 108, 0"
      stroke-dashoffset="0" />
    <path d="M 100,300 -200,0"
      stroke-dasharray="144, 144, 0"
      stroke-dashoffset="0" />
    <path d="M 125,300 -175,0"
      stroke-dasharray="180, 180, 0"
      stroke-dashoffset="0" />
    <path d="M 150,300 -150,0"
      stroke-dasharray="216, 216, 0"
      stroke-dashoffset="0" />
    <path d="M 175,300 -125,0"
      stroke-dasharray="250, 250, 0"
      stroke-dashoffset="0" />
    <path d="M 200,300 -100,0"
      stroke-dasharray="285, 285, 0"
      stroke-dashoffset="0" />
    <path d="M 225,300 -75,0"
      stroke-dasharray="320, 320, 0"
      stroke-dashoffset="0" />
    <path d="M 250,300 -50,0"
      stroke-dasharray="356, 356, 0"
      stroke-dashoffset="0" />
    <path d="M 275,300 -25,0"
      stroke-dasharray="392, 392, 0"
      stroke-dashoffset="0" />
    <path class="hash"
      d="M 300,300 0,0"
      stroke-dasharray="425, 425, 0"
      stroke-dashoffset="0" />
    <path class="hash"
      d="M 325,300 25,0"
      stroke-dasharray="425, 425, 0"
      stroke-dashoffset="0" />
    <path class="hash"
      d="M 350,300 50,0"
      stroke-dasharray="425, 425, 0"
      stroke-dashoffset="0" />
    <path class="hash"
      d="M 375,300 75,0"
      stroke-dasharray="425, 425, 0"
      stroke-dashoffset="0" />
    <path class="hash"
      d="M 400,300 100,0"
      stroke-dasharray="425, 425, 0"
      stroke-dashoffset="0" />
    <path d="M 425,300 125,0"
      stroke-dasharray="425, 425, 0"
      stroke-dashoffset="0" />
    <path d="M 450,300 150,0"
      stroke-dasharray="425, 425, 0"
      stroke-dashoffset="0" />
    <path d="M 475,300 175,0"
      stroke-dasharray="425, 425, 0"
      stroke-dashoffset="0" />
    <path d="M 500,300 200,0"
      stroke-dasharray="425, 425, 0"
      stroke-dashoffset="0" />
    <path d="M 525,300 225,0"
      stroke-dasharray="425, 425, 0"
      stroke-dashoffset="0" />
    <path d="M 550,300 250,0"
      stroke-dasharray="425, 425, 0"
      stroke-dashoffset="0" />
    <path d="M 575,300 275,0"
      stroke-dasharray="425, 425, 0"
      stroke-dashoffset="0" />
    <path d="M 600,300 300,0"
      stroke-dasharray="425, 425, 0"
      stroke-dashoffset="0" />
    <path d="M 625,300 325,0"
      stroke-dasharray="425, 425, 0"
      stroke-dashoffset="0" />
    <path d="M 650,300 350,0"
      stroke-dasharray="425, 425, 0"
      stroke-dashoffset="0" />
    <path d="M 675,300 375,0"
      stroke-dasharray="425, 425, 0"
      stroke-dashoffset="0" />
  </g>

  <g id="rightToLeft"
    fill="none"
    stroke="#fff"
    stroke-linejoin="butt"
    stroke-linecap="butt"
    stroke-width="4">
    <path d="M 25,0 -275,300"
      stroke-dasharray="37, 37, 0"
      stroke-dashoffset="0" />
    <path d="M 50,0 -250,300"
      stroke-dasharray="73, 73, 0"
      stroke-dashoffset="0" />
    <path d="M 75,0 -225,300"
      stroke-dasharray="108, 108, 0"
      stroke-dashoffset="0" />
    <path d="M 100,0 -200,300"
      stroke-dasharray="144, 144, 0"
      stroke-dashoffset="0" />
    <path d="M 125,0 -175,300"
      stroke-dasharray="180, 180, 0"
      stroke-dashoffset="0" />
    <path d="M 150,0 -150,300"
      stroke-dasharray="216, 216, 0"
      stroke-dashoffset="0" />
    <path d="M 175,0 -125,300"
      stroke-dasharray="250, 250, 0"
      stroke-dashoffset="0" />
    <path d="M 200,0 -100,300"
      stroke-dasharray="285, 285, 0"
      stroke-dashoffset="0" />
    <path d="M 225,0 -75,300"
      stroke-dasharray="320, 320, 0"
      stroke-dashoffset="0" />
    <path d="M 250,0 -50,300"
      stroke-dasharray="356, 356, 0"
      stroke-dashoffset="0" />
    <path d="M 275,0 -25,300"
      stroke-dasharray="392, 392, 0"
      stroke-dashoffset="0" />
    <path class="hash"
      d="M 300,0 0,300"
      stroke-dasharray="425, 425, 0"
      stroke-dashoffset="0" />
    <path class="hash"
      d="M 325,0 25,300"
      stroke-dasharray="425, 425, 0"
      stroke-dashoffset="0" />
    <path class="hash"
      d="M 350,0 50,300"
      stroke-dasharray="425, 425, 0"
      stroke-dashoffset="0" />
    <path class="hash"
      d="M 375,0 75,300"
      stroke-dasharray="425, 425, 0"
      stroke-dashoffset="0" />
    <path class="hash"
      d="M 400,0 100,300"
      stroke-dasharray="425, 425, 0"
      stroke-dashoffset="0" />
    <path d="M 425,0 125,300"
      stroke-dasharray="425, 425, 0"
      stroke-dashoffset="0" />
    <path d="M 450,0 150,300"
      stroke-dasharray="425, 425, 0"
      stroke-dashoffset="0" />
    <path d="M 475,0 175,300"
      stroke-dasharray="425, 425, 0"
      stroke-dashoffset="0" />
    <path d="M 500,0 200,300"
      stroke-dasharray="425, 425, 0"
      stroke-dashoffset="0" />
    <path d="M 525,0 225,300"
      stroke-dasharray="425, 425, 0"
      stroke-dashoffset="0" />
    <path d="M 550,0 250,300"
      stroke-dasharray="425, 425, 0"
      stroke-dashoffset="0" />
    <path d="M 575,0 275,300"
      stroke-dasharray="425, 425, 0"
      stroke-dashoffset="0" />
    <path d="M 600,0 300,300"
      stroke-dasharray="425, 425, 0"
      stroke-dashoffset="0" />
    <path d="M 625,0 325,300"
      stroke-dasharray="425, 425, 0"
      stroke-dashoffset="0" />
    <path d="M 650,0 350,300"
      stroke-dasharray="425, 425, 0"
      stroke-dashoffset="0" />
    <path d="M 675,0 375,300"
      stroke-dasharray="425, 425, 0"
      stroke-dashoffset="0" />
  </g>

  <g id="theXTop"
    fill="none"
    stroke="#001B1F"
    stroke-linejoin="butt"
    stroke-linecap="butt"
    stroke-width="4">
    <path d="M 0,0 200,200 400,0"
      stroke-dasharray="564, 564, 0, 0, 0"
      stroke-dashoffset="0" />
    <path d="M 25,0 200,175 375,0"
      stroke-dasharray="495, 495, 0, 0, 0"
      stroke-dashoffset="0" />
    <path d="M 50,0 200,150 350,0"
      stroke-dasharray="425, 425, 0, 0, 0"
      stroke-dashoffset="0" />
    <path d="M 75,0 200,125 325,0"
      stroke-dasharray="353, 353, 0, 0, 0"
      stroke-dashoffset="0" />
    <path d="M 100,0 200,100 300,0"
      stroke-dasharray="282, 282, 0, 0, 0"
      stroke-dashoffset="0" />
    <path d="M 125,0 200,75 275,0"
      stroke-dasharray="212, 212, 0, 0, 0"
      stroke-dashoffset="0" />
    <path d="M 150,0 200,50 250,0"
      stroke-dasharray="141, 141, 0, 0, 0"
      stroke-dashoffset="0" />
    <path d="M 175,0 200,25 225,0"
      stroke-dasharray="70, 70, 0, 0, 0"
      stroke-dashoffset="0" />
  </g>

  <g id="theXBottom"
    fill="none"
    stroke="#001B1F"
    stroke-linejoin="butt"
    stroke-linecap="butt"
    stroke-width="4">
    <path d="M 0,300 200,100 400,300"
      stroke-dasharray="564, 564, 0, 0, 0"
      stroke-dashoffset="0" />
    <path d="M 25,300 200,125 375,300"
      stroke-dasharray="495, 495, 0, 0, 0"
      stroke-dashoffset="0" />
    <path d="M 50,300 200,150 350,300"
      stroke-dasharray="425, 425, 0, 0, 0"
      stroke-dashoffset="0" />
    <path d="M 75,300 200,175 325,300"
      stroke-dasharray="353, 353, 0, 0, 0"
      stroke-dashoffset="0" />
    <path d="M 100,300 200,200 300,300"
      stroke-dasharray="282, 282, 0, 0, 0"
      stroke-dashoffset="0" />
    <path d="M 125,300 200,225 275,300"
      stroke-dasharray="212, 212, 0, 0, 0"
      stroke-dashoffset="0" />
    <path d="M 150,300 200,250 250,300"
      stroke-dasharray="141, 141, 0, 0, 0"
      stroke-dashoffset="0" />
    <path d="M 175,300 200,275 225,300"
      stroke-dasharray="70, 70, 0, 0, 0"
      stroke-dashoffset="0" />
  </g>

</svg> 

</div>




<div class="form-container">

<form class="form">
  <div style="width: 100%; text-align: center;">
    <img src="../assets/img/sij.svg" style="display: block; margin: auto; width: 40%; height: 40%;" alt="Tecnología de Entorno" />
  </div>
  <div class="flex-column">
    <label>Email</label>
  </div>
  <div class="inputForm">
    <input type="text" class="input" placeholder="Enter your Email">
  </div>
  <div class="flex-column">
    <label>Password</label>
  </div>
  <div class="inputForm">
    <input type="password" class="input" placeholder="Enter your Password">
  </div>
  <div class="flex-row">
    <div>
      <input type="checkbox">
      <label>Remember me</label>
    </div>
  </div>
  <button class="button-submit">Entrar</button>
</form>

</div>










<!-- <div class="full-screen-container">
    <div class="login-container">
      <h1 class="login-title">SOLUCIONES INTEGRALES JASSO</h1>
      <form class="form" action="../controllers/AuthController.php" method="post">
        <div class="input-group success" >
          <label for="email">Email</label>
          <input type="email" id="email" name="email" required/>
          <span class="msg">Valid email</span>
        </div>

        <div class="input-group error" >
          <label for="password">Password</label>
          <input type="password" id="password" name="password" required/>
          <span class="msg">Incorrect password</span>
        </div>

        <button type="submit" class="login-button">Login</button>
      </form>
    </div>
  </div>

 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/1.18.5/TweenMax.min.js"></script>

<script> 
window.onload = onLoad;

const easeInOutQuint = 'cubic-bezier(0.86, 0, 0.07, 1)';
const easeInQuart = 'cubic-bezier(0.895, 0.03, 0.685, 0.22)';
const APPEAR_COMPLETE = 2800;
const ASPECT_RATIO = 400 / 300;

function onLoad() {
  const offsets = [37, 73, 108, 144, 180, 216, 250, 285, 320, 356, 392, 425, 425, 425, 425, 425, 392, 356, 321, 286, 250, 215, 180, 144, 109, 74, 38];
  const hashes = {
    ltr: {
      dasharray: '104, 425, 0, 0',
      reset: '425, 425, 0',
      offsets: [-125, -142, -159, -177, -194],
    },
    rtl: {
      dasharray: '102, 425, 0, 0',
      reset: '425, 425, 0',
      offsets: [-126, -144, -161, -179, -197],
    }
  };

  const xOffsets = [564, 495, 425, 353, 282, 212, 141, 70].reverse();

  // Left To Right
  const ltrLines = Array.from(
    document.querySelectorAll('#leftToRight path')
  );
  // Right To Left
  const rtlLines = Array.from(
    document.querySelectorAll('#rightToLeft path')
  );
  // Left To Right
  const ltrHashes = Array.from(
    document.querySelectorAll('#leftToRight .hash')
  );
  // Right To Left hashes
  const rtlHashes = Array.from(
    document.querySelectorAll('#rightToLeft .hash')
  );
  // Top X
  const xTop = Array.from(
    document.querySelectorAll('#theXTop path')
  );
  // Bottom X
  const xBottom = Array.from(
    document.querySelectorAll('#theXBottom path')
  );

  // Timeline
  var tl = new TimelineMax();

  // Shuffle
  tl.staggerFromTo(ltrLines, 0.4, {
    cycle: { strokeDashoffset: idx => offsets[idx] },
    ease: Circ.easeOut,
  }, {
    strokeDashoffset: 0,
    ease: Circ.easeOut,
  }, 0.1, 0)
  .staggerFromTo(rtlLines, 0.4, {
    cycle: { strokeDashoffset: idx => offsets[idx] },
    ease: Circ.easeOut,
  }, {
    strokeDashoffset: 0,
    ease: Circ.easeOut,
  }, 0.1, 0)
  .add('unshuffle')
  // Unshuffle
  .staggerFromTo(ltrLines, 0.4, {
    strokeDashoffset: 0,
    ease: Expo.easeOut,
  }, {
    cycle: { strokeDashoffset: idx => offsets[idx] },
    ease: Expo.easeOut,
  }, 0.1, 'unshuffle')
  .staggerFromTo(rtlLines, 0.4, {
    strokeDashoffset: 0,
    ease: Expo.easeOut,
  }, {
    cycle: { strokeDashoffset: idx => offsets[idx] },
    ease: Expo.easeOut,
  }, 0.1, 'unshuffle')
  // Prepare for hash
  .set(ltrHashes, {
    strokeDasharray: hashes.ltr.dasharray,
    strokeDashoffset: 104,
  })
  .set(rtlHashes, {
    strokeDasharray: hashes.rtl.dasharray,
    strokeDashoffset: 102,
  })
  .add('hash')
  // Hash
  .staggerFromTo(ltrHashes, 0.8, {
    strokeDashoffset: 104,
    ease: Power4.easeInOut,
  }, {
    cycle: { strokeDashoffset: idx => hashes.ltr.offsets[idx] },
    ease: Power4.easeInOut,
  }, 0.1, 'hash')
  .staggerFromTo(rtlHashes, 0.8, {
    strokeDashoffset: 102,
    ease: Power4.easeInOut,
  }, {
    cycle: { strokeDashoffset: idx => hashes.rtl.offsets[idx] },
    ease: Power4.easeInOut,
  }, 0.1, 'hash')
  .add('unhash')
  // Unhash
  .staggerFromTo(ltrHashes, 0.8, {
    cycle: { strokeDashoffset: idx => hashes.ltr.offsets[idx] },
    ease: Power4.easeInOut,
  }, {
    strokeDashoffset: 104,
    ease: Power4.easeInOut,
  }, 0.1, 'unhash')
  .staggerFromTo(rtlHashes, 0.8, {
    cycle: { strokeDashoffset: idx => hashes.rtl.offsets[idx] },
    ease: Power4.easeInOut,
  }, {
    strokeDashoffset: 102,
    ease: Power4.easeInOut,
  }, 0.1, 'unhash')
  // Reset for shuffle
  .set(ltrHashes, {
    strokeDasharray: hashes.ltr.reset,
    strokeDashoffset: 425,
  })
  .set(rtlHashes, {
    strokeDasharray: hashes.rtl.reset,
    strokeDashoffset: 425,
  })
  .add('shuffleAgain')
  // Shuffle Again
  .staggerFromTo(ltrLines.reverse(), 0.4, {
    cycle: { strokeDashoffset: idx => offsets[idx] },
    ease: Circ.easeOut,
  }, {
    strokeDashoffset: 0,
    ease: Circ.easeOut,
  }, 0.1, 'shuffleAgain')
  .staggerFromTo(rtlLines.reverse(), 0.4, {
    cycle: { strokeDashoffset: idx => offsets[idx] },
    ease: Circ.easeOut,
  }, {
    strokeDashoffset: 0,
    ease: Circ.easeOut,
  }, 0.1, 'shuffleAgain')
  .add('theX')
  // The X
  .staggerFromTo(xTop.reverse(), 0.6, {
    cycle: { strokeDashoffset: idx => xOffsets[idx] },
    ease: Power4.easeInOut,
  }, {
    strokeDashoffset: 0,
    ease: Power4.easeInOut,
  }, 0.05, 'shuffleAgain+=1.2')
  .staggerFromTo(xBottom.reverse(), 0.6, {
    cycle: { strokeDashoffset: idx => xOffsets[idx] },
    ease: Power4.easeInOut,
  }, {
    strokeDashoffset: 0,
    ease: Power4.easeInOut,
  }, 0.05, 'shuffleAgain+=1.2')
  .add('cleanup')
  // Cleanup
  .staggerFromTo(xTop, 0.6, {
    strokeDashoffset: 0,
    ease: Power4.easeInOut,
  }, {
    cycle: { strokeDashoffset: idx => xOffsets[idx] },
    ease: Power4.easeInOut,
  }, 0.05, 'cleanup+=2')
  .staggerFromTo(xBottom, 0.6, {
    strokeDashoffset: 0,
    ease: Power4.easeInOut,
  }, {
    cycle: { strokeDashoffset: idx => xOffsets[idx] },
    ease: Power4.easeInOut,
  }, 0.05, 'cleanup+=2')
  // Cleanup
  .staggerFromTo(ltrLines, 0.4, {
    strokeDashoffset: 0,
    ease: Expo.easeOut,
  }, {
    cycle: { strokeDashoffset: idx => offsets[idx] },
    ease: Expo.easeOut,
  }, 0.1, 'cleanup+=1.6')
  .staggerFromTo(rtlLines, 0.4, {
    strokeDashoffset: 0,
    ease: Expo.easeOut,
  }, {
    cycle: { strokeDashoffset: idx => offsets[idx] },
    ease: Expo.easeOut,
  }, 0.1, 'cleanup+=1.6')
  // Repeat
  .repeat(-1);

  // Reset The X
  xTop.forEach((el, i) => tl.set(el, {
    strokeDashoffset: xOffsets[i]
  }, 0));
  xBottom.forEach((el, i) => tl.set(el, {
    strokeDashoffset: xOffsets[i]
  }, 0));

  window.onresize = resize;
  resize();

}

// Resize
let svg;
function resize() {
  const w = Math.max(
    document.documentElement.clientWidth,
    window.innerWidth || 0
  );
  const h = Math.max(
    document.documentElement.clientHeight,
    window.innerHeight || 0
  );

  svg = svg || document.querySelector('svg');
  const ratio = w / h;

  if (ratio >= ASPECT_RATIO) {
    svg.style.width = '100vw';
    svg.style.height = `auto`;
  } else {
    svg.style.height = '100vh';
    svg.style.width = 'auto';
  }
};
</script>
</body>
</html>
<?php ob_end_flush();?>