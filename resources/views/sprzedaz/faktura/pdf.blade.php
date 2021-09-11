<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <style>
            body {font-family: DejaVu Sans;}
            table,th,td {border: solid black 1px; width: 100%; border-collapse: collapse;}
            th:first-child,td:first-child {padding-left: 5px;}
            th:last-child,td:last-child,th:nth-of-type(2),td:nth-last-of-type(2) {text-align: right; padding-right: 5px; width: 20%;}
            p {padding-left: 10px; font-size: 12px;}
            h2 {margin-bottom: 0.25rem;}
        </style>
    </head>
    <body>
    <h1 style="text-align: center;">Faktura</h1>
        <h2>Numer sprzedaży {!! $invoice->nr_sprzedazy !!}</h2>
        <p>Data wystawienia: {!! $invoice->data_sprzedazy !!}</p>
        <div>
            <div>
                <h4>Dane sprzedawcy</h4>   
                <p>Student studentowski</p>
                <p>PWSZ 69</p>                
                <p>64-100 Leszno</p>
                <p>Tel: 123456789</p>
            </div>
            <div>
                <h4>Dane nabywcy</h4>   
                <p>{!! $invoice->client_car_sale->imie !!} {!! $invoice->client_car_sale->nazwisko !!}</p>  
                <p>{!! $invoice->client_car_sale->ulica !!}</p>              
                <p>{!! $invoice->client_car_sale->kod_pocztowy !!} {!! $invoice->client_car_sale->miasto !!}</p>
                <p>Tel: {!! $invoice->client_car_sale->telefon  !!}</p>
                <p>Email: {!! $invoice->client_car_sale->email !!}</p>
            </div>
        </div>
        <table>
            <tr>
                <th>Identyfikator pojazdu</th>
                <th>Cena</th>
            </tr>
            <tr>
                <td>{!! $invoice->car_car_sale->numer_VIN !!}</td>
                <td>{!! number_format($invoice->cena, 2, ',', ' ') . 'zł' !!}</td>
            </tr>
        </table>
        
    </body>
</html>