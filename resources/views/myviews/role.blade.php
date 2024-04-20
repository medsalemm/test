<!DOCTYPE html>
<html>
<head>
    <title>Add Role</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1>Add Role</h1>
        <form method="POST" action="{{ route('roles.store') }}">
            @csrf
            <div class="form-group">
                <label for="nn">Role Name</label>
                <input type="text" class="form-control" id="nn" name="nn" placeholder="Enter role name">
            </div>
            <div class="form-group">
                <label for="role_name">Alias</label>
                <input type="text" class="form-control" id="role_name" name="role_name" placeholder="Enter role Alias">
            </div>
            <div class="form-group">
                <label for="model">Select a Model</label>
                <select name="model" class="form-control">
                    <option value="">Select a Model</option>
                    @foreach (glob(app_path('Models/*.php')) as $file)
                        <?php $modelName = basename($file, '.php'); ?>
                        <option value="{{ $modelName }}">{{ $modelName }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Permissions:</label><br>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="permissions" id="create" value="create">
                    <label class="form-check-label" for="create">Create</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="permissions" id="read" value="read">
                    <label class="form-check-label" for="read">Read</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="permissions" id="update" value="update">
                    <label class="form-check-label" for="update">Update</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="permissions" id="delete" value="delete">
                    <label class="form-check-label" for="delete">Delete</label>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</body>
</html>
