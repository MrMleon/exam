<?php


?>
<!DOCTYPE html>
<html>
<head>
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/easySlider1.5.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $("#slider").easySlider({
                auto: true,
                continuous: true
            });
        });
    </script>

    <style>
        img{border:none;}
        pre{
            display:block;
            font:12px "Courier New", Courier, monospace;
            padding:10px;
            border:1px solid #bae2f0;
            margin:.5em 0;
            width:674px;
        }

        /* image replacement */
        .graphic, #prevBtn, #nextBtn{
            margin:0;
            padding:0;
            display:block;
            overflow:hidden;
            text-indent:-8000px;
        }
        /* // image replacement */


        #container{
            margin:0 auto;
            position:relative;
            text-align:left;
            width:696px;
            margin-bottom:2em;
        }
        #header{
            height:144px;
        }
        #content{
            position:relative;
        }

        /* Easy Slider */

        #slider{}
        #slider ul, #slider li{
            margin:0;
            padding:0;
            list-style:none;
        }
        #slider li{
            /*
                define width and height of list item (slide)
                entire slider area will adjust according to the parameters provided here
            */
            width:696px;
            height:241px;
            overflow:hidden;
        }
        #prevBtn, #nextBtn{
            display:block;
            width:30px;
            height:77px;
            position:absolute;
            left:-30px;
            top:71px;
        }
        #nextBtn{
            left:696px;
        }
    </style>

</head>
<body>

<div id="container">

    <div id="header"></div>

    <div id="content">

        <div id="slider">
            <ul>
                <li><img src="images/news.jpg" alt=""><p>Sed pharetra libero non odio rutrum, id vehicula est gravida.</p></li>
                <li><img src="images/new_news.png" alt=""><p>Id vehicula est gravida.</p></li>
                <li><img src="images/one_more.jpg" alt=""><p>Sed pharetra libero non odio rutrum.</p></li>
                <li><img src="images/first_news.gif" alt=""></li>
                <li><img src="images/third.jpg" alt=""><p>Sed pharetra vehicula est gravida.</p></li>
            </ul>
        </div>
</body>
</html>
