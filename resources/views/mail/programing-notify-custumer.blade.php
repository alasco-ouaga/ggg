<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Boîte de réception</title>
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
        .text-danger{
            color: red;
        }
        .text-udderline {
            text-decoration: underline;
        }

</style>
</head>
<body class="">

    <div class="container text-uppercase text-lg fw-bold fst-italic p-1">
        Rgi Immobilier:Recherche prise en compte
    </div>
    
    <div class="container text-uppercase text-lg p-1 mb-1"><hr></div>

    <div class="container bg-white">
        <div class="row">
            Cher(e) {{$last_name}}-{{$first_name}} ,
        </div>
        <div class="row  p-3">
            <div class="container text-align-justify">
                <span> 
                    Nous tenons à vous informer que votre recherche programmée a bien été pris en compte.
                    Elle est actuellement sous traitement le plus rapide possible.Vous recevrez un message 
                    de confirmation en cas de disponibbilité.Merci de patienter le temps de retrouver votre proprietée reherchée.
                </span>
            </div>
        </div>

        <div class="row text-align-justify fw-bold fst-italic text-udderline mt-1 ">
            Notre mission , votre satisfaction immobilière
        </div>
    </div>
</body>
</html>
