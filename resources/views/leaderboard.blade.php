<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Leader Board</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"  crossorigin="anonymous">
        <link href="https://cdn.datatables.net/2.1.4/css/dataTables.dataTables.css" rel="stylesheet"  crossorigin="anonymous">
        <script src="http://code.jquery.com/jquery-3.7.1.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/2.1.4/js/dataTables.js"></script>
        <script>
            var baseUrl = "{{ config('app.url') }}";
        </script>
    </head>
    <body>
        <div class="container">

            <div class="wrapper">
                <button class="btn btn-primary" type="button" id="recalculate">Recalculate</button>
                <label for="">Filter</label>
                <select name="" id="filter">
                    <option value="day">Day</option>
                    <option value="month">Month</option>
                    <option value="year">Year</option>
                </select>
            </div>

            <table id="example" class="display" style="width:100%">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Points</th>
                        <th>Rank</th>
                    </tr>
                </thead>        
            </table>
        </div>
    </body>

    <script src="{{ asset('js/leaderboard.js')}}"></script>
</html>