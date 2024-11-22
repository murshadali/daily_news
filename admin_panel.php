<?php
include 'config.php';
session_start();
if(!(isset($_SESSION['username']) && isset($_SESSION['password'])))
{
    header("location:admin_verify.php");
}
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        .container{
            display: grid;
            grid-template-columns: 1fr 2fr;
            gap:20px;
            height:100%;
            width: 100%;
        }
        .message-container{
            display:;
            width: auto;
            /* border: 1px solid black; */
            border-radius: 3px;
            background-color:floralwhite;
            padding: 20px;
            box-shadow: 0 2px 5px rgba(1, 1, 1, 0.1);
        }
        .message{
            background-color: white;
            padding: 10px;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
            margin:10px auto 10px auto;
            transition-duration: 1s;
        }
        .message:hover{
            transform: scale(1.08);
        }
        .profile{
            /* border:1px solid black; */
            border-radius: 4px;
            width: auto;
            height: 20vh;
            background-color:#9ef0c6;
            text-align:center;
            box-shadow: 0 2px 5px #6dd6a0;
            padding-top: px;
        }
        .profile h2{
            margin:0;
        }
        .description{
            height: 40vh;
            width: auto;
            /* border: 1px solid black; */
            margin-top:10px;
            background-color:#9ef0c6;
            text-align:center;
            box-shadow: 0 2px 5px #6dd6a0;
            border-radius: 4px;
            padding:10px;
        }
        .see-more{
            background-color: #6dd6a0;
            border: none;
            width: 80px;
            height: 30px;
            box-shadow: 0 2px 5px #6dd6c0;
            transition-duration: 0.8s;
            
        }
        .see-more:hover{
            background-color: #69d9a0;
            transform: scale(1.05);
        }
        .data-item {
        opacity: 0;
        transform: translateY(20px);
        animation: fadeIn 0.5s forwards ease-in-out;
        }
        #para{
            color:blueviolet;
        }
        @keyframes fadeIn {
        to {
            opacity: 1;
            transform: translateY(0);
        }
        }
        .actions{
            margin-top:30px;
            display: grid;
            grid-auto-columns: 1fr;
            gap:40px;
        }
        .actions a{
            text-decoration: none;
            color: blue;
            font-size: 1rem;
        }
        .action-button{
            height: 40px;
            border: none;
            border-radius: 5px;
            background-color: #4fc9;
        }
        .full-message{
            width: 100px;
            height: 200px;
            border: 1px solid red;
            position: absolute;
            background-color: #ffadff;
            z-index: 2;
            left: 40%;
            top:40%;

        }
    

    </style>
</head>
<body>
<header>
        <div class="logo">Daily News</div>
        <nav class="navbar">
            <a href="index.php">Home</a>
            <a href="world.php">World</a>
            <a href="politics.php">Politics</a>
            <a href="technology.php">Technology</a>
            <a href="sports.php">Sports</a>
            <a href="entertainment.php">Entertainment</a>
            <a href="about.html">About Us</a>
        </nav>
    </header>
    <main class="container">
        <div class="message-container" id="message_container">
            <h2>Messages</h2>
          
        </div>
        <div>
            <div class="profile">
                <h2><?php echo $_SESSION['username']?></h2>
                <p>hey! you are admin of this news website</p>
            </div>
            <div class="description" id="current_news">
            </div>
            <div class="actions">
                <button class="action-button"><a href="add_article.php">Add New Article</a></button>
                <button class="action-button"><a href="remove_article.php">Remove Article</a></button>
                <button class="action-button"><a href="update_article.php">Update Article</a></button>
                <button class="action-button"><a href="logout.php">Logout!</a></button>
            </div>
        </div>
       
        
    </main>
    <script>
        // let heading= document.getElementById('heading')
        // let summary = document.getElementById('summary');
        let div = document.getElementById('current_news');

        console.log(div);
        let i=0;
        setInterval(()=>{
            let data ={
            "countId":i
            }
            call(data);
            if(i>3){
                i=0;
            }
            else
            {
                i++;
            }
        },3000)
        
        function call(data){
            fetch("newsapi.php",
        {
            'method':'POST',
            headers:{'Content-Type': 'application/json'},
            body:JSON.stringify(data)
        }
        )
        .then(res=> res.json())
        .then((data)=>{
            // heading.remove();
            // summary.remove();
            console.log(data);
            let new_heading = document.createElement('h2');
            let new_summary = document.createElement('p');
            new_heading.classList.add('data-item');
            new_summary.classList.add('data-item');
            new_summary.setAttribute('id','para');
            new_heading.innerHTML = data.title;
            new_summary.innerHTML = data.summary;
            div.appendChild(new_heading);
            div.appendChild(new_summary);

            setTimeout(()=>{
                new_heading.remove();
                new_summary.remove();
            },3000)
        })
        .catch((err)=>console.log(err))
        }

// coding for messages
var success=0;
    let messDiv = document.getElementById('message_container');
    for(let j=0; j<4; j++)
    {
            let data ={
            "countId":j
            }
            messageFun(data);
    }
       

        function messageFun(data){
        fetch("message.php",
        {
            'method':'POST',
            headers:{'Content-Type': 'application/json'},
            body:JSON.stringify(data)
        }
        )
        .then(res=> res.json())
        .then((data)=>{
            // heading.remove();
            // summary.remove();
            console.log(data);
            let name = document.createElement('h3');
            let message= document.createElement('p');
            let Email = document.createElement('p');
            let message_div= document.createElement('div');
            message_div.classList.add('message');
            Email.classList.add('email');
            Email.style.color = "blue"
            // new_summary.setAttribute('id','para');
            name.innerHTML = data.name;
            message.innerHTML = data.message;
            Email.innerHTML = data.email;
            // message.div.appendChild(Email);
            message_div.appendChild(name);
            message_div.appendChild(message);
            message_div.appendChild(Email);
            messDiv.append(message_div);
            success=1;
        })
        .catch((err)=>console.log(err))
        success=1;
        }
        
        let button =document.createElement('button');
        button.classList.add('see-more');
        button.innerHTML="see more"
        if(success)
        {
            messDiv.appendChild(button);
        }

        // let completeMessage = document.createElement('div');
        // completeMessage.classList.add('fmessageull-')
        // document.body.appendChild(completeMessage);
        
    </script>
</body>
</html>