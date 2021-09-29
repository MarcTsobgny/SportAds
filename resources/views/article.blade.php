@extends('layouts.app')

@section('content')

    <div class="container">

        <div class="row">

            <div class="col">
                @if (session()->has('success'))
                    <div class="alert alert-success">
                        {{ session()->get('success') }}
                    </div>
                @endif
                {{-- edit link icon --}}
                @auth
                    <a href="{{ route('post.edit', ['id' => $post->id]) }}">
                        <svg style="color:blue" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-pencil-square" viewBox="0 0 16 16">
                            <path
                                d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                            <path fill-rule="evenodd"
                                d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                        </svg>

                        {{-- delete link icon --}}
                        <a href="{{ route('post.delete', ['id' => $post->id]) }}"
                            onclick="return confirm('Etes vous de vouloir supprimer cette annonce?')">
                            <svg style="color: red" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                fill="currentColor" class="bi bi-x-circle-fill" viewBox="0 0 16 16">
                                <path
                                    d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293 5.354 4.646z" />
                            </svg>


                        </a>
                    @endauth
                    <div class="container shadow-lg">
                        <h1 class="font-weight-bold">{{ $post->title }}</h1>
                        <hr>
                        <div class="" style=" margin-right: 2%">
                            <img class="shadow-lg img-thumbnail " src="{{ Storage::url(getImage($post->image_id)->path) }}"
                                style=" height: 350px; width:50%;" alt="Animations CSS modernes">
                        </div>
                        <div style=" display: inline; font-size: 120% ; text-align: justify; " class="d-inline-block"
                            style="vertical-align: top">
                            {{ $post->content }} Lorem ipsum dolor sit amet consectetur adipisicing elit. Deserunt
                            magni fgfgfgexpedita sapiente quidem at distinctio est dolore explicabo, sint omnis, ipsum
                            necessitatibus, tenetur repudiandae quod similique voluptas tempora labore cum?
                            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Praesentium quia labore illum quaerat
                            est vel voluptas ullam dolore amet odit exercitationem autem, necessitatibus dicta voluptatibus
                            dignissimos, sed repellendus repudiandae. Sint.
                            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Praesentium veniam dolorum quasi ullam
                            ducimus nihil quo ab nam necessitatibus fugit iusto totam dignissimos aperiam sit fugiat,
                            voluptatum quia reiciendis. Porro.
                        </div>
                        <hr>
                        <span class="text-primary">
                            Rédiger le {{ $post->created_at->format('d/m/Y') }}

                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-eye" viewBox="0 0 16 16">
                                <path
                                    d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z" />
                                <path
                                    d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z" />
                            </svg>
                            {{ $post->view_number }}

                            {{-- comment icon --}}
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-chat" viewBox="0 0 16 16">
                                <path
                                    d="M2.678 11.894a1 1 0 0 1 .287.801 10.97 10.97 0 0 1-.398 2c1.395-.323 2.247-.697 2.634-.893a1 1 0 0 1 .71-.074A8.06 8.06 0 0 0 8 14c3.996 0 7-2.807 7-6 0-3.192-3.004-6-7-6S1 4.808 1 8c0 1.468.617 2.83 1.678 3.894zm-.493 3.905a21.682 21.682 0 0 1-.713.129c-.2.032-.352-.176-.273-.362a9.68 9.68 0 0 0 .244-.637l.003-.01c.248-.72.45-1.548.524-2.319C.743 11.37 0 9.76 0 8c0-3.866 3.582-7 8-7s8 3.134 8 7-3.582 7-8 7a9.06 9.06 0 0 1-2.347-.306c-.52.263-1.639.742-3.468 1.105z" />
                            </svg>
                            {{ getCommentCount($post->id) }}
                            {{-- {{ $post->comment_number }} --}}

                            {{-- share icon --}}
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-share" viewBox="0 0 16 16">
                                <path
                                    d="M13.5 1a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3zM11 2.5a2.5 2.5 0 1 1 .603 1.628l-6.718 3.12a2.499 2.499 0 0 1 0 1.504l6.718 3.12a2.5 2.5 0 1 1-.488.876l-6.718-3.12a2.5 2.5 0 1 1 0-3.256l6.718-3.12A2.5 2.5 0 0 1 11 2.5zm-8.5 4a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3zm11 5.5a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3z" />
                            </svg> 0

                            By {{ getUser($post->user_id)->name }}
                        </span>
                    </div>
            </div>
        </div>
        <br>

    </div>


    <style>
        /* Chat containers */
        .chat-container {
            border: 2px solid #dededefa;
            background-color: #f1f1f19a;
            border-radius: 5px;
            padding: 5px;
            margin: 5px 0px 0px 0px;
            width: 85%;
        }



        /* Darker chat container */
        .darker {
            border-color: rgb(204, 204, 204);
            /* background-color: rgb(221, 221, 221); */
            background-color: rgba(37, 182, 37, 0.5);
        }

        /* Clear floats */
        .chat-container::after {
            content: "";
            clear: both;
            display: table;
        }

        /* Style images */
        .chat-container img {
            float: left;
            max-width: 60px;
            width: 40px;
            margin-right: 10px;
            border-radius: 50%;
        }

        /* Style the right image */
        .chat-container .right {
            float: right;
            margin-left: 10px;
            margin-right: 0;
        }


        /* Style time text */
        .time-right {
            float: right;
            color: #aaa;
        }

        /* Style time text */
        .time-left {
            float: left;
            color: #999;
        }

        .flex-textarea {
            display: block;
            width: 60%;
            overflow: hidden;
            resize: both;
            min-height: 40px;
            line-height: 20px;
            padding: 1% 1%;
            box-shadow: 0px 0px 2px 2px rgb(37, 182, 37);
            margin-left: 2%;
        }

        .flex-textarea[contenteditable]:empty::before {
            content: "Entrez votre commentaire ici";
            /* color: rgb(13, 31, 110); */
        }

    </style>
    <!------ Include the above in your HEAD tag ---------->

    {{-- Deuxieme formulaire de commentaire --}}
    <form method="POST" id="commentForm2" action="{{ route('comment.store') }}">
        @csrf

        <input type="hidden" name="cpost_id_js" id="cpost_id_js" value="{{ $post->id }}">
        <div class="container bg-white ">
            <div class="col ">

                <div class="panel-group">
                    <div class="panel panel-danger">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" href="#collapse1">
                                    Commentaires
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                        class="bi bi-caret-down-fill" viewBox="0 0 16 16">
                                        <path
                                            d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z" />
                                    </svg>
                                </a>

                            </h4>
                        </div>
                        <div id="collapse1" class=" panel-collapse collapse {{-- inshow --}} ">
                            <div class="col overflow-auto" style="max-height: 450px; min-height: 100px;"
                                id="comment-container2">

                                @forelse ($comments as $comment)

                                    @guest
                                        <div class="chat-container float-right ">
                                            <div>
                                                <img src="data:image/jpeg;base64,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"
                                                    class="right" alt="Avatar">

                                                <strong class="right"> {{ getUser($comment->user_id)->name }}
                                                </strong>
                                            </div> <br>
                                            <p class="">{{ $comment->content }}</p>
                                            <br>
                                            <span
                                                class="
                                                time-left">
                                                {{ Carbon\Carbon::parse($comment->created_at)->diffForHumans() }}</span>
                                        </div>
                                    @else


                                        @if (Auth::user()->id != $comment->user_id)

                                            <div class="chat-container float-right">
                                                <div>
                                                    <img src="data:image/jpeg;base64,/9j/4AAQSkZJRgABAQAAAQABAAD/2wCEAAoHCBYWFRgWFRYZGBgaGhgZGhoaGBgYGBgYGBgZGRgYGBgcIS4lHB4rHxgZJjgmKy8xNTU1GiQ7QDszPy40NTEBDAwMEA8QHxISHjQkJSs0NDQ0NDQ0NDQ0NDQ0NDQ0NDQ0NDQ0NDQ0NDQ0NDQ0NDQ0NDQ0NDQ0NDQ0NDQ0NDQ0NP/AABEIALEBHAMBIgACEQEDEQH/xAAcAAACAgMBAQAAAAAAAAAAAAAEBQMGAAIHAQj/xAA/EAABAwMCAwYEAwUHBAMAAAABAAIRAwQhBTESQVEGImFxgaEykbHwE8HRFEJSguEjYnKSssLxBxUkM3ODov/EABkBAAMBAQEAAAAAAAAAAAAAAAECAwQABf/EACYRAAMAAgICAQQDAQEAAAAAAAABAgMRITESQQQiMlFxYYGxkRP/2gAMAwEAAhEDEQA/AJ9bpw4iFXarYKveu2RkmFTrylBKuZmgUOQd2FOCoq6RkKnTASharsouoEI8JfZSSa3KJe3CEoownCp6EfYurGJKUXVwXYbsiNTuC5xaOW6DY0/CNzjyUW9mzHPiuezejTG3zKjqVIJa2I2kdPBSPbADWnB3PhKFc6MIFDbg6lZ+JiAAPHmVoAVgCJxuH+J+a9I+5W1OkeinZbHEJlLYrpIia0ePlyW76hJmB9+QRDLd0xEHzymLNKD2yGmU84afQlZJXYDU74G07e26mdbYZLxAEeOSTgDr+iYW2lnLT0+x8ijmdnx8Uk56clV4KrkRZ5ngrleA2IyDvO48uSFNTi7se+Qrjd9nXCJBA35IC67MvaOMN4mnywkr41LoafkS+2L7Zh4IId3eZz3T/VaOKkqWz2NkghsxOcT16ryowHLdue+DzwchR05fjQ1JP6pB3LRTQtCxMIjyV6vF61cczakcoh+ygYzKIIwuFa5AnBaqRzVGFw5hXhW3CsIQCeBbLUFbSuOZ9M6pp/EJC5x2hsyxxwuvEKndqtPkEwmmhbn2ctqMhRVEwuaUEoF4TMjS4F9RCuRdYIGop+wSS0iprqtwMJ58vFQ0AhtZrcMRuPuUafA8T5UJ69SMc+akt28+mPMmcoMZKI4iB5n/AIUzWbUn8J4jmJAHl9lCSi6jYEeX9VC4InGrZKPtrQnYSVFb0ZT2ycGgDmrY432SutdAVO2MxCNoW8EQmP4YPL1XraZb4haplIz1TYwt9Ma4bAk7dZR2m2gY4tcN8c8eKCsLrhIHL6J80ccEb4yZ2Az3vCAqdEmQ/sYDh+ib21juDyGcggRvHVeCn4TwmD0Jadp6+eyIs8uABxPMZAB2Pih5M5JEl3Zd0YlRtte4RHIg+HRNKpnGwx0A/wCUNcv4GOBzBjoCc+/muVPoWpS5FbdJZUovBaCSDPiuY6rpz7eqWOBLT8B3kfqJhdd0h+DJwf0QXafQPx7Z5b8bDxMPiOXkRI9VHPO/2XwVrg5AVsNl7XOxIicx9fdSWFhUqk8DSQN3HDG/4nHAWVclnOmCvC2ajr3T2sb/AOwPfzDASweHHzPkEVpOlF4kozLp6C/pXIuYwnkjaVk93JOv2JrDlNrBrMLQsC1yTeX8Ip1xpbwJhKXtg5XaqOnMe3AVB7X6A6meNowo3CXRSa8uypArCpnWrgMqCUhzRqQvFuV4gHZ9ZoHUrYPYUevCEqeh2tnH9csCx56JBcUCMwuodp7AGYCqtXSJbuqKtoz3JRrgJdWcR+5PqQnWr2xY4g+iHp0Q9mIkSCkpvXA/xYmq1Qso3jB8Qc3z7w+YS3VWuc7jHeZ1bkevT1TS7s4CUlzmGWmPvmlVeXZqvAoe5FzBlEDMjmSIRFQMPeiDzjY+KgZh88pHyRYiNK52CltmScrW5cCRHT3RVhSmE0LbFp6QxpW4IkKX8MjktmUSNipmPOxC1SjM2eUq5GEwoXEqBjGndE0rMO2KskTpoLZbgkEe2ybWFVzTwu23wJ8/LE7IKzsSIO/hMT6pvatEQ9pB68kRAyg90lwaCIIIyOWDnmMeK8ZdFj5O0hG2tKGkTMxEAdThxnG3sFBWtsn5/wBEE0ckO6LuKCTgZ85AG/PmgrwF5jlvPjOYUtoyWAdR5RB6BSVSPhbv4bbRCEvTDU7QCXcDeEb9OfmfmnFi6acHmlbNPIl3qT/X5Lb9r4S0bjl6GPyKNLyXAsV4vk5/qPZ4Ov6tLZnHxgA/uvh58gC4j0RL9PNUhjBw0WGGMGA6D8bv4nHfOyt2q0QLh1Uc6MeMzA/1+ygsmNbEwBsFjqdcHp4mn9RRu1Fm2kaTBu6XHyGB9+CdaW0Np+iXdpB+LdPd/BwsHoJPuSpX3PAyPBUhaI5HtgV/dS4rLW6IKT1LiXFMbGkXbK6pMz0tHQOzl8DElWLVNMZUYZEyFzKlWfSM8lfNN1YvpAneFmyd8FcfRz3tNYNpsPUKjSrr20veN5aPVUtzYUirZsCvFq1bwuAfWaxYsSFBTrNKWpDdUwArhVphwgqv6xYHhMBK+CdLRyzti4cTY3zKq1tcljv7pwf1Vj7R0TxmVV7gQml8EZrVbQyqnG+/NJLujn7yj7eqOGHHmA3zPJQ3bCPEIeOnweisnnPIqDOv2FAxhnHWEa9soS2dkjqfyK4kyOq3J8ITXSqM5lKyO9Cb6UYcPNVxkqGjaTgOq2pOM5CsFrZcVNzj1n0VZ1G5PEWtwBjzWhPRFyM2VGAd4j2RVvWpOHxAOVaZauduYWz7CP306piOF+S7W2oMDgCQGnhyJMfPc7nfmn9KtTdAHr/CR18FydjHN/eKe6ReuwxzoBxOYGecZhFUmI4aOhMYGd5plp3BzvifRb3bYcCJ4SMTE+yT6VdcbeA/ET3doPgSfb5c0xY8uYMZaYJJzw4ER5ovsCYfZ1YZPgR6ff0WrKrWDifOemZ8F5bMlkYmT4b8ifT3UV/XaAJEgA93lJb8U+cY8EPYW9Auq6+1g4Y73IDIE7pN/wBzqud3GdcxnJlA3921ri92XOPmT5KKnrn4eXFjecOeOLl+6AU/lMi+DrktouH1KUOb32wMiJZIJH0PoUs1m8/Z6L60guEMYP775+ga4+i20HtNSrEsc4AkQBIk4nHrPlzSj/qA8NoW7AT3nvfneGNDBP8AnKy5Nb2jZDcz4sqVLUzxS4ySZJ6k5JR7rnjG6rVcIuwueRSzXo6l7DW0cqy9nmAOgqtvqxlGWGo8LgZVlqUTrdF/u9Oa9oUj4p0o6BLbbUpal2vakeAiVPWwJ64KtqlwH1XlKarcrdj5J817UGVn3yWaBoXsrctWiY4+tFihbcsP7wUoKQoYoLtgLTKnUNye6UtdAfRyXtvbBrpG2Vzu6OV0ztiwuJHRc1vGQV09GZL6gG8H9kT/AHh9CpKF+17AHHv7EHn4j9Frck/huA6gny+yUmcE3s0z0OnAYPj/AMpaRwvdHLI9Nlva3kDhdkcjzH6ha1mw4+S4bZlZmQeaY6Q/vtB2JH1S57MidsZ9imWlM/tWA/xAe6fH2JZ1HUGfh2zo3jA55H6Fc6eOEyd10DtBVikZnECOpjn1XNrl5cSOvp8yqt6Fa29Hpuy53CwOJ5Bokny8PFb3DHtHE9gaCY774JIG0BWXsfaU2OaHjLhDjiZ3wen6Ijth2WfV4XMcAWzh0w4OIJOBM+iw18qlfi+F+TQsCU7KdcUnsDHFj2cY4mcUuY9uMscp7C6kgc/zT260qoLdjKr3PaxkN4nEtZnZgPwqo0H5B9D+RVsObyb16JZcWkdC0m7HCTJDoiIwWmQ6Ty5fNWu3ews7rTkCSfIZEGMmR6DxXP8ARKxxwE8cgADck4wrXp9YYAOYyBjhdJEHrjp1W9PZia0y02AaGGRP6iBv5JTqjARLsDmYnG8wmdgZaR9do+qXa2BwGJPdf6DgMN+Q3RXYK9HOdWt6rqL7gNPA3DYnLZhxxnhGZ8vAozs1SoXNjwG3H4zKnEawYwcYJPccQJMA/wClXDs/r9D9npsrsNNwYBBG4GJbO7TG6Kq6paNZ/ZuAjkAD7NkryMlZsjaSfPX6PTiYjXKKlV7Pfg3Fs+i099kuEu7r2uLXDi3HEBxR4GEp7Z13PrtDgAG06fC0cuNoe6fHicfZXjSnOuKzHFsU2OET8RJnvQPgA4j13zgrnvabi/aazX/EyrUZ/K15DCP5OFaZVTKVdksrmm3IguGoei+CirhAc0fYq5Q3D5C3pFeWje6tXmFftEumWzSqxLQJSrtFcRKn0KSgu1DIQfE8Cp7oQ2z8op5QNtujHjCz+zQ1tHi0XoKxEmXSl2huZB4ir72X7VPfDXhV6105m8Jjb2zW5GCtFYFoVZmdLpVg4SCvajZCqmiXb3OjOFbQslS1wy6e1sqWuaeCHSFxvtJbcFQgbLvOtvAaVxPtWyahKWXyTrhlWrDuO9J8tknhPXRwvkT3T8+SSRlO+yk9GgU10Mg9QD81D1RNz8LTzgLhjAeJhHQg+hEfkjNPqEVGGdyz6iUBbPzHUQiKDCGTza+PmAR7gppemCujrPaqhNMHrH6j6qiupArpFUCtZMfvNMTHkFz1z+F0HkrrXROl7IKVaow91xEciJHvt6J5b9q7gN4XOaW7Du/PM+Shosa5pBaDMb74RLLGnkgAdARv5bx80Hgmnyk/2BZaXTA77UqtdsEAtIgiCB5YVcuLeHQ0R6yI8FdLrmTDjIdmTJ9cnfKSXFIZPy268z98kyxTK4WhXkp9vYPYPIgz4FWbS7uCMDEcsEAzkDc8sqpsdBgJ3Y1TAIPrHXlPzTyTpHS9GqyCJ3G3XbH30Wl5kkHqQZxkgj6oHs5XExzIj18kVfmCY24gfEEGDn1+iolySroQ1dGbU+LiLs96STt/T2U1DsyAe688MYBEnoMjmN0xsXhzIO87yeU8kzY0AdR15hCpKTW+yLT7UU4xBEeEjeY8d5XMO3A/8+5I2c5jvD/1sldMubshwAzsJnYbLkvbO4m9qR/GQf5eFn5FZ878dGrDHnNfwkJbhBNGUfcNWltbZU1Lb4AnpDKzp91R1GZR1IhrYUPBxFaNcEX2PtAACB7WU8SFLpby1wCaaja/iMXNcaJp6rZzekYTBpkI650fh5KJlkVnrHSNM5JYARCxHVLB3RDG3d0KHiwNo6rpwwMoxwhV7TdS2COurohsrc+zNsu/Zlg36qzlcw7Ma4WnhKvtLUA9qw5X9TNWP7RXr9U59VyTtAJefNddvaHHKoWv6P3pbuoLs6lsoFa3Ia4jfhKrkZyeqvurWYZScecH0VCDe9j7wnHlcEfVEuywdQMeIH2fkhjuVO3LPESFwxCx31RlIcReJ3aT5lufpxIBiJt6kPaeU58jg+xKK7Add/6eXoqWfATlhLSP7pyCqn2itiyq6Oqi7Gal+z1X03GAZHqDg+v5phrr+PiJ67+g/Qq6/Ir6E1reFpyU7t9SbiVWC4bKRjlWaI0i1V7gEcswfHHRK7tw25fOEEysVJWdLd5mOuN8JmxNaAKL5fCsNg2CFW3sLTxBS0tT4dyR5j81ObU9lHPl0dO0Uw4JteOyRC59p+ukQeMddk9drbqhAaJJxIEAeJVZyy3xyJWGktvhDO1fwvI2Ez5znP3yRd1qAaMb4Svg4RvMjJPU7kdELWM5OyrrfZBVpaQW26AcXu2HeJ8pk+S5ZdV/xLhzju/id/M4l35qzdq9R4KBa3988Hpu72EeqpFKqTVDjzPt0WD5T3Wl6R6fw6UTz7a/4P2W8gKenSA5I6yoBzAfT5be0Kc2a1YFLhV+UZfkbjK5/DYrqUui0twQU0dRhb29qCdk1Su0Tmt9kFMGVYLOoOEBes04RMLdlrCTxFdIir2vGcId9hw8k2t3BuFPUph6ZMXoT0LVruSm/wCxNOYTS3tIRYplBtDLk5xp1QseJVxBD2eipNcwZCdabqBIATT1phrnlDOxtw14I6roek08CVRNPfxOV70yp3QsnyElwi2FtrbCbl4aVWNYqtyU61KoTskGpUC5hMLIirKZrTw6m7H2cLnLnS6dsrp+tUIoyN+JoPqYXMKgyfNOhp6Inboi3jgIPUx5kD9EPU3U9sJDh5H8vzCIUDc1Jw7hR1RBUruR6hccG/iyWP5wA7/E3E+ohOad7Ih2+3oq0x+49fVGUakhVl8CMnuBDsLenUURfOFgamQjDmGVM0ISiUQ14VExH2SOYFqLMO5LX8cKandAbujwH6pXS9hmafRNQ0EyACQCeQV2sLFrGtAEQI8fVUsas1vwuPlKOo9o6IiTwu80ZuZfAaxVS02Xg0OJsEbjCSXIMR0Xml9pGPPATLuR6jxRNZ7QXOOBkq6vjZm/82nplM7d23CygZyQ+R0yyDHoVTqWHA9CPrlWvtfemoLd+wdTc4DzAwqvSZIMchPyOV5cXVp0/bf+nqOFL0vSRfOzEOY5v8Jj5Y+kJzUpQq52dugxz28nBjx6tGPc/JPHXYK9H432a/Zi+S3V+T74IqjFLZtEoG6uoXum3WVSqXRNY347LXQbhSGkoLapIRQK4kAXNOMoWnqHCYKaXDMKr6qyMhc+h4W3pl20uq1/NNH2wnZcv0PXjTeA7ZXo640wZ5KDbZseCfRy3jlMdOp9OaT03AlXDsjTa+qAQNk7fGzOkug/S7V7TPDhXbRhxtCYUtObwbcl7pNrwOd0WG7dM0zPigipYAtVd1VnA0hXCq6ASqD2nuskNSPh6BT0UzW6zixwHVvuYK5rdgcZ810DUK806g57+gKoeqMh5n75z7pkGegR+4U1n8RB2IP5foFC/kj9Ob3XmBiO90HQLm9IeVti+43W7MtHnHzWXQ72Nj9wvLc7j1HmEQHjxn2WzHwVrW3CwJ0Kxgx4IUjSltN8ItlSUyYrQbTevS2cT8kO1ymaYTdoRo1ZZT++UxstIpE98uP8x/VLy8+q3pPqT3Uuv4KKtdluoaBbQHZP8x6eab2NK2p/DTZ5wPf75qn21vcvwHx5BGM0G4BHG9xB8x4FUmX6QKyIuVWuxzDAHFjIAxB2++qrHa2/4LYwYc/uN9Z4j/ln5hOLS0LWiTy+i5x2r1L8asQ09xktb0J/ed8/oE+R+MkYXlWyXWKgNvZnox4Po4BLdOcOOORDm/MfqiL13/jWv/3f6wltI5+a8/EtT/b/ANZ6GR7r9pf4WKzkBjv4g5vk5suj/wDSLt7uUHav7p/xNcPXGP8AN7L2wpkPLTyMLZgppuTLmlNJhd4/C302SZCmvrbCho3IYFda3yPDVSWSzuiIBTuldDmqjpd0HuHRPLlhaMIeX4J5sKWmhhc3TQFWryuHlbXFRxCSVa5a5d5cCTjaej29tOYWU75wEZRYeSJQVRwlB/wappTwwa2p5Vi0SoadVj52OfIpZb0UzpswnU8aPPdc7OwadqjXMBnkjLW4aTIK47Q1d9LAOEVpna1zXFpPNYrw0nwa4yKkdZ1Gv3YCrNbTeKSVBaa+HxmU4bdt4FN46XLO2mc41/TuEujGDPouaas0cZM75jp4LrfaWvLjHR30XKdaZkEDcZPlj9VyGnoWO3CYaTTLi7blufPbxQLxkKWzrhpMgkmIyjSbXA8NJ8nl23ptMeRQ1J0FF3Y3PkSgVyFYTXj3leAL2qO79+i1YU0i0YWr1pIUwavPw0wNm9Oqjab0uFP0UjC4IpgGrITCxPC4ERv0H5pEy4jfCKo3kHdUmkI0X6wa0AHw/UJwajTgnI9R6Lnlvq0IkdoeEFxJgdM+S0KpJOWNe2mrfg0Cxp77+62Nw3953yx6hcuR2r6k+4eXu8mjoBy/NC0KDnmGrHlvye/Rpxy0tew+9f8A2FsOjavvUP6IFwhxHmibv4KbTu38QH/MSobj4/l/pChHX9v/AEtT5X9f4OOz7mvcGPLsw3u7gOOInnxFvyTK2YRU7wh2zgcEOHddPqFW9LfDxkjpHXl7wrLqL4fxjih0OBduQ9occ8+/xifBVw1rIJlW8e0Pa/CWqsX4ElE/txhL7h8laraaIYnrgN0d5Y8dFaru7HCFU7J8Im+uyRhTlcDXT8khoaoLSJSO8Z3pUTLpwRtFvG1FdaL3ac+RJb3Y4YQ73AmV7T04l2Ef/wBmcgn48GfLfk9hNtQxKLp08ImzpjhU7KK16MTEd/TwVXqjSHSrvd26rdxaw7ZLU7RSK0GaRdFsZVlt9Qeeaq1C3hObJ2F0rjTGrvaCNUZxMcf7p+i5lqrDjoJPqTMLpGpXPDSeR/CVzi8zxTmHj3/qFlzpJo0YftYsqDvLKFXhdxATv7reqO+VAzms5UPqkOZPMiUsKPtst9YH36oN4ifAonMnflvyHso6ale3utI8B7Fat3RkDJ2FSNC8psU4pYPp9+ypok2aBinpUpWjGI62YmSFbPWWYO4lTM0hh3bHkXD80wtGAppRtlSYTJOmhXb6PSH7k+ZcfYlDa5QH4LwGhoAkAAACIPJWM0vRBa4wCi8blzC0eLjgQOas5Sl/oSabpfs5mjtK+Md2cjcwPVD12Bri0HbHXMZ95UunNl4ET4TExyleZXKZ6UcUiS+ZHENoqOHWJ/LC1vWxHiAfb/heVqodx8IIBIcB0jB+vspbl2Gnfh4R6OYI/Jcujq1t6BaGIPirNUqB9NnDOAQ+doaRwFvo7KrVNuT0Gfv2T6w77HRjh38RBAPoWt/zIr7kxd/S0aOaoSUSHYWoYtjWzOno1Y4oukyd1G1iKoDKMyLVbNnWWJU9h3cFNbOmC2FtVswMrnK2KsnGibTmguT9jBCr1qOEpvTr4S1PIPIEs9kexYsWpkQe6SW5WLEfR3s9bsjLRYsSvsp6INU+B3kqHX+J/wDjH+9YsWL5H3GrD9ovqfEVDT5/fNYsUCrC7X4f5j/pCFuPid5rFi443Gw8x9CsCxYiuwMMocka3ZYsVl0RZjUVRWLEyFY4sE9p8l4sVoI0ZU/MJF2k3Z5/7SsWJ8n2P9Aw/ev2c9W9HdYsXms9D2bUPiPkUVW+F3lT+gWLETiF3xen5p1pfwO/+P8A3hYsXAPGqRqxYtqMzJWomjuvFiZCMsNgjK2yxYh7JkNNFM2WLEGcf//Z"
                                                        class="right img-responsive" alt="Avatar">

                                                    <strong class="right"> {{ getUser($comment->user_id)->name }}
                                                    </strong>

                                                </div> <br>
                                                <p class="">{{ $comment->content }}</p>
                                                <br>
                                                <span
                                                    class="
                                                    time-left">
                                                    {{ Carbon\Carbon::parse($comment->created_at)->diffForHumans() }}</span>
                                            </div>



                                        @else
                                            {{-- message envoyeur --}}
                                            <div class="chat-container darker float-left" id="senderContainer">

                                                <div>
                                                    <img src="data:image/jpeg;base64,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"
                                                        class="img-responsive" alt="Avatar">
                                                    {{-- <strong> {{ getUser($comment->user_id)->name }} </strong> --}}
                                                    <strong> Vous </strong>

                                                </div>

                                                <p>{{ $comment->content }}</p>
                                                <span
                                                    class="time-right">{{ Carbon\Carbon::parse($comment->created_at)->diffForHumans() }}</span>
                                            </div>
                                        @endif
                                    @endguest
                                @empty
                                    <span>Pas de commentaires</span>
                                @endforelse



                            </div>

                        </div>
                        <div class="panel-footer" style="margin-top: 10px;">
                            <div class="form-group">
                                {{-- <input id="btn-input " type="text" class="form-control input-sm"
                                    placeholder="Type your message here..." /> --}}
                                <span id="content" name="content" class=" flex-textarea" role="textbox"
                                    contenteditable></span>
                                <span class="input-group-btn" style="margin-left: 1.8% ">
                                    @auth

                                        <button type="submit" class="btn btn-success btn-md" id="btn-chat"> Send</button>
                                    @else
                                        <a href="{{ route('login') }}" class="btn btn-success btn-md" id="btn-chat">
                                            Send</a>
                                    @endauth
                                </span>
                            </div>
                        </div>
                    </div>
                </div>



            </div>
        </div>
    </form>
    <hr>
    <h4 class="font-bold text-blue-100 alert bg-light">
        Articles suggérés
    </h4>
    <div class="row">
        @foreach ($postCat as $post)

            <div class="col-12 col-lg-4">

                <div class="card mb-4 mb-lg-4 shadow " id="card">
                    <div class="card-header text-right bg-success" style="height:40px">
                        <h5 class="float-right">

                            {{-- category --}}
                            {{ getCategory($post->category_id)->name }}
                            <img src="{{ Storage::url(getImage(getCategory($post->category_id)->image_id)->path) }}"
                                width="10%" height="10%" alt="">
                        </h5>

                    </div>
                    <div class="card-body">
                        <h4 class="card-title font-weight-bold">{{ $post->title }}</h5>
                            <img src="{{ Storage::url(getImage($post->image_id)->path) }}" alt="img"
                                class="card-img-top" height="150px">
                            <p class="card-text demo-1">
                                {{ $post->content }}
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Perspiciatis corporis fuga
                                doloribus blanditiis quasi dicta deleniti asperiores veniam, magnam odit nulla quo porro
                                necessitatibus aut eos ut ea quos maiores...
                            </p>
                            <a href="{{ route('posts.show', ['id' => $post->id]) }}"
                                class="btn btn-success {{-- stretched-link --}} ">Lire l'article</a>
                            Redigé par <span class="text-danger">{{ getUser($post->user_id)->name }}</span>
                    </div>
                </div>
            </div>


        @endforeach

    </div>
    {{-- Maintenir le scrrol en bas --}}
    <script>
        var element = document.getElementById("comment-container2");

        element.scrollTop = element.scrollHeight;
    </script>


    <div class="bg-light mt-5">
        <div class="chat-container">
            <div class="row pt-4 pb-3">
                <div class="col">
                    <ul class="list-inline text-center">
                        <li class="list-inline-item"><a href="#">À propos</a></li>
                        <li class="list-inline-item">&middot;</li>
                        <li class="list-inline-item"><a href="#">Vie privée</a></li>
                        <li class="list-inline-item">&middot;</li>
                        <li class="list-inline-item"><a href="#">Conditions d'utilisations</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>


    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    {{-- <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script> --}}
@endsection
