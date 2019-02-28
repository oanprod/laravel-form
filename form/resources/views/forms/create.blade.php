<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">

        <title>Laravel Form</title>
    </head>
    <body>
        <h1>Create a new form</h1>

        <h2>{{ $cat() }}</h2>

        <form method="POST" action="/forms">

            {{ csrf_field() }}

            <div>
                <input type="text" name="title" placeholder="Form tile">
            </div>

            <div>
                <textarea type="text" name="description" placeholder="Form description"></textarea>
            </div>

            <div>
                <button type="submit">Create form</button>
            </div>
        </form>
    </body>
</html>