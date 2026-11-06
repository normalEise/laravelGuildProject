<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Members</title>
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
            height: 300px;
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
    <h1>Members</h1>
</div>
    <div class="nav-bar">
    <a href="{{ route('members.index') }}">Member index</a>
    <a href="{{ route('guilds.index') }}">Guild index</a>
</div>
<div class="nav-bar">
    <a href="{{ route('members.create') }}">Add Member</a>
</div>
</div>
<div class="itemCards">
    @foreach ($members as $member)
        <div class="item">
            <h2> {{ $member->username }} </h2>

            <p>Guild: {{ $member->guild->name }}</p>
            <p>Level: {{ $member->level }}/100</p>
            <p>Role: {{ $member->role }}</p>
            <p>Contribution Points: {{ $member->contributionPoints }}</p>

            <button><a href="{{ route('members.edit', $member) }}">Edit</a></button>

            <form action="{{ route('members.destroy' , $member) }}" method="POST" style="display: inline;">
                @csrf
                @method('DELETE')

                <button type="submit">Delete</button>
            </form>
        </div>

    @endforeach
</div>
</body>
</html>