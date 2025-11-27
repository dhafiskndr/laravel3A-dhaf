<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="{{route('products.update', $products->id) }}" method="POST">
    @csrf
    @method('PUT')
        <label> Nama : </label><input type="text" name="txtnama" value="{{ $products->title }}"> <br>
        <label> Deskripsi : </label><textarea name="txtdeskripsi">{{ $products->description }} </textarea> <br>
        <label> Stok : </label><input type="text" name="txtstok" value="{{ $products->stock }}"> <br>
        <label> Harga : </label><input type="text" name="txtharga" value="{{ $products->price }}"> <br>
        <button type="submit">Simpan</button>
        <button type="reset">Batal</button> 
    </form>
    <button onclick="window.location.href='{{route('products.index')}}'">Back Home</button>

</body>
</html>