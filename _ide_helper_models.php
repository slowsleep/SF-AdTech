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
 * 
 *
 * @property int $user_id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Offer> $offers
 * @property-read int|null $offers_count
 * @method static \Database\Factories\AdvertiserFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Advertiser newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Advertiser newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Advertiser query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Advertiser whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Advertiser whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Advertiser whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Advertiser whereUserId($value)
 */
	class Advertiser extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int|null $advertiser_id
 * @property string $title
 * @property float $price
 * @property string $url
 * @property int|null $theme_id
 * @property int $active
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Advertiser|null $advertiser
 * @property-read \App\Models\SiteTheme|null $theme
 * @method static \Database\Factories\OfferFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Offer newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Offer newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Offer query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Offer whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Offer whereAdvertiserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Offer whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Offer whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Offer wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Offer whereThemeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Offer whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Offer whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Offer whereUrl($value)
 */
	class Offer extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\RoleFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Role newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Role newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Role query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Role whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Role whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Role whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Role whereUpdatedAt($value)
 */
	class Role extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\SiteThemeFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SiteTheme newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SiteTheme newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SiteTheme query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SiteTheme whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SiteTheme whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SiteTheme whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SiteTheme whereUpdatedAt($value)
 */
	class SiteTheme extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int|null $role_id
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read \App\Models\Role|null $role
 * @method static \Database\Factories\UserFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereRoleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereUpdatedAt($value)
 */
	class User extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $user_id
 * @property string $site
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Offer> $offers
 * @property-read int|null $offers_count
 * @method static \Database\Factories\WebmasterFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Webmaster newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Webmaster newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Webmaster query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Webmaster whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Webmaster whereSite($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Webmaster whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Webmaster whereUserId($value)
 */
	class Webmaster extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int|null $webmaster_id
 * @property int|null $offer_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Offer|null $offer
 * @property-read \App\Models\Webmaster|null $webmaster
 * @method static \Database\Factories\WebmasterOfferFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|WebmasterOffer newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|WebmasterOffer newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|WebmasterOffer query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|WebmasterOffer whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|WebmasterOffer whereOfferId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|WebmasterOffer whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|WebmasterOffer whereWebmasterId($value)
 */
	class WebmasterOffer extends \Eloquent {}
}

