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
      perspective: 1000px;
    }
    
    .ticket {
      width: 200px;
      height: 100px;
      background-color: gold;
      border-radius: 5px;
      display: flex;
      justify-content: center;
      align-items: center;
      font-family: Arial, sans-serif;
      font-size: 24px;
      color: white;
      cursor: pointer;
      transition: transform 0.3s ease;
      transform-style: preserve-3d;
    }
    
    .ticket::before,
    .ticket::after {
      content: '';
      position: absolute;
      top: 0;
      height: 100%;
      background-color: gold;
      z-index: -1;
      transform-origin: center;
      transform-style: preserve-3d;
    }
    
    .ticket::before {
      left: -5px;
      width: 5px;
      transform: skewY(-45deg);
    }
    
    .ticket::after {
      right: -5px;
      width: 5px;
      transform: skewY(45deg);
    }
    
    .ticket:hover {
      transform: scale(1.2) rotateX(20deg) rotateY(20deg);
    }
  </style>
</head>
<body>
  <div class="ticket">
    Ticket 01
  </div>

  <script>
    const ticket = document.querySelector('.ticket');
    const maxRotate = 20;
    const rotateStep = 0.2;
    let rotateX = 0;
    let rotateY = 0;
    let isMoving = true;

    function moveTicket() {
      if (isMoving) {
        rotateX += rotateStep;
        rotateY += rotateStep;

        if (rotateX > maxRotate) {
          rotateX = -maxRotate;
        }
        if (rotateY > maxRotate) {
          rotateY = -maxRotate;
        }

        ticket.style.transform = `scale(1.2) rotateX(${rotateX}deg) rotateY(${rotateY}deg)`;
      }

      requestAnimationFrame(moveTicket);
    }

    moveTicket();

    ticket.addEventListener('mouseenter', () => {
      isMoving = false;
    });

    ticket.addEventListener('mouseleave', () => {
      isMoving = true;
    });
  </script>
</body>
</html>
