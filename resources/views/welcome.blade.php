@php
$products = \App\Models\Product::query()->take(20)->get();
$products->each(fn (\App\Models\Product $product) => $product->name);
@endphp
