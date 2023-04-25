<!DOCTYPE html>
<html>
<head>
    <title>Facture</title>
    <style>
        table, td, th {
          border: 2px solid black;
        }
        
        table {
          width: 100%;
          border-collapse: collapse;
          text-align: center;
          font-family: Impact; 
        }
        th{
            color:rgb(114, 180, 224);
        }
        p{
            font-weight: bold;
        }
        .t{
            margin-left: 6%;
            color: rgb(114, 180, 224);
        }
        </style>
</head>
<body>
    <h1>{{ $details['data']['title']}}</h1>
    <p>Le : {{ $details['data']['date'] }}</p>
    <hr>
    <h4>Information Personnelle : </h4>
    <p>Nom :</p>
    <p class="t">{{ $details['data']['name1'] }}</p>
    <p>Prenom :</p>
    <p class="t">{{ $details['data']['name2'] }}</p>
    <p>Email :</p>
    <p class="t">{{ $details['data']['email'] }}</p>
    <p>Monbile N° :</p>
    <p class="t">{{ $details['data']['mob'] }}</p>
    <p>Adress :</p>
    <p class="t">{{ $details['data']['adress'] }}</p>
    <p>City :</p>
    <p class="t">{{ $details['data']['city'] }}</p>
    <p>Country :</p>
    <p class="t">{{ $details['data']['country'] }}</p>
    <hr>
    <h4>Commandes : </h4>
    <table >
        <tr >
            <th >Produit</th>
            <th >Prix</th>
            <th >Quantité</th>
            <th >Prix Total</th>
        </tr>
        @foreach($details['commande']->lignecommandes as $c)
        <tr >
            <td >{{$c->produit->name}}</td>
            <td >{{$c->produit->prix}} $</td>
            <td >{{$c->qte}}</td>
            <td >{{$c->produit->prix * $c->qte}} $</td>
        </tr>
        @endforeach
        <tr>
            <td colspan="3">Shipping 10 $ + Total : </td>
            <td>{{$details['commande']->Totalprix()+10}} $</td>
        </tr>
    </table>
    
</body>
</html>