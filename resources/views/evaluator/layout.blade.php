<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbs5kQ9FN1u1qFqPkQ1CUKqRS9dIWW5p+eW5e8QrBBD+KGOt5JCF5h2g5zIW9IiS" crossorigin="anonymous">

    <title>SEECS Open House 2024</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Arial', sans-serif;
            background-color: #ffffff; /* White background */
            color: #000000; /* Black text */
        }

        header {
            background-color: #001f3f; /* Navy Blue header */
            padding: 10px;
            color: #ffffff; /* White text */
        }

        header h1 {
            margin: 0;
        }

        main {
            padding: 20px;
        }

       
    </style>
</head>
<body>
    <header>
        <h1>SEECS Open House 2024</h1>
    </header>
    
    <main>
        @yield('content')
    </main>
</body>
</html>
