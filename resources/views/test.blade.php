<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
<body>
<canvas class="canvas" id="myCanvas" >

</canvas>
<script>
    const canvas = document.getElementById('myCanvas');
    const context = canvas.getContext('2d');
    context.fillStyle = 'red'; 
    context.fillRect(50, 50, 100, 100);
    context.strokeStyle = 'blue';
    context.strokeRect(200, 50, 100, 100);
    context.clearRect(75, 75, 50, 50);
    context.font = '24px Arial';
    context.fillStyle = 'black'; 
    context.fillText('Hello, World!', 50, 50);
    const image = new Image();
    image.src = "{{ asset('front/img/blog-1.png') }}";
    image.onload =()=>{
        context.drawImage(image, 100, 100);
    };
    // canvas.toBlob(blob => {
    //     let data = window.URL.createObjectURL(blob);
    //     let link = document.createElement('a');
    //     link.href = data;
    //     link.download = 'feed.jpg';
    //     link.click();
    // }, 'image/jpeg');
</script>
</body>
</html>