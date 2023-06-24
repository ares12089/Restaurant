<!DOCTYPE html>
<html>
<head>
<style>
    body {
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      background-color: black;
      height: 100vh;
      overflow: hidden;
    }
    
    .ticket {
    
      background-color: gold;
      border-radius: 5px;
      display: flex;
      justify-content: center;
      width: 230px; /* Aumentamos el ancho en 3 centímetros */
      height: 130px; /* Aumentamos el alto en 3 centímetros */
      align-items: center;
      font-size: 24px;
      color: black;
      flex-direction: column;
      font-size: 30px;
      font-family: times-new-roman;
      cursor: pointer;
      transition: transform 0.3s ease;
    }
    
    .ticket p {
      margin: 10px 0; /* Agregamos un margen de 10px arriba y abajo */
    }
    
    .ticket::before,
    .ticket::after {
      content: '';
      position: absolute;
      top: 0;
      height: 100%;
      background-color: gold;
      z-index: -1;
    }
    
    .ticket::before {
      left: -5px;
      width: 5px;
    }
    
    .ticket::after {
      right: -5px;
      width: 5px;
    }
    
    .ticket:hover {
      transform: translateY(-5px);
    }


    .hamburger-container {
      position: fixed;
      top: 0;
      left: 0;
      pointer-events: none;
    }

    .hamburger {
      position: absolute;
      display: block;
      width: 30px;
      height: 30px;
      border-radius: 20px;
      background-image: url('https://img.freepik.com/vector-premium/kawaii-comida-hamburguesa-queso-vector-dibujado-mano-ilustracion-dibujos-animados-lindo-japon-anime-manga-pegatina-estilo_386815-939.jpg');
      background-size: cover;
      animation: fallAnimation 3s infinite linear;
    }

    @keyframes fallAnimation {
      0% {
        transform: translateY(-100px);
        opacity: 0;
      }
      100% {
        transform: translateY(100vh);
        opacity: 1;
      }
    }
  </style>
</head>
<body>
<div class="hamburger-container"></div>
  <div class="ticket">
    <p>Ticket 01</p>
    <p>Daniel Muñoz</p>
  </div>

  <script>
    const ticket = document.querySelector('.ticket');
    const maxTranslate = 6;
    const translateStep = 0.3;
    let translateY = 0;
    let isFloatingUp = true;

    function floatTicket() {
      if (isFloatingUp) {
        translateY -= translateStep;

        if (translateY <= -maxTranslate) {
          isFloatingUp = false;
        }
      } else {
        translateY += translateStep;

        if (translateY >= maxTranslate) {
          isFloatingUp = true;
        }
      }

      ticket.style.transform = `translateY(${translateY}px)`;

      requestAnimationFrame(floatTicket);
    }

    floatTicket();
  </script>

<script>
    function createHamburger() {
      const hamburgerContainer = document.querySelector('.hamburger-container');
      const hamburger = document.createElement('div');
      hamburger.classList.add('hamburger');
      hamburger.style.left = Math.random() * 100 + 'vw';
      hamburger.style.animationDuration = Math.random() * 3 + 2 + 's';
      hamburgerContainer.appendChild(hamburger);

      setTimeout(() => {
        hamburger.remove();
      }, 5000);
    }

    function startRainingHamburgers() {
      setInterval(createHamburger, 200);
    }

    startRainingHamburgers();
  </script>


</body>
</html>
