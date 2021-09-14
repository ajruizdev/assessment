<?php

namespace App\Controller;

use App\Discount\Calculator;
use App\Repository\ProductRepository;
use App\Response\Model\ProductPrice;
use App\Response\ProductResponseFactory;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Nelmio\ApiDocBundle\Annotation\Model;
use OpenApi\Annotations as OA;
use App\Response\Model\Product as ProductResponse;

class ProductController extends AbstractController
{
    /**
     * @OA\Response(
     *     response=200,
     *     description="Returns a list of products with its original price and discounted price (if it has any applicable discount)",
     *     @OA\JsonContent(
     *        type="array",
     *        @OA\Items(ref=@Model(type=ProductResponse::class))
     *     )
     * )
     * @OA\Parameter(
     *     name="category",
     *     in="query",
     *     description="The field used to filter by product category",
     *     @OA\Schema(type="string"))
     *
     * @OA\Parameter(
     *     name="priceLessThan",
     *     in="query",
     *     description="The field used to filter by price less than given value BEFORE discount",
     *     @OA\Schema(type="integer"))
     * )
     * @OA\Tag(name="Product")
     */
    #[Route('/products', name: 'products_list', methods: ['GET'])]
    public function list(Request $request, ProductRepository $productRepository, Calculator $discountCalculator, ProductResponseFactory $responseFactory): Response
    {
        $categoryParamValue = $request->get('category');
        $priceLessThanParamValue = $request->get('priceLessThan');

        $result = $productRepository->findByCategorySlugAndPriceLessThan($categoryParamValue, $priceLessThanParamValue);
        $products = [];
        foreach ($result as $product) {
            $data = ['priceWithDiscount' => $discountCalculator->getPriceWithDiscount($product), 'discountPercentage' => $discountCalculator->getApplicableDiscountPercentage($product)];
            $products[] = $responseFactory->create($product, $data);
        }
        return $this->json($products);
    }
}
