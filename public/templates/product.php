<?php 

$id = intval( get_query_var( 'slug' ) );
$file = VABS_SHOP_PLUGIN_ROOTPATH . 'public/api/articles.json';
$file_content = json_decode(file_get_contents($file), false);

$product = array_filter($file_content, function($prod) use ($id) {
    return $prod->id == $id;
});
$product = array_values($product)[0];

get_header(); 
?>

<div class="mx-auto max-w-[95vw] laptop:max-w-[1340px] my-8">
    <div class="grid laptop:grid-cols-3 gap-x-16">
        <div class="laptop:col-span-2">
            <ul class="flex items-center space-x-8 text-xs mb-8">
                <li class="text-slate-700"><a href="/">Startseite</a></li>
                <li class="text-slate-700"><a href="/shop">Shop</a></li>
                <li class="text-slate-300"><?= $product->name ?></li>
            </ul>
            <div class="bg-slate-100 flex items-center w-full rounded-md min-h-[75vh] sticky top-8">
                <img class="text-slate-300 text-center mx-auto" src="<?= $product->pictures[0] ?>" alt="<?= $product->name ?>">
            </div>
        </div>
        <div class="cols-span-1 mt-16 laptop:mt-0">
            <ul>
                <?php foreach($product->article_categories as $term): ?>
                    <li>
                        <a href="/shop?term=<?= $term ?>"><?= $term ?></a>
                    </li>
                <?php endforeach; ?>
            </ul>

            <h1 class="text-3xl"><?= $product->name ?></h1>
            <div class="flex items-center mb-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-yellow-300" viewBox="0 0 20 20" fill="currentColor">
                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                </svg>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-yellow-300" viewBox="0 0 20 20" fill="currentColor">
                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                </svg>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-yellow-300" viewBox="0 0 20 20" fill="currentColor">
                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                </svg>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-yellow-300" viewBox="0 0 20 20" fill="currentColor">
                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                </svg>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-yellow-300" viewBox="0 0 20 20" fill="currentColor">
                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                </svg>

                <span class="ml-4">12 Bewertungen</span>
            </div>
            <div class="flex items-center">
                <span class="block h-[10px] w-[10px] rounded-full bg-lime-400 mr-4"></span>
                Lieferbar
            </div>
            <p class="mt-16"><?= $product->beschreibung ?></p>
            
            <div class="mt-4">
                <p class="flex items-center space-x-2 text-2xl">
                    <?php if(isset($product->special_sales_price_formatted) && $product->special_sales_price_formatted !== '0,00'): ?>
                        <span class="text-slate-300 mr-2 line-through"><?= $product->sales_price_formatted ?>€</span>
                        <span><?= $product->special_sales_price_formatted ?>€</span>
                    <?php else: ?>
                        <span><?= $product->sales_price_formatted ?>€</span>
                    <?php endif; ?>
                </p>
            </div>
            
            <div class="mt-8">
                <p>Anzahl</p>
            </div>
            <div class="border border-neutral-200 rounded-sm inline-block">
                <div class="flex items-center p-2">
                    <span class="cursor-pointer">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4" />
                        </svg>
                    </span>
                    <input type="text" class="w-[60px] text-center" value="1" min="1" step="1">
                    <span class="cursor-pointer">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                        </svg>
                    </span>
                </div>
            </div>
            

            <div class="mt-8">
                <a class="bg-neutral-900 text-white text-center block py-4 px-6 rounded-sm cursor-pointer">in den Warenkorb</a>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>