<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create</title>

</head>

<body>
    <form action="{{ route('store') }}" role="form" method="POST">
        @csrf
        <div>
            <input type="text" name="name" value="{{ old('name') }}" placeholder="Product name" />
        </div>
        <hr>
        <div>
            <textarea name="description" id="description" cols="30" rows="5">{{ old('description') }}</textarea>
        </div>
        <hr>
        <div>
            <textarea name="content" id="content" cols="30" rows="10">{{ old('content') }}</textarea>
        </div>
        <div>
            <input type="text" name="regular_price" value="{{ old('regular_price') }}" placeholder="Regular price" />
        </div>
        <div>
            <input type="text" name="sale_price" value="{{ old('sale_price') }}" placeholder="Sale price" />
        </div>
        <div>
            <input type="text" name="inventory" value="{{ old('inventory') }}" placeholder="Inventory" />
        </div>
        <input type="hidden" name="type" value="product" />
        <button type="submit">Save product</button>
    </form>
</body>

</html>
