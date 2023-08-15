<?php

namespace App\Services;

use App\Models\Product;
use App\Repositories\AttributeValue\AttributeValueRepositoryInterface;
use App\Repositories\Media\MediaRepositoryInterface;
use App\Repositories\ProductMedia\ProductMediaRepositoryInterface;
use App\Repositories\ProductVariant\ProductVariantRepositoryInterface;
use App\Repositories\Product\ProductRepositoryInterface;
use App\Repositories\VariantAttributeValues\VariantAttributeValuesRepositoryInterface;
use App\Traits\ProductTrait;
use App\Traits\SeoTrait;

class ProductService
{
    use SeoTrait;
    use ProductTrait;
    public function __construct(
        private ProductRepositoryInterface $productRepository,
        private ProductMediaRepositoryInterface $productMediaRepository,
        private MediaRepositoryInterface $mediaRepository,
        private ProductVariantRepositoryInterface $productVariantRepository,
        private VariantAttributeValuesRepositoryInterface $variantAttributeValuesRepository,
        private AttributeValueRepositoryInterface $attributeValueRepository
    ) {
    }
    public function create(array $data = [])
    {
        try {
            $product = $this->productRepository->create($data);
            if (!$product) {
                return [
                    'error' => true,
                    'message' => 'Tạo sản phẩm lỗi.',
                ];
            }
            $this->createSeo($product, $data);
            return [
                'success' => true,
                'product' => $product,
                'message' => 'Tạo sản phẩm thành công.',
            ];
        } catch (\Throwable $th) {
            return [
                'error' => true,
                'message' => 'Không thể tạo sản phẩm.',
            ];
        }
    }
    public function updated(Product $product, array $data = []): array
    {
        try {
            $product->update($data);
            $this->createSeo($product, $data);
            return [
                'success' => true,
                'message' => 'Cập nhật sản phẩm thành công.',
            ];
        } catch (\Throwable $th) {
            return [
                'error' => false,
                'message' => 'Cập nhật sản phẩm lỗi.',
            ];
        }
    }
    public function delete(Product $product)
    {
        try {
            $newProduct = $product;
            $product->delete();
            $this->deleteSeo($newProduct);
            return [
                'success' => true,
                'message' => 'Xóa sản phẩm thành công.',
            ];
        } catch (\Throwable $th) {
            return [
                'error' => false,
                'message' => 'Xóa sản phẩm lỗi vì dữ liệu liên quan.',
            ];
        }
    }

    public function saveProductVariant(Product $product, array $data)
    {
        if (empty($data['product_variant'])) {
            return [
                'error' => false,
                'message' => 'Thêm variant cho product bị lỗi.',
            ];
        }
        foreach ($data['product_variant'] as $key => $item) {
            $dataInsert = [
                'product_id' => $product->id,
                'sku' => $item['sku'],
                'regular_price' => (int) $item['regular_price'],
                'sale_price' => (int) $item['sale_price'],
                'inventory' => (int) $item['inventory'],
                'created_at' => now(),
                'updated_at' => now(),
            ];
            $productVariant = $this->productVariantRepository->create($dataInsert);
            if ($productVariant) {
                $listID = json_decode($item['listId']);
                if (!empty($listID)) {
                    $dataV = [];
                    foreach ($listID as $key => $i_ID) {
                        $dataV = [
                            'product_variant_id' => $productVariant->id,
                            'attribute_value_id' => $i_ID,
                            'created_at' => now(),
                            'updated_at' => now(),
                        ];
                        $this->variantAttributeValuesRepository->create($dataV);
                    }
                }
            }
        }
        return [
            'success' => true,
            'message' => 'Thêm variant cho product hoàn tất.',
        ];
    }

    public function getCombinationsByProduct(int $productId)
    {
        $arrayAttributes = [];
        $attributeValues = $this->attributeValueRepository->getAttributeValueByProduct($productId);
        foreach ($attributeValues as $key => $item) {
            $attributeId = $item->attribute_id;
            $attributeValue = $item->attribute_value;
            if (!isset($arrayAttributes[$attributeId])) {
                $arrayAttributes[$attributeId] = [];
            }
            $arrayAttributes[$attributeId][] = [
                'value' => $attributeValue,
                'attributeValue' => $item,
            ];
        }
        $combinations = [];
        $countAttribute = count($arrayAttributes);
        switch ($countAttribute) {
            case 2:
                $combinations = $this->getCombinationsByTwo($arrayAttributes);
                break;
            case 3:
                $combinations = $this->getCombinationsByThree($arrayAttributes);
                break;
            default:
                $combinations = $this->getCombinationsByOne($arrayAttributes);
                break;
        }
        return $combinations;
    }
}
