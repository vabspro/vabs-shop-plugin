<?php 

$file = VABS_SHOP_PLUGIN_ROOTPATH . 'public/api/articles.json';
$products = json_decode(file_get_contents($file), false);
$terms = [];

foreach($products as $prod){
    $prod_cats = $prod->article_categories;
    foreach($prod_cats as $c){
        if(!in_array($c, $terms)){
            array_push($terms, $c);
        }
    }
}

get_header(); ?>

<div class="mx-auto max-w-[95vw] laptop:max-w-[1340px] my-8">
    <?php if(isset($terms) && count($terms)): ?>
        <div class="flex items-center space-x-8 mb-4 overflow-x-scroll py-8 sticky top-0 z-[999] bg-white">
            <a class="whitespace-pre" href="/shop">alle Artikel</a>
            <?php foreach($terms as $term): ?>
                <a class="whitespace-pre" href="/shop?term=<?= $term ?>"><?= $term ?></a>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
    
    <?php if(isset($products) && count($products)):  ?>
        <div class="grid grid-cols-1 tablet:grid-cols-2 laptop:grid-cols-4 gap-x-4 gap-y-12">
            <?php foreach($products as $product):?>
                <div class="relative flex-col">
                    <div class="w-full min-h-[320px] bg-slate-100 rounded-md flex items-center justify-center text-slate-300">
                        <img class="w-full h-auto mx-auto text-center" src="<?= $product->pictures[0] ?>" alt="<?= $product->name ?>">
                    </div>

                    <div class="flex-grow flex-col p-2">
                        <a class="mt-2 block" href="/product/<?= $product->id ?>"><h2 class="font-semibold"><?= $product->name ?></h2></a>
                        
                        <p class="flex items-center space-x-2">
                            <?php if(isset($product->special_sales_price_formatted) && $product->special_sales_price_formatted !== '0,00'): ?>
                                <span class="text-slate-300 mr-2 line-through"><?= $product->sales_price_formatted ?>€</span>
                                <span><?= $product->special_sales_price_formatted ?>€</span>
                            <?php else: ?>
                                <span><?= $product->sales_price_formatted ?>€</span>
                            <?php endif; ?>
                        </p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</div>

<?php get_footer(); ?>