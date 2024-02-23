<!DOCTYPE html>
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
            width: 80%;
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
        .text-bold{
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

        .text-align-left{
          text-align: left;
        }

        .date{
          margin-top: 120px;
        }
</style>
</head>
<body class="time-new-rooman">

    <div class="header">
        <div class="col-6 left-div">
          <span class="company_name"> {{$commande->custumer->structure->name}} </span> <br>
          <span class="email"> {{$commande->custumer->structure->email}} </span> <br>
          <span class="phone"> {{$first_phone->phone}} / {{$last_phone->phone}} </span>
        </div> 
        <div class="col-6 right-div"> 
          <span class="text-bold text-uppercase">Burkina Faso</span> <br>
          <span>Unité-Progrés-Justice</span> <br>
          <span>Code : {{$commande->identifier}}</span> <br>
        </div> 
    </div>
      
    <div class="invoice-title text-uppercase">
        <span> Recu de commande </span>  
    </div>

    <table class="table">
        <tbody>
          <tr class="bg-primary text-bold text-uppercase">
            <td>Client</td>
            <td>{{$commande->custumer->first_name}}-{{$commande->custumer->last_name}}</td>
          </tr>
          <tr>
            <td>Telephone</td>
            <td> {{$commande->custumer->phone}}</td>
          </tr>
          <tr>
            <td>Quantité</td>
            <td>{{$commande->quantity}}</td>
          </tr>
          <tr>
            <td>Montant</td>
            <td>{{$commande->amount}}</td>
          </tr>
          <tr>
            <td>Date</td>
            <td>{{$commande->created_at}}</td>
          </tr>
        </tbody>
  </table>
  <div class="row text-uppercase text-bold footer text-align-right">Signataire</div>
  <div class="row text-uppercase text-bold text-align-right date"> @php $date = now(); @endphp {{$date}} </div>
</body>
</html>