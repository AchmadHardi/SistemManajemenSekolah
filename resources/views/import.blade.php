<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Import Data Siswa</title>
</head>

<body>
    <form action="route('siswa.store')" method:POST enctype="multipart/form-data">
        $csrf
        <input type="file" name="excel">
        input type="submit" value="import")
    </form>
</body>

</html>
