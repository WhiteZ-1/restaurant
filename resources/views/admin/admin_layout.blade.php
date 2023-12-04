<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/styles/adminstyles.css">
    <title>Dashboard</title>
</head>
<body>
    <header class="dasboard_header">
        <nav class='dashboard_nav'>
            <h1>Dasboard</h1>
            
        </nav>
    </header>
    <main class="container"> 
        <div class="dashboard_side_nav">
            <ul class="side_nav_items">
                <li><a href="/"><= Back to Main Page</a></li>
                <li><a href="/dashboard">MenuItems</a></li>
                <li><a href="/dashboard/menu">Add MenuItem</a></li>
                <li><a href="/dashboard/reservation">Reservations</a></li>
                <li><a href="/dashboard/tables">All Tables</a></li>
                <li><a href="/dashboard/create-table">Add Table</a></li>
                <li class="logout_btn"><a href="/logout">Logout</a></li>
            </ul>
        </div>
        <div class="main">
            @yield('admin_content')
        </div>
    </main>
</body>
</html>