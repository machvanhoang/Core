<?php

namespace App\Traits;

use App\Models\Product;
use App\Repositories\ProductMedia\ProductMediaRepositoryInterface;
trait ProductTrait
{
    public function __construct(
        private ProductMediaRepositoryInterface $productMediaRepository
    ) {

    }
    public function getCombinationsByOne(array $arrayAttributes)
    {
        $combinations = [];
        foreach ($arrayAttributes as $attribute_id => $values) {
            $newCombinations = [];
            foreach ($values as $value) {
                $newCombinations[] = [
                    'value' => $value['value'],
                    'attribute_value' => $value['attributeValue'],
                    'combination' => $value['value'],
                    'listId' => [
                        $value['attributeValue']->id,
                    ],
                ];
            }
            $combinations = $newCombinations;
        }
        return $combinations;

    }
    public function getCombinationsByTwo(array $arrayAttributes)
    {
        $combinations = array_shift($arrayAttributes);
        foreach ($arrayAttributes as $attribute_id => $values) {
            $newCombinations = [];
            foreach ($combinations as $combination) {
                foreach ($values as $value) {
                    $newCombinations[] = [
                        'value' => $value['value'],
                        'attribute_value' => $value['attributeValue'],
                        'combination' => $combination['value'] . '/' . $value['value'],
                        'listId' => [
                            $combination['attributeValue']->id,
                            $value['attributeValue']->id,
                        ],
                    ];
                }
            }
            $combinations = $newCombinations;
        }
        return $combinations;
    }
    public function getCombinationsByThree(array $arrayAttributes)
    {
        $combinations1 = array_shift($arrayAttributes);
        $combinations2 = array_shift($arrayAttributes);
        $combinations3 = $arrayAttributes[0];
        $combinations = [];
        foreach ($combinations1 as $keyCb1 => $cb1) {
            foreach ($combinations2 as $keyCb2 => $cb2) {
                foreach ($combinations3 as $keyCb3 => $cb3) {
                    $newCombinations[] = [
                        'value' => $cb3['value'],
                        'attribute_value' => $cb3['attributeValue'],
                        'combination' => $cb1['value'] . '/' . $cb2['value'] . '/' . $cb3['value'],
                        'listId' => [
                            $cb1['attributeValue']->id,
                            $cb2['attributeValue']->id,
                            $cb3['attributeValue']->id,
                        ],
                    ];
                    $combinations = $newCombinations;
                }
            }
        }
        return $combinations;
    }

    public function updateOrCreateProductMedia(Product $product, array $data)
    {
        try {
            $allProductMedia = $this->productMediaRepository->getAllMediaByProduct($product->id);
            if (empty($data['media'])) {
                // remove all product media
                if (!$allProductMedia->isEmpty()) {
                    $this->productMediaRepository->deleteByProduct($product->id);
                    return true;
                }
                return false;
            }
            $mediaArray = (array) $data['media'];
            if ($allProductMedia->isEmpty()) {
                // insert product media new
                foreach ($mediaArray as $key => $media) {
                    $this->productMediaRepository->create([
                        'product_id' => $product->id,
                        'media_id' => $media,
                        'sort' => 1,
                    ]);
                }
                return true;
            } else {
                // insert and fillter product media using
                $arrayInserted = [];
                foreach ($mediaArray as $key => $media) {
                    $singleMedia = $this->productMediaRepository->getMediaByProduct($product->id, $media);
                    if (!$singleMedia) {
                        $this->productMediaRepository->create([
                            'product_id' => $product->id,
                            'media_id' => $media,
                            'sort' => 1,
                        ]);
                    } else {
                        $arrayInserted[] = $singleMedia->id;
                    }
                }
                // delete product media not using
                foreach ($allProductMedia as $key => $media) {
                    if (!in_array($media->id, $arrayInserted)) {
                        $media->delete();
                    }
                }
                return true;
            }
        } catch (\Throwable $th) {
            return false;
        }
    }
}
