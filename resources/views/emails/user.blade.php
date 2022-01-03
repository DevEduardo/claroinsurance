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
            img{
                  border: 0;
            }
            .wrapper{
                  width: 100%;
                  table-layout: fixed;
                  background-color: #cccccc;
                  padding-bottom: 20px;
                  padding-top: 20px;
            }
            .main{
                  background-color: #ffffff;
                  margin: 0 auto;
                  width: 100%;
                  max-width: 600px;
                  border-spacing: 0;
                  font-family: sans-serif;
                  color: #171a1b;
            }
            
      </style>
</head>
<body>
      
    <center class="wrapper">
        <table class="main" width:"100%">
            <tr>
                    <td style="padding-left: 20px; padding-right: 25px;padding-top: 40px; padding-bottom: 40px;">
                        <p 
                        style="text-align: center;
                                font-size: 20px; 
                                font-weight: bold; 
                                letter-spacing: 10px;
                                width: 140px;
                                padding: 5px;
                                margin: 0 auto;">
                                {{ $data->message }}
                        </p>
                    </td>
            </tr>
        </table>
    </center>
      
</body>
</html>