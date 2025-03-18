<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tablet Devices</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color:rgb(21, 4, 97);
            color: white;
        }
        /* Style the content */
        .content {
        background-color: #FFFFFF;
        padding: 10px;
        height: 650px; 
        }

        /* Style the footer */
        .footer {
        background-color: rgb(14, 4, 58);
        padding: 10px;
        }
    </style>
</head>
<body>
    <div class="content">
        <h2><center>Tablet Devices</center></h2>

            <table>
                <tr>
                    <th>Model</th>
                    <th>OS Name</th>
                    <th>OS Version</th>
                    <th>Hardware Type</th>
                    <th>Vendor</th>
                    <th>Browser</th>
                </tr>
                @foreach ($tablets as $tablet)
                    <tr>
                        <td>{{ $tablet->model }}</td>
                        <td>{{ $tablet->os_name }}</td>
                        <td>{{ $tablet->os_version }}</td>
                        <td>{{ $tablet->primary_hardware_type }}</td>
                        <td>{{ $tablet->vendor }}</td>
                        <td>{{ $tablet->browser_name }}</td>
                    </tr>
                @endforeach
            </table>
    </div>
    <div class="footer">
       
    </div>
</body>
</html>