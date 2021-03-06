<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u"
          crossorigin="anonymous">
    <title>All rentals</title>
</head>
<body>
<div class="container">
    <div class="row">
        <table class="table table-striped table-bordered">
            <thead>
                <th>id</th>
                <th>car_id</th>
                <th>user_id</th>
                <th>price</th>
                <th>rented_from</th>
                <th>rented_at</th>
                <th>returned_to</th>
                <th>returned_at</th>
                </thead>
            <tbody>
                <tr>
                    <td><?php echo e($rental['id']); ?></td>
                    <td><?php echo e($rental['car_id']); ?></td>
                    <td><?php echo e($rental['user_id']); ?></td>
                    <td><?php echo e($rental['price']); ?></td>
                    <td><?php echo e($rental['rented_from']); ?></td>
                    <td><?php echo e($rental['rented_at']); ?></td>
                    <td><?php echo e($rental['returned_to']); ?></td>
                    <td><?php echo e($rental['returned_at']); ?></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
</body>
</html>
