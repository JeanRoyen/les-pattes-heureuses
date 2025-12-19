<!doctype html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Données du mois de {{ $month }}</title>
</head>
<body>
<table class="w-full">
    <tr>
        <td class="w-half">
            <h1>Données du mois de {{ $month }}</h1>
        </td>
    </tr>
</table>

<div class="margin-top">
    <table class="w-full">
        <tr>
            <td class="w-half">
                <div>Les pattes heureuses</div>
            </td>
        </tr>
    </table>
</div>

<div class="margin-top">
    <table class="products">
        <tr>
            <th class="description">Description</th>
            <th class="number">Nombre</th>
        </tr>

        @foreach($datas as $data)
            <tr class="items">
                <td>
                    {{ $data['label'] }}
                </td>
                <td>
                    {{ $data['value'] }}
                </td>
            </tr>
        @endforeach
    </table>
</div>
</body>
</html>

<style>
    .description {
        width: 80%;
    }

    .number {
        width: 20%;
    }

    .w-full {
        width: 100%;
    }

    .w-half {
        width: 50%;
    }

    .margin-top {
        margin-top: 1.25rem;
    }

    table {
        width: 100%;
        border-spacing: 0;
    }

    table.products {
        font-size: 0.875rem;
    }

    table.products tr {
        background-color: rgb(88, 124.99, 112.99);
    }

    table.products th {
        color: #ffffff;
        padding: 0.5rem;
    }

    table tr.items {
        background-color: rgb(241 245 249);
    }

    table tr.items td {
        padding: 0.5rem;
    }

    .total {
        text-align: right;
        margin-top: 1rem;
        font-size: 0.875rem;
    }

</style>
