<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $product->name }}</title>
</head>

<body>
    <form action="{{ route('update', $product) }}" role="form" method="POST">
        @csrf
        @method('PUT')
        <ul>
            <li>{{ $product->id }}</li>
            <li>{{ $product->name }}</li>
            <li>{{ $product->description }}</li>
            <li>{{ $product->content }}</li>
            <li>{{ $product->regular_price }}</li>
            <li>{{ $product->sale_price }}</li>
            <li>{{ $product->inventory }}</li>
        </ul>
        <ul>
            @foreach ($attributes as $item)
                <li>{{ $item->name }}</li>
                <ul>
                    @foreach ($item->attributeValue as $at_vl)
                        <li><input type="checkbox" name="attribute_default[]"
                                value="{{ $at_vl->id }}" />{{ $at_vl->attribute_value }}</li>
                    @endforeach
                </ul>
            @endforeach
        </ul>
        <button type="submit">Update</button>
    </form>
</body>

</html>
