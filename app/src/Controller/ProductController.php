<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Nelmio\ApiDocBundle\Annotation\Model;
use OpenApi\Annotations as OA;
use App\Entity\Product;

class ProductController extends AbstractController
{
    /**
     * @OA\Response(
     *     response=200,
     *     description="Returns the rewards of an user",
     *     @OA\JsonContent(
     *        type="array",
     *        @OA\Items(ref=@Model(type=Product::class, groups={"full"}))
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
    public function list(): Response
    {
        return $this->json([
            'message' => 'Welcome to your new controller!',
            'path' => 'src/Controller/ProductController.php',
        ]);
    }
}
