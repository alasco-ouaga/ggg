<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>

    </style>
</head>
<body>

</body><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 90%;
            margin: 0 auto;
        }

        .col-6{
          width: 50%;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        thead {
            background-color: #e6e6e6; /* Ajoutez la couleur de fond souhaitée ici */
        }

        th, td {
            padding: 8px;
            text-align: left;
        }

        tr:hover {
            background-color: #f5f5f5;
        }

        .bg-primary{
            background-color: blue;
            color: white;
        }

        .left-div{
            padding-top: 10px;
            padding-bottom: 10px;
            text-align: left;
            float: left; 
        }

        .right-div{
            padding-top: 10px;
            padding-bottom: 10px;
            text-align: right;
            float: right;
            font-size: 18px;
        }

        .invoice-title{
            text-align: center;
            font-size: 25px;
            padding: 50px;
            font-family: 'Times New Roman', Times, serif
        }

        .header{
            margin-bottom: 100px;
            width: 100%;
        }

        .company_name{
          text-decoration: dashed;
          text-transform: capitalize;
          font-weight: bold;
          font-size: x-large;
          font-style: oblique;
          font-family: cursive ;
          color: blue;
        }

        .email{
          margin-top: 40px;
        }
        .phone{
          margin-bottom: 6px;
          margin-top: 6px;
        }

        .time-new-rooman{
          font-family: 'Times New Roman', Times, serif
        }
        .fw-bold{
          font-weight: bold;
        }
        .text-uppercase{
          text-transform: uppercase;
        }

        .float-end{
          float: right;
        }

        .float-start{
          float: left;
        }

        .footer{
          margin-top: 50px;
        }

        .row{
          width: 100%;
        }

        .border{
            border: solid;
        }

        .text-align-right{
          text-align: right;
        }

        .text-align-center{
          text-align: center;
        }

        .text-align-left{
          text-align: left;
        }

        .text-align-justify{
            text-align: justify;
        }

        .date{
          margin-top: 120px;
        }

        .text-lg{
            font-size: 25px;
        }

        .bg-white{
            background-color: white;
        }

        .bg-blue{
            background-color: #416f8c;
        }

        .p-1{
            padding: 5px;
        }

        .p-2{
            padding: 10px;
        }

        .p-3{
            padding: 20px;
        }

        .p-4{
            padding: 40px;
        }

        .borde-radius{
            border-radius: 10px;
        }
        .mb-1{
            margin-bottom: 5px;
        }

        .mt-1{
            margin-bottom: 5px;
        }

        .mb-2{
            margin-bottom: 10px;
        }

        .mt-2{
            margin-bottom: 10px;
        }

        .fst-italic{
            font-style: italic;
        }

</style>
</head>
<body class="">

    <div class="container text-uppercase text-lg fw-bold fst-italic p-1">
        Demande rejettée
    </div>
    
    <div class="container text-uppercase text-lg p-1 mb-1"><hr></div>

    <div class="container bg-white">
        <div class="row">
            Cher(e) {{$last_name}} - {{$first_name}} ,
        </div>
        
        <div class="row text-align-justify p-3">
            Nous accusons reception de votre demande pour passer à un compte agent imobilier.
            Votre demande de passage au compte agent immobilier a été rejettée.le motif d'echec est :
        </div>
        <div class="row text-align-justify p-3">
           {{ $motif }}
        </div>
        <div class="row text-align-justify mt-1">
            Nous vous remercions de l'intérêt que vous portez à notre entreprise et de votre patience pendant le processus de traitement. 
        </div>
    </div>
</body>
</html>
</html>