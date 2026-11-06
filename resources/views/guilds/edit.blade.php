<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Guild</title>
        <style>
            body{
                background-image: url(https://wallpaperaccess.com/full/1399270.jpg);
            }
        .nav-bar{
            display:flex;
            gap: 100px;
            background-color: #faeeede3;
            margin-bottom: 20px;
            padding: 5px;
            border: 3px inset black;
            width: 200px;
            justify-content:center;
            font-size: 20px;
            width: 500px;
        }
        .title{
            display:flex;
            gap: 10px;
            background-color: #faeeede3;
            margin-bottom: 20px;
            padding: 5px;
            border: 3px inset black;
            width: 500px;
            justify-content:center;
        }
        .item{
            border: 3px inset #c2a676;
            background-image: url(https://img.magnific.com/free-photo/wooden-floor-background_53876-88628.jpg?semt=ais_hybrid&w=740&q=80);
            width: 400px;
            padding: 5px;
            height: 400px;
            font-size: 18px;
            padding-left: 20px;
        }
        .itemCards{
            display:flex;
            gap: 10px;
            flex-wrap: wrap;
            width: 2000px;
        }
        .titleStuff{
            display: flex;
            flex-direction: column;
            align-items: center;
        }
</style>
</head>
<body>
            <div class="titleStuff">
    <div class="title">
    <h1>Edit Guild</h1>
</div>
    <div class="nav-bar">
    <a href="{{ route('members.index') }}">Member index</a>
    <a href="{{ route('guilds.index') }}">Guild index</a>
</div>
    @if ($errors->any())
        <div class="item">
            <h3>Errors: </h3>

            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="item">
    <form action="{{ route('guilds.update', $guild) }}" method="POST">
        @csrf
        @method('PUT')
        <h2>New Guild</h2>
        <label>New name:</label>
        <input type="text" name="name" required/>

        <br><br>

        <label>New server:</label>
        <select name="server">
            <option value=""><-- Select a server --></option>
            <option value="Europe">Europe</option>
            <option value="America">America</option>
            <option value="Asia">Asia</option>
            <option value="Oceania">Oceania</option>
</select>

        <br><br>

        <label>New level:</label>
        <input type="number" name="level" min="1" max="100" required/>

        <br><br>
        
        <button type="submit">Update Guild</button>
    </form>
</div>
</div>
</body>
</html>