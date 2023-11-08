<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<script src = "https://cdnjs.cloudflare.com/ajax/libs/tsparticles/1.18.11/tsparticles.min.js"> </script>
<style>
    * {
  margin: 0;
  padding: 0;
}

canvas {
  display: block;
}

#space {
  width: 100%;
  height: 100vh;
  background: black;
}
</style>
<body>
<div id="space"></div>
<script>
    particlesJS("space", {
  "particles": {
    "number": {
      "value": 50,
      "density": {
        "enable": true,
        "value_area": 500
      }
    },
    "color": {
      "value": "#fff"
    },
    "opacity": {
      "value": 1,
      "anim": {
        "enable": true,
        "speed": 8,
        "opacity_min": 0.4,
        "sync": false
      }
    },
    "shape": {
      "type": "circle"
    },
    "size": {
      "value": 5,
      "random": true
    },
    "line_linked": {
      "enable": false
    },
    "move": {
      "enable": true,
      "speed": 3,
      "direction": "right",
      "straight": true
    }
  },
  "interactivity": {
    "detect_on": "canvas",
    "events": {
      "onhover": {
        "enable": false
      },
      "onclick": {
        "enable": false
      }
    }
  }
});
</script>
</body>
</html>