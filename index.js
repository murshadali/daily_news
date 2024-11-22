let heading= document.getElementById('heading')
let summary = document.getElementById('summary');
let div = document.getElementById('current_news_div');

console.log(div);
        let i=1;
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
        },5000)
        
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
            heading.remove();
            summary.remove();
            console.log(data);
            let new_heading = document.createElement('h2');
            let new_summary = document.createElement('p');
            new_heading.classList.add('data-item');
            new_summary.classList.add('data-item');
            new_heading.innerHTML = data.title;
            new_summary.innerHTML = data.summary;
            div.appendChild(new_heading);
            div.appendChild(new_summary);

            setTimeout(()=>{
                new_heading.remove();
                new_summary.remove();
            },5000)
        })
        .catch((err)=>console.log(err))
        }
        
