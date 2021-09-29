

// Like action
const likeForms = document.querySelectorAll('#likeForm')

likeForms.forEach(form => {
    form.addEventListener('submit', function (e) {
        e.preventDefault();

        const url = this.getAttribute('action')
        const token = document.querySelector('meta[name="csrf-token"]').content
        const post_id = this.querySelector('#post_id_js').value
        const count = this.querySelector('#likeCount')

        fetch(url, {
            headers: {
                'content-type': 'application/json',
                'X-CSRF-TOKEN': token

            },
            method: 'post',
            body: JSON.stringify({
                id: post_id
            })
        }).then(response => {
            response.json().then(data => {
                console.log(data);
                count.innerHTML = data.count

            })
        }).catch(error => {
            console.log(error)
        })

    })
});


// // comment action
// const commentForm = document.querySelectorAll('#commentForm')

// commentForm.forEach(form => {
//     form.addEventListener('submit', function (e) {
//         e.preventDefault();

//         const url = this.getAttribute('action')
//         console.log(url);
//         const token = document.querySelector('meta[name="csrf-token"]').content
//         const post_id = this.querySelector('#cpost_id_js').value
//         const content = this.querySelector('#content').innerText
//         const commentContainer = this.querySelector('#comment-container')
//         console.log("content :", content)
//         // commentContainer.innerHTML=''

//         if (content != "") {

//             this.querySelector('#content').style.border="1px solid #999"
//             this.querySelector('#content').innerText=""
//             fetch(url, {
//                 headers: {
//                     'content-type': 'application/json',
//                     'X-CSRF-TOKEN': token

//                 },
//                 method: 'post',
//                 body: JSON.stringify({
//                     content: content,
//                     post_id: post_id
//                 })
//             }).then(response => {
//                 response.json().then(data => {
//                     console.log(data);
//                     // <div class="row" >
//                     //     <p class="text-danger" >{{ getUser($comment-> user_id)->name }} __:</p>
//                     //     <p>{{ $comment-> content}} <i
//                     //         style="font-size: 64%">{{ $comment-> created_at -> format('d/m/Y')}}</i> </p>
//                     // </div>
//                     // commentContainer.innerHTML= comment.content
//                     let div = document.createElement("div");
//                     div.classList.add("row")

//                     let p1 = document.createElement("p");
//                     p1.classList.add("text-danger")
//                     p1.innerText = data.user.name
//                     p1.append("__:")

//                     let p2 = document.createElement("p");
//                     p2.innerText = data.comment.content

//                     let i = document.createElement("i");
//                     i.style.fontSize = "64%"
//                     i.innerText = data.date
//                     p2.appendChild(i);

//                     div.appendChild(p1);
//                     div.appendChild(p2);
//                     commentContainer.appendChild(div)
                  
//                 })
//             }).catch(error => {
//                 console.log(error)
//             })
//         }else{
//             // alert('commentaiore requis');
//             this.querySelector('#content').style.border="1px solid red"
//         }

//     })
// });



// comment action 2
const commentForm = document.querySelectorAll('#commentForm2')

commentForm.forEach(form => {
    form.addEventListener('submit', function (e) {
        e.preventDefault();

        const url = this.getAttribute('action')
        console.log(url);
        const token = document.querySelector('meta[name="csrf-token"]').content
        const post_id = this.querySelector('#cpost_id_js').value
        const content = this.querySelector('#content').innerText
        let commentContainer = this.querySelector('#comment-container2')
        // const senderContainer=this.querySelector('#senderContainer');
        // console.log("senderContainer=",senderContainer)
        // console.log("content :", content)
        // commentContainer.innerHTML=''

        if (content != "") {

            this.querySelector('#content').style.border="1px solid #999"
            this.querySelector('#content').innerText=""
            fetch(url, {
                headers: {
                    'content-type': 'application/json',
                    'X-CSRF-TOKEN': token

                },
                method: 'post',
                body: JSON.stringify({
                    content: content,
                    post_id: post_id
                })
            }).then(response => {
                response.json().then(data => {
                    console.log(data);
                    // <div class="row" >
                    //     <p class="text-danger" >{{ getUser($comment-> user_id)->name }} __:</p>
                    //     <p>{{ $comment-> content}} <i
                    //         style="font-size: 64%">{{ $comment-> created_at -> format('d/m/Y')}}</i> </p>
                    // </div>
                    // commentContainer.innerHTML= comment.content
                    let div = document.createElement("div");
                    let img=document.createElement('img');
                    img.src=""
                    img.classList="img-responsive"

                    let strong=document.createElement("strong")
                    strong.innerText="Vous"

                    let p=document.createElement("p");
                    p.innerText=data.comment.content

                    let span=document.createElement("span")
                    span.classList="time-right"

                    let senderContainer=document.createElement('div')
                    senderContainer.classList="chat-container"
                    senderContainer.classList="darker"
                    senderContainer.classList="float-left"
                    // senderContainer.style.borderColor= "#ccc";
                    senderContainer.style.border=" 2px solid #dededefa";
                    senderContainer.style.backgroundColor= "rgba(37, 182, 37,0.5)"
                    senderContainer.style.borderColor="rgb(204, 204, 204)"
                    senderContainer.style.borderRadius="5px"
                    senderContainer.style.padding= "5px"
                    senderContainer.style.margin= "5px 0px 0px 0px"
                    senderContainer.style.width="85%"
                
                    // senderContainer.style.
                    div.appendChild(img)
                    div.appendChild(strong)
                    // alert(div.innerHTML)
                    // alert(senderContainer.innerHTML)
                    senderContainer.appendChild(div)
                    senderContainer.appendChild(p)
                    senderContainer.appendChild(span)
                    // alert("mess box :" +senderContainer.innerHTML)
                    // alert("page box :" +commentContainer.innerHTML)
                    commentContainer.append(senderContainer)

                    var element = document.getElementById("comment-container2");

                    element.scrollTop = element.scrollHeight;
                    
                  
                })
            }).catch(error => {
                console.log(error)
            })
        }else{
            // alert('commentaiore requis');
            this.querySelector('#content').style.border="1px solid red"
        }

    })
});



function search(event) {
    event.preventDefault();
    const words = document.querySelector('#searchInput').value
    console.log(words)

    const url = document.querySelector('#searchForm').getAttribute('action')
    console.log(url)
    axios.post(`${url}`, {
        words: words,
    })
        .then(function (response) {
            console.log(response);

            const posts = response.data.posts;
            console.log(posts);

        })
        .catch(function (error) {
            console.log(error);
        });
}