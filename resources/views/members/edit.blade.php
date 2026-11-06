<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Member</title>
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
    <h1>Update Member</h1>
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
    <form action="{{ route('members.update', $member) }}" method="POST">
        @csrf
        @method('PUT')
        <h2> New Member</h2>
        <label>New guild:</label>
        <select name="guild_id" required>
            <option value=""> -- Select Guild --</option>

            @foreach ($guilds as $guild)
                <option value="{{ $guild->id }}" @if($guild->id == $member->guild_id) selected @endif>{{ $guild->name}}</option>
            @endforeach
        </select>

        <br><br>

        <label>New username:</label>
        <input type="text" name="username" value="{{$member->username}}" required/>

        <br><br>

        <label>Level:</label>
        <input type="number" name="level" value="{{$member->level}}" required/>

        <br><br>

        <label>Role:</label>
        <select name="role">
            <option value="">-- Select a role --</option>
            <option value="Recruit" @if($member->role == "Recruit") selected @endif>Recruit</option>
            <option value="Officer" @if($member->role == "Officer") selected @endif>Officer</option>
            <option value="Leader" @if($member->role == "Leader") selected @endif>Leader</option>
</select>

        <br><br>

        <label>Contribution Points:</label>
        <input type="number" name="contributionPoints" min="1" value="{{$member->contributionPoints}}" required/>

        <br><br>
        
        <button type="submit">Update Member</button>
    </form>
</div>
</div>
</body>
</html>