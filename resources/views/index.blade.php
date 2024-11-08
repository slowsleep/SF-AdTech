<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Users</h2>
    <div style="display:grid; grid-template-columns: repeat(3, 1fr);">
        @foreach ($users as $user)
        <div style="display: flex; flex-direction: column; border: 1px dotted;">
            <p>User name: {{ $user->name }}</p>
            <p>Role: {{ $user->role }}</p>
        </div>
        @endforeach
    </div>
    <hr>

    <h2>Offers</h2>
    <div style="display:grid; grid-template-columns: repeat(3, 1fr);">
        @foreach ($offers as $offer)
        <div style="display: flex; flex-direction: column; border: 1px green solid; border-radius: 1px;">
            <p>Advertiser name: {{ $offer->advertiser->name }}</p>
            <p>Offer name: {{ $offer->title }}</p>
            <p>Url: {{ $offer->url }}</p>
            <p>Стоимость перехода: {{ $offer->price }}</p>
            <p>Тема: {{ $offer->theme->name }}</p>
            <p>status: {{ $offer->status ? 'active' : 'not active' }}</p>
        </div>
        @endforeach
    </div>
    <hr>

    <h2>Webmaster's offers</h2>
    <div style="display:grid; grid-template-columns: repeat(3, 1fr);">
        @foreach ($webmasters_offers as $webmaster_offer)
        <div style="display: flex; flex-direction: column; border: 2px blue solid; border-radius: 3px;;">
            <p>Webmaster name: {{ $webmaster_offer->webmaster->site }}</p>
            <p>Offer name: {{ $webmaster_offer->offer->title }}</p>
        </div>
        @endforeach
    </div>
</body>
</html>
