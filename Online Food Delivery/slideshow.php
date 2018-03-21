<html>
<head>
    <style>
        .container{
            box-shadow: 1px 2px 2px rgba(0, 0, 0, .5);
            position:relative;
            width:100%;
            height:400px;
            border-radius:5px;
            overflow:hidden;
        }
    </style>
</head>
<body>
<div id="imgGallary" class="container">
    <img src="1.jpg" alt="" width="100%" height="400" />
    <img src="2.jpg" alt="" width="100%" height="400" />
    <img src="3.jpg" alt="" width="100%" height="400" />
    <img src="4.jpg" alt="" width="100%" height="400" />
    <img src="5.jpg" alt="" width="100%" height="400" />
    <img src="6.jpg" alt="" width="100%" height="400" />
    <img src="7.jpg" alt="" width="100%" height="400" />
    <img src="8.jpg" alt="" width="100%" height="400" />
</div>
<script>
(function(){
        var imgLen = document.getElementById('imgGallary');
        var images = imgLen.getElementsByTagName('img');
        var counter = 1;

        if(counter <= images.length){
            setInterval(function(){
                images[0].src = images[counter].src;
                console.log(images[counter].src);
                counter++;

                if(counter === images.length){
                    counter = 1;
                }
            },4000);
        }
})();
</script>
</body>
</html>