<?php

namespace App\Providers;

use App\Repositories\Attributes\AttributesRepository;
use App\Repositories\Attributes\AttributesRepositoryInterface;
use App\Repositories\AttributeValue\AttributeValueRepository;
use App\Repositories\AttributeValue\AttributeValueRepositoryInterface;
use App\Repositories\Cart\CartRepository;
use App\Repositories\Cart\CartRepositoryInterface;
use App\Repositories\CartItems\CartItemsRepository;
use App\Repositories\CartItems\CartItemsRepositoryInterface;
use App\Repositories\Category\CategoryRepository;
use App\Repositories\Category\CategoryRepositoryInterface;
use App\Repositories\Comment\CommentRepository;
use App\Repositories\Comment\CommentRepositoryInterface;
use App\Repositories\Config\ConfigRepository;
use App\Repositories\Config\ConfigRepositoryInterface;
use App\Repositories\Counpon\CounponRepository;
use App\Repositories\Counpon\CounponRepositoryInterface;
use App\Repositories\Customer\CustomerRepository;
use App\Repositories\Customer\CustomerRepositoryInterface;
use App\Repositories\CustomerStatus\CustomerStatusRepository;
use App\Repositories\CustomerStatus\CustomerStatusRepositoryInterface;
use App\Repositories\District\DistrictRepository;
use App\Repositories\District\DistrictRepositoryInterface;
use App\Repositories\MailHistory\MailHistoryRepository;
use App\Repositories\MailHistory\MailHistoryRepositoryInterface;
use App\Repositories\MailTemplate\MailTemplateRepository;
use App\Repositories\MailTemplate\MailTemplateRepositoryInterface;
use App\Repositories\MailType\MailTypeRepository;
use App\Repositories\MailType\MailTypeRepositoryInterface;
use App\Repositories\Media\MediaRepository;
use App\Repositories\Media\MediaRepositoryInterface;
use App\Repositories\Order\OrderRepository;
use App\Repositories\Order\OrderRepositoryInterface;
use App\Repositories\OrderItems\OrderItemsRepository;
use App\Repositories\OrderItems\OrderItemsRepositoryInterface;
use App\Repositories\OrderStatus\OrderStatusRepository;
use App\Repositories\OrderStatus\OrderStatusRepositoryInterface;
use App\Repositories\Page\PageRepository;
use App\Repositories\Page\PageRepositoryInterface;
use App\Repositories\PaymentMethod\PaymentMethodRepository;
use App\Repositories\PaymentMethod\PaymentMethodRepositoryInterface;
use App\Repositories\Post\PostRepository;
use App\Repositories\Post\PostRepositoryInterface;
use App\Repositories\Product\ProductRepository;
use App\Repositories\Product\ProductRepositoryInterface;
use App\Repositories\ProductFavorite\ProductFavoriteRepositoryInterface;
use App\Repositories\ProductFavorite\ProductFavoriterRepository;
use App\Repositories\ProductMedia\ProductMediaRepository;
use App\Repositories\ProductMedia\ProductMediaRepositoryInterface;
use App\Repositories\ProductTags\ProductTagsRepository;
use App\Repositories\ProductTags\ProductTagsRepositoryInterface;
use App\Repositories\ProductVariant\ProductVariantRepository;
use App\Repositories\ProductVariant\ProductVariantRepositoryInterface;
use App\Repositories\Province\ProvinceRepository;
use App\Repositories\Province\ProvinceRepositoryInterface;
use App\Repositories\Seo\SeoRepository;
use App\Repositories\Seo\SeoRepositoryInterface;
use App\Repositories\Tag\TagRepository;
use App\Repositories\Tag\TagRepositoryInterface;
use App\Repositories\VariantAttributeValues\VariantAttributeValuesRepository;
use App\Repositories\VariantAttributeValues\VariantAttributeValuesRepositoryInterface;
use App\Repositories\Ward\WardRepository;
use App\Repositories\Ward\WardRepositoryInterface;
use Illuminate\Support\ServiceProvider;
use App\Repositories\User\UserRepository;
use App\Repositories\User\UserRepositoryInterface;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->singleton(CartRepositoryInterface::class, CartRepository::class);
        $this->app->singleton(CartItemsRepositoryInterface::class, CartItemsRepository::class);
        $this->app->singleton(CategoryRepositoryInterface::class, CategoryRepository::class);
        $this->app->singleton(CommentRepositoryInterface::class, CommentRepository::class);
        $this->app->singleton(CounponRepositoryInterface::class, CounponRepository::class);
        $this->app->singleton(CustomerRepositoryInterface::class, CustomerRepository::class);
        $this->app->singleton(CustomerStatusRepositoryInterface::class, CustomerStatusRepository::class);
        $this->app->singleton(DistrictRepositoryInterface::class, DistrictRepository::class);
        $this->app->singleton(MailHistoryRepositoryInterface::class, MailHistoryRepository::class);
        $this->app->singleton(MailTemplateRepositoryInterface::class, MailTemplateRepository::class);
        $this->app->singleton(MailTypeRepositoryInterface::class, MailTypeRepository::class);
        $this->app->singleton(MediaRepositoryInterface::class, MediaRepository::class);
        $this->app->singleton(OrderRepositoryInterface::class, OrderRepository::class);
        $this->app->singleton(OrderItemsRepositoryInterface::class, OrderItemsRepository::class);
        $this->app->singleton(OrderStatusRepositoryInterface::class, OrderStatusRepository::class);
        $this->app->singleton(PageRepositoryInterface::class, PageRepository::class);
        $this->app->singleton(PaymentMethodRepositoryInterface::class, PaymentMethodRepository::class);
        $this->app->singleton(PostRepositoryInterface::class, PostRepository::class);
        $this->app->singleton(ProductRepositoryInterface::class, ProductRepository::class);
        $this->app->singleton(ProductFavoriteRepositoryInterface::class, ProductFavoriterRepository::class);
        $this->app->singleton(ProductVariantRepositoryInterface::class, ProductVariantRepository::class);
        $this->app->singleton(ProvinceRepositoryInterface::class, ProvinceRepository::class);
        $this->app->singleton(SeoRepositoryInterface::class, SeoRepository::class);
        $this->app->singleton(UserRepositoryInterface::class, UserRepository::class);
        $this->app->singleton(WardRepositoryInterface::class, WardRepository::class);
        $this->app->singleton(AttributesRepositoryInterface::class, AttributesRepository::class);
        $this->app->singleton(ConfigRepositoryInterface::class, ConfigRepository::class);
        $this->app->singleton(ProductMediaRepositoryInterface::class, ProductMediaRepository::class);
        $this->app->singleton(AttributeValueRepositoryInterface::class, AttributeValueRepository::class);
        $this->app->singleton(VariantAttributeValuesRepositoryInterface::class, VariantAttributeValuesRepository::class);
        $this->app->singleton(ProductTagsRepositoryInterface::class, ProductTagsRepository::class);
        $this->app->singleton(TagRepositoryInterface::class, TagRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
