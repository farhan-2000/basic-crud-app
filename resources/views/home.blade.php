<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    @auth
    <p>Congrats! You are successfully Loged In</p>
    <form action="/logout" method="POST">
        @csrf
        <button>Log Out</button>
    
    </form>
    <div style="border: 3px solid black;">
        <h2>Create a New Post</h2>
        <form action="/create-post" method="POST">
            @csrf
            <input type="text" name="title" placeholder="title">
            <textarea name="body" placeholder="body content......"></textarea>
            <button>Save Post</button>
        </form>
    </div>

    <div style="border: 3px solid black;">
        <h2>All POst</h2>
        @foreach ($posts as $post)
        <div style="background-color: aquamarine; padding: 10px; margin: 10px;">
            <h3>{{$post['title']}}</h3>
            <address class="author">By <a rel="author" href="/author/john-doe">{{$post->user->name}}</a></address>
            <br>
            {{$post['body']}}
            <p><a href="/edit-post/{{$post->id}}">Edit</a></p>
            <form action="/delete-post/{{$post->id}}" method="POST">
                @csrf
                @method('DELETE')
                <button>Delete</button>
            </form>
        </div>
        @endforeach
    </div>

    @else
    <div style="border: 3px solid black;">
        <h2>Register Here</h2>
        <form action="/" method="POST">
            @csrf
            <input name="name" type="text" placeholder="name">
            <input name="email" type="text" placeholder="email">
            <input name="password" type="password" placeholder="password">
            <button>Register</button>
        </form>
    </div>
    <div style="border: 3px solid black;">
        <h2>Login</h2>
        <form action="/login" method="POST">
            @csrf
            <input name="loginName" type="text" placeholder="name">
            <input name="loginPassword" type="password" placeholder="password">
            <button>Log In</button>
        </form>
    </div>
    @endauth

</body>
</html>