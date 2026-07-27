<?php

// @formatter:off
// phpcs:ignoreFile
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * App\Models\Addon
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $unique_identifier
 * @property string|null $version
 * @property int $activated
 * @property string|null $image
 * @property string|null $purchase_code
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Addon newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Addon newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Addon query()
 * @method static \Illuminate\Database\Eloquent\Builder|Addon whereActivated($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Addon whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Addon whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Addon whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Addon whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Addon wherePurchaseCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Addon whereUniqueIdentifier($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Addon whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Addon whereVersion($value)
 */
	class Addon extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Address
 *
 * @property int $id
 * @property int $user_id
 * @property string|null $address
 * @property int|null $country_id
 * @property int $state_id
 * @property int|null $city_id
 * @property float|null $longitude
 * @property float|null $latitude
 * @property string|null $postal_code
 * @property string|null $phone
 * @property int $set_default
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon $updated_at
 * @property-read \App\Models\City|null $city
 * @property-read \App\Models\Country|null $country
 * @property-read \App\Models\State|null $state
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|Address newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Address newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Address query()
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereCityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereCountryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereLatitude($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereLongitude($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address wherePostalCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereSetDefault($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereStateId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereUserId($value)
 */
	class Address extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\AffiliateConfig
 *
 * @method static \Illuminate\Database\Eloquent\Builder|AffiliateConfig newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AffiliateConfig newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AffiliateConfig query()
 */
	class AffiliateConfig extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\AffiliateEarningDetail
 *
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|AffiliateEarningDetail newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AffiliateEarningDetail newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AffiliateEarningDetail query()
 */
	class AffiliateEarningDetail extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\AffiliateLog
 *
 * @property-read \App\Models\Order|null $order
 * @property-read \App\Models\OrderDetail|null $order_detail
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|AffiliateLog newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AffiliateLog newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AffiliateLog query()
 */
	class AffiliateLog extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\AffiliateOption
 *
 * @method static \Illuminate\Database\Eloquent\Builder|AffiliateOption newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AffiliateOption newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AffiliateOption query()
 */
	class AffiliateOption extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\AffiliatePayment
 *
 * @method static \Illuminate\Database\Eloquent\Builder|AffiliatePayment newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AffiliatePayment newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AffiliatePayment query()
 */
	class AffiliatePayment extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\AffiliateStats
 *
 * @method static \Illuminate\Database\Eloquent\Builder|AffiliateStats newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AffiliateStats newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AffiliateStats query()
 */
	class AffiliateStats extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\AffiliateUser
 *
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|AffiliateUser newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AffiliateUser newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AffiliateUser query()
 */
	class AffiliateUser extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\AffiliateWithdrawRequest
 *
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|AffiliateWithdrawRequest newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AffiliateWithdrawRequest newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AffiliateWithdrawRequest query()
 */
	class AffiliateWithdrawRequest extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\AppSettings
 *
 * @property-read \App\Models\Currency|null $currency
 * @method static \Illuminate\Database\Eloquent\Builder|AppSettings newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AppSettings newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AppSettings query()
 */
	class AppSettings extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\AppTranslation
 *
 * @property int $id
 * @property string|null $lang
 * @property string|null $lang_key
 * @property string|null $lang_value
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|AppTranslation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AppTranslation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AppTranslation query()
 * @method static \Illuminate\Database\Eloquent\Builder|AppTranslation whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AppTranslation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AppTranslation whereLang($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AppTranslation whereLangKey($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AppTranslation whereLangValue($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AppTranslation whereUpdatedAt($value)
 */
	class AppTranslation extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Attribute
 *
 * @property int $id
 * @property string|null $name
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\AttributeTranslation> $attribute_translations
 * @property-read int|null $attribute_translations_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\AttributeValue> $attribute_values
 * @property-read int|null $attribute_values_count
 * @method static \Illuminate\Database\Eloquent\Builder|Attribute newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Attribute newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Attribute query()
 * @method static \Illuminate\Database\Eloquent\Builder|Attribute whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Attribute whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Attribute whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Attribute whereUpdatedAt($value)
 */
	class Attribute extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\AttributeCategory
 *
 * @property int $id
 * @property int $category_id
 * @property int $attribute_id
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|AttributeCategory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AttributeCategory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AttributeCategory query()
 * @method static \Illuminate\Database\Eloquent\Builder|AttributeCategory whereAttributeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AttributeCategory whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AttributeCategory whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AttributeCategory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AttributeCategory whereUpdatedAt($value)
 */
	class AttributeCategory extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\AttributeTranslation
 *
 * @property int $id
 * @property int $attribute_id
 * @property string $name
 * @property string $lang
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon $updated_at
 * @property-read \App\Models\Attribute|null $attribute
 * @method static \Illuminate\Database\Eloquent\Builder|AttributeTranslation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AttributeTranslation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AttributeTranslation query()
 * @method static \Illuminate\Database\Eloquent\Builder|AttributeTranslation whereAttributeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AttributeTranslation whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AttributeTranslation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AttributeTranslation whereLang($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AttributeTranslation whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AttributeTranslation whereUpdatedAt($value)
 */
	class AttributeTranslation extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\AttributeValue
 *
 * @property int $id
 * @property int $attribute_id
 * @property string $value
 * @property string|null $color_code
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon $updated_at
 * @property-read \App\Models\Attribute|null $attribute
 * @method static \Illuminate\Database\Eloquent\Builder|AttributeValue newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AttributeValue newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AttributeValue query()
 * @method static \Illuminate\Database\Eloquent\Builder|AttributeValue whereAttributeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AttributeValue whereColorCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AttributeValue whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AttributeValue whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AttributeValue whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AttributeValue whereValue($value)
 */
	class AttributeValue extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\AuctionProductBid
 *
 * @property-read \App\Models\Product|null $product
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|AuctionProductBid newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AuctionProductBid newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AuctionProductBid query()
 */
	class AuctionProductBid extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Banner
 *
 * @method static \Illuminate\Database\Eloquent\Builder|Banner newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Banner newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Banner query()
 */
	class Banner extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Blog
 *
 * @property int $id
 * @property int $category_id
 * @property string $title
 * @property string $slug
 * @property string|null $short_description
 * @property string|null $description
 * @property int|null $banner
 * @property string|null $meta_title
 * @property int|null $meta_img
 * @property string|null $meta_description
 * @property string|null $meta_keywords
 * @property int $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\BlogCategory|null $category
 * @method static \Illuminate\Database\Eloquent\Builder|Blog newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Blog newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Blog onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Blog query()
 * @method static \Illuminate\Database\Eloquent\Builder|Blog whereBanner($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Blog whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Blog whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Blog whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Blog whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Blog whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Blog whereMetaDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Blog whereMetaImg($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Blog whereMetaKeywords($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Blog whereMetaTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Blog whereShortDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Blog whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Blog whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Blog whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Blog whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Blog withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Blog withoutTrashed()
 */
	class Blog extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\BlogCategory
 *
 * @property int $id
 * @property string $category_name
 * @property string $slug
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Blog> $posts
 * @property-read int|null $posts_count
 * @method static \Illuminate\Database\Eloquent\Builder|BlogCategory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BlogCategory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BlogCategory onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|BlogCategory query()
 * @method static \Illuminate\Database\Eloquent\Builder|BlogCategory whereCategoryName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BlogCategory whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BlogCategory whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BlogCategory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BlogCategory whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BlogCategory whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BlogCategory withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|BlogCategory withoutTrashed()
 */
	class BlogCategory extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Brand
 *
 * @property int $id
 * @property string $name
 * @property string|null $logo
 * @property int $top
 * @property string|null $slug
 * @property string|null $meta_title
 * @property string|null $meta_description
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\BrandTranslation> $brand_translations
 * @property-read int|null $brand_translations_count
 * @method static \Illuminate\Database\Eloquent\Builder|Brand newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Brand newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Brand query()
 * @method static \Illuminate\Database\Eloquent\Builder|Brand whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Brand whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Brand whereLogo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Brand whereMetaDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Brand whereMetaTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Brand whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Brand whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Brand whereTop($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Brand whereUpdatedAt($value)
 */
	class Brand extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\BrandTranslation
 *
 * @property int $id
 * @property int $brand_id
 * @property string $name
 * @property string $lang
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon $updated_at
 * @property-read \App\Models\Brand|null $brand
 * @method static \Illuminate\Database\Eloquent\Builder|BrandTranslation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BrandTranslation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BrandTranslation query()
 * @method static \Illuminate\Database\Eloquent\Builder|BrandTranslation whereBrandId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BrandTranslation whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BrandTranslation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BrandTranslation whereLang($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BrandTranslation whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BrandTranslation whereUpdatedAt($value)
 */
	class BrandTranslation extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\BusinessSetting
 *
 * @property int $id
 * @property string $type
 * @property string|null $value
 * @property string|null $lang
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|BusinessSetting newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BusinessSetting newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BusinessSetting query()
 * @method static \Illuminate\Database\Eloquent\Builder|BusinessSetting whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BusinessSetting whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BusinessSetting whereLang($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BusinessSetting whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BusinessSetting whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BusinessSetting whereValue($value)
 */
	class BusinessSetting extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Carrier
 *
 * @property int $id
 * @property string $name
 * @property int|null $logo
 * @property string $transit_time
 * @property int $free_shipping
 * @property int $status
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\CarrierRangePrice> $carrier_range_prices
 * @property-read int|null $carrier_range_prices_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\CarrierRange> $carrier_ranges
 * @property-read int|null $carrier_ranges_count
 * @method static \Illuminate\Database\Eloquent\Builder|Carrier active()
 * @method static \Illuminate\Database\Eloquent\Builder|Carrier newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Carrier newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Carrier query()
 * @method static \Illuminate\Database\Eloquent\Builder|Carrier whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Carrier whereFreeShipping($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Carrier whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Carrier whereLogo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Carrier whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Carrier whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Carrier whereTransitTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Carrier whereUpdatedAt($value)
 */
	class Carrier extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\CarrierRange
 *
 * @property int $id
 * @property int $carrier_id
 * @property string $billing_type
 * @property float $delimiter1
 * @property float $delimiter2
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon $updated_at
 * @property-read \App\Models\Carrier|null $carrier
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\CarrierRangePrice> $carrier_range_prices
 * @property-read int|null $carrier_range_prices_count
 * @method static \Illuminate\Database\Eloquent\Builder|CarrierRange newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CarrierRange newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CarrierRange query()
 * @method static \Illuminate\Database\Eloquent\Builder|CarrierRange whereBillingType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CarrierRange whereCarrierId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CarrierRange whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CarrierRange whereDelimiter1($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CarrierRange whereDelimiter2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CarrierRange whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CarrierRange whereUpdatedAt($value)
 */
	class CarrierRange extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\CarrierRangePrice
 *
 * @property int $id
 * @property int $carrier_id
 * @property int $carrier_range_id
 * @property int $zone_id
 * @property float $price
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon $updated_at
 * @property-read \App\Models\Carrier|null $carrier
 * @property-read \App\Models\CarrierRange|null $carrier_ranges
 * @property-read \App\Models\Zone|null $zone
 * @method static \Illuminate\Database\Eloquent\Builder|CarrierRangePrice newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CarrierRangePrice newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CarrierRangePrice query()
 * @method static \Illuminate\Database\Eloquent\Builder|CarrierRangePrice whereCarrierId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CarrierRangePrice whereCarrierRangeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CarrierRangePrice whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CarrierRangePrice whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CarrierRangePrice wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CarrierRangePrice whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CarrierRangePrice whereZoneId($value)
 */
	class CarrierRangePrice extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Cart
 *
 * @property int $id
 * @property int $status
 * @property int|null $owner_id
 * @property int|null $user_id
 * @property string|null $temp_user_id
 * @property int $address_id
 * @property int|null $product_id
 * @property string|null $variation
 * @property float|null $price
 * @property float|null $tax
 * @property float $shipping_cost
 * @property string $shipping_type
 * @property int|null $pickup_point
 * @property int|null $carrier_id
 * @property float $discount
 * @property string|null $product_referral_code
 * @property string|null $coupon_code
 * @property int $coupon_applied
 * @property int $quantity
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Address|null $address
 * @property-read \App\Models\Product|null $product
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|Cart active()
 * @method static \Illuminate\Database\Eloquent\Builder|Cart newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Cart newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Cart query()
 * @method static \Illuminate\Database\Eloquent\Builder|Cart whereAddressId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cart whereCarrierId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cart whereCouponApplied($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cart whereCouponCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cart whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cart whereDiscount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cart whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cart whereOwnerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cart wherePickupPoint($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cart wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cart whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cart whereProductReferralCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cart whereQuantity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cart whereShippingCost($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cart whereShippingType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cart whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cart whereTax($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cart whereTempUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cart whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cart whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cart whereVariation($value)
 */
	class Cart extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\CartProduct
 *
 * @property-read \App\Models\Product|null $product
 * @method static \Illuminate\Database\Eloquent\Builder|CartProduct newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CartProduct newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CartProduct query()
 */
	class CartProduct extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Category
 *
 * @property int $id
 * @property int|null $parent_id
 * @property int $level
 * @property string $name
 * @property int $order_level
 * @property float|null $commision_rate
 * @property string|null $banner
 * @property string|null $icon
 * @property string|null $cover_image
 * @property int $featured
 * @property int $top
 * @property int $digital
 * @property string|null $slug
 * @property string|null $meta_title
 * @property string|null $meta_description
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property mixed|null $faq_questions
 * @property mixed|null $faq_answers
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Attribute> $attributes
 * @property-read int|null $attributes_count
 * @property-read \App\Models\Upload|null $bannerImage
 * @property-read \App\Models\Upload|null $catIcon
 * @property-read \Illuminate\Database\Eloquent\Collection<int, Category> $categories
 * @property-read int|null $categories_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\CategoryTranslation> $category_translations
 * @property-read int|null $category_translations_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, Category> $childrenCategories
 * @property-read int|null $children_categories_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\CustomerProduct> $classified_products
 * @property-read int|null $classified_products_count
 * @property-read \App\Models\Upload|null $coverImage
 * @property-read Category|null $parentCategory
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\PreorderProduct> $preorderProducts
 * @property-read int|null $preorder_products_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Product> $products
 * @property-read int|null $products_count
 * @property-read \App\Models\SizeChart|null $sizeChart
 * @method static \Illuminate\Database\Eloquent\Builder|Category newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Category newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Category query()
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereBanner($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereCommisionRate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereCoverImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereDigital($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereFaqAnswers($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereFaqQuestions($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereFeatured($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereIcon($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereLevel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereMetaDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereMetaTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereOrderLevel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereParentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereTop($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereUpdatedAt($value)
 */
	class Category extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\CategoryTranslation
 *
 * @property int $id
 * @property int $category_id
 * @property string $name
 * @property string $lang
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon $updated_at
 * @property-read \App\Models\Category|null $category
 * @method static \Illuminate\Database\Eloquent\Builder|CategoryTranslation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CategoryTranslation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CategoryTranslation query()
 * @method static \Illuminate\Database\Eloquent\Builder|CategoryTranslation whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CategoryTranslation whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CategoryTranslation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CategoryTranslation whereLang($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CategoryTranslation whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CategoryTranslation whereUpdatedAt($value)
 */
	class CategoryTranslation extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\City
 *
 * @property int $id
 * @property string $name
 * @property int $state_id
 * @property float $cost
 * @property int $status
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon $updated_at
 * @property string|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\CityTranslation> $city_translations
 * @property-read int|null $city_translations_count
 * @property-read \App\Models\Country|null $country
 * @property-read \App\Models\State|null $state
 * @method static \Illuminate\Database\Eloquent\Builder|City newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|City newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|City query()
 * @method static \Illuminate\Database\Eloquent\Builder|City whereCost($value)
 * @method static \Illuminate\Database\Eloquent\Builder|City whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|City whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|City whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|City whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|City whereStateId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|City whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|City whereUpdatedAt($value)
 */
	class City extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\CityTranslation
 *
 * @property int $id
 * @property int $city_id
 * @property string $name
 * @property string $lang
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon $updated_at
 * @property-read \App\Models\City|null $city
 * @method static \Illuminate\Database\Eloquent\Builder|CityTranslation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CityTranslation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CityTranslation query()
 * @method static \Illuminate\Database\Eloquent\Builder|CityTranslation whereCityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CityTranslation whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CityTranslation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CityTranslation whereLang($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CityTranslation whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CityTranslation whereUpdatedAt($value)
 */
	class CityTranslation extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\ClubPoint
 *
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\ClubPointDetail> $club_point_details
 * @property-read int|null $club_point_details_count
 * @property-read \App\Models\Order|null $order
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|ClubPoint newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ClubPoint newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ClubPoint query()
 */
	class ClubPoint extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\ClubPointDetail
 *
 * @property-read \App\Models\ClubPoint|null $club_point
 * @property-read \App\Models\Product|null $product
 * @method static \Illuminate\Database\Eloquent\Builder|ClubPointDetail newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ClubPointDetail newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ClubPointDetail query()
 */
	class ClubPointDetail extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Color
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $code
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Color newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Color newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Color query()
 * @method static \Illuminate\Database\Eloquent\Builder|Color whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Color whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Color whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Color whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Color whereUpdatedAt($value)
 */
	class Color extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\CombinedOrder
 *
 * @property int $id
 * @property int $user_id
 * @property string|null $shipping_address
 * @property float $grand_total
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Order> $orders
 * @property-read int|null $orders_count
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|CombinedOrder newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CombinedOrder newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CombinedOrder query()
 * @method static \Illuminate\Database\Eloquent\Builder|CombinedOrder whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CombinedOrder whereGrandTotal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CombinedOrder whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CombinedOrder whereShippingAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CombinedOrder whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CombinedOrder whereUserId($value)
 */
	class CombinedOrder extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\CommissionHistory
 *
 * @property int $id
 * @property int $order_id
 * @property int $order_detail_id
 * @property int $seller_id
 * @property float $admin_commission
 * @property float $seller_earning
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon $updated_at
 * @property-read \App\Models\Order|null $order
 * @method static \Illuminate\Database\Eloquent\Builder|CommissionHistory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CommissionHistory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CommissionHistory query()
 * @method static \Illuminate\Database\Eloquent\Builder|CommissionHistory whereAdminCommission($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CommissionHistory whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CommissionHistory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CommissionHistory whereOrderDetailId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CommissionHistory whereOrderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CommissionHistory whereSellerEarning($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CommissionHistory whereSellerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CommissionHistory whereUpdatedAt($value)
 */
	class CommissionHistory extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Contact
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string|null $phone
 * @property string $content
 * @property string|null $image
 * @property string|null $reply
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Contact newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Contact newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Contact query()
 * @method static \Illuminate\Database\Eloquent\Builder|Contact whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contact whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contact whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contact whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contact whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contact whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contact wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contact whereReply($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contact whereUpdatedAt($value)
 */
	class Contact extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Conversation
 *
 * @property int $id
 * @property int $sender_id
 * @property int $receiver_id
 * @property string|null $title
 * @property int $sender_viewed
 * @property int $receiver_viewed
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Message> $messages
 * @property-read int|null $messages_count
 * @property-read \App\Models\User|null $receiver
 * @property-read \App\Models\User|null $sender
 * @method static \Illuminate\Database\Eloquent\Builder|Conversation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Conversation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Conversation query()
 * @method static \Illuminate\Database\Eloquent\Builder|Conversation whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Conversation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Conversation whereReceiverId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Conversation whereReceiverViewed($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Conversation whereSenderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Conversation whereSenderViewed($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Conversation whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Conversation whereUpdatedAt($value)
 */
	class Conversation extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Country
 *
 * @property int $id
 * @property string $code
 * @property string $name
 * @property int $zone_id
 * @property int $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property-read \App\Models\Zone|null $zone
 * @method static \Illuminate\Database\Eloquent\Builder|Country isEnabled()
 * @method static \Illuminate\Database\Eloquent\Builder|Country newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Country newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Country query()
 * @method static \Illuminate\Database\Eloquent\Builder|Country whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Country whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Country whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Country whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Country whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Country whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Country whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Country whereZoneId($value)
 */
	class Country extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Coupon
 *
 * @property int $id
 * @property int $user_id
 * @property string $type
 * @property string $code
 * @property string $details
 * @property float $discount
 * @property string $discount_type
 * @property int|null $start_date
 * @property int|null $end_date
 * @property int $status
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\CouponUsage> $couponUsages
 * @property-read int|null $coupon_usages_count
 * @property-read \App\Models\User|null $user
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\UserCoupon> $userCoupons
 * @property-read int|null $user_coupons_count
 * @method static \Illuminate\Database\Eloquent\Builder|Coupon newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Coupon newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Coupon query()
 * @method static \Illuminate\Database\Eloquent\Builder|Coupon whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Coupon whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Coupon whereDetails($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Coupon whereDiscount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Coupon whereDiscountType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Coupon whereEndDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Coupon whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Coupon whereStartDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Coupon whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Coupon whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Coupon whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Coupon whereUserId($value)
 */
	class Coupon extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\CouponUsage
 *
 * @property int $id
 * @property int $user_id
 * @property int $coupon_id
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|CouponUsage newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CouponUsage newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CouponUsage query()
 * @method static \Illuminate\Database\Eloquent\Builder|CouponUsage whereCouponId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CouponUsage whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CouponUsage whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CouponUsage whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CouponUsage whereUserId($value)
 */
	class CouponUsage extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Currency
 *
 * @property int $id
 * @property string $name
 * @property string $symbol
 * @property float $exchange_rate
 * @property int $status
 * @property string|null $code
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Currency newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Currency newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Currency query()
 * @method static \Illuminate\Database\Eloquent\Builder|Currency whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Currency whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Currency whereExchangeRate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Currency whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Currency whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Currency whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Currency whereSymbol($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Currency whereUpdatedAt($value)
 */
	class Currency extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\CustomAlert
 *
 * @property int $id
 * @property int $status
 * @property string $type
 * @property string|null $banner
 * @property string $link
 * @property string $description
 * @property string|null $text_color
 * @property string|null $background_color
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|CustomAlert newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CustomAlert newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CustomAlert query()
 * @method static \Illuminate\Database\Eloquent\Builder|CustomAlert whereBackgroundColor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CustomAlert whereBanner($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CustomAlert whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CustomAlert whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CustomAlert whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CustomAlert whereLink($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CustomAlert whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CustomAlert whereTextColor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CustomAlert whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CustomAlert whereUpdatedAt($value)
 */
	class CustomAlert extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Customer
 *
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|Customer newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Customer newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Customer query()
 */
	class Customer extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\CustomerPackage
 *
 * @property int $id
 * @property string|null $name
 * @property float|null $amount
 * @property int|null $product_upload
 * @property string|null $logo
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\CustomerPackagePayment> $customer_package_payments
 * @property-read int|null $customer_package_payments_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\CustomerPackageTranslation> $customer_package_translations
 * @property-read int|null $customer_package_translations_count
 * @method static \Illuminate\Database\Eloquent\Builder|CustomerPackage newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CustomerPackage newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CustomerPackage query()
 * @method static \Illuminate\Database\Eloquent\Builder|CustomerPackage whereAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CustomerPackage whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CustomerPackage whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CustomerPackage whereLogo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CustomerPackage whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CustomerPackage whereProductUpload($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CustomerPackage whereUpdatedAt($value)
 */
	class CustomerPackage extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\CustomerPackagePayment
 *
 * @property int $id
 * @property int $user_id
 * @property int $customer_package_id
 * @property string $payment_method
 * @property float $amount
 * @property string|null $payment_details
 * @property int $approval
 * @property int $offline_payment 1=offline payment
 * 2=online paymnet
 * @property string $reciept
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon $updated_at
 * @property-read \App\Models\CustomerPackage|null $customer_package
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|CustomerPackagePayment newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CustomerPackagePayment newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CustomerPackagePayment query()
 * @method static \Illuminate\Database\Eloquent\Builder|CustomerPackagePayment whereAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CustomerPackagePayment whereApproval($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CustomerPackagePayment whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CustomerPackagePayment whereCustomerPackageId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CustomerPackagePayment whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CustomerPackagePayment whereOfflinePayment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CustomerPackagePayment wherePaymentDetails($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CustomerPackagePayment wherePaymentMethod($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CustomerPackagePayment whereReciept($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CustomerPackagePayment whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CustomerPackagePayment whereUserId($value)
 */
	class CustomerPackagePayment extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\CustomerPackageTranslation
 *
 * @property int $id
 * @property int $customer_package_id
 * @property string $name
 * @property string $lang
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon $updated_at
 * @property-read \App\Models\CustomerPackage|null $customer_package
 * @method static \Illuminate\Database\Eloquent\Builder|CustomerPackageTranslation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CustomerPackageTranslation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CustomerPackageTranslation query()
 * @method static \Illuminate\Database\Eloquent\Builder|CustomerPackageTranslation whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CustomerPackageTranslation whereCustomerPackageId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CustomerPackageTranslation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CustomerPackageTranslation whereLang($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CustomerPackageTranslation whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CustomerPackageTranslation whereUpdatedAt($value)
 */
	class CustomerPackageTranslation extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\CustomerProduct
 *
 * @property int $id
 * @property string|null $name
 * @property int $published
 * @property int $status
 * @property string|null $added_by
 * @property int|null $user_id
 * @property int|null $category_id
 * @property int|null $subcategory_id
 * @property int|null $subsubcategory_id
 * @property int|null $brand_id
 * @property string|null $photos
 * @property string|null $thumbnail_img
 * @property string|null $conditon
 * @property string|null $location
 * @property string|null $video_provider
 * @property string|null $video_link
 * @property string|null $unit
 * @property string|null $tags
 * @property string|null $description
 * @property float|null $unit_price
 * @property string|null $meta_title
 * @property string|null $meta_description
 * @property string|null $meta_img
 * @property string|null $pdf
 * @property string|null $slug
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon $updated_at
 * @property-read \App\Models\Brand|null $brand
 * @property-read \App\Models\Category|null $category
 * @property-read \App\Models\City|null $city
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\CustomerProductTranslation> $customer_product_translations
 * @property-read int|null $customer_product_translations_count
 * @property-read \App\Models\State|null $state
 * @property-read \App\Models\SubCategory|null $subcategory
 * @property-read \App\Models\SubSubCategory|null $subsubcategory
 * @property-read \App\Models\Upload|null $thumbnail
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|CustomerProduct isActiveAndApproval()
 * @method static \Illuminate\Database\Eloquent\Builder|CustomerProduct newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CustomerProduct newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CustomerProduct query()
 * @method static \Illuminate\Database\Eloquent\Builder|CustomerProduct whereAddedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CustomerProduct whereBrandId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CustomerProduct whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CustomerProduct whereConditon($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CustomerProduct whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CustomerProduct whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CustomerProduct whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CustomerProduct whereLocation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CustomerProduct whereMetaDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CustomerProduct whereMetaImg($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CustomerProduct whereMetaTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CustomerProduct whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CustomerProduct wherePdf($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CustomerProduct wherePhotos($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CustomerProduct wherePublished($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CustomerProduct whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CustomerProduct whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CustomerProduct whereSubcategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CustomerProduct whereSubsubcategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CustomerProduct whereTags($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CustomerProduct whereThumbnailImg($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CustomerProduct whereUnit($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CustomerProduct whereUnitPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CustomerProduct whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CustomerProduct whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CustomerProduct whereVideoLink($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CustomerProduct whereVideoProvider($value)
 */
	class CustomerProduct extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\CustomerProductTranslation
 *
 * @property int $id
 * @property int $customer_product_id
 * @property string|null $name
 * @property string|null $unit
 * @property string|null $description
 * @property string $lang
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon $updated_at
 * @property-read \App\Models\CustomerProduct|null $customer_product
 * @method static \Illuminate\Database\Eloquent\Builder|CustomerProductTranslation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CustomerProductTranslation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CustomerProductTranslation query()
 * @method static \Illuminate\Database\Eloquent\Builder|CustomerProductTranslation whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CustomerProductTranslation whereCustomerProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CustomerProductTranslation whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CustomerProductTranslation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CustomerProductTranslation whereLang($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CustomerProductTranslation whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CustomerProductTranslation whereUnit($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CustomerProductTranslation whereUpdatedAt($value)
 */
	class CustomerProductTranslation extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\DeliveryBoy
 *
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|DeliveryBoy newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DeliveryBoy newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DeliveryBoy query()
 */
	class DeliveryBoy extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\DeliveryBoyCollection
 *
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|DeliveryBoyCollection newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DeliveryBoyCollection newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DeliveryBoyCollection query()
 */
	class DeliveryBoyCollection extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\DeliveryBoyPayment
 *
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|DeliveryBoyPayment newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DeliveryBoyPayment newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DeliveryBoyPayment query()
 */
	class DeliveryBoyPayment extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\DeliveryHistory
 *
 * @property-read \App\Models\Order|null $order
 * @method static \Illuminate\Database\Eloquent\Builder|DeliveryHistory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DeliveryHistory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DeliveryHistory query()
 */
	class DeliveryHistory extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\DynamicPopup
 *
 * @property int $id
 * @property int $status
 * @property string $title
 * @property string $summary
 * @property string|null $banner
 * @property string $btn_link
 * @property string|null $btn_text
 * @property string|null $btn_text_color
 * @property string|null $btn_background_color
 * @property string|null $show_subscribe_form
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|DynamicPopup newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DynamicPopup newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DynamicPopup query()
 * @method static \Illuminate\Database\Eloquent\Builder|DynamicPopup whereBanner($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DynamicPopup whereBtnBackgroundColor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DynamicPopup whereBtnLink($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DynamicPopup whereBtnText($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DynamicPopup whereBtnTextColor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DynamicPopup whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DynamicPopup whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DynamicPopup whereShowSubscribeForm($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DynamicPopup whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DynamicPopup whereSummary($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DynamicPopup whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DynamicPopup whereUpdatedAt($value)
 */
	class DynamicPopup extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\EmailTemplate
 *
 * @property int $id
 * @property string $receiver
 * @property string $identifier
 * @property string $email_type
 * @property string $subject
 * @property string|null $default_text
 * @property int $status
 * @property int $is_status_changeable 1 = changeable ; 0 = non-changeable
 * @property int $is_dafault_text_editable 1 = editable ; 0 = non-editable
 * @property string|null $addon
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|EmailTemplate newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|EmailTemplate newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|EmailTemplate query()
 * @method static \Illuminate\Database\Eloquent\Builder|EmailTemplate whereAddon($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EmailTemplate whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EmailTemplate whereDefaultText($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EmailTemplate whereEmailType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EmailTemplate whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EmailTemplate whereIdentifier($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EmailTemplate whereIsDafaultTextEditable($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EmailTemplate whereIsStatusChangeable($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EmailTemplate whereReceiver($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EmailTemplate whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EmailTemplate whereSubject($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EmailTemplate whereUpdatedAt($value)
 */
	class EmailTemplate extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Faq
 *
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\FaqTranslation> $faq_translations
 * @property-read int|null $faq_translations_count
 * @method static \Illuminate\Database\Eloquent\Builder|Faq newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Faq newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Faq query()
 */
	class Faq extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\FaqTranslation
 *
 * @property-read \App\Models\Faq|null $faq
 * @method static \Illuminate\Database\Eloquent\Builder|FaqTranslation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FaqTranslation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FaqTranslation query()
 */
	class FaqTranslation extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\FirebaseNotification
 *
 * @property int $id
 * @property string|null $title
 * @property string|null $text
 * @property string $item_type
 * @property int $item_type_id
 * @property int $receiver_id
 * @property int $is_read
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|FirebaseNotification newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FirebaseNotification newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FirebaseNotification query()
 * @method static \Illuminate\Database\Eloquent\Builder|FirebaseNotification whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FirebaseNotification whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FirebaseNotification whereIsRead($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FirebaseNotification whereItemType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FirebaseNotification whereItemTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FirebaseNotification whereReceiverId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FirebaseNotification whereText($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FirebaseNotification whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FirebaseNotification whereUpdatedAt($value)
 */
	class FirebaseNotification extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\FlashDeal
 *
 * @property int $id
 * @property string|null $title
 * @property int|null $start_date
 * @property int|null $end_date
 * @property int $status
 * @property int $featured
 * @property string|null $background_color
 * @property string|null $text_color
 * @property string|null $banner
 * @property string|null $slug
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\FlashDealProduct> $flash_deal_products
 * @property-read int|null $flash_deal_products_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\FlashDealTranslation> $flash_deal_translations
 * @property-read int|null $flash_deal_translations_count
 * @method static \Illuminate\Database\Eloquent\Builder|FlashDeal isActiveAndFeatured()
 * @method static \Illuminate\Database\Eloquent\Builder|FlashDeal newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FlashDeal newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FlashDeal query()
 * @method static \Illuminate\Database\Eloquent\Builder|FlashDeal whereBackgroundColor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FlashDeal whereBanner($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FlashDeal whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FlashDeal whereEndDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FlashDeal whereFeatured($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FlashDeal whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FlashDeal whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FlashDeal whereStartDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FlashDeal whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FlashDeal whereTextColor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FlashDeal whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FlashDeal whereUpdatedAt($value)
 */
	class FlashDeal extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\FlashDealProduct
 *
 * @property int $id
 * @property int $flash_deal_id
 * @property int $product_id
 * @property float|null $discount
 * @property string|null $discount_type
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon $updated_at
 * @property-read \App\Models\Product|null $product
 * @method static \Illuminate\Database\Eloquent\Builder|FlashDealProduct newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FlashDealProduct newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FlashDealProduct query()
 * @method static \Illuminate\Database\Eloquent\Builder|FlashDealProduct whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FlashDealProduct whereDiscount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FlashDealProduct whereDiscountType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FlashDealProduct whereFlashDealId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FlashDealProduct whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FlashDealProduct whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FlashDealProduct whereUpdatedAt($value)
 */
	class FlashDealProduct extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\FlashDealTranslation
 *
 * @property int $id
 * @property int $flash_deal_id
 * @property string $title
 * @property string $lang
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon $updated_at
 * @property-read \App\Models\FlashDeal|null $flash_deal
 * @method static \Illuminate\Database\Eloquent\Builder|FlashDealTranslation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FlashDealTranslation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FlashDealTranslation query()
 * @method static \Illuminate\Database\Eloquent\Builder|FlashDealTranslation whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FlashDealTranslation whereFlashDealId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FlashDealTranslation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FlashDealTranslation whereLang($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FlashDealTranslation whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FlashDealTranslation whereUpdatedAt($value)
 */
	class FlashDealTranslation extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\FollowSeller
 *
 * @property int $user_id
 * @property int $shop_id
 * @property-read \App\Models\Shop|null $shop
 * @method static \Illuminate\Database\Eloquent\Builder|FollowSeller newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FollowSeller newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FollowSeller query()
 * @method static \Illuminate\Database\Eloquent\Builder|FollowSeller whereShopId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FollowSeller whereUserId($value)
 */
	class FollowSeller extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\FrequentlyBoughtProduct
 *
 * @property int $product_id
 * @property int|null $frequently_bought_product_id
 * @property int|null $category_id
 * @property-read \App\Models\Product|null $frequently_bought_product
 * @property-read \App\Models\Product|null $product
 * @method static \Illuminate\Database\Eloquent\Builder|FrequentlyBoughtProduct newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FrequentlyBoughtProduct newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FrequentlyBoughtProduct query()
 * @method static \Illuminate\Database\Eloquent\Builder|FrequentlyBoughtProduct whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FrequentlyBoughtProduct whereFrequentlyBoughtProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FrequentlyBoughtProduct whereProductId($value)
 */
	class FrequentlyBoughtProduct extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Language
 *
 * @property int $id
 * @property string $name
 * @property string $code
 * @property string|null $app_lang_code
 * @property int $rtl
 * @property int $status
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Language newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Language newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Language query()
 * @method static \Illuminate\Database\Eloquent\Builder|Language whereAppLangCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Language whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Language whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Language whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Language whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Language whereRtl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Language whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Language whereUpdatedAt($value)
 */
	class Language extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\LastViewedProduct
 *
 * @property int $id
 * @property int $user_id
 * @property int $product_id
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon $updated_at
 * @property-read \App\Models\Product|null $product
 * @method static \Illuminate\Database\Eloquent\Builder|LastViewedProduct newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|LastViewedProduct newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|LastViewedProduct query()
 * @method static \Illuminate\Database\Eloquent\Builder|LastViewedProduct whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LastViewedProduct whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LastViewedProduct whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LastViewedProduct whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LastViewedProduct whereUserId($value)
 */
	class LastViewedProduct extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\ManualPaymentMethod
 *
 * @method static \Illuminate\Database\Eloquent\Builder|ManualPaymentMethod newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ManualPaymentMethod newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ManualPaymentMethod query()
 */
	class ManualPaymentMethod extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\MeasurementPoint
 *
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|MeasurementPoint newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MeasurementPoint newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MeasurementPoint query()
 * @method static \Illuminate\Database\Eloquent\Builder|MeasurementPoint whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MeasurementPoint whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MeasurementPoint whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MeasurementPoint whereUpdatedAt($value)
 */
	class MeasurementPoint extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Message
 *
 * @property int $id
 * @property int $conversation_id
 * @property int $user_id
 * @property string|null $message
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon $updated_at
 * @property-read \App\Models\Conversation|null $conversation
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|Message newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Message newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Message query()
 * @method static \Illuminate\Database\Eloquent\Builder|Message whereConversationId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Message whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Message whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Message whereMessage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Message whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Message whereUserId($value)
 */
	class Message extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Note
 *
 * @property int $id
 * @property int $user_id
 * @property string $note_type
 * @property string $description
 * @property int $seller_access Seller can access admin note;
 * 0 = No
 * 1 = Yes
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\NoteTranslation> $note_translations
 * @property-read int|null $note_translations_count
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|Note newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Note newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Note query()
 * @method static \Illuminate\Database\Eloquent\Builder|Note whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Note whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Note whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Note whereNoteType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Note whereSellerAccess($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Note whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Note whereUserId($value)
 */
	class Note extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\NoteTranslation
 *
 * @property int $id
 * @property int $note_id
 * @property string $description
 * @property string $lang
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon $updated_at
 * @property-read \App\Models\Brand|null $brand
 * @method static \Illuminate\Database\Eloquent\Builder|NoteTranslation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|NoteTranslation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|NoteTranslation query()
 * @method static \Illuminate\Database\Eloquent\Builder|NoteTranslation whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NoteTranslation whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NoteTranslation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NoteTranslation whereLang($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NoteTranslation whereNoteId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NoteTranslation whereUpdatedAt($value)
 */
	class NoteTranslation extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\NotificationType
 *
 * @property int $id
 * @property string $user_type
 * @property string $type
 * @property string $name
 * @property string|null $image
 * @property string $default_text
 * @property int $status
 * @property string|null $addon
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\NotificationTypeTranslation> $notificationTypeTranslations
 * @property-read int|null $notification_type_translations_count
 * @method static \Illuminate\Database\Eloquent\Builder|NotificationType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|NotificationType newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|NotificationType query()
 * @method static \Illuminate\Database\Eloquent\Builder|NotificationType whereAddon($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NotificationType whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NotificationType whereDefaultText($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NotificationType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NotificationType whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NotificationType whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NotificationType whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NotificationType whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NotificationType whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NotificationType whereUserType($value)
 */
	class NotificationType extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\NotificationTypeTranslation
 *
 * @property int $id
 * @property int $notification_type_id
 * @property string $name
 * @property string $default_text
 * @property string $lang
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon $updated_at
 * @property-read \App\Models\NotificationType|null $notificationType
 * @method static \Illuminate\Database\Eloquent\Builder|NotificationTypeTranslation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|NotificationTypeTranslation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|NotificationTypeTranslation query()
 * @method static \Illuminate\Database\Eloquent\Builder|NotificationTypeTranslation whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NotificationTypeTranslation whereDefaultText($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NotificationTypeTranslation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NotificationTypeTranslation whereLang($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NotificationTypeTranslation whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NotificationTypeTranslation whereNotificationTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NotificationTypeTranslation whereUpdatedAt($value)
 */
	class NotificationTypeTranslation extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Order
 *
 * @property int $id
 * @property int|null $combined_order_id
 * @property int|null $user_id
 * @property int|null $guest_id
 * @property int|null $seller_id
 * @property string|null $shipping_address
 * @property string|null $additional_info
 * @property string $shipping_type
 * @property string $order_from
 * @property int $pickup_point_id
 * @property int|null $carrier_id
 * @property string|null $delivery_status
 * @property string|null $payment_type
 * @property string|null $payment_status
 * @property string|null $payment_details
 * @property float|null $grand_total
 * @property float $coupon_discount
 * @property string|null $code
 * @property string|null $tracking_code
 * @property int $date
 * @property int $viewed
 * @property int $delivery_viewed
 * @property int|null $payment_status_viewed
 * @property int $commission_calculated
 * @property int $notified
 * @property string|null $delivered_date
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\AffiliateLog> $affiliate_log
 * @property-read int|null $affiliate_log_count
 * @property-read \App\Models\Carrier|null $carrier
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\ClubPoint> $club_point
 * @property-read int|null $club_point_count
 * @property-read \App\Models\CommissionHistory|null $commissionHistory
 * @property-read \App\Models\User|null $delivery_boy
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\OrderDetail> $orderDetails
 * @property-read int|null $order_details_count
 * @property-read \App\Models\PickupPoint|null $pickup_point
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\ProxyPayment> $proxy_cart_reference_id
 * @property-read int|null $proxy_cart_reference_id_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\RefundRequest> $refund_requests
 * @property-read int|null $refund_requests_count
 * @property-read \App\Models\Shop|null $shop
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|Order newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Order newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Order query()
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereAdditionalInfo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereCarrierId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereCombinedOrderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereCommissionCalculated($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereCouponDiscount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereDeliveredDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereDeliveryStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereDeliveryViewed($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereGrandTotal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereGuestId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereNotified($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereOrderFrom($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order wherePaymentDetails($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order wherePaymentStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order wherePaymentStatusViewed($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order wherePaymentType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order wherePickupPointId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereSellerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereShippingAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereShippingType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereTrackingCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereViewed($value)
 */
	class Order extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\OrderDetail
 *
 * @property int $id
 * @property int $order_id
 * @property int|null $seller_id
 * @property int $product_id
 * @property string|null $variation
 * @property float|null $price
 * @property float $tax
 * @property float $shipping_cost
 * @property int|null $quantity
 * @property string $payment_status
 * @property string|null $delivery_status
 * @property string|null $shipping_type
 * @property int|null $pickup_point_id
 * @property string|null $product_referral_code
 * @property float $earn_point
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\AffiliateLog> $affiliate_log
 * @property-read int|null $affiliate_log_count
 * @property-read \App\Models\Order|null $order
 * @property-read \App\Models\PickupPoint|null $pickup_point
 * @property-read \App\Models\Product|null $product
 * @property-read \App\Models\RefundRequest|null $refund_request
 * @method static \Illuminate\Database\Eloquent\Builder|OrderDetail newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OrderDetail newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OrderDetail query()
 * @method static \Illuminate\Database\Eloquent\Builder|OrderDetail whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderDetail whereDeliveryStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderDetail whereEarnPoint($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderDetail whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderDetail whereOrderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderDetail wherePaymentStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderDetail wherePickupPointId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderDetail wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderDetail whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderDetail whereProductReferralCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderDetail whereQuantity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderDetail whereSellerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderDetail whereShippingCost($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderDetail whereShippingType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderDetail whereTax($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderDetail whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderDetail whereVariation($value)
 */
	class OrderDetail extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\OtpConfiguration
 *
 * @method static \Illuminate\Database\Eloquent\Builder|OtpConfiguration newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OtpConfiguration newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OtpConfiguration query()
 */
	class OtpConfiguration extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Page
 *
 * @property int $id
 * @property string $type
 * @property string|null $title
 * @property string|null $slug
 * @property string|null $content
 * @property string|null $meta_title
 * @property string|null $meta_description
 * @property string|null $keywords
 * @property string|null $meta_image
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\PageTranslation> $page_translations
 * @property-read int|null $page_translations_count
 * @method static \Illuminate\Database\Eloquent\Builder|Page newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Page newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Page query()
 * @method static \Illuminate\Database\Eloquent\Builder|Page whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Page whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Page whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Page whereKeywords($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Page whereMetaDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Page whereMetaImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Page whereMetaTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Page whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Page whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Page whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Page whereUpdatedAt($value)
 */
	class Page extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\PageTranslation
 *
 * @property int $id
 * @property int $page_id
 * @property string $title
 * @property string $content
 * @property string $lang
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon $updated_at
 * @property-read \App\Models\Page|null $page
 * @method static \Illuminate\Database\Eloquent\Builder|PageTranslation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PageTranslation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PageTranslation query()
 * @method static \Illuminate\Database\Eloquent\Builder|PageTranslation whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PageTranslation whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PageTranslation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PageTranslation whereLang($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PageTranslation wherePageId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PageTranslation whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PageTranslation whereUpdatedAt($value)
 */
	class PageTranslation extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\PasswordReset
 *
 * @property string $email
 * @property string $token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @method static \Illuminate\Database\Eloquent\Builder|PasswordReset newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PasswordReset newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PasswordReset query()
 * @method static \Illuminate\Database\Eloquent\Builder|PasswordReset whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PasswordReset whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PasswordReset whereToken($value)
 */
	class PasswordReset extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Payment
 *
 * @property int $id
 * @property int $seller_id
 * @property float $amount
 * @property string|null $payment_details
 * @property string|null $payment_method
 * @property string|null $txn_code
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Payment newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Payment newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Payment query()
 * @method static \Illuminate\Database\Eloquent\Builder|Payment whereAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Payment whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Payment whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Payment wherePaymentDetails($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Payment wherePaymentMethod($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Payment whereSellerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Payment whereTxnCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Payment whereUpdatedAt($value)
 */
	class Payment extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\PaymentMethod
 *
 * @property int $id
 * @property string $name
 * @property int $active
 * @property string|null $addon_identifier
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentMethod newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentMethod newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentMethod query()
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentMethod whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentMethod whereAddonIdentifier($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentMethod whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentMethod whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentMethod whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentMethod whereUpdatedAt($value)
 */
	class PaymentMethod extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Permission
 *
 * @property int $id
 * @property string $name
 * @property string|null $section
 * @property string $guard_name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Permission newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Permission newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Permission query()
 * @method static \Illuminate\Database\Eloquent\Builder|Permission whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Permission whereGuardName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Permission whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Permission whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Permission whereSection($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Permission whereUpdatedAt($value)
 */
	class Permission extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\PickupPoint
 *
 * @property int $id
 * @property int $staff_id
 * @property string $name
 * @property string $address
 * @property string $phone
 * @property int|null $pick_up_status
 * @property int|null $cash_on_pickup_status
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\PickupPointTranslation> $pickup_point_translations
 * @property-read int|null $pickup_point_translations_count
 * @property-read \App\Models\Staff|null $staff
 * @method static \Illuminate\Database\Eloquent\Builder|PickupPoint isActive()
 * @method static \Illuminate\Database\Eloquent\Builder|PickupPoint newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PickupPoint newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PickupPoint query()
 * @method static \Illuminate\Database\Eloquent\Builder|PickupPoint whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PickupPoint whereCashOnPickupStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PickupPoint whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PickupPoint whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PickupPoint whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PickupPoint wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PickupPoint wherePickUpStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PickupPoint whereStaffId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PickupPoint whereUpdatedAt($value)
 */
	class PickupPoint extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\PickupPointTranslation
 *
 * @property int $id
 * @property int $pickup_point_id
 * @property string $name
 * @property string $address
 * @property string $lang
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon $updated_at
 * @property-read \App\Models\PickupPoint|null $poickup_point
 * @method static \Illuminate\Database\Eloquent\Builder|PickupPointTranslation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PickupPointTranslation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PickupPointTranslation query()
 * @method static \Illuminate\Database\Eloquent\Builder|PickupPointTranslation whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PickupPointTranslation whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PickupPointTranslation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PickupPointTranslation whereLang($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PickupPointTranslation whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PickupPointTranslation wherePickupPointId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PickupPointTranslation whereUpdatedAt($value)
 */
	class PickupPointTranslation extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Policy
 *
 * @method static \Illuminate\Database\Eloquent\Builder|Policy newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Policy newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Policy query()
 */
	class Policy extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Preorder
 *
 * @property-read \App\Models\Address|null $address
 * @property-read \App\Models\PreorderCommissionHistory|null $preorderCommissionHistory
 * @property-read \App\Models\PreorderProduct|null $preorder_product
 * @property-read \App\Models\Shop|null $shop
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|Preorder newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Preorder newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Preorder query()
 */
	class Preorder extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\PreorderCashondelivery
 *
 * @property-read \App\Models\Note|null $note
 * @method static \Illuminate\Database\Eloquent\Builder|PreorderCashondelivery newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PreorderCashondelivery newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PreorderCashondelivery query()
 */
	class PreorderCashondelivery extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\PreorderCommissionHistory
 *
 * @property-read \App\Models\Preorder|null $preorder
 * @method static \Illuminate\Database\Eloquent\Builder|PreorderCommissionHistory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PreorderCommissionHistory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PreorderCommissionHistory query()
 */
	class PreorderCommissionHistory extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\PreorderConversationMessage
 *
 * @property-read \App\Models\PreorderConversationThread|null $preorderConversationThread
 * @property-read \App\Models\User|null $sender
 * @method static \Illuminate\Database\Eloquent\Builder|PreorderConversationMessage newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PreorderConversationMessage newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PreorderConversationMessage query()
 */
	class PreorderConversationMessage extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\PreorderConversationThread
 *
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\PreorderConversationMessage> $messages
 * @property-read int|null $messages_count
 * @property-read \App\Models\PreorderProduct|null $preorderProduct
 * @property-read \App\Models\User|null $receiver
 * @property-read \App\Models\User|null $sender
 * @method static \Illuminate\Database\Eloquent\Builder|PreorderConversationThread newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PreorderConversationThread newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PreorderConversationThread query()
 */
	class PreorderConversationThread extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\PreorderCoupon
 *
 * @property-read \App\Models\PreorderProduct|null $preorder_product
 * @method static \Illuminate\Database\Eloquent\Builder|PreorderCoupon newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PreorderCoupon newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PreorderCoupon query()
 */
	class PreorderCoupon extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\PreorderDiscount
 *
 * @method static \Illuminate\Database\Eloquent\Builder|PreorderDiscount newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PreorderDiscount newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PreorderDiscount query()
 */
	class PreorderDiscount extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\PreorderDiscountPeriod
 *
 * @method static \Illuminate\Database\Eloquent\Builder|PreorderDiscountPeriod newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PreorderDiscountPeriod newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PreorderDiscountPeriod query()
 */
	class PreorderDiscountPeriod extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\PreorderPrepayment
 *
 * @method static \Illuminate\Database\Eloquent\Builder|PreorderPrepayment newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PreorderPrepayment newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PreorderPrepayment query()
 */
	class PreorderPrepayment extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\PreorderProduct
 *
 * @property-read \App\Models\Brand|null $brand
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Category> $categories
 * @property-read int|null $categories_count
 * @property-read \App\Models\Category|null $category
 * @property-read \App\Models\Category|null $main_category
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Preorder> $preorder
 * @property-read int|null $preorder_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\PreorderConversationThread> $preorderConversations
 * @property-read int|null $preorder_conversations_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\PreorderProductQuery> $preorderProductQueries
 * @property-read int|null $preorder_product_queries_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\PreorderProductReview> $preorderProductreviews
 * @property-read int|null $preorder_productreviews_count
 * @property-read \App\Models\PreorderCashondelivery|null $preorder_cod
 * @property-read \App\Models\PreorderCoupon|null $preorder_coupon
 * @property-read \App\Models\PreorderDiscount|null $preorder_discount
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\PreorderDiscountPeriod> $preorder_discount_periods
 * @property-read int|null $preorder_discount_periods_count
 * @property-read \App\Models\PreorderPrepayment|null $preorder_prepayment
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\PreorderProductTax> $preorder_product_taxes
 * @property-read int|null $preorder_product_taxes_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\PreorderProductTranslation> $preorder_product_translations
 * @property-read int|null $preorder_product_translations_count
 * @property-read \App\Models\PreorderRefund|null $preorder_refund
 * @property-read \App\Models\PreorderSampleOrder|null $preorder_sample_order
 * @property-read \App\Models\PreorderShipping|null $preorder_shipping
 * @property-read \App\Models\PreorderStock|null $preorder_stock
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\PreorderWholesalePrice> $preorder_wholesale_prices
 * @property-read int|null $preorder_wholesale_prices_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\ProductQuery> $product_queries
 * @property-read int|null $product_queries_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\PreorderProductTax> $taxes
 * @property-read int|null $taxes_count
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|PreorderProduct newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PreorderProduct newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PreorderProduct query()
 */
	class PreorderProduct extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\PreorderProductQuery
 *
 * @property-read \App\Models\PreorderProduct|null $preorderProduct
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|PreorderProductQuery newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PreorderProductQuery newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PreorderProductQuery query()
 */
	class PreorderProductQuery extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\PreorderProductReview
 *
 * @property-read \App\Models\PreorderProduct|null $preorderProduct
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|PreorderProductReview newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PreorderProductReview newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PreorderProductReview query()
 */
	class PreorderProductReview extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\PreorderProductTax
 *
 * @property-read \App\Models\Tax|null $preorder_tax
 * @method static \Illuminate\Database\Eloquent\Builder|PreorderProductTax newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PreorderProductTax newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PreorderProductTax query()
 */
	class PreorderProductTax extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\PreorderProductTranslation
 *
 * @property-read \App\Models\PreorderProduct|null $preorderProduct
 * @method static \Illuminate\Database\Eloquent\Builder|PreorderProductTranslation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PreorderProductTranslation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PreorderProductTranslation query()
 */
	class PreorderProductTranslation extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\PreorderRefund
 *
 * @property-read \App\Models\Note|null $note
 * @method static \Illuminate\Database\Eloquent\Builder|PreorderRefund newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PreorderRefund newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PreorderRefund query()
 */
	class PreorderRefund extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\PreorderSampleOrder
 *
 * @method static \Illuminate\Database\Eloquent\Builder|PreorderSampleOrder newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PreorderSampleOrder newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PreorderSampleOrder query()
 */
	class PreorderSampleOrder extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\PreorderShipping
 *
 * @property-read \App\Models\Note|null $note
 * @method static \Illuminate\Database\Eloquent\Builder|PreorderShipping newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PreorderShipping newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PreorderShipping query()
 */
	class PreorderShipping extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\PreorderStock
 *
 * @method static \Illuminate\Database\Eloquent\Builder|PreorderStock newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PreorderStock newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PreorderStock query()
 */
	class PreorderStock extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\PreorderWholesale
 *
 * @method static \Illuminate\Database\Eloquent\Builder|PreorderWholesale newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PreorderWholesale newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PreorderWholesale query()
 */
	class PreorderWholesale extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\PreorderWholesalePrice
 *
 * @method static \Illuminate\Database\Eloquent\Builder|PreorderWholesalePrice newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PreorderWholesalePrice newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PreorderWholesalePrice query()
 */
	class PreorderWholesalePrice extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Product
 *
 * @property int $id
 * @property string $name
 * @property string $added_by
 * @property int $user_id
 * @property int $category_id
 * @property int|null $brand_id
 * @property string|null $photos
 * @property string|null $thumbnail_img
 * @property string|null $video_provider
 * @property string|null $video_link
 * @property string|null $tags
 * @property string|null $description
 * @property string|null $specification
 * @property float $unit_price
 * @property float|null $purchase_price
 * @property int $variant_product
 * @property string $attributes
 * @property string|null $choice_options
 * @property string|null $colors
 * @property string|null $variations
 * @property int $todays_deal
 * @property int $published
 * @property int $approved
 * @property string $stock_visibility_state
 * @property int $cash_on_delivery 1 = On, 0 = Off
 * @property int $featured
 * @property int $seller_featured
 * @property int $current_stock
 * @property string|null $unit
 * @property float $weight
 * @property int $min_qty
 * @property int|null $low_stock_quantity
 * @property float $discount
 * @property string $discount_type
 * @property int|null $discount_start_date
 * @property int|null $discount_end_date
 * @property float|null $tax
 * @property string|null $tax_type
 * @property string|null $shipping_type
 * @property float $shipping_cost
 * @property int $is_quantity_multiplied 1 = Mutiplied with shipping cost
 * @property int|null $est_shipping_days
 * @property int $num_of_sale
 * @property string|null $meta_title
 * @property string|null $meta_description
 * @property string|null $meta_img
 * @property string|null $pdf
 * @property string $slug
 * @property float $rating
 * @property string|null $barcode
 * @property int $digital
 * @property int $auction_product
 * @property string|null $file_name
 * @property string|null $file_path
 * @property string|null $external_link
 * @property string|null $external_link_btn
 * @property int $wholesale_product
 * @property string|null $frequently_bought_selection_type
 * @property int $has_warranty
 * @property int|null $warranty_id
 * @property int|null $warranty_note_id
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\AuctionProductBid> $bids
 * @property-read int|null $bids_count
 * @property-read \App\Models\Brand|null $brand
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Cart> $carts
 * @property-read int|null $carts_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Category> $categories
 * @property-read int|null $categories_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\FlashDealProduct> $flash_deal_products
 * @property-read int|null $flash_deal_products_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\FrequentlyBoughtProduct> $frequently_bought_products
 * @property-read int|null $frequently_bought_products_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\LastViewedProduct> $last_viewed_products
 * @property-read int|null $last_viewed_products_count
 * @property-read \App\Models\Category|null $main_category
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\OrderDetail> $orderDetails
 * @property-read int|null $order_details_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\ProductCategory> $product_categories
 * @property-read int|null $product_categories_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\ProductQuery> $product_queries
 * @property-read int|null $product_queries_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\ProductTranslation> $product_translations
 * @property-read int|null $product_translations_count
 * @property-read \App\Models\Note|null $refundNote
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Review> $reviews
 * @property-read int|null $reviews_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\ProductStock> $stocks
 * @property-read int|null $stocks_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\ProductTax> $taxes
 * @property-read int|null $taxes_count
 * @property-read \App\Models\Upload|null $thumbnail
 * @property-read \App\Models\User|null $user
 * @property-read \App\Models\Warranty|null $warranty
 * @property-read \App\Models\Note|null $warrantyNote
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Wishlist> $wishlists
 * @property-read int|null $wishlists_count
 * @method static \Illuminate\Database\Eloquent\Builder|Product digital()
 * @method static \Illuminate\Database\Eloquent\Builder|Product isApprovedPublished()
 * @method static \Illuminate\Database\Eloquent\Builder|Product newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Product newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Product physical()
 * @method static \Illuminate\Database\Eloquent\Builder|Product query()
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereAddedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereApproved($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereAttributes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereAuctionProduct($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereBarcode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereBrandId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereCashOnDelivery($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereChoiceOptions($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereColors($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereCurrentStock($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereDigital($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereDiscount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereDiscountEndDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereDiscountStartDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereDiscountType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereEstShippingDays($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereExternalLink($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereExternalLinkBtn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereFeatured($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereFileName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereFilePath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereFrequentlyBoughtSelectionType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereHasWarranty($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereIsQuantityMultiplied($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereLowStockQuantity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereMetaDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereMetaImg($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereMetaTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereMinQty($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereNumOfSale($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product wherePdf($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product wherePhotos($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product wherePublished($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product wherePurchasePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereRating($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereSellerFeatured($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereShippingCost($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereShippingType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereSpecification($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereStockVisibilityState($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereTags($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereTax($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereTaxType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereThumbnailImg($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereTodaysDeal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereUnit($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereUnitPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereVariantProduct($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereVariations($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereVideoLink($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereVideoProvider($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereWarrantyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereWarrantyNoteId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereWeight($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereWholesaleProduct($value)
 */
	class Product extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\ProductCategory
 *
 * @property int $product_id
 * @property int $category_id
 * @property-read \App\Models\Category|null $category
 * @property-read \App\Models\Product|null $product
 * @method static \Illuminate\Database\Eloquent\Builder|ProductCategory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductCategory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductCategory query()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductCategory whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductCategory whereProductId($value)
 */
	class ProductCategory extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\ProductQuery
 *
 * @property int $id
 * @property int $customer_id
 * @property int $seller_id
 * @property int $product_id
 * @property string $question
 * @property string|null $reply
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Product|null $product
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|ProductQuery newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductQuery newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductQuery query()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductQuery whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductQuery whereCustomerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductQuery whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductQuery whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductQuery whereQuestion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductQuery whereReply($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductQuery whereSellerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductQuery whereUpdatedAt($value)
 */
	class ProductQuery extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\ProductStock
 *
 * @property int $id
 * @property int $product_id
 * @property string $variant
 * @property string|null $sku
 * @property float $price
 * @property int $qty
 * @property int|null $image
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon $updated_at
 * @property-read \App\Models\Product|null $product
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\WholesalePrice> $wholesalePrices
 * @property-read int|null $wholesale_prices_count
 * @method static \Illuminate\Database\Eloquent\Builder|ProductStock newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductStock newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductStock query()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductStock whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductStock whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductStock whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductStock wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductStock whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductStock whereQty($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductStock whereSku($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductStock whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductStock whereVariant($value)
 */
	class ProductStock extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\ProductTax
 *
 * @property int $id
 * @property int $product_id
 * @property int $tax_id
 * @property float $tax
 * @property string $tax_type
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|ProductTax newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductTax newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductTax query()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductTax whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductTax whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductTax whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductTax whereTax($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductTax whereTaxId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductTax whereTaxType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductTax whereUpdatedAt($value)
 */
	class ProductTax extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\ProductTranslation
 *
 * @property int $id
 * @property int $product_id
 * @property string|null $name
 * @property string|null $unit
 * @property string|null $description
 * @property string|null $specification
 * @property string $lang
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon $updated_at
 * @property-read \App\Models\Product|null $product
 * @method static \Illuminate\Database\Eloquent\Builder|ProductTranslation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductTranslation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductTranslation query()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductTranslation whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductTranslation whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductTranslation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductTranslation whereLang($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductTranslation whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductTranslation whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductTranslation whereSpecification($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductTranslation whereUnit($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductTranslation whereUpdatedAt($value)
 */
	class ProductTranslation extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\ProxyPayment
 *
 * @property int $id
 * @property string $payment_type
 * @property string $reference_id
 * @property int|null $order_id
 * @property int|null $package_id
 * @property int $user_id
 * @property float $amount
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|ProxyPayment newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProxyPayment newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProxyPayment query()
 * @method static \Illuminate\Database\Eloquent\Builder|ProxyPayment whereAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProxyPayment whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProxyPayment whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProxyPayment whereOrderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProxyPayment wherePackageId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProxyPayment wherePaymentType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProxyPayment whereReferenceId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProxyPayment whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProxyPayment whereUserId($value)
 */
	class ProxyPayment extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\RefundRequest
 *
 * @property-read \App\Models\Order|null $order
 * @property-read \App\Models\OrderDetail|null $orderDetail
 * @property-read \App\Models\User|null $seller
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|RefundRequest newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RefundRequest newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RefundRequest query()
 */
	class RefundRequest extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Review
 *
 * @property int $id
 * @property string $type
 * @property int $product_id
 * @property int|null $user_id
 * @property string|null $custom_reviewer_name
 * @property string|null $custom_reviewer_image
 * @property int $rating
 * @property string $comment
 * @property string|null $photos
 * @property int $status
 * @property int $viewed
 * @property int $created_at_is_custom
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon $updated_at
 * @property-read \App\Models\Product|null $product
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|Review newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Review newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Review query()
 * @method static \Illuminate\Database\Eloquent\Builder|Review whereComment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Review whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Review whereCreatedAtIsCustom($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Review whereCustomReviewerImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Review whereCustomReviewerName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Review whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Review wherePhotos($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Review whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Review whereRating($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Review whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Review whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Review whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Review whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Review whereViewed($value)
 */
	class Review extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Role
 *
 * @property int $id
 * @property string $name
 * @property string $guard_name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\RoleTranslation> $role_translations
 * @property-read int|null $role_translations_count
 * @method static \Illuminate\Database\Eloquent\Builder|Role newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Role newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Role query()
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereGuardName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereUpdatedAt($value)
 */
	class Role extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\RoleTranslation
 *
 * @property int $id
 * @property int $role_id
 * @property string $name
 * @property string $lang
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon $updated_at
 * @property-read \App\Models\Role|null $role
 * @method static \Illuminate\Database\Eloquent\Builder|RoleTranslation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RoleTranslation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RoleTranslation query()
 * @method static \Illuminate\Database\Eloquent\Builder|RoleTranslation whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RoleTranslation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RoleTranslation whereLang($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RoleTranslation whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RoleTranslation whereRoleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RoleTranslation whereUpdatedAt($value)
 */
	class RoleTranslation extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Search
 *
 * @property int $id
 * @property string $query
 * @property int $count
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Search newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Search newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Search query()
 * @method static \Illuminate\Database\Eloquent\Builder|Search whereCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Search whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Search whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Search whereQuery($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Search whereUpdatedAt($value)
 */
	class Search extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Seller
 *
 * @property int $id
 * @property int $user_id
 * @property float $rating
 * @property int $num_of_reviews
 * @property int $num_of_sale
 * @property int $verification_status
 * @property string|null $verification_info
 * @property int $cash_on_delivery_status
 * @property float $admin_to_pay
 * @property string|null $bank_name
 * @property string|null $bank_acc_name
 * @property string|null $bank_acc_no
 * @property int|null $bank_routing_no
 * @property int $bank_payment_status
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Payment> $payments
 * @property-read int|null $payments_count
 * @property-read \App\Models\SellerPackage|null $seller_package
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|Seller newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Seller newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Seller query()
 * @method static \Illuminate\Database\Eloquent\Builder|Seller whereAdminToPay($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Seller whereBankAccName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Seller whereBankAccNo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Seller whereBankName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Seller whereBankPaymentStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Seller whereBankRoutingNo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Seller whereCashOnDeliveryStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Seller whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Seller whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Seller whereNumOfReviews($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Seller whereNumOfSale($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Seller whereRating($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Seller whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Seller whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Seller whereVerificationInfo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Seller whereVerificationStatus($value)
 */
	class Seller extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\SellerPackage
 *
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\SellerPackageTranslation> $seller_package_translations
 * @property-read int|null $seller_package_translations_count
 * @property-read \App\Models\Shop|null $shop
 * @method static \Illuminate\Database\Eloquent\Builder|SellerPackage newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SellerPackage newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SellerPackage query()
 */
	class SellerPackage extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\SellerPackagePayment
 *
 * @property-read \App\Models\SellerPackage|null $seller_package
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|SellerPackagePayment newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SellerPackagePayment newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SellerPackagePayment query()
 */
	class SellerPackagePayment extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\SellerPackageTranslation
 *
 * @property-read \App\Models\SellerPackage|null $seller_package
 * @method static \Illuminate\Database\Eloquent\Builder|SellerPackageTranslation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SellerPackageTranslation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SellerPackageTranslation query()
 */
	class SellerPackageTranslation extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\SellerWithdrawRequest
 *
 * @property int $id
 * @property int|null $user_id
 * @property float|null $amount
 * @property string|null $message
 * @property int|null $status
 * @property int|null $viewed
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon $updated_at
 * @property-read \App\Models\Shop|null $shop
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|SellerWithdrawRequest newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SellerWithdrawRequest newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SellerWithdrawRequest query()
 * @method static \Illuminate\Database\Eloquent\Builder|SellerWithdrawRequest whereAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SellerWithdrawRequest whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SellerWithdrawRequest whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SellerWithdrawRequest whereMessage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SellerWithdrawRequest whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SellerWithdrawRequest whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SellerWithdrawRequest whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SellerWithdrawRequest whereViewed($value)
 */
	class SellerWithdrawRequest extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Shop
 *
 * @property int $id
 * @property int $user_id
 * @property string|null $name
 * @property string|null $logo
 * @property string|null $sliders
 * @property string|null $top_banner
 * @property string|null $banner_full_width_1
 * @property string|null $banners_half_width
 * @property string|null $banner_full_width_2
 * @property string|null $phone
 * @property string|null $address
 * @property float $rating
 * @property int $num_of_reviews
 * @property int $num_of_sale
 * @property int|null $seller_package_id
 * @property int $product_upload_limit
 * @property string|null $package_invalid_at
 * @property int $verification_status
 * @property string|null $verification_info
 * @property int $cash_on_delivery_status
 * @property float $admin_to_pay
 * @property string|null $facebook
 * @property string|null $instagram
 * @property string|null $google
 * @property string|null $twitter
 * @property string|null $youtube
 * @property string|null $slug
 * @property string|null $meta_title
 * @property string|null $meta_description
 * @property string|null $pick_up_point_id
 * @property float $shipping_cost
 * @property float $commission_percentage
 * @property float|null $delivery_pickup_latitude
 * @property float|null $delivery_pickup_longitude
 * @property string|null $bank_name
 * @property string|null $bank_acc_name
 * @property string|null $bank_acc_no
 * @property int|null $bank_routing_no
 * @property int $bank_payment_status
 * @property string|null $top_banner_image
 * @property string|null $top_banner_link
 * @property string|null $slider_images
 * @property string|null $slider_links
 * @property string|null $banner_full_width_1_images
 * @property string|null $banner_full_width_1_links
 * @property string|null $banners_half_width_images
 * @property string|null $banners_half_width_links
 * @property string|null $banner_full_width_2_images
 * @property string|null $banner_full_width_2_links
 * @property int|null $custom_followers
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\FollowSeller> $followers
 * @property-read int|null $followers_count
 * @property-read \App\Models\SellerPackage|null $seller_package
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|Shop newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Shop newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Shop query()
 * @method static \Illuminate\Database\Eloquent\Builder|Shop whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Shop whereAdminToPay($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Shop whereBankAccName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Shop whereBankAccNo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Shop whereBankName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Shop whereBankPaymentStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Shop whereBankRoutingNo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Shop whereBannerFullWidth1($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Shop whereBannerFullWidth1Images($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Shop whereBannerFullWidth1Links($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Shop whereBannerFullWidth2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Shop whereBannerFullWidth2Images($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Shop whereBannerFullWidth2Links($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Shop whereBannersHalfWidth($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Shop whereBannersHalfWidthImages($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Shop whereBannersHalfWidthLinks($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Shop whereCashOnDeliveryStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Shop whereCommissionPercentage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Shop whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Shop whereCustomFollowers($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Shop whereDeliveryPickupLatitude($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Shop whereDeliveryPickupLongitude($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Shop whereFacebook($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Shop whereGoogle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Shop whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Shop whereInstagram($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Shop whereLogo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Shop whereMetaDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Shop whereMetaTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Shop whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Shop whereNumOfReviews($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Shop whereNumOfSale($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Shop wherePackageInvalidAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Shop wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Shop wherePickUpPointId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Shop whereProductUploadLimit($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Shop whereRating($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Shop whereSellerPackageId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Shop whereShippingCost($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Shop whereSliderImages($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Shop whereSliderLinks($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Shop whereSliders($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Shop whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Shop whereTopBanner($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Shop whereTopBannerImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Shop whereTopBannerLink($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Shop whereTwitter($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Shop whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Shop whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Shop whereVerificationInfo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Shop whereVerificationStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Shop whereYoutube($value)
 */
	class Shop extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\SizeChart
 *
 * @property int $id
 * @property string $name
 * @property int $category_id
 * @property string|null $fit_type
 * @property string|null $stretch_type
 * @property string|null $photos
 * @property string|null $description
 * @property string $measurement_points
 * @property string $size_options
 * @property string|null $measurement_option
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon $updated_at
 * @property-read \App\Models\Category|null $category
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\SizeChartDetail> $sizeChartDetails
 * @property-read int|null $size_chart_details_count
 * @method static \Illuminate\Database\Eloquent\Builder|SizeChart newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SizeChart newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SizeChart query()
 * @method static \Illuminate\Database\Eloquent\Builder|SizeChart whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SizeChart whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SizeChart whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SizeChart whereFitType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SizeChart whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SizeChart whereMeasurementOption($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SizeChart whereMeasurementPoints($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SizeChart whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SizeChart wherePhotos($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SizeChart whereSizeOptions($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SizeChart whereStretchType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SizeChart whereUpdatedAt($value)
 */
	class SizeChart extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\SizeChartDetail
 *
 * @property int $id
 * @property int $size_chart_id
 * @property int $measurement_point_id
 * @property int $attribute_value_id
 * @property string|null $inch_value
 * @property string|null $cen_value
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|SizeChartDetail newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SizeChartDetail newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SizeChartDetail query()
 * @method static \Illuminate\Database\Eloquent\Builder|SizeChartDetail whereAttributeValueId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SizeChartDetail whereCenValue($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SizeChartDetail whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SizeChartDetail whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SizeChartDetail whereInchValue($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SizeChartDetail whereMeasurementPointId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SizeChartDetail whereSizeChartId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SizeChartDetail whereUpdatedAt($value)
 */
	class SizeChartDetail extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Slider
 *
 * @method static \Illuminate\Database\Eloquent\Builder|Slider newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Slider newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Slider query()
 */
	class Slider extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\SmsTemplate
 *
 * @method static \Illuminate\Database\Eloquent\Builder|SmsTemplate newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SmsTemplate newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SmsTemplate query()
 */
	class SmsTemplate extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Staff
 *
 * @property int $id
 * @property int $user_id
 * @property int $role_id
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon $updated_at
 * @property-read \App\Models\PickupPoint|null $pick_up_point
 * @property-read \App\Models\Role|null $role
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|Staff newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Staff newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Staff query()
 * @method static \Illuminate\Database\Eloquent\Builder|Staff whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Staff whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Staff whereRoleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Staff whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Staff whereUserId($value)
 */
	class Staff extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\State
 *
 * @property int $id
 * @property string $name
 * @property int $country_id
 * @property int $status
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon $updated_at
 * @property string|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\City> $cities
 * @property-read int|null $cities_count
 * @property-read \App\Models\Country|null $country
 * @method static \Illuminate\Database\Eloquent\Builder|State newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|State newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|State query()
 * @method static \Illuminate\Database\Eloquent\Builder|State whereCountryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|State whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|State whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|State whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|State whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|State whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|State whereUpdatedAt($value)
 */
	class State extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\SubCategory
 *
 * @property int $id
 * @property string $name
 * @property int $category_id
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SubCategory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SubCategory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SubCategory query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SubCategory whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SubCategory whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SubCategory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SubCategory whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SubCategory whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property-read \App\Models\Category|null $category
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Product> $products
 * @property-read int|null $products_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\SubSubCategory> $subSubCategories
 * @property-read int|null $sub_sub_categories_count
 */
	class SubCategory extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\SubSubCategory
 *
 * @property int $id
 * @property int $sub_category_id
 * @property string $name
 * @property string $brands
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SubSubCategory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SubSubCategory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SubSubCategory query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SubSubCategory whereBrands($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SubSubCategory whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SubSubCategory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SubSubCategory whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SubSubCategory whereSubCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SubSubCategory whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property-read \App\Models\SubCategory|null $subCategory
 */
	class SubSubCategory extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Subscriber
 *
 * @property int $id
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Subscriber newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Subscriber newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Subscriber query()
 * @method static \Illuminate\Database\Eloquent\Builder|Subscriber whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Subscriber whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Subscriber whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Subscriber whereUpdatedAt($value)
 */
	class Subscriber extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Tax
 *
 * @property int $id
 * @property string $name
 * @property int $tax_status 0 = Inactive, 1 = Active
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\ProductTax> $product_taxes
 * @property-read int|null $product_taxes_count
 * @method static \Illuminate\Database\Eloquent\Builder|Tax newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Tax newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Tax query()
 * @method static \Illuminate\Database\Eloquent\Builder|Tax whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tax whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tax whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tax whereTaxStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tax whereUpdatedAt($value)
 */
	class Tax extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Ticket
 *
 * @property int $id
 * @property int $code
 * @property int $user_id
 * @property string $subject
 * @property string|null $details
 * @property string|null $files
 * @property string $status
 * @property int $viewed
 * @property int $client_viewed
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\TicketReply> $ticketreplies
 * @property-read int|null $ticketreplies_count
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|Ticket newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Ticket newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Ticket query()
 * @method static \Illuminate\Database\Eloquent\Builder|Ticket whereClientViewed($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ticket whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ticket whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ticket whereDetails($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ticket whereFiles($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ticket whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ticket whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ticket whereSubject($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ticket whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ticket whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ticket whereViewed($value)
 */
	class Ticket extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\TicketReply
 *
 * @property int $id
 * @property int $ticket_id
 * @property int $user_id
 * @property string $reply
 * @property string|null $files
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon $updated_at
 * @property-read \App\Models\Ticket|null $ticket
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|TicketReply newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TicketReply newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TicketReply query()
 * @method static \Illuminate\Database\Eloquent\Builder|TicketReply whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TicketReply whereFiles($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TicketReply whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TicketReply whereReply($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TicketReply whereTicketId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TicketReply whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TicketReply whereUserId($value)
 */
	class TicketReply extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Transaction
 *
 * @property int $id
 * @property int $user_id
 * @property string|null $gateway
 * @property string|null $payment_type
 * @property string|null $additional_content
 * @property string|null $mpesa_request
 * @property string|null $mpesa_receipt
 * @property int $status
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction query()
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction whereAdditionalContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction whereGateway($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction whereMpesaReceipt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction whereMpesaRequest($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction wherePaymentType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction whereUserId($value)
 */
	class Transaction extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Translation
 *
 * @property int $id
 * @property string|null $lang
 * @property string|null $lang_key
 * @property string|null $lang_value
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Translation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Translation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Translation query()
 * @method static \Illuminate\Database\Eloquent\Builder|Translation whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Translation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Translation whereLang($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Translation whereLangKey($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Translation whereLangValue($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Translation whereUpdatedAt($value)
 */
	class Translation extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Upload
 *
 * @property int $id
 * @property string|null $file_original_name
 * @property string|null $file_name
 * @property int|null $user_id
 * @property int|null $file_size
 * @property string|null $extension
 * @property string|null $type
 * @property string|null $external_link
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|Upload newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Upload newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Upload onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Upload query()
 * @method static \Illuminate\Database\Eloquent\Builder|Upload whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Upload whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Upload whereExtension($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Upload whereExternalLink($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Upload whereFileName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Upload whereFileOriginalName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Upload whereFileSize($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Upload whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Upload whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Upload whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Upload whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Upload withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Upload withoutTrashed()
 */
	class Upload extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\User
 *
 * @property int $id
 * @property int|null $referred_by
 * @property string|null $provider
 * @property string|null $provider_id
 * @property string|null $refresh_token
 * @property string|null $access_token
 * @property string $user_type
 * @property string $name
 * @property string|null $email
 * @property string|null $email_verified_at
 * @property string|null $verification_code
 * @property string|null $new_email_verificiation_code
 * @property string|null $password
 * @property string|null $remember_token
 * @property string|null $device_token
 * @property string|null $avatar
 * @property string|null $avatar_original
 * @property string|null $address
 * @property string|null $country
 * @property string|null $state
 * @property string|null $city
 * @property string|null $postal_code
 * @property string|null $phone
 * @property float $balance
 * @property int $banned
 * @property int|null $is_suspicious
 * @property string|null $referral_code
 * @property int|null $customer_package_id
 * @property int|null $remaining_uploads
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Address> $addresses
 * @property-read int|null $addresses_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\AffiliateLog> $affiliate_log
 * @property-read int|null $affiliate_log_count
 * @property-read \App\Models\AffiliateUser|null $affiliate_user
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\AffiliateWithdrawRequest> $affiliate_withdraw_request
 * @property-read int|null $affiliate_withdraw_request_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Cart> $carts
 * @property-read int|null $carts_count
 * @property-read \App\Models\ClubPoint|null $club_point
 * @property-read \App\Models\Customer|null $customer
 * @property-read \App\Models\CustomerPackage|null $customer_package
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\CustomerPackagePayment> $customer_package_payments
 * @property-read int|null $customer_package_payments_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\CustomerProduct> $customer_products
 * @property-read int|null $customer_products_count
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Order> $orders
 * @property-read int|null $orders_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Permission\Models\Permission> $permissions
 * @property-read int|null $permissions_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\PreorderProduct> $preorderProducts
 * @property-read int|null $preorder_products_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Preorder> $preorders
 * @property-read int|null $preorders_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\AuctionProductBid> $product_bids
 * @property-read int|null $product_bids_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\ProductQuery> $product_queries
 * @property-read int|null $product_queries_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Product> $products
 * @property-read int|null $products_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Review> $reviews
 * @property-read int|null $reviews_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Permission\Models\Role> $roles
 * @property-read int|null $roles_count
 * @property-read \App\Models\Seller|null $seller
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Order> $seller_orders
 * @property-read int|null $seller_orders_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\SellerPackagePayment> $seller_package_payments
 * @property-read int|null $seller_package_payments_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\OrderDetail> $seller_sales
 * @property-read int|null $seller_sales_count
 * @property-read \App\Models\Shop|null $shop
 * @property-read \App\Models\Staff|null $staff
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Laravel\Sanctum\PersonalAccessToken> $tokens
 * @property-read int|null $tokens_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Upload> $uploads
 * @property-read int|null $uploads_count
 * @property-read \App\Models\UserCoupon|null $userCoupon
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Wallet> $wallets
 * @property-read int|null $wallets_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Wishlist> $wishlists
 * @property-read int|null $wishlists_count
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User permission($permissions)
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User role($roles, $guard = null)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereAccessToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereAvatar($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereAvatarOriginal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereBalance($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereBanned($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCountry($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCustomerPackageId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereDeviceToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereIsSuspicious($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereNewEmailVerificiationCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePostalCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereProvider($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereProviderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereReferralCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereReferredBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRefreshToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRemainingUploads($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereState($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUserType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereVerificationCode($value)
 */
	class User extends \Eloquent implements \Illuminate\Contracts\Auth\MustVerifyEmail {}
}

namespace App\Models{
/**
 * App\Models\UserCoupon
 *
 * @property int $user_id
 * @property int $coupon_id
 * @property string $coupon_code
 * @property float $min_buy
 * @property int $validation_days
 * @property float $discount
 * @property string $discount_type
 * @property int $expiry_date
 * @property-read \App\Models\Coupon|null $coupon
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|UserCoupon newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserCoupon newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserCoupon query()
 * @method static \Illuminate\Database\Eloquent\Builder|UserCoupon whereCouponCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserCoupon whereCouponId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserCoupon whereDiscount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserCoupon whereDiscountType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserCoupon whereExpiryDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserCoupon whereMinBuy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserCoupon whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserCoupon whereValidationDays($value)
 */
	class UserCoupon extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Wallet
 *
 * @property int $id
 * @property int $user_id
 * @property float $amount
 * @property string|null $payment_method
 * @property string|null $payment_details
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon $updated_at
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|Wallet newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Wallet newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Wallet query()
 * @method static \Illuminate\Database\Eloquent\Builder|Wallet whereAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Wallet whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Wallet whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Wallet wherePaymentDetails($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Wallet wherePaymentMethod($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Wallet whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Wallet whereUserId($value)
 */
	class Wallet extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Warranty
 *
 * @property int $id
 * @property string $text
 * @property int|null $logo
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\WarrantyTranslation> $warranty_translations
 * @property-read int|null $warranty_translations_count
 * @method static \Illuminate\Database\Eloquent\Builder|Warranty newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Warranty newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Warranty query()
 * @method static \Illuminate\Database\Eloquent\Builder|Warranty whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Warranty whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Warranty whereLogo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Warranty whereText($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Warranty whereUpdatedAt($value)
 */
	class Warranty extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\WarrantyTranslation
 *
 * @property int $id
 * @property int $warranty_id
 * @property string $text
 * @property string $lang
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon $updated_at
 * @property-read \App\Models\Warranty|null $warranty
 * @method static \Illuminate\Database\Eloquent\Builder|WarrantyTranslation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|WarrantyTranslation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|WarrantyTranslation query()
 * @method static \Illuminate\Database\Eloquent\Builder|WarrantyTranslation whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WarrantyTranslation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WarrantyTranslation whereLang($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WarrantyTranslation whereText($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WarrantyTranslation whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WarrantyTranslation whereWarrantyId($value)
 */
	class WarrantyTranslation extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\WholesalePrice
 *
 * @method static \Illuminate\Database\Eloquent\Builder|WholesalePrice newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|WholesalePrice newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|WholesalePrice query()
 */
	class WholesalePrice extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Wishlist
 *
 * @property int $id
 * @property int $user_id
 * @property int $product_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon $updated_at
 * @property-read \App\Models\Product|null $product
 * @method static \Illuminate\Database\Eloquent\Builder|Wishlist newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Wishlist newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Wishlist query()
 * @method static \Illuminate\Database\Eloquent\Builder|Wishlist whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Wishlist whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Wishlist whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Wishlist whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Wishlist whereUserId($value)
 */
	class Wishlist extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Zone
 *
 * @property int $id
 * @property string $name
 * @property int $status 0 = Inactive, 1 = Active
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\CarrierRangePrice> $carrier_range_prices
 * @property-read int|null $carrier_range_prices_count
 * @method static \Illuminate\Database\Eloquent\Builder|Zone newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Zone newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Zone query()
 * @method static \Illuminate\Database\Eloquent\Builder|Zone whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Zone whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Zone whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Zone whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Zone whereUpdatedAt($value)
 */
	class Zone extends \Eloquent {}
}

