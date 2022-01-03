<!DOCTYPE html>
<html lang="es">
<head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Correo</title>
      <style>
            body{
                  margin: 0;
                  background-color: #cccccc;
            }
            table{
                  border-spacing: 0;
            }
            td{
                  padding: 0;
            }
            
      </style>
</head>
<body>
      
    <center class="wrapper">
        <table class="main" width:"100%">
            <tr>
                    <td >
                        <p >
                                {{ $data['message'] }}
                        </p>
                    </td>
            </tr>
        </table>
    </center>
      
</body>
</html>